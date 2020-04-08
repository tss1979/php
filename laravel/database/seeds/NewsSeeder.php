<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Faker\Factory::create('ru_RU');
        $data =[];
        for($i = 0; $i<= 6; $i++)
        {
            $data[] = [
                'title' => $faker->realText(rand(10, 12)),
                'category_id' => random_int(1, 4),
                'text'=> $faker->realText(rand(200, 500)),
                'isPrivate' => (bool)rand(0, 1),
            ];
        }

        return $data;
    }
}
