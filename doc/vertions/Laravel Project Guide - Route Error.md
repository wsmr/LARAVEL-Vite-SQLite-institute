# Laravel Project Comprehensive Guide

## 1. Introduction

## 2. Project Overview

## 3. Technologies Used

## 4. Local Development Setup

### 4.1. Prerequisites

### 4.2. Installation Steps

### 4.3. Running the Application

## 5. Understanding the Development Workflow

### 5.1. `npm run dev` (Frontend Asset Compilation)

### 5.2. `php artisan serve` (Backend Development Server)

## 6. Project Structure

## 7. Database Configuration (SQLite)

## 8. Nginx Deployment Guide

### 8.1. Server Setup

### 8.2. Nginx Configuration

### 8.3. PHP-FPM Configuration

### 8.4. Deployment Steps

## 9. Key Features and Customization

## 10. Troubleshooting

## 11. Conclusion




## 1. Introduction

This document provides a comprehensive guide to setting up, running, and deploying the Diyawanna Institute of Education (DIE) Laravel project. It covers everything from initial installation and local development to Nginx deployment, offering detailed explanations and best practices for each step. This guide is designed for developers who want to understand the project's architecture, development workflow, and deployment procedures.

## 2. Project Overview

The Diyawanna Institute of Education (DIE) is a modern educational platform built using the Laravel framework. It aims to provide high-quality education, tuition, and skill development for academic excellence. The project incorporates various features such as user management with multi-role authentication, comprehensive course management, an interactive learning portal, an assignment system, event management, a blog, and communication tools. An administrative dashboard provides analytics and control over the system.




## 3. Technologies Used

This project leverages a robust stack of modern web technologies to deliver a scalable, maintainable, and user-friendly educational platform. The core technologies include:

*   **Laravel 10.x**: A powerful PHP web application framework known for its elegant syntax, developer-friendly features, and comprehensive tools for rapid application development. Laravel provides the backend structure, routing, Eloquent ORM for database interaction, and various other functionalities.

*   **Vite**: A next-generation frontend tooling that provides an extremely fast development experience. It offers instant server start, lightning-fast Hot Module Replacement (HMR), and optimized builds for production. In this project, Vite is used for compiling and bundling frontend assets like JavaScript and CSS.

*   **Tailwind CSS**: A utility-first CSS framework that allows for rapid UI development by composing pre-defined classes directly in HTML markup. It enables highly customizable designs without writing custom CSS, promoting consistency and efficiency.

*   **SQLite**: A C-language library that implements a small, fast, self-contained, high-reliability, full-featured, SQL database engine. It is used here as the database solution, particularly convenient for local development due to its file-based nature, eliminating the need for a separate database server setup.

*   **Laravel Breeze**: A minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation. It provides a great starting point for projects requiring authentication, often scaffolded with Blade and Tailwind CSS.

*   **Nginx**: A high-performance HTTP and reverse proxy server, as well as a mail proxy server, and a generic TCP/UDP proxy server. It is widely used for serving static content, load balancing, and as a reverse proxy for web applications, making it an excellent choice for deploying Laravel applications in a production environment.




## 4. Local Development Setup

This section guides you through setting up the Laravel project on your local machine for development. It covers all necessary prerequisites and step-by-step installation instructions.

### 4.1. Prerequisites

Before you begin, ensure your development environment meets the following requirements:

*   **PHP**: Version 8.1 or higher. Laravel 10.x requires PHP 8.1+.
*   **Composer**: A dependency manager for PHP. It is used to manage your project's PHP libraries.
*   **Node.js and NPM**: Node.js is a JavaScript runtime, and NPM (Node Package Manager) is used for managing frontend dependencies. The project uses Vite for asset compilation, which relies on Node.js and NPM.
*   **MySQL or SQLite**: The project is configured to use SQLite by default, which is file-based and requires no additional server setup. If you prefer MySQL, ensure it is installed and running.
*   **Web Server**: For local development, Laravel provides a built-in development server (`php artisan serve`). For production, Nginx or Apache is recommended.

### 4.2. Installation Steps

Follow these steps to get the project running on your local machine:

1.  **Clone the repository**
    First, clone the project repository to your local machine and navigate into the project directory:
    ```bash
    git clone https://github.com/yourusername/die-institute.git
    cd die-institute
    ```
    *(Note: Replace `https://github.com/yourusername/die-institute.git` with the actual repository URL if different.)*

