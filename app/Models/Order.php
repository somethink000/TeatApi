<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use FetchSorceApiTrate;
    public $timestamps = false;

    protected $fillable = [
        'g_number',
        'date',
        'last_change_date',
        'supplier_article',
        'tech_size',
        'barcode',
        'total_price',
        'discount_percent',
        'warehouse_name',
        'oblast',
        'income_id',
        'odid',
        'nm_id',
        'subject',
        'category',
        'brand',
        'is_cancel',
        'cancel_dt',

    ];

    public static function getDataFromApi(int $page): array
    {
        return static::getDataFromApiBase(
            'orders',
            $page,
            [
                'dateFrom' => '2022-05-10',
                'dateTo' => now()->format('Y-m-d')
            ]
        );
    }
}
