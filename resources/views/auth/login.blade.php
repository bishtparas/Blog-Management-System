<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | JobYaari Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #3b82f6;
            --bg-gradient-start: #0f172a;
            --bg-gradient-end: #1e293b;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 70%, rgba(37, 99, 235, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 70% 30%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
            animation: bgFloat 15s ease-in-out infinite;
        }
        @keyframes bgFloat {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(1deg); }
            66% { transform: translate(-20px, 20px) rotate(-1deg); }
        }
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            padding: 0 20px;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 48px 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.6s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-logo {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-logo i {
            font-size: 3rem;
            color: var(--primary-light);
            display: block;
            margin-bottom: 12px;
        }
        .login-logo h2 {
            color: #fff;
            font-weight: 700;
            font-size: 1.5rem;
        }
        .login-logo h2 span { color: var(--primary-light); }
        .login-logo p { color: rgba(255,255,255,0.5); font-size: 0.875rem; margin-top: 4px; }
        .form-label { color: rgba(255,255,255,0.7); font-weight: 500; font-size: 0.875rem; }
        .form-control {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: #fff;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background: rgba(255,255,255,0.08);
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
            color: #fff;
        }
        .form-control::placeholder { color: rgba(255,255,255,0.3); }
        .input-group-text {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.5);
            border-radius: 12px 0 0 12px;
        }
        .input-group .form-control { border-radius: 0 12px 12px 0; }
        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
            color: #fff;
        }
        .btn-login:active { transform: translateY(0); }
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        .form-check-label { color: rgba(255,255,255,0.6); font-size: 0.875rem; }
        .back-link {
            text-align: center;
            margin-top: 24px;
        }
        .back-link a {
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }
        .back-link a:hover { color: var(--primary-light); }
        .alert {
            border-radius: 12px;
            font-size: 0.875rem;
            border: none;
        }
        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
        }
        .alert-success {
            background: rgba(34, 197, 94, 0.15);
            color: #86efac;
        }
        .floating-shapes .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.03;
            background: var(--primary-light);
        }
        .shape-1 { width: 300px; height: 300px; top: -100px; right: -100px; animation: float1 20s infinite; }
        .shape-2 { width: 200px; height: 200px; bottom: -80px; left: -60px; animation: float2 25s infinite; }
        @keyframes float1 { 0%,100% { transform: translate(0,0); } 50% { transform: translate(-30px,30px); } }
        @keyframes float2 { 0%,100% { transform: translate(0,0); } 50% { transform: translate(20px,-20px); } }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">
                <i class="bi bi-shield-lock-fill"></i>
                <h2>JobYaari<span>Blog</span></h2>
                <p>Admin Panel Login</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success mb-3">
                    <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mb-3">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="admin@example.com" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                </button>
            </form>

            <div class="back-link">
                <a href="{{ route('home') }}"><i class="bi bi-arrow-left me-1"></i> Back to Website</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
