<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStoreRequest;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(LoginStoreRequest $request)
    {
        $response = Http::acceptJson()->withOptions([
            'verify' => false,
        ])->post(config('app.api-url') . 'auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ])->json();

        if (!isset($response['status']) || $response['status'] != 'success') {
            return back()->with('error', $response['message']);
        }
        return back()->with('api-token', 'Se ha registrado con exito! asegurece de copiar y almacenar su bearer token: ' . $response['data']['access_token']);
    }
}
