<?php


namespace App\Services;


class Provider2Adapter
{
    public function fixDataFormat($data)
    {
        $resultData = [];
        foreach ($data as $item) {
            if (key($item) != 'symbol') {
                replace_key($item, key($item),'symbol');
            }

            if (key($item) != 'amount') {
                replace_key($item, key($item),'amount');
            }
            array_push($resultData,$item);
        }

        return $resultData;
    }
}
