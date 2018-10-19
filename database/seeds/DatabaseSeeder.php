<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('categoria_productosTableSeeder');
         
         $this->call('caracteristicastipos');
         $this->call('caracteristicas');
    }
}
