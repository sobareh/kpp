<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'role_name' => 'admin',
            ],
            [
                'id' => 0,
                'role_name' => 'user'
            ],
        ];
        
        DB::table('roles')->insert($data);
    }
}
