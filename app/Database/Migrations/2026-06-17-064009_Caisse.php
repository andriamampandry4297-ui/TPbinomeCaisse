<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Caisse extends Migration
{
    public function up()
    {
                // --- 1. TABLE CAISSES ---
        $this->forge->addField([
            'id' => [
                'type'           => 'INTEGER',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'numero_caisse' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('caisses');
    }

    public function down()
    {
            $this->forge->dropTable('caisses');
    }
}
