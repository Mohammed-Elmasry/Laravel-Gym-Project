<?php

use Illuminate\Database\Seeder;

<<<<<<< HEAD
=======

>>>>>>> e08178c4ba148df79a043e80263c8637b7af7e14
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // $this->call(UsersTableSeeder::class);
=======
        $this->call('CountriesSeeder');
        $this->command->info('Seeded the countries!'); 
>>>>>>> e08178c4ba148df79a043e80263c8637b7af7e14
    }
}
