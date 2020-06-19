<?php

use Illuminate\Database\Seeder;
use App\TextBook;
use Faker\Generator as Faker;

class TextBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $records = 30;
        for ($i = 0; $i < $records; $i++){
            $newTextBook = new TextBook();
            $newTextBook->title = $faker->catchPhrase();
            $newTextBook->author = $faker->name();
            $newTextBook->topic = $faker->isbn10(); 
            $newTextBook->save();
        }
    }
}