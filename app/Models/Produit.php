<?php

namespace App\Models;

use CodeIgniter\Model;

class Produit extends Model
{
    protected $table            = 'produits';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;

    protected $returnType       = 'array';

    protected $allowedFields    = [
        'Produit',
        'Prix_Unitaire',
        'Quantite'
    ];

    protected $useTimestamps = false;

    // Validation
    protected $validationRules = [
        'Produit'    => 'required|min_length[2]',
        'Quantite' => 'required|integer'
    ];

    protected $validationMessages = [
        'Produit' => [
            'required' => 'La désignation est obligatoire.'
        ],
        'Quantite' => [
            'required' => 'La quantité en stock est obligatoire.'
        ]
    ];
}