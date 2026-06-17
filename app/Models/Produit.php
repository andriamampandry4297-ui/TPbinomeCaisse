<?php

namespace App\Models;

use CodeIgniter\Model;

class ProduitModel extends Model
{
    protected $table            = 'produit';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;

    protected $returnType       = 'array';

    protected $allowedFields    = [
        'designation',
        'prix',
        'quantite_stock'
    ];

    protected $useTimestamps = false;

    // Validation
    protected $validationRules = [
        'designation'    => 'required|min_length[2]',
        'prix'           => 'required|decimal',
        'quantite_stock' => 'required|integer'
    ];

    protected $validationMessages = [
        'designation' => [
            'required' => 'La désignation est obligatoire.'
        ],
        'prix' => [
            'required' => 'Le prix est obligatoire.'
        ],
        'quantite_stock' => [
            'required' => 'La quantité en stock est obligatoire.'
        ]
    ];
}