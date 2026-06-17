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
            ['Produit' => 'Riz Local 1kg', 'Prix_Unitaire' => 3500, 'Quantite' => 100],
            ['Produit' => 'Huile de table 1L', 'Prix_Unitaire' => 9000, 'Quantite' => 50],
            ['Produit' => 'Sucre Blanc 1kg', 'Prix_Unitaire' => 4200, 'Quantite' => 80],
            ['Produit' => 'Savon de ménage', 'Prix_Unitaire' => 1500, 'Quantite' => 200],
            ['Produit' => 'Pâtes Panzani 500g', 'Prix_Unitaire' => 3800, 'Quantite' => 120],
        ];
        $this->db->table('produits')->insertBatch($produits);
    }
}
