<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BinanceService;

class BinanceController extends Controller
{
    protected $binance;

    public function __construct(BinanceService $binance)
    {
        $this->binance = $binance;
    }

    public function ticker($base, $quote)
    {
        $symbol = "$base/$quote";
        return response()->json(
            $this->binance->getTicker($symbol)
        );
    }

    public function order(Request $request, $base, $quote)
    {
        $symbol = "$base/$quote";
        $request->validate([
            'side' => 'required|string',
            'amount' => 'required|numeric'
        ]);

        $order = $this->binance->createOrder(
            $symbol,
            $request->side,
            $request->amount
        );

        return response()->json($order);
    }

    public function balance()
    {
        return response()->json(
            $this->binance->balance()
        );
    }
}
