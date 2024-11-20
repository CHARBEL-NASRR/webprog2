<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>
  <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
  <style>
    .button-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: center;
    }

    .reset-password-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    h1 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-control {
      width: 100%;
      padding: 12px;
      border-radius: 4px;
      border: 1px solid #ccc;
      margin-bottom: 15px;
      font-size: 16px;
    }

    .btn {
      flex: 1;
      padding: 12px;
      background: #0bc2a2;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.2s;
      width: 100%;
    }

    .btn:hover {
      background: #00b396;
    }

    .login-link {
      margin-top: 24px;
      font-size: 14px;
      color: #666;
      text-align: center;
    }

    .login-link a {
      color: #0bc2a2;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
  <script>
    function resetAlert() {
      alert("Your password has been reset successfully. You can now log in.");
    }
  </script>
</head>
<body>
  <div class="reset-password-container">
    <h1>Reset Password</h1>
    <p class="subtitle">
      Enter your new password below to reset your account.
    </p>

    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <form action="{{ route('password.update') }}" method="post" onsubmit="resetAlert()">
      {{ csrf_field() }}
      <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group">
        <label for="password">New Password*</label>
        <input type="password" class="form-control" required name="password" placeholder="Enter your new password">
      </div>

      <div class="form-group">
        <label for="password_confirmation">Confirm Password*</label>
        <input type="password" class="form-control" required name="password_confirmation" placeholder="Confirm your password">
      </div>

      <div class="button-group">
        <button type="submit" class="btn">Reset Password</button>
      </div>
    </form>

    <div class="login-link">
      <a href="{{ url('/host/login') }}">Go back to Login</a>
    </div>
  </div> 

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
