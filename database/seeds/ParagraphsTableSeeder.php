<?php

use Illuminate\Database\Seeder;
use App\Models\Paragraph;

class ParagraphsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_ids = ['12', '13', '14', '15', '16', '17', '18', '19'];
        $faker = app(Faker\Generator::class);

        $paragraphs = factory(Paragraph::class)->times(50)->make()->each(function ($paragraph) use ($faker, $category_ids) {
          $paragraph->category_id = $faker->randomElement($category_ids);
        });
        Paragraph::insert($paragraphs->toArray());
    }
}
