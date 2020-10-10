<?php


namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Interfaces\ExchangeRateInterface;

class Provider2 implements ExchangeRateInterface
{
    private $providerName;

    public function __construct()
    {
        $className = Str::afterLast(self::class, '\\');

        $this->providerName = Str::kebab($className);
    }

    public function saveExchange($data)
    {
        try {
            $provider2Adapter = new Provider2Adapter();

            $results = $provider2Adapter->fixDataFormat($data);

            provider_save($results, $this->providerName);
        } catch (\Exception $e) {
            exit("error\n");

            Log::error('api save error: '.$e->getMessage());
        }
    }
}
