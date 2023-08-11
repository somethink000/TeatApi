<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Stocks;


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
        //$dateFrom = now()->format('Y-m-d');

        // $response = Http::get(
        //     //now()->format('Y-m-d')
        //     "89.108.115.241:6969/api/stocks",
        //     //"89.108.115.241:6969/api/sales",
        //     [
        //         'key' => 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie',
        //         'dateFrom' => '2023-08-11',
        //         //'dateTo' => '2023-08-10',
        //         'limit' => '5',
        //         'page' => '500'
        //     ]

        // );

        $response = Http::get(
            //now()->format('Y-m-d')
            "89.108.115.241:6969/api/stocks",
            //"89.108.115.241:6969/api/sales",
            [
                'key' => 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie',
                'dateFrom' => '2023-08-11',
                //'dateTo' => '2023-08-10',
                'limit' => '5',
                'page' => '1'
            ]
           
        );

        $data = json_decode($response->body());

        //dump($data);
        foreach($data as $dt){
            $dt = (array)$dt;

            Stocks::create($dt);
           //dump($dt);
        }
        //Stocks::create();

        //?dateFrom={Дата выгрузки ОТ}&dateTo={Дата выгрузки ДО}}&page={номер страницы}&limit={количество записей}key={ваш токен}');

        //  dump();
        $pas = 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie';
    }
}
