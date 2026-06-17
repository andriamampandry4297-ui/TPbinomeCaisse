<?php

namespace App\Models;

use CodeIgniter\Model;

class CaisseModel extends Model
{
    protected $table = 'caisses';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = [
        'numero_caisse'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'numero_caisse' => 'required'
    ];

    protected $validationMessages = [
        'numero_caisse' => [
            'required' => 'Le numéro de caisse est obligatoire.'
        ]
    ];
}