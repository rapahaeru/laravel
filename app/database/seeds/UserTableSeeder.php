<?php

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(array(
                    'created_at'        => date("Y-m-d H:i:s",time()), 
                    'updated_at'        => date("Y-m-d H:i:s",time()), 
                    'usr_mail'          => 'admin@admin.com.br', 
                    'usr_name'          => 'admin', 
                    'usr_pass'          => Hash::make('admin'), 
                    'usr_status'        => 1, 
                    'usr_level'         => 1
        ));
    }

}
