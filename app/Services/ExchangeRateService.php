<?php


namespace App\Services;


use App\Interfaces\ExchangeRateInterface;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExchangeRateService implements ExchangeRateInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function saveExchange()
    {
       try {
           $results = $this->data['result'];

           $name = 'pv-'.uniqid();

           $symbols = [];

           $saveData = array_map(function ($result) use ($name, &$symbols) {
               $result['name'] = $name;

               array_push($symbols,$result['symbol']);

               return $result;
           }, $results);

           $isDuplicate = Provider::whereIn('symbol',$symbols)->exists();

           if ($isDuplicate) {
               echo "already registered\n";
           }

           DB::table('providers')->insert($saveData);
           echo "success\n";
       }catch (\Exception $e) {
           Log::error('api save error: '.$e->getMessage());
       }
    }
}