2.  **Install PHP dependencies**
    Install the backend dependencies using Composer:
    ```bash
    composer install
    ```
    This command reads the `composer.json` file and installs all required PHP packages.

3.  **Install Node.js dependencies**
    Install the frontend dependencies using NPM:
    ```bash
    npm install
    ```
    This command reads the `package.json` file and installs all required Node.js packages, including Vite and Tailwind CSS.

4.  **Create environment file**
    Laravel uses an `.env` file for environment-specific configurations. Copy the example environment file:
    ```bash
    cp .env.example .env
    ```

5.  **Generate application key**
    Generate a unique application key. This key is used for encrypting user sessions and other sensitive data:
    ```bash
    php artisan key:generate
    ```

6.  **Configure your database**
    Open the newly created `.env` file and configure your database connection. By default, the project uses SQLite. If you wish to use SQLite, no changes are typically needed for `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_USERNAME`, and `DB_PASSWORD`. Ensure `DB_DATABASE` points to your SQLite database file (e.g., `database/database.sqlite`).

    If you are using MySQL, update the following lines with your MySQL credentials:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=die_institute
    DB_USERNAME=root
    DB_PASSWORD=your_mysql_password
    ```

7.  **Run migrations and seeders**
    Execute database migrations to create the necessary tables and run seeders to populate them with initial data:
    ```bash
    php artisan migrate --seed
    ```
    This command is crucial for setting up the database schema and populating it with default users (e.g., `admin@die.edu` with password `password`) and other essential data.

8.  **Create symbolic link for storage**
    Create a symbolic link from `public/storage` to `storage/app/public`. This link is necessary for serving user-uploaded files:
    ```bash
    php artisan storage:link
    ```

### 4.3. Running the Application

To run the Laravel application locally, you need to start both the frontend asset compilation process and the backend development server. These two processes should run concurrently in separate terminal windows.

1.  **Start Frontend Asset Compilation (Vite Development Server)**
    Open your first terminal window, navigate to the project root, and run:
    ```bash
    npm run dev
    ```
    This command starts the Vite development server. It compiles your JavaScript and CSS files (e.g., Tailwind CSS, Vue/React components) and provides features like Hot Module Replacement (HMR), which automatically updates your browser when you make changes to your frontend code without requiring a full page refresh. **Keep this terminal window open and this command running throughout your development session.**

2.  **Start Backend Development Server (Laravel Artisan Serve)**
    Open your second terminal window, navigate to the project root, and run:
    ```bash
    php artisan serve
    ```
    This command starts Laravel's built-in PHP development server. It serves your Laravel application, handling all backend logic, routing, and database interactions. It typically runs on `http://127.0.0.1:8000` (or `http://localhost:8000`). **Keep this terminal window open and this command running throughout your development session.**

3.  **Access the Website**
    Once both commands are running, open your web browser and visit `http://localhost:8000`. You should now see the Laravel application running. The frontend assets compiled by `npm run dev` will be served by the Laravel development server.




## 5. Understanding the Development Workflow

For modern Laravel applications, especially those integrating with frontend build tools like Vite, the development workflow involves running two separate but complementary processes: one for frontend asset compilation and another for serving the backend application. Understanding the role of each command is crucial for efficient development.

### 5.1. `npm run dev` (Frontend Asset Compilation)

**Purpose**: This command is responsible for compiling and bundling your frontend assets. In this project, it utilizes **Vite** to process your JavaScript (including any Vue/React components if used) and CSS (specifically Tailwind CSS).

**How it works**:
*   **Compilation**: It takes your source frontend files (e.g., `.js`, `.css`, `.scss`, `.vue`, `.jsx`) from the `resources/` directory and compiles them into optimized, browser-compatible files (e.g., `app.js`, `app.css`).
*   **Bundling**: It bundles multiple JavaScript and CSS files into fewer files to reduce HTTP requests and improve loading performance.
*   **Transpilation**: It transpiles modern JavaScript syntax (ES6+) into older versions that are compatible with a wider range of browsers.
*   **Hot Module Replacement (HMR)**: Vite provides incredibly fast HMR. When you make changes to your frontend code, `npm run dev` detects these changes and injects the updated modules directly into the running application in your browser, without requiring a full page refresh. This significantly speeds up frontend development.
*   **Asset Hashing**: For production builds (`npm run build`), Vite also handles asset versioning (hashing filenames) to enable aggressive caching while ensuring users always get the latest version of your assets.

