<?php


namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Interfaces\ExchangeRateInterface;

class Provider1 implements ExchangeRateInterface
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
            provider_save($data['result'], $this->providerName);
        } catch (\Exception $e) {
            Log::error('api save error: '.$e->getMessage());
        }
    }
}
