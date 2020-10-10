<?php


namespace App\Services;


class Provider2Adapter
{
    const SYMBOL = 'symbol';
    const AMOUNT = 'amount';

    public function fixDataFormat($data)
    {
        $currencyLimit = ['USDTRY', 'EURTRY', 'GBPTRY'];

        foreach ($data as $key => $item) {

            $firstKey = array_key_first($item);
            $lastkey = array_key_last($item);

            $data[$key][$firstKey] = $currencyLimit[$key];

            replace_key($data[$key], $firstKey, self::SYMBOL);
            replace_key($data[$key], $lastkey, self::AMOUNT);
        }
        return $data;
    }
}
