<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array("Beach", "Mountain");

        for ($i = 0; $i < count($categories); $i++) {
            $category = new Category();
            $category->name = $categories[$i];
            $category->save();
        }

    }
}
