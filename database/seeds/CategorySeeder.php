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
            [
                'name' => 'Pizzeria',
                'image' =>'pizzameglio.jpg'
            ],
            [
                'name' => 'Kebab',
                'image' =>'kebabbone.jpg'
            ],
            [
                'name' => 'Sushi',
                'image' =>'sushi2.jpg'
            ],
            [
                'name' => 'Vegetariano',
                'image' =>'vegetarian.jpg'
            ],
            [
                'name' => 'Italiano',
                'image' =>'sugo-al-pomodoro.jpg'
            ],
            [
                'name' => 'Cinese',
                'image' =>'cinesenoborders.jpg'
            ],
            [
                'name' => 'Fast-Food',
                'image' =>'fast-food.jpg'
            ],
            [
                'name' => 'Indiano',
                'image' =>'indiano.jpg'
            ],
            [
                'name' => 'Pokè',
                'image' =>'poke.jpg'
            ],
            [
                'name' => 'Thai',
                'image' =>'thai.jpg'
            ],
        ];

        foreach($categories as $categoryData){
            $newCategory = new Category();
            $newCategory->name = $categoryData['name'];
            $newCategory->image = $categoryData['image'];
            $newCategory->save();
        }
    }
}
