<?php

namespace App\Http\Controllers\ContentManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentManagerController extends Controller
{
    public function index()
    {
        return view('content_manager.dashboard');
    }
}
