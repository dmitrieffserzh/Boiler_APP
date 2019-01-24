<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x=3;
        while ($x<50) {
            $x++;
            DB::table('users')->insert([
                'username' => str_random(10),
                'email' => str_random(10). '@gmail.com',
                'password' => bcrypt('dmitriev'),
                'role' => 'user',
            ]);
            DB::table('profiles')->insert([
                'user_id' => $x,
                'first_name' => str_random(10),
                'last_name' => str_random(10),
                'gender' => rand(1, 2),
            ]);
        }
    }
}