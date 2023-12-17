# Blogging Website

Welcome to our Blogging Website, a platform that allows users to create and share their thoughts through blog posts. This README.md provides information on setting up and using the website.

## Features

1. **Social Login**
   - Users can log in using their GitHub or Google accounts.

2. **Email and Password Login**
   - Users can also log in using their email and password.

3. **User Creation**
   - New users can sign up and create an account on the platform.

4. **Admin Panel**
   - Admins have special privileges to manage users, blog posts, and categories.

5. **Blogging**
   - Users can create, edit, and delete their blog posts.

6. **Category Creation**
   - Users and admins can create and manage blog post categories.

## Getting Started

Follow these instructions to set up the Blogging Website on your local machine.

### Clone the Code

```bash
# git clone https://github.com/your-username/blogging-website.git
php artisan migrate
php artisan db:seed --class=mainSeeder
By default, the password for all users is set to "password."
```
### Usage
Once you have completed the setup, you can access the Blogging Website through your preferred web browser. Navigate to the website, and you will find the login page where you can either use social login options or log in with your email and password.

As an admin, you have additional privileges to manage users, blog posts, and categories through the admin panel.
