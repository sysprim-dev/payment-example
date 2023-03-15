<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStoreRequest;
use Illuminate\Http\Request;
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

    public function logout(Request $request)
    {
        if (!$request->has('bearer_token')) {
            return view('logout');
        }

        $response = Http::acceptJson()->withOptions([
            'verify' => false,
        ])
            ->withToken($request->bearer_token)
            ->post(config('app.api-url') . 'auth/logout')->json();

        return back()->with('success', $response['message']);
    }
}
