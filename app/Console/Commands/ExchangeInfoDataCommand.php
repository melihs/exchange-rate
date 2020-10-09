<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ExchangeInfoDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:exchange-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command fetches exchange rates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        try {
            $client = new Client();

            $request = $client->get('http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0');

            $response = $request->getBody();
            $exchangeData = json_decode($response->getContents(), true);


        }catch (\Exception $e) {
            Log::error('fetch exchange data error: '.$e->getMessage());
        }
    }
}
