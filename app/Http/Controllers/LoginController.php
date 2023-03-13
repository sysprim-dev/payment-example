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
//        Http::dd()->withUrlParameters([
//            'endpoint' => 'https://34.122.40.185/api/v1/auth/login',
//            'email' => $request->email,
//            'password' => $request->password,
//        ])->get('{+endpoint}/{email}/{password}');
        $response = Http::get('https://34.122.40.185/api/v1/auth/login/', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        dd($request);
    }
}
