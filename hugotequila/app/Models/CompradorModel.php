<?php namespace App\Models;

use CodeIgniter\Model;
 
class CompradorModel extends Model 
{
    protected $table            = 'comprador';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre', 'apellido', 'telefono'];

    protected $validationRules  = [
        'nombre'        => 'required|min_length[1]|max_length[100]',
        'apellido'           => 'required|min_length[1]|max_length[100]',
        'telefono'        => 'required|numeric|min_length[1]|max_length[10]',
    ];

    protected $validationMessages = [

    ];
  
    protected $skypValidation = false;
}