**Why it's necessary**: Without `npm run dev` (or `npm run watch` for continuous watching), your browser would not be able to interpret the raw source files (e.g., Tailwind CSS directives, modern JavaScript). It transforms these development-friendly formats into production-ready assets.

**Usage**: You typically run `npm run dev` in a dedicated terminal window and leave it running throughout your development session. It will automatically recompile assets as you save changes to your frontend files.

### 5.2. `php artisan serve` (Backend Development Server)

**Purpose**: This command starts Laravel's built-in development server. Its primary role is to serve your Laravel application, handle HTTP requests, process routes, interact with the database, and render Blade templates.

**How it works**:
*   **Local Web Server**: It provides a lightweight web server that listens for incoming HTTP requests, usually on `http://127.0.0.1:8000`.
*   **Routing**: It directs incoming requests to the appropriate Laravel routes and controllers.
*   **PHP Execution**: It executes your PHP code, including Laravel's core framework, your application logic, and database interactions.
*   **Serving Assets**: While `npm run dev` compiles the frontend assets, `php artisan serve` is responsible for actually serving these compiled assets (which are typically placed in the `public/` directory) to the browser when requested.

**Why it's necessary**: It provides a convenient way to test your Laravel application locally without the need to configure a more complex web server like Nginx or Apache. It's ideal for rapid development and debugging.

**Usage**: You typically run `php artisan serve` in a separate terminal window from `npm run dev` and leave it running throughout your development session. All your browser interactions with the application will go through this server.

### Concurrent Operation

It is crucial to understand that these two commands (`npm run dev` and `php artisan serve`) are designed to run **concurrently** during development. They handle different aspects of your application (frontend vs. backend) and communicate implicitly. The Laravel application (served by `php artisan serve`) knows where to find the assets compiled by Vite (running via `npm run dev`), allowing for a seamless development experience.

Here's a breakdown of the concurrent operation:

*   **Terminal 1 (`npm run dev`)**: This terminal runs the Vite development server. It watches your frontend source files (JavaScript, CSS, etc.), compiles them, and provides Hot Module Replacement (HMR) to your browser. This process continuously updates your compiled assets as you make changes.
*   **Terminal 2 (`php artisan serve`)**: This terminal runs the Laravel development server. It handles all backend logic, routing, and database interactions. It also serves the compiled frontend assets to the web browser.
*   **Web Browser**: Your browser requests the application from the Laravel development server. The Laravel server then serves the necessary HTML, and the browser fetches the compiled JavaScript and CSS assets from the location where Vite has made them available.

This setup ensures that both your frontend and backend changes are reflected instantly during development, providing a highly efficient workflow.




## 6. Project Structure

Understanding the project structure is essential for navigating and developing within the Laravel application. Below is a high-level overview of the key directories and their purposes:

```
die_institute/
├── app/                    # Application core code
│   ├── Http/               # HTTP layer components (Controllers, Middleware, Requests)
│   │   ├── Controllers/    # Handles incoming requests and returns responses
│   │   ├── Livewire/       # Livewire components for dynamic UI
│   │   └── Middleware/     # Filters HTTP requests entering your application
│   ├── Models/             # Eloquent ORM models representing database tables
│   └── Providers/          # Service providers for bootstrapping services
├── bootstrap/              # Framework bootstrapping and autoloading configuration
├── config/                 # Configuration files for various application settings
├── database/               # Database related files
│   ├── migrations/         # Database schema changes (table creation, modification)
│   └── seeders/            # Classes for populating your database with test data
├── public/                 # The web server's document root (publicly accessible files)
│   ├── css/                # Compiled CSS assets
│   ├── js/                 # Compiled JavaScript assets
│   └── images/             # Image assets
├── resources/              # Raw, uncompiled assets (views, language files, raw assets)
│   ├── css/                # Source CSS files (e.g., Tailwind CSS input)
│   ├── js/                 # Source JavaScript files
│   └── views/              # Blade template files
│       ├── layouts/        # Master layout templates
│       ├── components/     # Reusable Blade components
│       ├── courses/        # Views specific to course management
│       ├── dashboard/      # Views for the user dashboard
│       └── livewire/       # Views for Livewire components
├── routes/                 # All application route definitions
│   ├── web.php             # Web routes for frontend and authenticated users
│   ├── api.php             # API routes for stateless APIs
│   ├── console.php         # Console routes for Artisan commands
│   └── channels.php        # Broadcast channel routes
├── storage/                # Storage for logs, cache, compiled templates, and user uploads
├── tests/                  # Automated tests (Unit and Feature tests)
├── vendor/                 # Composer dependencies (PHP packages)
├── .env                    # Environment configuration file (local settings)
├── .env.example            # Example environment configuration file
├── artisan                 # Laravel Artisan command-line interface
├── composer.json           # Composer configuration file
├── package.json            # NPM package configuration file
├── vite.config.js          # Vite configuration file
└── README.md               # Project README file
```

