<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    public function showForgetForm()
    {
        return view('forgot');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password1' => 'required|min:8',
            'password2' => ['required', 'min:8', 'same:password1'],
        ]);

        $email = $request->email;
        $password = Hash::make($request->password1);

        $user = DB::table('users')->where('email', $email)->first();

        if ($user) {
            DB::table('users')->where('email', $email)->update(['password' => $password]);

            // Jika berhasil mengupdate password
            return redirect()->route('login')->with('success', 'Password has been updated successfully.');
        }

        // Jika email tidak ditemukan dalam database
        throw ValidationException::withMessages([
            'email' => ['The provided email does not exist.'],
        ]);
    }
}
