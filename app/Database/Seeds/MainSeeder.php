<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        // Insertion des 2 caisses
        $caisses = [
            ['numero_caisse' => 'Caisse N°1'],
            ['numero_caisse' => 'Caisse N°2'],
        ];
        $this->db->table('caisses')->insertBatch($caisses);

        // Insertion des 5 produits
        $produits = [
            ['designation' => 'Riz Local 1kg', 'prix' => 3500, 'quantite_stock' => 100],
            ['designation' => 'Huile de table 1L', 'prix' => 9000, 'quantite_stock' => 50],
            ['designation' => 'Sucre Blanc 1kg', 'prix' => 4200, 'quantite_stock' => 80],
            ['designation' => 'Savon de ménage', 'prix' => 1500, 'quantite_stock' => 200],
            ['designation' => 'Pâtes Panzani 500g', 'prix' => 3800, 'quantite_stock' => 120],
        ];
        $this->db->table('produits')->insertBatch($produits);
    }
}
