<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createcontact extends Migration
{
    public function up()
        {
                $this->forge->addField([
                        'id_contact'          => [
                                'type'           => 'BIGINT',
                                'constraint'     => 20,
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'name_contact'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '60',
                        ],
                        'name_alias'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '60',
                                'null'           => true
                        ],
                        'phone'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '60',
                                'null'           => true
                        ],
                        'email'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                                'null'           => true
                        ],
                        'address'       => [
                                'type'           => 'TEXT',
                                'null'           => true
                        ],
                        'id_group'          => [
                                'type'           => 'BIGINT',
                                'constraint'     => 20,
                                'unsigned'       => TRUE,
                        ],
                        'created_at' => [
                            'type' => 'DATETIME',
                            'null' => true
                        ],
                        'updated_at' => [
                            'type' => 'DATETIME',
                            'null' => true
                        ],
                        'deleted_at' => [
                            'type' => 'DATETIME',
                            'null' => true
                        ],
                ]);
                $this->forge->addKey('id_contact', TRUE);
                $this->forge->addForeignKey('id_group', 'groups', 'id_group');
                $this->forge->createTable('contact');
        }

        public function down()
        {
                // $this->forge->dropForeignKey('contacts', 'contacts_id_group_foreign');
                $this->forge->dropTable('contact');
        }
}