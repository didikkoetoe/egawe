<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGroups extends Migration
{
    public function up()
        {
                $this->forge->addField([
                        'id_group'          => [
                                'type'           => 'BIGINT',
                                'constraint'     => 20,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'name_group'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'info_group' => [
                                'type'           => 'TEXT',
                                'null'           => TRUE,
                        ],
                        'created_at' => [
                                'type'           => 'DATETIME',
                                'null'           => TRUE,
                        ],
                        'updated_at' => [
                                'type'           => 'DATETIME',
                                'null'           => TRUE,
                        ],
                        'deleted_at' => [
                                'type'           => 'DATETIME',
                                'null'           => TRUE,
                        ],
                ]);
                $this->forge->addKey('id_group', TRUE);
                $this->forge->createTable('groups');
        }

        public function down()
        {
                $this->forge->dropTable('groups');
        }
}