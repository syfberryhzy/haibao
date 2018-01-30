<?php

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\Category;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_ids = ['8', '9', '10', '11', '12', '13'];
        $faker = app(Faker\Generator::class);

        $galleries = factory(Gallery::class)->times(50)->make()->each(function ($gallery) use ($faker, $category_ids) {
          $gallery->category_id = $faker->randomElement($category_ids);
        });
        Gallery::insert($galleries->toArray());
    }
}
