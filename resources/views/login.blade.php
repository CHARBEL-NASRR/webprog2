<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- Add Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <h2>Welcome Back</h2>
        <p>Glad to see you again</p>
        <p>Login to your account below.</p>
        
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('login.google') }}" class="google-button">
            <i class="fab fa-google"></i> Continue with Gmail
        </a>
        
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Enter your email"
                    required
                >
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password"
                    required
                >
                <a href="{{ route('forgetpassword.form') }}" class="forgot-link">Forgot password?</a>
            </div>

            <button type="submit" class="sign-in-button">Sign In</button>
        </form>

        <p class="signup-text">
            Don't have an account? 
            <a href="{{ url('/host/register') }}" class="signup-link">Sign up for Free</a>
        </p>
    </div>
</body>
</html>