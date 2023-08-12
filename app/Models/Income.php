<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    use FetchSorceApiTrate;
    public $timestamps = false;

    protected $fillable = [
        'income_id',
        'number',
        'date',
        'last_change_date',
        'supplier_article',
        'tech_size',
        'barcode',
        'quantity',
        'total_price',
        'date_close',
        'warehouse_name',
        'nm_id',
        'status',
    ];

    public static function getDataFromApi(int $page) : array{
        return static::getDataFromApiBase(
            'incomes',
            $page,
            [
                'dateFrom' => '2022-05-10',
                'dateTo' => now()->format('Y-m-d')
            ]
            );
    }
}
