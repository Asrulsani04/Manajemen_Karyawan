<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Karyawan</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fc;
            color: #5a5c69;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            padding: 1rem 1.5rem;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            letter-spacing: 0.5px;
        }
        
        .navbar-brand .logo-text {
            position: relative;
        }
        
        .navbar-brand .logo-text::after {
            content: "";
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 2px;
        }
        
        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-icon {
            margin-right: 6px;
        }
        
        .navbar-toggler {
            border: none;
            color: white;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .main-content {
            flex: 1;
            padding: 40px 0;
        }
        
        .card {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .btn {
            font-weight: 500;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #4567c7 0%, #1b3e9e 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(78, 115, 223, 0.25);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #1cc88a 0%, #13a173 100%);
            border: none;
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #1ab67c 0%, #108e64 100%);
            transform: translateY(-2px);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #f6c23e 0%, #e5a82c 100%);
            border: none;
            color: white;
        }
        
        .btn-warning:hover {
            background: linear-gradient(135deg, #e5b53b 0%, #d29b24 100%);
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #e74a3b 0%, #d52a1a 100%);
            border: none;
        }
        
        .btn-danger:hover {
            background: linear-gradient(135deg, #e03c2c 0%, #be2718 100%);
            transform: translateY(-2px);
        }
        
        .btn i {
            margin-right: 6px;
        }
        
        .page-header {
            margin-bottom: 30px;
        }
        
        .page-header h2 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.75rem;
            color: #3a3b45;
            margin-bottom: 0.5rem;
        }
        
        .page-header p {
            color: #858796;
            margin-bottom: 0;
        }
        
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 0;
        }
        
        .breadcrumb-item {
            font-size: 0.85rem;
        }
        
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .breadcrumb-item.active {
            color: #858796;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            color: #858796;
            padding: 0.75rem 1.25rem;
            border-bottom-width: 1px;
        }
        
        .table td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.02);
        }
        
        .alert {
            border: none;
            border-radius: 8px;
            padding: 1rem 1.25rem;
        }
        
        .alert-success {
            background-color: rgba(28, 200, 138, 0.1);
            color: #1cc88a;
            border-left: 4px solid #1cc88a;
        }
        
        .alert-danger {
            background-color: rgba(231, 74, 59, 0.1);
            color: #e74a3b;
            border-left: 4px solid #e74a3b;
        }
        
        .alert-warning {
            background-color: rgba(246, 194, 62, 0.1);
            color: #f6c23e;
            border-left: 4px solid #f6c23e;
        }
        
        .alert-info {
            background-color: rgba(54, 185, 204, 0.1);
            color: #36b9cc;
            border-left: 4px solid #36b9cc;
        }
        
        footer {
            background-color: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.5rem 0;
            text-align: center;
            font-size: 0.85rem;
            color: #858796;
        }
        
        .footer-brand {
            font-weight: 600;
            color: #4e73df;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        .footer-links li {
            margin: 0 0.75rem;
        }
        
        .footer-links li a {
            color: #858796;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links li a:hover {
            color: #4e73df;
        }
        
        .heart-icon {
            color: #e74a3b;
            animation: heartbeat 1.5s infinite;
        }
        
        @keyframes heartbeat {
            0% { transform: scale(1); }
            25% { transform: scale(1.1); }
            50% { transform: scale(1); }
            75% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.75rem 1rem;
            }
            
            .navbar-brand {
                font-size: 1.25rem;
            }
            
            .main-content {
                padding: 25px 0;
            }
            
            .page-header h2 {
                font-size: 1.5rem;
            }
        }
        
        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .slide-up {
            animation: slideUp 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        /* Ripple Effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        /* Custom Styles */
        @yield('styles')
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-users-gear me-2"></i>
                <span class="logo-text">KaryawanApp</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('karyawan.index') }}">
                            <i class="fas fa-users nav-icon"></i>Karyawan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-line nav-icon"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-building nav-icon"></i>Divisi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog nav-icon"></i>Pengaturan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <ul class="footer-links">
                <li><a href="#"><i class="fas fa-home me-1"></i>Beranda</a></li>
                <li><a href="#"><i class="fas fa-info-circle me-1"></i>Tentang</a></li>
                <li><a href="#"><i class="fas fa-envelope me-1"></i>Kontak</a></li>
                <li><a href="#"><i class="fas fa-question-circle me-1"></i>Bantuan</a></li>
            </ul>
            <p>
                &copy; {{ date('Y') }} <span class="footer-brand">KaryawanApp</span>. Dibuat dengan 
                <i class="fas fa-heart heart-icon"></i> menggunakan Laravel.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Add ripple effect to buttons
        $(document).on('click', '.btn', function(e) {
            let x = e.pageX - $(this).offset().left;
            let y = e.pageY - $(this).offset().top;
            
            let ripple = $('<span class="ripple"></span>');
            ripple.css({
                left: x + 'px',
                top: y + 'px'
            });
            
            $(this).append(ripple);
            
            setTimeout(function() {
                ripple.remove();
            }, 600);
        });
        
        // Add active class to current nav item
        $(document).ready(function() {
            let currentPath = window.location.pathname;
            $('.navbar-nav .nav-link').each(function() {
                let href = $(this).attr('href');
                if (href && currentPath.includes(href.replace(/^.*\/\/[^\/]+/, ''))) {
                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active');
                }
            });
            
            // Animate page content
            $('.page-header').addClass('fade-in');
            $('.card').addClass('slide-up');
        });
    </script>
    
    @yield('scripts')
</body>
</html>