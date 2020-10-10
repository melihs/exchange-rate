<?php

namespace App\Http\Controllers;

use App\Models\Provider;

class ExchangeRateController extends Controller
{
    public function index()
    {
        $currencyUnit = ['USDTRY', 'EURTRY', 'GBPTRY'];

        $exchangeData = Provider::exchangeRateData();

        $minResults = [];

        foreach ($currencyUnit as $currency) {
            $minResults[$currency] = $this->compareCurrency($exchangeData[$currency])[0];
        }
        return view('home', compact('minResults'));
    }

    public function compareCurrency($currencyData)
    {
        $minCurrency = $currencyData->min('amount');

        $result = [];

        foreach ($currencyData as $data) {
            if ($data->amount === $minCurrency) {
                array_push($result, [
                    'name' => $data->name,
                    'amount' => $minCurrency,
                ]);
            }
        }
        return $result;
    }
}
