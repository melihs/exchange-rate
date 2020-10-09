<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

            $providerApi = $this->argument('provider');

            $request = $client->get($providerApi);

            $response = $request->getBody();

            $exchangeData = json_decode($response->getContents(), true);

            $services = config('services.providers');

            foreach ($services as $name => $api) {
                if ($providerApi == $api) {
                    $serviceName = 'App\Services\\'.Str::ucfirst($name);

                    $service = new $serviceName();

                    $service->saveExchange($exchangeData);
                }
            }
        } catch (\Exception $e) {
            Log::error('fetch exchange data error: '.$e->getMessage());
        }
    }
}
