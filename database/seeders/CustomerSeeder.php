<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userList = [
            'Albert Einstein',
            'Blaise Pascal',
            'Erwin Schroedinger',
            'Lord Kelvin',
            'Michael Faraday',
            'Nicolaus Copernicus',
            'Sir Isaac Newton',
            'Stephen Hawking',
            'Werner Karl Heisenberg',
        ];

        foreach ($userList as $fullName) {
            $name = str_replace(' ', '.', $fullName);
            Customer::create([
                'name' => $fullName,
                'mobile' => '79' . rand(111111111,999999999),
                'email' => strtolower($name) . '@mail.ru'
            ]);
        }
    }
}
