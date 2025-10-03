@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #f8fafc, #e2e8f0, #cbd5e1);
        background-size: 400% 400%;
        animation: gradientMove 20s ease infinite;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        min-height: 100vh;
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .logo {
        font-size: 32px;
        color: #1e293b;
        font-weight: 600;
        letter-spacing: -0.5px;
        margin-bottom: 8px;
    }

    .subtitle {
        color: #64748b;
        font-size: 16px;
        font-weight: 400;
        margin-bottom: 40px;
    }

    .card {
        animation: fadeInScale 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        border-radius: 20px !important;
        border: 1px solid rgba(226, 232, 240, 0.8);
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        padding: 48px 40px !important;
    }

    @keyframes fadeInScale {
        from { 
            opacity: 0; 
            transform: translateY(20px) scale(0.98); 
        }
        to { 
            opacity: 1; 
            transform: translateY(0) scale(1); 
        }
    }

    .form-label {
        font-weight: 500;
        color: #374151;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .form-control {
        border-radius: 12px;
        border: 1.5px solid #e5e7eb;
        padding: 14px 16px;
        font-size: 15px;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        background: #ffffff;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .invalid-feedback {
        font-size: 13px;
        margin-top: 6px;
    }

    .alert {
        border-radius: 12px;
        border: none;
        padding: 16px 20px;
        font-size: 14px;
        margin-bottom: 24px;
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        color: #166534;
        border: 1px solid rgba(34, 197, 94, 0.2);
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: #991b1b;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .form-check-input {
        border-radius: 6px;
        border: 1.5px solid #d1d5db;
        width: 18px;
        height: 18px;
    }

    .form-check-input:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }

    .form-check-label {
        font-size: 14px;
        color: #6b7280;
        margin-left: 8px;
    }

    .forgot-password {
        color: #3b82f6;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .forgot-password:hover {
        color: #2563eb;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        border: none;
        border-radius: 12px;
        padding: 16px 24px;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 14px 0 rgba(59, 130, 246, 0.3);
    }

    .btn-primary:hover:not(.loading) {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        transform: translateY(-1px);
        box-shadow: 0 8px 20px 0 rgba(59, 130, 246, 0.4);
    }

    .btn-primary:active:not(.loading) {
        transform: translateY(0);
    }

    /* Button loading effect */
    .btn.loading {
        position: relative;
        pointer-events: none;
        opacity: 0.9;
        background: linear-gradient(135deg, #9ca3af, #6b7280) !important;
        box-shadow: none !important;
    }
    
    .btn.loading::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 20px;
        height: 20px;
        margin-top: -10px;
        margin-left: -10px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top-color: #fff;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Password toggle icon */
    .password-wrapper {
        position: relative;
    }
    
    .password-wrapper i {
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #9ca3af;
        font-size: 16px;
        transition: color 0.2s ease;
        z-index: 10;
    }
    
    .password-wrapper i:hover {
        color: #6b7280;
    }

    .password-wrapper .form-control {
        padding-right: 48px;
    }

    .login-container {
        max-width: 420px;
        width: 100%;
    }

    @media (max-width: 576px) {
        .card {
            padding: 32px 24px !important;
            margin: 20px;
        }
        
        .logo {
            font-size: 28px;
        }
    }
</style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="login-container">
        <div class="text-center mb-4">
            <div class="logo">Welcome to DormHub</div>
            <div class="subtitle">We're glad to see you again.</div>
        </div>

        <div class="card shadow-sm">
            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Error Message --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Login Form --}}
            <form action="{{ route('login') }}" method="POST" id="loginForm">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                           class="form-control @error('email') is-invalid @enderror" 
                           placeholder="Enter your email" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4 password-wrapper">
                    <label class="form-label">Password</label>
                    <input type="password" id="password" name="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           placeholder="Enter your password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                </div>

                <button type="submit" id="submitBtn" class="btn btn-primary w-100">Sign in</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('passwordIcon');

    // Add loading state on form submit
    form.addEventListener('submit', function() {
        submitBtn.classList.add('loading');
        submitBtn.textContent = '';
    });

    // Password visibility toggle
    passwordIcon.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        }
    });
});
</script>

@endsection