<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
        {
                $this->forge->addField([
                        'id_user'          => [
                                'type'           => 'BIGINT',
                                'constraint'     => 20,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'name_user'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '60',
                        ],
                        'email_user'       => [
                                'type'           => 'VARCHAR',
                                'constraint'           => '60'
                        ],
                        'password_user'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '60'
                        ],
                        'info_gawe' => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ],
                ]);
                $this->forge->addKey('id_user', TRUE);
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('users');
        }
}