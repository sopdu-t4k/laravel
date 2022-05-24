<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create();
        for($i = 0; $i < 50; $i++) {
            $title = $faker->sentence(4);
            $data[] = [
                'category_id' => $faker->numberBetween(1, 5),
                'source_id' => $faker->numberBetween(1, 10),
                'title' => $title,
                'slug' => \Str::slug($title),
                'preview' => $faker->text(200),
                'created_at' => $faker->dateTimeThisYear()
            ];
        }

        return $data;
    }
}
