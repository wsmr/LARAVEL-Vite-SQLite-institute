# Diyawanna Institute of Education (DIE) - Laravel Website

![Diyawanna Institute of Education](https://example.com/die-logo.png)

## 🎓 About

Diyawanna Institute of Education (DIE) is a modern educational platform built with Laravel, offering high-quality education, tuition, and skill development for academic excellence. This repository contains the complete source code for the institute's website.

## 🚀 Features

- **User Management**
  - Multi-role authentication (Students, Teachers, Parents, Administrators)
  - Profile management with customizable settings
  - Role-based permissions using Spatie Permission

- **Course Management**
  - Comprehensive course catalog with filtering
  - Category-based organization
  - Enrollment system with progress tracking
  - Rating and review system

- **Learning Portal**
  - Video lessons with secure streaming
  - Downloadable learning materials
  - Interactive quizzes and assessments
  - Progress tracking and certificates

- **Assignment System**
  - Assignment creation and submission
  - File uploads and online text submissions
  - Grading system with feedback
  - Plagiarism detection

- **Events & Calendar**
  - Institute event listings
  - Class schedules
  - Google Calendar integration
  - Event notifications

- **Blog & News**
  - Content management system
  - Featured and categorized articles
  - Comments and sharing functionality

- **Communication Tools**
  - Contact forms with validation
  - Internal messaging system
  - Email notifications
  - Zoom integration for online classes

- **Admin Dashboard**
  - Comprehensive analytics
  - User management
  - Content moderation
  - System settings

## 🎨 Design & UI

- Professional color scheme (Deep Blue #002B5B, Gold/Amber #FFC107, Soft Gray #F8F9FA)
- Mobile-first responsive design
- Modern UI components and animations
- Accessibility compliant

## 🛠️ Technologies Used

- **Backend Framework**: Laravel 10.x
- **Frontend**: Blade templates with Bootstrap 5
- **Database**: MySQL/SQLite
- **Authentication**: Laravel Breeze
- **Permissions**: Spatie Laravel Permission
- **Dynamic UI**: Livewire
- **Image Processing**: Intervention Image
- **API Integrations**: Zoom, Google Calendar, Payment Gateways

## 📋 Requirements

- PHP 8.1 or higher
- Composer
- Node.js and NPM
- MySQL or SQLite
- Web server (Apache, Nginx)

## ⚙️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/die-institute.git
   cd die-institute
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install NPM dependencies**
   ```bash
   npm install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Configure your database in .env file**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=die_institute
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

8. **Create symbolic link for storage**
   ```bash
   php artisan storage:link
   ```

9. **Compile assets**
   ```bash
   npm run dev
   ```

10. **Start the development server**
    ```bash
    php artisan serve
    ```

11. **Access the website**
    Visit `http://localhost:8000` in your browser

## 🏗️ Project Structure

```
die_institute/
├── app/                    # Application core code
│   ├── Http/
│   │   ├── Controllers/    # Controllers for handling requests
│   │   ├── Livewire/       # Livewire components
│   │   └── Middleware/     # Custom middleware
│   ├── Models/             # Eloquent models
│   └── Providers/          # Service providers
├── config/                 # Configuration files
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/            # Database seeders
├── public/                 # Publicly accessible files
│   ├── css/                # Compiled CSS
│   ├── js/                 # Compiled JavaScript
│   └── images/             # Image assets
├── resources/
│   ├── css/                # CSS source files
│   ├── js/                 # JavaScript source files
│   └── views/              # Blade templates
│       ├── layouts/        # Layout templates
│       ├── components/     # Reusable components
│       ├── courses/        # Course-related views
│       ├── dashboard/      # Dashboard views
│       └── livewire/       # Livewire component views
├── routes/                 # Route definitions
├── storage/                # Storage for logs, cache, etc.
└── tests/                  # Automated tests
```

## 🔧 Configuration

### Environment Variables

Key environment variables to configure:

- `APP_NAME`: Application name
- `APP_ENV`: Application environment (local, production)
- `APP_DEBUG`: Debug mode (true/false)
- `DB_CONNECTION`: Database connection
- `MAIL_MAILER`: Email service configuration
- `ZOOM_API_KEY`: Zoom API credentials
- `GOOGLE_CALENDAR_ID`: Google Calendar integration

### User Roles

The system includes four predefined roles:

1. **Administrator**: Full system access
2. **Teacher**: Course management, grading, content creation
3. **Student**: Course enrollment, assignment submission
4. **Parent**: Limited access to monitor student progress

Default admin credentials:
- Email: admin@die.edu
- Password: password

## 🎯 Customization

### Adding New Courses

1. Log in as an administrator or teacher
2. Navigate to Dashboard > Courses > Add New
3. Fill in course details, upload materials, and publish

### Modifying Theme

1. Edit the custom CSS file at `resources/css/custom.css`
2. Update color variables in the `:root` section
3. Recompile assets with `npm run dev`

### Adding New User Roles

1. Use the Spatie Permission package to define new roles
2. Add role to the `RolesAndPermissionsSeeder.php` file
3. Define permissions for the new role

## 🔒 Security Features

- CSRF protection
- XSS prevention
- SQL injection protection
- Role-based access control
- Content Security Policy
- HTTPS enforcement in production
- Password hashing
- Rate limiting

## 🚀 Performance Optimizations

- Response caching
- Database query optimization
- Eager loading relationships
- Asset minification and compression
- Lazy loading images
- Pagination for large data sets

## 📱 Mobile Responsiveness

The website is built with a mobile-first approach, ensuring optimal display on:
- Smartphones
- Tablets
- Desktops
- Large displays

## 🧪 Testing

Run the automated test suite:

```bash
php artisan test
```

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 👥 Contributors

- [Your Name](https://github.com/yourusername)

## 📞 Support

For support, email support@die.edu or open an issue in this repository.
