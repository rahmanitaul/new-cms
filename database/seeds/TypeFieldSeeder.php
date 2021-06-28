<?php

use Illuminate\Database\Seeder;

use App\TypeField;


class TypeFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            [
                'type' => 'text'
            ],
            [
                'type' => 'email'
            ],
            [
                'type' => 'password'
            ],
            [
                'type' => 'description'
            ],
            [
                'type' => 'textarea'
            ],
            [
                'type' => 'file'
            ],
            [
                'type' => 'dropdown'
            ],
            [
                'type' => 'checkbox'
            ],
            [
                'type' => 'radio'
            ]
        ];

        TypeField::insert($data);
    }
}
