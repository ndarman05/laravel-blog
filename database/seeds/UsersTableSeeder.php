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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => "John Doe",
                'email' => "johndoe@mail.test",
                'password' => bcrypt('secret')
            ],
            [
                'name' => "Jane Doe",
                'email' => "janedoe@mail.test",
                'password' => bcrypt('secret')
            ],
            [
                'name' => "Edo Masaru",
                'email' => "edumasaru@mail.test",
                'password' => bcrypt('secret')
            ],
        ]);
    }
}
