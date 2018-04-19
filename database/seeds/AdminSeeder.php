<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'Rannie Ollit',
        'email' => 'einnar82@gmail.com',
        'password' => bcrypt('admin123'),
        'gender' => 'Male',
        'high_score' => 99999999,
        'type' => 'Administrator'
      ]);
    }
}
