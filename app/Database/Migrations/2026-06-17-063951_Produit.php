<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produit extends Migration
{
    public function up()
    {
        // --- 2. TABLE PRODUITS ---
        $this->forge->addField([
            'id' => [
                'type'           => 'INTEGER',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'designation' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'prix' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'quantite_stock' => [
                'type'       => 'INTEGER',
                'constraint' => 11,
                'default'    => 0,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('produits');


    }

    public function down()
    {
 
        $this->forge->dropTable('produits');
    
    }
}
