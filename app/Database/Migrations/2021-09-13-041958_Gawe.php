<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gawe extends Migration
{
    public function up()
        {
                $this->forge->addField([
                        'id_gawe'          => [
                                'type'           => 'BIGINT',
                                'constraint'     => 20,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'name_gawe'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'date_gawe'       => [
                                'type'           => 'DATE'
                        ],
                        'info_gawe' => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ],
                ]);
                $this->forge->addKey('id_gawe', TRUE);
                $this->forge->createTable('gawe');
        }

        public function down()
        {
                $this->forge->dropTable('gawe');
        }
}