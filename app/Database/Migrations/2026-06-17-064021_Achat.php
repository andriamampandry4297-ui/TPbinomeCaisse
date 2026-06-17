<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Achat extends Migration
{
    public function up()
    {
                // --- 3. TABLE ACHATS ---
        $this->forge->addField([
            'id' => [
                'type'           => 'INTEGER',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'caisse_id' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
            ],
            'produit_id' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
            ],
            'quantite_achetee' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
            ],
            'statut' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'    => 'en_cours', // Deviendra 'cloture' quand on clique sur le bouton
            ],
            'date_achat' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('achats');
    }

    public function down()
    {
               $this->forge->dropTable('achats');
    }
}
