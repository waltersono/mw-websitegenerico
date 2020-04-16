<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->titulo = 'tag1';
        $tag->save();

        $tag = new Tag();
        $tag->titulo = 'tag2';
        $tag->save();

        $tag = new Tag();
        $tag->titulo = 'tag3';
        $tag->save();
    }
}
