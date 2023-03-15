<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->has('bearer_token') || !$request->has('company_token')) {
            return view('payments.index',['payments'=>null]);
        }
        $response = Http::acceptJson()
            ->withOptions(['verify' => false])
            ->withToken($request->bearer_token)
            ->withHeaders(['Company-Token' => $request->company_token])
            ->get(config('app.api-url') . 'payment')->json();

        if (!isset($response['status']) || $response['status'] != 'success') {
            return back()->with('error', $response['message']);
        }

        return view('payments.index', ['payments' => $response['data']['payments']]);
    }
}
