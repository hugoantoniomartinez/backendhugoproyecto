<?php namespace App\Models;

use CodeIgniter\Model;
 
class CatalogoModel extends Model 
{
    protected $table            = 'catalogo';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['stock', 'disponible'];

    protected $validationRules  = [
        
        'stock'        => 'required|numeric|min_length[1]|max_length[10]',
        'disponible'        => 'required|numeric|min_length[1]|max_length[10]',
    ];

    protected $validationMessages = [

    ];
  
    protected $skypValidation = false;
}