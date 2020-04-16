<?php

use Illuminate\Database\Seeder;
use App\Configuration;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = new Configuration();
        $config->site_name = 'Website Generico';
        $config->slogan = 'Crie seu proprio website';
        $config->save();
    }
}
