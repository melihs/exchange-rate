<?php


namespace App\Services;


use App\Interfaces\ExchangeRateInterface;
use Illuminate\Support\Facades\Log;

class Provider2 implements ExchangeRateInterface
{
    public function saveExchange($data)
    {
       try {
           $provider2Adapter = new Provider2Adapter();

           $results = $provider2Adapter->fixDataFormat($data);

           provider_save($results);
       }catch (\Exception $e) {
           exit("error\n");

           Log::error('api save error: '.$e->getMessage());
       }
    }
}
