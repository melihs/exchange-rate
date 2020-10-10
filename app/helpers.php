<?php

use App\Models\Provider;
use Illuminate\Support\Facades\DB;

function replace_key(&$array, $currentKey, $newKey) {

    if (array_key_exists($currentKey, $array)) {
        $array[$newKey] = $array[$currentKey];

        unset($array[$currentKey]);

        return true;
    }
    return false;
}

function provider_save($data, $providerName) {

    $symbols = [];

    $saveData = array_map(function ($result) use ($providerName, &$symbols) {
        $result['name'] = $providerName;

        array_push($symbols, $result['symbol']);

        return $result;
    }, $data);

    $isDuplicate = Provider::whereIn('name', [$providerName])->exists();

    if ($isDuplicate) {
        exit("already registered\n");
    }

    DB::table('providers')->insert($saveData);

    exit("success\n");
}
