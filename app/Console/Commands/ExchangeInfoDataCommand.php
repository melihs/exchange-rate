<?php

namespace App\Console\Commands;

use App\Services\ExchangeRateService;
use App\Services\Provider1Adapter;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class ExchangeInfoDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:provider {provider}';

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

            $provider = $this->argument('provider');

            $request = $client->get($provider);

            $response = $request->getBody();

            $exchangeData = json_decode($response->getContents(), true);

            $exchangeRateService = new  ExchangeRateService($exchangeData);

            $exchangeRateService->saveExchange();

        } catch (\Exception $e) {
            Log::error('fetch exchange data error: '.$e->getMessage());
        }
    }
}
