<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'amount'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function exchangeRateData()
    {
        return  DB::table('providers')
            ->orderBy('id')
            ->orderBy('name')
            ->get()
            ->groupBy('symbol');
    }
}
