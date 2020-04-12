<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData()
    {
        $data =[];
        for($i = 0; $i<= 3; $i++)
        {
            $data[] = [
                'name' => $this->getName($i),
                'slug' => $this->getSlug($i),
                'category_image'=> $this->getImage($i)
            ];
        }

        return $data;
    }

    public function getSlug($i)
    {
        switch ($i) {
            case 0:
                return 'sport';
            case 1:
                return 'culture';
            case 2:
                return 'politics';
            case 3:
                return 'weather';
        }
    }

    public function getImage($i)
    {
        switch ($i) {
            case 0:
                return "storage/sport.jpg";
            case 1:
                return "storage/culture.jpg";
            case 2:
                return "storage/politics.jpg";
            case 3:
                return "storage/weather.jpg";
        }
    }

    public function getName($i)
    {
        switch ($i) {
            case 0:
                return "Спорт";
            case 1:
                return "Культура";
            case 2:
                return "Политика";
            case 3:
                return "Погода";
        }
    }
}
