<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Diyawanna Institute of Education') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=nunito:400,500,600,700" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        
        <!-- Footer -->
        <footer class="py-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h4 class="text-white mb-4">Diyawanna Institute of Education</h4>
                        <p class="text-white-50">High-quality education, tuition, and skill development for academic excellence.</p>
                        <div class="mt-4">
                            <a href="#" class="me-3 text-accent"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="me-3 text-accent"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="me-3 text-accent"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-accent"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2 mb-4 mb-md-0">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
                            <li class="mb-2"><a href="{{ route('courses.index') }}">Courses</a></li>
                            <li class="mb-2"><a href="{{ route('about') }}">About Us</a></li>
                            <li class="mb-2"><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 mb-4 mb-md-0">
                        <h5 class="text-white mb-4">Resources</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ route('blog') }}">Blog</a></li>
                            <li class="mb-2"><a href="{{ route('events') }}">Events</a></li>
                            <li class="mb-2"><a href="#">FAQ</a></li>
                            <li class="mb-2"><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-white mb-4">Contact Info</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-map-marker-alt me-2 text-accent"></i> 123 Education St., Colombo, Sri Lanka</li>
                            <li class="mb-2"><i class="fas fa-phone me-2 text-accent"></i> +94 11 234 5678</li>
                            <li class="mb-2"><i class="fas fa-envelope me-2 text-accent"></i> info@die.edu</li>
                        </ul>
                    </div>
                </div>
                <div class="border-top border-secondary mt-5 pt-4 text-center">
                    <p class="text-white-50">&copy; {{ date('Y') }} Diyawanna Institute of Education. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
