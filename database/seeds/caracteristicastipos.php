<?php

use Illuminate\Database\Seeder;

class caracteristicastipos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('caracteristicatipos')->insert([
            'name' => 'Color',
            'created_at' => date("Y-m-d H:i:s"),
            
                        
        ]);
        
        
        DB::table('caracteristicatipos')->insert([
            'name' => 'Material',
            'created_at' => date("Y-m-d H:i:s"),
                        
        ]);
    }
}
