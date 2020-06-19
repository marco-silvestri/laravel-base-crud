<?php

use Illuminate\Database\Seeder;
use App\Student;
use Faker\Generator as Faker; //as is an alias

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        /**
         * Clean-up
         */

        //Student::truncate();

        /* MANUALLY GENERATED
        $students = [
            [
                'name' => 'Gigio Gabetti',
                'gender' => 'm',
                'description' => 'A cool guy',
                'age' => 34
            ],
            [
                'name' => 'Dino Tonelli',
                'gender' => 'm',
                'description' => 'A cool pal',
                'age' => 31
            ],
            [
                'name' => 'Alessio Due',
                'gender' => 'm',
                'description' => 'Yes, another cool guy',
                'age' => 24
            ],
            [
                'name' => 'Dora the explorer',
                'gender' => 'f',
                'description' => 'An explorer',
                'age' => 23
            ]
            ];
        
        foreach ($students as $student){
            $newStudent = new Student;
            $newStudent->fill($student);
            $newStudent->save();
        }*/

        /*Faker*/

        $records = 10;
        for ($i = 0; $i < $records; $i++){
            $gender = $faker->randomElement(['male', 'female']); //rand gender
            $genderShort = ($gender == 'male') ? 'm' : 'f';
            $newStudent = new Student();

            $newStudent->name = $faker->name($gender);
            $newStudent->gender = $genderShort;
            $newStudent->description = $faker->paragraph(3, true); 
            $newStudent->age = $faker->numberBetween($min = 18, $max = 50);

            $newStudent->save();
        }
    }
}
