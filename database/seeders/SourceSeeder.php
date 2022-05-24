<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $faker = Factory::create();
        for($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->company(),
                'url' => $faker->url(),
                'created_at' => now('Europe/Moscow')
            ];
        }

        return $data;
    }
}
