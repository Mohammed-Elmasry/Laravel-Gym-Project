<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call('CountriesSeeder');
<<<<<<< HEAD
        $this->command->info('Seeded the countries!');
=======
        $this->command->info('Seeded the countries!'); 
>>>>>>> dc9fbd868f0a080b76464e62cbfc067133fa6d33
    }
}
