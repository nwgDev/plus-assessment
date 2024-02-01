
#front end

- I did not do it

#Backend

- I did the following :

1. Create a new Laravel project via Composer with the name plus-assessment and complete the full installation with your database set up.
2. Update/create Migrations/Seeders/Models
3. Update the user migration to have a first_name and last_name and any other columns you find neccessary.
Create a roles table.
4. The roles should include, Admin, Content Manager, User.
Create a permissions table.
5. The permissions should include, View Admin Dashboard, Administer Users.
6. All permissions should be assigned to the Admin role.
7. View Admin Dashboard should be assigned to the Content Manager role.
8. Create the pivot tables for the above migrations.
9. Create another pivot table that keeps track of a users IP, IP Location (integrating with http://ip-api.com/json/ free version - NOTE: not HTTPS), login_at time and browser user agent when they log in.
10. Add the Laravel Breeze Authentication starter kit.
11. Add the neccessary admin routes to view a list of users, create users and edit a user.
12. If a user that does not have the role admin logs in, they should not be able to access the admin backend.
When a user logs in, the system should check if their IP and User Agent match what is in the database. If it isn't the first entry or a new user, an email (https://laravel.com/docs/10.x/mail#markdown-mailables or https://laravel.com/docs/8.x/notifications#mail-notifications) needs to be sent out to the user informing there is a login from a new device/browser.
    


