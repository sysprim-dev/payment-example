<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\InvoiceStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InvoiceController extends Controller
{
    public function create()
    {
        return view('invoices.create');
    }

    public function store(InvoiceStoreRequest $request)
    {
        $response = Http::acceptJson()->withOptions([
            'verify' => false,
        ])->withToken($request->bearer_token)
            ->withHeaders([
                'Company-Token' => $request->company_token
            ])
            ->post(config('app.api-url') . 'invoice', [
                "ref_transaction" => $request->ref_transaction,
                "customer_name" => $request->customer_name,
                "customer_last_name" => $request->customer_last_name,
                "customer_document" => $request->customer_document,
                "customer_email" => $request->customer_email,
                "customer_phone" => $request->customer_phone,
                "customer_address" => $request->customer_address,
                "description" => $request->description,
                "send_at" => $request->start_at,
                "expired_at" => $request->expired_at,
                "coin" => $request->coin,
                "amount" => $request->amount,
                "details" =>
                    [
                        [
                            "code" => $request->code,
                            "description" => $request->description_item,
                            "base" => $request->base,
                            "coin" => $request->coin_item,
                            "quantity" => $request->quantity,
                            "recharge" => $request->recharge,
                            "discount" => $request->discount,
                            "amount" => $request->amount
                        ]
                    ]
            ])->json();

        if ($response['status'] != 'success') {
            return back()->with('error', $response['message']);
        }
        return back()->with('api-token', 'Se ha registrado con exito! url de pago: '.$response['data']['payment-link']);
    }
}
