# School_management_system
A Laravel 10 project integrating Google Social Login using the Socialite package. Users can log in or register via Google, with their details (name, email, photo) stored in the database. Includes Google OAuth2 authentication, secure login, and custom user management. Simple setup and installation.


Project Name: Laravel Social Login with Google

Description:

This project demonstrates the integration of Google Social Login using Laravel Socialite in a Laravel 10 application. It allows users to authenticate and register using their Google accounts. The project includes a simple user management system where Google user details (such as name, email, and profile picture) are stored in the database, and users are logged in automatically after authentication.

Features:
Google Authentication: Users can log in or register using their Google account.
User Management: Stores Google account details like google_id, photo, and name in the database.
Socialite Integration: Leverages Laravel's Socialite package for smooth integration with Google OAuth2.
Secure Authentication: Ensures secure login and registration flows.
Custom User Model: Extends the default Laravel User model to accommodate Google authentication details.
Technologies Used:
Laravel 10: A PHP framework for building robust web applications.
Socialite: Laravel package for handling OAuth authentication with various services, including Google.
Google OAuth2: The OAuth protocol used for authentication with Google accounts.