*Figure: Detailed Laravel Project Directory Structure*




## 7. Database Configuration (SQLite)

This project is configured to use SQLite as its default database. SQLite is a lightweight, file-based database that is ideal for local development and small-scale applications, as it does not require a separate database server process.

### 7.1. SQLite Setup

When you run `cp .env.example .env`, the `.env` file will typically have the following default SQLite configuration:

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=/home/ubuntu/die_project/die/database/database.sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_USERNAME=root
# DB_PASSWORD=
```

*   **`DB_CONNECTION=sqlite`**: Specifies that Laravel should use the SQLite database driver.
*   **`DB_DATABASE=/home/ubuntu/die_project/die/database/database.sqlite`**: This is the absolute path to your SQLite database file. Laravel will automatically create this file if it doesn't exist when you run migrations.

### 7.2. Running Migrations and Seeders

After configuring your `.env` file, you need to run the database migrations and seeders. This will create the necessary tables in your SQLite database and populate them with initial data, including the default admin user.

```bash
php artisan migrate --seed
```

*   **`php artisan migrate`**: Executes all pending database migrations, creating the tables defined in your `database/migrations` directory.
*   **`--seed`**: This flag tells Laravel to run the database seeders after migrations. Seeders are used to populate your database with dummy data for testing or initial setup (e.g., creating the default admin user).

### 7.3. Default Admin Credentials

After running `php artisan migrate --seed`, you can log in to the application with the following default administrator credentials:

*   **Email**: `admin@die.edu`
*   **Password**: `password`

It is highly recommended to change these credentials immediately after your first login for security reasons.




## 8. Nginx Deployment Guide

Deploying a Laravel application to a production server typically involves using a robust web server like Nginx and a PHP FastCGI Process Manager (PHP-FPM). This section outlines the steps to deploy your Laravel project on a server running Nginx.

### 8.1. Server Setup

Before configuring Nginx, ensure your server has the following installed:

*   **Ubuntu Server**: (Recommended) or another Linux distribution.
*   **Nginx**: The web server.
*   **PHP and PHP-FPM**: PHP runtime and its FastCGI Process Manager for handling PHP requests.
*   **Composer**: For managing PHP dependencies.
*   **Node.js and NPM**: For building frontend assets.
*   **Git**: For cloning your repository.

**Example commands for Ubuntu:**

```bash
# Update package list
sudo apt update

# Install Nginx
sudo apt install nginx -y

# Install PHP and PHP-FPM (replace 8.1 with your PHP version)
sudo apt install php8.1-fpm php8.1-mysql php8.1-mbstring php8.1-xml php8.1-curl php8.1-zip -y

# Install Composer
sudo apt install composer -y

# Install Node.js and NPM
sudo apt install nodejs npm -y

