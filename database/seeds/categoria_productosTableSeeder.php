<?php

use Illuminate\Database\Seeder;


use App\CategoriaProducto;

class categoria_productosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_productos')->insert([
            'name' => 'Silla',
            'created_at' => date("Y-m-d H:i:s"),
            
                        
        ]);
        
        
        DB::table('categoria_productos')->insert([
            'name' => 'Mesa',
            'created_at' => date("Y-m-d H:i:s"),
                        
        ]);
        
        DB::table('categoria_productos')->insert([
            'name' => 'Mesa cafe',
            'created_at' => date("Y-m-d H:i:s"),
                        
        ]);
    }
}
