<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Pizzeria',
            'Pesce',
            'Kebab',
            'Sushi',
            'Vegetariano',
            'Osteria',
            'Italiano',
            'Americano',
            'Cinese',
            'Fast-Food',
            'Indiano',
            'Pokè',
            'Colazione',
            'Thai',
        ];

        foreach($categories as $category){
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
