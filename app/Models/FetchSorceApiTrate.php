<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;


trait FetchSorceApiTrate
{
    protected static function getDataFromApiBase(
        string $path,
        int $page,
        array $attributes = []
    ): array {
        $response = Http::get(
            sprintf('%s/%s', config('spheredata.uri'), $path),
            array_merge(
                [
                    'key' => config('spheredata.key'),
                    'page' => $page
                ],
                $attributes

            )


        );


        if ($response->failed()) {
            dump($response->status(), $response->json());
        }

        return $response->json();
    }
}
