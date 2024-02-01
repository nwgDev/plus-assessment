<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\UserSecurityAlertEmail;
use App\Models\UserLog;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->user()->name === 'admin') {
            $this->trackUserIpAddress($request);

            return redirect()->route('admin.dashboard');

        } elseif ($request->user()->name === 'content manager') {
            $this->trackUserIpAddress($request);
            return redirect()->route('content.manager.dashboard');
        }

        $this->trackUserIpAddress($request);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    private function trackUserIpAddress(LoginRequest $request){

        $userIp = $request->ip();
        $client = new Client();
        $response = $client->get("https://ipinfo.io/{$userIp}?token=00a14950ee3aba");
        $data = $response->getBody();

        $logs = $this->getUserLogs($request);

        if (count($logs) !== 0){
            if ($logs[0]['ip_address'] !== $userIp) {

                $this->sendEmail($request);

                $this->createUserLogs($request, $data);
                return;
            }
        }

        $this->createUserLogs($request, $data);
    }

    private function createUserLogs(LoginRequest $request, $data) {
        UserLog::create([
            'user_id' => $request->user()->id,
            'user_agent' =>$request->header('User-Agent'),
            'ip_address' => $request->ip(),
            'ip_location' => $data,
            'login_at' => now(),
        ]);
    }

    private function getUserLogs(LoginRequest $request) {
         return UserLog::where('user_id', $request->user()->id)
             ->where(function ($query) {
                 $query->whereNotNull('login_at');
             })->get();
    }

    private function sendEmail($request){
        Mail::to($request->user()->email)->send(new UserSecurityAlertEmail($request->user()->firstname));
    }
}
