<?php

namespace App\Http\Controllers\Token;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreateController extends Controller
{
    public function handle(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
           return response(['email' => 'The provided credentials are incorrect'], 401);
        }

        return response(['token'=>$user->createToken('my-token')->plainTextToken], 201);
    }
}
