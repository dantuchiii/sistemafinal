<?php

use Illuminate\Database\Seeder;

class caracteristicas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('caracteristicas')->insert([
            'name' => 'Rojo',
            'caracteristicatipo_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            
                        
        ]);
        
        
        DB::table('caracteristicas')->insert([
            'name' => 'Azul',
            'caracteristicatipo_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
                        
        ]);
        
        DB::table('caracteristicas')->insert([
            'name' => 'Negro',
            'caracteristicatipo_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
                        
        ]);
        
        DB::table('caracteristicas')->insert([
            'name' => 'Marron',
            'caracteristicatipo_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
                        
        ]);
        
        
        DB::table('caracteristicas')->insert([
            'name' => 'Algarrobo',
            'caracteristicatipo_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            
                        
        ]);
        
        
        DB::table('caracteristicas')->insert([
            'name' => 'Pino',
            'caracteristicatipo_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
                        
        ]);
    }
}
