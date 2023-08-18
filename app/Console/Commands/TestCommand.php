<?php

namespace App\Console\Commands;

use App\Models\Incomes;
use App\Models\Orders;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Stock;
use App\Models\Sale;
use App\Models\Income;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;

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
        $modelsArray = [
            Stock::class,
            Sale::class,
            Order::class,
            Income::class
        ];


        foreach ($modelsArray as $model) {

            $page = 1;
            $total = null;


            $model::query()->delete();



            DB::beginTransaction();


            do {
                $data = $model::getDataFromApi($page);
                dump($page);
                foreach ($data['data'] as $item) {
                    $model::create($item);
                }

                $page++;
                $total = $data['meta']['total'];
            } while ($data['meta']['last_page'] >= $page);

            if ($total !== $model::count('id')) {
                DB::rollBack();
                return static::FAILURE;
            }


            DB::commit();
        }
        return static::SUCCESS;
    }
}
