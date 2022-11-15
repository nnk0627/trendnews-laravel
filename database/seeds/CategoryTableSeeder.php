<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas =[
            'Politics',
            'Business',
            'Articles',
            'Lifestyle',
            'Weather'

        ];
        foreach($datas as $data){
            $cat = new Category();
            $cat->title = $data;
            $cat->save();
        }
    }
}
