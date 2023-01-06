<?php namespace App\Models;

use CodeIgniter\Model;
 
class ProductoModel extends Model 
{
    protected $table            = 'producto';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre', 'precio', 'categoria', 'proveedor', 'id_catalogo'];

    protected $validationRules  = [
        'nombre'        => 'required|min_length[1]|max_length[100]',
        'precio'           => 'required|min_length[1]|max_length[100]',
        'categoria'        => 'required|min_length[1]|max_length[100]',
        'proveedor'        => 'required|min_length[1]|max_length[100]',
        'id_catalogo'        => 'required|numeric|min_length[1]|max_length[10]',
    ];

    protected $validationMessages = [

    ];
  
    protected $skypValidation = false;
}