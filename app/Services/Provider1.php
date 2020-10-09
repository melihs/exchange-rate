<?php


namespace App\Services;


use App\Interfaces\ExchangeRateInterface;
use Illuminate\Support\Facades\Log;

class Provider1 implements ExchangeRateInterface
{
    public function saveExchange($data)
    {
       try {
           provider_save($data['result']);
       }catch (\Exception $e) {
           Log::error('api save error: '.$e->getMessage());
       }
    }
}
