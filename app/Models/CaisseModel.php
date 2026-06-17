<?php

namespace App\Models;

use CodeIgniter\Model;

class CaisseModel extends Model
{
    protected $table = 'caisse';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = [
        'numero'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'numero' => 'required'
    ];

    protected $validationMessages = [
        'numero' => [
            'required' => 'Le numéro de caisse est obligatoire.'
        ]
    ];
}