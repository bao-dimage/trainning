<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Mail\Subscribe;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
    //     $email =Validator::make($request->all(), [
    //         'email' => 'required|email|'
    //    ]);

        $email = $request->validate(['email'=>'required|email']);

       if (!User::where('email', $request->email)) {
        return back()->withErrors([
            'email' => 'This email has not been registered',
        ]);
    }
        $token = Str::random(32);
        
        DB::table('password_resets')
              ->where('email', $email)
              ->update(['token' => $token]);
        $resetUrl = route('password.reset',['token' => $token]);
        // dd($resetUrl);
        Mail::to($email)->send(new ForgotPasswordMail($resetUrl));
    
        return back()->with('message', 'We have e-mailed your password reset link!');
        }
}