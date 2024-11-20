<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <style>
        /* Additional styling to stack buttons vertically */
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }

        .signup-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
    </style>
    <script>
        function showAlert() {
            alert("Kindly check your email for instructions to reset your password.");
        }
    </script>
</head>
<body>
    <div class="signup-container">
        <h1>Forgot Password</h1>
        <p class="subtitle">
            Kindly Check Your Email.
        </p>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form 
            id="forgot-password-form" 
            method="POST" 
            action="{{ route('password.email') }}" 
            onsubmit="showAlert()">
            @csrf
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

            <div class="button-group">
                <button type="submit" class="signup-btn">Request New Password</button>
                <a href="{{url('/host/login')}}" class="back-btn">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
