<?php

use Illuminate\Database\Seeder;

class UserTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Volodymyr',
            'email' => 'vgotsak29@gmail.com',
            'password' => bcrypt('943400843vh')
        ]);
    }
}