# Install Git
sudo apt install git -y
```

### 8.2. Nginx Configuration

Nginx needs to be configured to serve your Laravel application. This involves creating a new server block configuration file.

1.  **Create a new Nginx configuration file**
    Create a new file in `/etc/nginx/sites-available/` for your project. For example, `die_institute.conf`:
    ```bash
    sudo nano /etc/nginx/sites-available/die_institute.conf
    ```

2.  **Add the Nginx server block configuration**
    Paste the following configuration into the file. Remember to replace `your_domain.com` with your actual domain name and `/var/www/die_institute` with the actual path to your project's `public` directory.

    ```nginx
    server {
        listen 80;
        server_name your_domain.com www.your_domain.com;
        root /var/www/die_institute/public;

        add_header X-Frame-Options "SAMEORIGIN";
        add_header X-XSS-Protection "1; mode=block";
        add_header X-Content-Type-Options "nosniff";

        index index.php index.html index.htm;

        charset utf-8;

        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }

        location = /favicon.ico { access_log off; log_not_found off; }
        location = /robots.txt  { access_log off; log_not_found off; }

        error_page 404 /index.php;

        location ~ \.php$ {
            fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
            fastcgi_index index.php;
            fastcgi_buffers 16 16k;
            fastcgi_buffer_size 32k;
            fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
            include fastcgi_params;
        }

        location ~ /\.ht {
            deny all;
        }
    }
    ```

    **Explanation of key directives:**
    *   `listen 80;`: Nginx will listen for incoming HTTP requests on port 80.
    *   `server_name your_domain.com www.your_domain.com;`: Specifies the domain names that this server block will respond to.
    *   `root /var/www/die_institute/public;`: Sets the document root for your application. This **must** point to the `public` directory of your Laravel project.
    *   `location /`: This block handles all requests. `try_files` attempts to serve the requested URI directly, then as a directory, and finally rewrites the request to `index.php` (Laravel's entry point) if the file or directory is not found.
    *   `location ~ \.php$`: This block handles all requests ending with `.php`. It passes these requests to PHP-FPM via a Unix socket.
    *   `fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;`: Specifies the socket where PHP-FPM is listening. Ensure the PHP version matches your installation (e.g., `php8.1-fpm.sock`).

3.  **Enable the Nginx configuration**
    Create a symbolic link from your `sites-available` configuration to the `sites-enabled` directory:
    ```bash
    sudo ln -s /etc/nginx/sites-available/die_institute.conf /etc/nginx/sites-enabled/
    ```

4.  **Test Nginx configuration and restart**
    Test your Nginx configuration for syntax errors and then restart Nginx to apply the changes:
    ```bash
    sudo nginx -t
    sudo systemctl restart nginx
    ```

### 8.3. PHP-FPM Configuration

PHP-FPM usually works out of the box with default settings. However, you might need to adjust some settings based on your server's resources and application's needs. The main configuration file is typically located at `/etc/php/8.1/fpm/php.ini` and `/etc/php/8.1/fpm/pool.d/www.conf`.

*   **`php.ini`**: Adjust `memory_limit`, `upload_max_filesize`, `post_max_size`, and `max_execution_time` as needed.
*   **`www.conf`**: You might want to adjust `pm.max_children`, `pm.start_servers`, `pm.min_spare_servers`, and `pm.max_spare_servers` for performance tuning. Ensure the `listen` directive matches the socket path in your Nginx configuration (`unix:/var/run/php/php8.1-fpm.sock`).

After making any changes to PHP-FPM configuration, restart the service:
```bash
sudo systemctl restart php8.1-fpm
```

### 8.4. Deployment Steps

Here's a typical deployment workflow for updating your application on the server:

1.  **Clone or pull the latest code**
    On your server, navigate to the deployment directory (e.g., `/var/www/`) and clone your repository:
    ```bash
    cd /var/www/
    git clone https://github.com/yourusername/die-institute.git
    # Or if already cloned, pull latest changes:
    # cd die_institute
    # git pull origin main
    ```

2.  **Install/Update Composer dependencies**
    ```bash
    cd /var/www/die_institute
    composer install --no-dev --optimize-autoloader
    ```
    *   `--no-dev`: Skips installing development dependencies.
    *   `--optimize-autoloader`: Optimizes Composer's autoloader for faster performance.

3.  **Configure environment file**
    Copy your `.env.example` to `.env` if it's a fresh deployment, and configure your production database credentials and other environment variables. **Never commit your production `.env` file to version control.**
    ```bash
    cp .env.example .env
    # Edit .env with production settings
    ```

4.  **Generate application key**
    ```bash
    php artisan key:generate
    ```

5.  **Run database migrations**
    ```bash
    php artisan migrate --force
    ```
    *   `--force`: Required in production to confirm you want to run migrations.

6.  **Compile frontend assets**
    ```bash
    npm install
    npm run build
    ```
    *   `npm run build`: This command uses Vite to create a production-ready build of your frontend assets. These assets are optimized, minified, and hashed for better performance and caching.

7.  **Create symbolic link for storage**
    ```bash
    php artisan storage:link
    ```

8.  **Clear caches**
    ```bash
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    ```

9.  **Set proper permissions**
    Ensure that the web server has write permissions to the `storage` and `bootstrap/cache` directories:
    ```bash
    sudo chown -R www-data:www-data /var/www/die_institute/storage
    sudo chown -R www-data:www-data /var/www/die_institute/bootstrap/cache
    sudo chmod -R 775 /var/www/die_institute/storage
    sudo chmod -R 775 /var/www/die_institute/bootstrap/cache
    ```
    *(Note: `www-data` is the default Nginx/PHP-FPM user on Ubuntu. This might vary on other distributions.)*

After completing these steps, your Laravel application should be accessible via your configured domain name.




## 9. Key Features and Customization

This project comes with a rich set of features and provides various avenues for customization to adapt it to specific educational needs.

### 9.1. Core Features

*   **User Management**: Robust multi-role authentication system supporting Students, Teachers, Parents, and Administrators. Includes profile management and role-based permissions using Spatie Permission.
*   **Course Management**: Comprehensive catalog with filtering, category-based organization, enrollment, progress tracking, and a rating/review system.
*   **Learning Portal**: Integrated video lessons, downloadable materials, interactive quizzes, and progress tracking with certificate generation.
*   **Assignment System**: Features for assignment creation, submission (file uploads and online text), grading with feedback, and plagiarism detection.
*   **Events & Calendar**: Management of institute events, class schedules, Google Calendar integration, and event notifications.
*   **Blog & News**: A content management system for articles, with categorization, comments, and sharing functionalities.
*   **Communication Tools**: Contact forms, internal messaging, email notifications, and Zoom integration for online classes.
*   **Admin Dashboard**: A central hub for comprehensive analytics, user management, content moderation, and system settings.

### 9.2. Customization Options

*   **Adding New Courses**:
    1.  Log in as an administrator or teacher.
    2.  Navigate to `Dashboard > Courses > Add New`.
    3.  Fill in the course details, upload relevant materials, and publish.

*   **Modifying Theme and Styling**:
    The project uses Tailwind CSS for styling. To customize the theme:
    1.  Edit the main CSS file, typically located at `resources/css/app.css` or a custom CSS file like `resources/css/custom.css` if present.
    2.  Update Tailwind CSS configuration in `tailwind.config.js` to extend or override default styles, colors, and fonts.
    3.  After making changes, recompile your assets using `npm run dev` (for development) or `npm run build` (for production) to apply the changes.

*   **Adding New User Roles**:
    The project utilizes the Spatie Laravel Permission package for role and permission management. To add new roles:
    1.  Define the new role using the Spatie Permission package. You can do this programmatically or via Artisan commands.
    2.  If you want the role to be available by default, add it to the `database/seeders/RolesAndPermissionsSeeder.php` file.
    3.  Define specific permissions for the new role based on the functionalities it should have access to.

*   **Environment Variables**: Adjust key application settings by modifying the `.env` file. This includes `APP_NAME`, `APP_ENV`, `APP_DEBUG`, database credentials, and API keys for integrations like Zoom and Google Calendar.

*   **API Integrations**: The project supports integrations with Zoom and Google Calendar. You can configure these by providing the necessary API keys and credentials in your `.env` file and adjusting the relevant service providers or configuration files.




## 10. Troubleshooting

This section provides solutions to common issues you might encounter during development or deployment.

*   **`Route [home] not defined` error after login:**
    This error typically occurs when Laravel's authentication scaffolding (like Laravel Breeze) tries to redirect to a named route `home` after successful login, but this route is not defined in your `web.php` or `auth.php` files. In this project, the `RouteServiceProvider.php` has been modified to redirect to `/dashboard` after login. Ensure the `HOME` constant in `app/Providers/RouteServiceProvider.php` is set to `/dashboard`:
    ```php
    public const HOME = 
    '/dashboard';
    ```
    Also, verify that a route named `dashboard` exists in your `routes/web.php` file:
    ```php
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    ```

*   **`composer install` or `npm install` errors:**
    *   **Missing PHP extensions**: If Composer complains about missing PHP extensions (e.g., `ext-dom`, `ext-xml`, `ext-curl`), you need to install them. For Ubuntu, use `sudo apt install phpX.X-dom phpX.X-xml phpX.X-curl` (replace `X.X` with your PHP version).
    *   **Node.js/NPM version issues**: If `npm install` fails with `Unsupported engine` warnings or errors, your Node.js version might be too old. Consider using `nvm` (Node Version Manager) to install and manage multiple Node.js versions. After installing `nvm`, you can install a specific version (e.g., `nvm install 20`) and then use it (`nvm use 20`).

*   **Assets not compiling or changes not reflecting:**
    *   Ensure `npm run dev` is running in a separate terminal window. This command watches for changes and recompiles assets.
    *   Check your browser's developer console for any errors related to loading CSS or JavaScript files.
    *   Clear your browser cache or perform a hard refresh (`Ctrl+Shift+R` or `Cmd+Shift+R`).

*   **`php artisan serve` not starting or port already in use:**
    *   If the port (default 8000) is already in use, you can specify a different port:
        ```bash
        php artisan serve --port=8001
        ```
    *   Ensure no other PHP processes are running on the same port.

*   **Nginx 502 Bad Gateway error:**
    This usually indicates an issue with PHP-FPM. Check the following:
    *   Ensure PHP-FPM is running: `sudo systemctl status php8.1-fpm` (replace `8.1` with your PHP version).
    *   Verify the `fastcgi_pass` directive in your Nginx configuration matches the PHP-FPM socket path (e.g., `unix:/var/run/php/php8.1-fpm.sock`).
    *   Check PHP-FPM logs for errors (e.g., `/var/log/php8.1-fpm.log`).

*   **Permissions issues after deployment:**
    If you encounter `permission denied` errors, ensure your web server user (`www-data` on Ubuntu) has write permissions to the `storage` and `bootstrap/cache` directories:
    ```bash
    sudo chown -R www-data:www-data /var/www/die_institute/storage
    sudo chown -R www-data:www-data /var/www/die_institute/bootstrap/cache
    sudo chmod -R 775 /var/www/die_institute/storage
    sudo chmod -R 775 /var/www/die_institute/bootstrap/cache
    ```

## 11. Conclusion

This comprehensive guide has walked you through the entire lifecycle of the Diyawanna Institute of Education Laravel project, from initial setup and local development to production deployment with Nginx. By following these instructions, you should have a clear understanding of the project's architecture, its development workflow, and how to effectively manage and deploy it. Remember to always keep your dependencies updated and follow security best practices for production environments. Happy coding!





![Laravel Project Overview](https://private-us-east-1.manuscdn.com/sessionFile/9w8tYf4c4Apncz4yFQpjRJ/sandbox/9reLItQMgUsRXyJAgkxarz-images_1751621113583_na1fn_L2hvbWUvdWJ1bnR1L2xhcmF2ZWxfcHJvamVjdF9vdmVydmlldw.png?Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cHM6Ly9wcml2YXRlLXVzLWVhc3QtMS5tYW51c2Nkbi5jb20vc2Vzc2lvbkZpbGUvOXc4dFlmNGM0QXBuY3o0eUZRcGpSSi9zYW5kYm94LzlyZUxJdFFNZ1VzUlh5SkFna3hhcnotaW1hZ2VzXzE3NTE2MjExMTM1ODNfbmExZm5fTDJodmJXVXZkV0oxYm5SMUwyeGhjbUYyWld4ZmNISnZhbVZqZEY5dmRtVnlkbWxsZHcucG5nIiwiQ29uZGl0aW9uIjp7IkRhdGVMZXNzVGhhbiI6eyJBV1M6RXBvY2hUaW1lIjoxNzk4NzYxNjAwfX19XX0_&Key-Pair-Id=K2HSFNDJXOU9YS&Signature=TyXwP42Z-ATahrZqhCddm2MbagyAZ0y~gxhOsTrTN8r0lrlAD9xExwO9nhgAoX6yvdrd6XZgOywQEZ70JIFtg7bIKKBywoj6MBUH8dd9Rxf7uyixCXx9nNTJM0h1z0D7wLJ-Qe2tAzz8SMJhiVEOkp7rj8-oJaFuQf0z3wmfazQa88KgH1G62lvz-8Ctr~q01ybEWGaOLSNifSMqYPeXNhzeJPg~VN3Ye4l-39BUIkJiIFMh6LHU9-RIZKuaCfy4Eu75HrzggkywQm893y6qhB3hSCvZMeXzVxX5bLxPfSR9gczSyjpcWyFMOMm8c3~8fMX7vnxR6oH37CQDTTFuBA__)



