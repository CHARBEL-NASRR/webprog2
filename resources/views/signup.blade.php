<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>
    <div class="signup-container">
        <h1>Sign up</h1>
        <p class="subtitle">Enter your details below to create your account and get started</p>
        
        <div id="status-message"></div>

        <form id="signup-form" method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name*</label>
                    <input 
                        type="text" 
                        id="firstName" 
                        name="first_name"
                        placeholder="Enter your first name"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="lastName">Last Name*</label>
                    <input 
                        type="text" 
                        id="lastName" 
                        name="last_name"
                        placeholder="Enter your last name"
                        required
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        placeholder="Enter your email"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number*</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone"
                        placeholder="+961  xx xxx xxx"
                        required
                    >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password*</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="••••••••"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password*</label>
                    <input 
                        type="password" 
                        id="confirmPassword" 
                        name="password_confirmation"
                        placeholder="••••••••"
                        required
                    >
                </div>
            </div>

            <div class="button-group">
                <a href="{{ url('/host/login') }}" class="back-btn">Back</a>
                <button type="submit" class="signup-btn">Sign Up</button>
            </div>
        </form>
        
        <p class="login-link">
            Already have an account? <a href="{{ url('/host/login') }}">Log in</a>
        </p>
    </div>
</body>
</html>