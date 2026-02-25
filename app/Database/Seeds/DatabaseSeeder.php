<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');   
        $this->call('CustomerSeeder'); 
        $this->call('CategorySeeder'); 
        $this->call('TableSeeder');     
        $this->call('PromoSeeder');     
        $this->call('MenuSeeder');      
    }
}