<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Stocks;
use Illuminate\Http\Client\Response;

use function Psy\debug;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $pageCount = $this->getData('1')['meta']['last_page'];

        //TODO make good think
        // for ($i = 1; $i <= $pageCount; $i++) {

        //     foreach ($this->getData($i)['data'] as $item) {
        //         Stocks::create($item);
        //         //dump($item);
        //     }
        // }

        // dump($this->getData('1'));
    }


    protected function getData(string $page) : array
    {
        $response = Http::get(

            "89.108.115.241:6969/api/stocks",
            [
                'key' => 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie',
                'dateFrom' => '2023-08-12',
                //'dateTo' => '2023-08-10',
                //'limit' => '1',
                'page' => $page
            ]

        );

        if ($response->failed()) {
            dump($response->status(), $response->json());
        }

        return $response->json();
    }
}
