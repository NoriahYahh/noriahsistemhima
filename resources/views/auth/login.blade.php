<x-guest-layout>
    <style>
        body {
            background: linear-gradient(135deg, #667ee8 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="rgba(255,255,255,0.1)"/><stop offset="100%" stop-color="rgba(255,255,255,0)"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)"/><circle cx="800" cy="300" r="150" fill="url(%23a)"/><circle cx="400" cy="600" r="120" fill="url(%23a)"/><circle cx="900" cy="700" r="80" fill="url(%23a)"/></svg>') no-repeat center center;
            background-size: cover;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            position: relative;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #ffd700);
        }

        .login-header {
            text-align: center;
            padding: 40px 40px 20px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        }

        .logo-container {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
        }

        .login-title {
            color: #333;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 1.8rem;
        }

        .login-subtitle {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        .login-form {
            padding: 20px 40px 40px;
        }

        .form-floating {
            position: relative;
            margin-bottom: 20px;
        }

        .form-floating .form-control {
            height: 58px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1rem 1rem 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-floating .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
            transform: translateY(-2px);
        }

        .form-floating label {
            padding: 1rem;
            color: #666;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-floating .form-control:focus + label,
        .form-floating .form-control:not(:placeholder-shown) + label {
            color: #667eea;
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
        }

        .form-check {
            margin: 25px 0;
        }

        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            border: 2px solid #ddd;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .form-check-input:checked {
            background-color: #667eea;
            border-color: #667eea;
            transform: scale(1.1);
        }

        .form-check-label {
            color: #555;
            font-weight: 500;
            margin-left: 8px;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 14px 28px;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            color: white;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert {
            border-radius: 12px;
            border: none;
            margin-bottom: 20px;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.05));
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(220, 53, 69, 0.05));
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            transition: color 0.3s ease;
        }

        .form-floating:focus-within .input-icon {
            color: #667eea;
        }

        @media (max-width: 576px) {
            .login-header,
            .login-form {
                padding-left: 20px;
                padding-right: 20px;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
            
            .logo-container {
                width: 60px;
                height: 60px;
            }
            
            .logo-text {
                font-size: 1.4rem;
            }
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
        }

        .shape:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 80px;
            height: 80px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.7;
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 1;
            }
        }
    </style>

    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Login Container -->
    <div class="container-fluid login-container d-flex justify-content-center align-items-center">
        <div class="col-11 col-sm-10 col-md-8 col-lg-6 col-xl-4">
            <div class="login-card">
                <!-- Header -->
                <div class="login-header">
                    <div class="logo-container">
                        <div class="logo-text">H</div>
                    </div>
                    <h2 class="login-title">Selamat Datang</h2>
                    <p class="login-subtitle">Masuk ke akun HIMA Anda</p>
                </div>

                <!-- Form -->
                <div class="login-form">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-floating position-relative">
                            <input class="form-control" 
                                   id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="nama@email.com"
                                   required 
                                   autofocus 
                                   autocomplete="username">
                            <label for="email">Alamat Email</label>
                            <i class="fas fa-envelope input-icon"></i>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-floating position-relative">
                            <input class="form-control" 
                                   id="password" 
                                   type="password" 
                                   name="password"
                                   placeholder="Password"
                                   required 
                                   autocomplete="current-password">
                            <label for="password">Kata Sandi</label>
                            <i class="fas fa-lock input-icon"></i>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="remember" 
                                   id="remember_me">
                            <label class="form-check-label" for="remember_me">
                                Ingat saya
                            </label>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>