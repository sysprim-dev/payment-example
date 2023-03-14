<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use Illuminate\Support\Facades\Http;

class CompanyController extends Controller
{
    public function create()
    {
        return view('company');
    }

    public function store(CompanyStoreRequest $request)
    {
        $response = Http::acceptJson()->withOptions([
            'verify' => false,
        ])->withToken($request->bearer_token)
            ->get(config('app.api-url') . 'get-token-company')
            ->json();

        if ($response['status'] != 'success') {
            return back()->with('error', $response['message']);
        }
        return back()->with('api-token', 'Se ha registrado con exito! asegurece de copiar y almacenar su Company_Token: ' . $response['data']['value']);
    }
}
