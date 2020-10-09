<?php

use App\Models\Provider;
use Illuminate\Support\Facades\DB;

function replace_key(&$array, $currentKey, $newKey) {

    if(array_key_exists($currentKey, $array)) {
        $array[$newKey] = $array[$currentKey];

        unset($array[$currentKey]);

        return true;
    }
    return false;
}

function provider_save($data) {
    $name = 'pv-'.uniqid();

    $symbols = [];

    $saveData = array_map(function ($result) use ($name, &$symbols) {
        $result['name'] = $name;

        array_push($symbols,$result['symbol']);

        return $result;
    }, $data);

    $isDuplicate = Provider::whereIn('symbol',$symbols)->exists();

    if ($isDuplicate) {
        echo "already registered\n";
    }

    DB::table('providers')->insert($saveData);

    echo "success\n";
}
