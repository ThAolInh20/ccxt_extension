<?php

namespace App\Services;

use ccxt\binance;

class BinanceService
{
    protected $binance;

    public function __construct()
    {
        $this->binance = new binance([
            'apiKey' => config('app.binance.apiKey'),
            'secret' => config('app.binance.secret'),
        ]);
    }

    public function getTicker($symbol)
    {
        return $this->binance->fetch_ticker($symbol);
    }

    public function createOrder($symbol, $side, $amount)
    {
        return $this->binance->create_order($symbol, 'market', $side, $amount);
    }

    public function balance()
    {
        return $this->binance->fetch_balance();
    }
}
