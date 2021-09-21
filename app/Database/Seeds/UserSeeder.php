<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert seed untuk 1 data
        // $data = [
        //     'name_user' => 'Administrator',
        //     'email_user' => 'didikprabowo@gmail.com',
        //     'password_user' => password_hash('12345', PASSWORD_BCRYPT)
        // ];

        // $this->db->table('users')->insert($data);

        // Insert untuk banyak data
        $data = [
            [
                'name_user' => 'Didik Prabwo',
                'email_user' => 'didik@yahoo.com',
                'password_user' => password_hash('abc', PASSWORD_BCRYPT)
            ],
            [
                'name_user' => 'Didik',
                'email_user' => 'didikp@yahoo.com',
                'password_user' => password_hash('abc', PASSWORD_BCRYPT)
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}