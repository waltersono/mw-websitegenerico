<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       	$this->call(UsersTableSeeder::class);
       	$this->call(MenusTableSeeder::class);
        $this->call(PaginasTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ConfigurationsTableSeeder::class);
    }
}
