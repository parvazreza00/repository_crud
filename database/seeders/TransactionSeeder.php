<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();
        $csvData = fopen(base_path('database/csv/transaction_report.csv'), 'r');
        $trnsRow = true;
        while(($data = fgetcsv($csvData, 555, ','))  !==false) {
            if(!$trnsRow){
                Transaction::create([
                    'transaction_date' => $data['0'],
                    'price' => $data['1'],
                    'payment_type' => $data['2'],
                    'name' => $data['3'],
                    'city' => $data['4'],
                    'us_zip' => $data['5'],
                ]);
            }
            $trnsRow = false;
        }
        fclose($csvData);
    }
}
