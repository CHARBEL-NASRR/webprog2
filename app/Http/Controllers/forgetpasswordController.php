<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;

class forgetpasswordController extends Controller
{
    public function showForgetPassword()
    {
        return view('forget');
    }

    public function showResetForm($token)
    {
        return view('reset_password', ['token' => $token]);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email address.']);
        }

        $token = Str::random(60);
        $user->validate_token = $token;
        $user->expired_date = Carbon::now()->addMinutes(60);
        $user->save();

        $resetLink = route('password.reset', $token);

        $emailData = [
            'to_email' => $user->email,
            'subject' => 'Password Reset Request',
            'resetLink' => $resetLink
        ];

        // Call Mailtrap to send the email
        $this->sendEmailUsingMailtrap($emailData);

        return back()->with('status', 'Password reset link sent to your email.');
    }

    private function sendEmailUsingMailtrap($emailData)
    {
        Mail::send('emails.reset_password_email', ['resetLink' => $emailData['resetLink']], function ($message) use ($emailData) {
            $message->to($emailData['to_email'])
                    ->subject($emailData['subject']);
        });
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::where('validate_token', $request->token)
                    ->where('expired_date', '>=', Carbon::now())
                    ->first();

        

        $user->password = Hash::make($request->password);
        $user->validate_token = null;
        $user->expired_date = null;
        $user->save();

        $token = $user->createToken('Personal Access Token')->accessToken;
        return redirect()->route('login.form')->with('status', 'Password reset successfully. Please log in.');
    }
}