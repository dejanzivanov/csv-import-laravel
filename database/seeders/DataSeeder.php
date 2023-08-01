<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        dd(123);
        LazyCollection::make(function () {
            $handle = fopen(storage_path('app/public/data.csv'), 'r');


            while (($line = fgetcsv($handle, 4096)) !== false) {
                $dataString = implode(", ", $line);
                $row = explode(",", $dataString);
                yield $row;
            }

            fclose($handle);
//        }) ->skip(1)
//            ->chunk(1000)
//            ->each(function (LazyCollection $chunk){
//                $records = $chunk->map(function ($row) {
//                    return [
//                        'lastname' => $row[0],
//                        'name' => $row[1],
//                        'email' => $row[2],
//                        'email2' => $row[3],
//                        'profession' => $row[4],
//                    ];
//                })->toArray();
//
//
//                DB::table('data_tbs')->insert($records);
//            })
        })->skip(1)
            ->each(function ($row) {
                $record = [
                    'lastname' => $row[0],
                    'name' => $row[1],
                    'email' => $row[2],
                    'email2' => $row[3],
                    'profession' => $row[4],
                ];

                DB::table('data_tbs')->insert($record);
            });
        ;
    }
}
