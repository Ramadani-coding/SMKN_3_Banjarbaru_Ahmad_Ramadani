<?php

namespace App\Http\Controllers;

use App\Models\Societies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'id_card_number' => 'required',
            'password' => 'required',
        ]);

        $societie = Societies::where('id_card_number', $request->id_card_number)->first();

        if (! $societie || ! Hash::check($request->password, $societie->password)) {
            throw ValidationException::withMessages([
                'message' => ['ID Card Number or Password incorrect'],
            ]);
        }

        return $societie->createToken('token')->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json('Logout success', 200);
    }
}
