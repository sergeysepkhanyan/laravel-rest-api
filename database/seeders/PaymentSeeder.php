<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Customer::all();
        $statuses = ['In Progress', 'Confirmed', 'Declined'];
        $currencies = ['EUR', 'USD'];
        foreach ($users as $user){
            for($i = 0; $i < 10; $i++){
                Payment::create([
                    'customer_id' => $user->id,
                    'amount' => rand(10, 9999),
                    'currency' => Arr::random($currencies),
                    'status' => Arr::random($statuses)
                ]);
            }
        }
    }
}
