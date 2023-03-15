<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreMassiveRequest;
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
        return back()->with('api-token', 'Se ha registrado con exito! url de pago: ' . $response['data']['payment-link']);
    }

    public function massive()
    {
        return view('invoices.massive');
    }

    public function storeMassive(InvoiceStoreMassiveRequest $request)
    {
        $response = Http::acceptJson()->withOptions([
            'verify' => false,
        ])->withToken($request->bearer_token)
            ->withHeaders([
                'Company-Token' => $request->company_token
            ])
            ->post(config('app.api-url') . 'invoice/massive', [
                "invoices" =>
                    [
                        [
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

                        ],
                        [
                            "ref_transaction" => $request->ref_transaction1,
                            "customer_name" => $request->customer_name1,
                            "customer_last_name" => $request->customer_last_name1,
                            "customer_document" => $request->customer_document1,
                            "customer_email" => $request->customer_email1,
                            "customer_phone" => $request->customer_phone1,
                            "customer_address" => $request->customer_address1,
                            "description" => $request->description1,
                            "send_at" => $request->start_at1,
                            "expired_at" => $request->expired_at1,
                            "coin" => $request->coin1,
                            "amount" => $request->amount1,
                            "details" =>
                                [
                                    [
                                        "code" => $request->code1,
                                        "description" => $request->description_item1,
                                        "base" => $request->base1,
                                        "coin" => $request->coin_item1,
                                        "quantity" => $request->quantity1,
                                        "recharge" => $request->recharge1,
                                        "discount" => $request->discount1,
                                        "amount" => $request->amount1
                                    ]

                                ]

                        ]
                    ]
            ])->json();

        if (!isset($response['status']) || $response['status'] != 'success') {
            return back()->with('error', $response['message']);
        }
        return back()->with('api-token-massive', $response['data']['invoiceSuccess']);
    }

    public function index(Request $request)
    {
        if (!$request->has('bearer_token') || !$request->has('company_token')) {
            return view('invoices.index', ['invoices' => null]);
        }
        $response = Http::acceptJson()
            ->withOptions(['verify' => false])
            ->withToken($request->bearer_token)
            ->withHeaders(['Company-Token' => $request->company_token])
            ->get(config('app.api-url') . 'invoice')->json();

        if (!isset($response['status']) || $response['status'] != 'success') {
            return back()->with('error', $response['message']);
        }

        return view('invoices.index', ['invoices' => $response['data']['invoices']]);
    }
}
