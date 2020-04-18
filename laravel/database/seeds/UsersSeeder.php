<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Faker\Factory::create('ru_RU');
        $data =[];
        $data[0] = [
            'name'=>'admin',
            'email'=> 'admin@admin.com',
            'password'=> Hash::make('123'),
            'is_admin'=> true
        ];
        for($i = 1; $i<= 6; $i++)
        {
            $data[$i] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->password(rand(3, 6))),
                'is_admin' => false
            ];
        }

        return $data;
    }
}
