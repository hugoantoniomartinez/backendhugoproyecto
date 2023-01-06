<?php namespace App\Models;

use CodeIgniter\Model;
 
class TrabajadorModel extends Model 
{
    protected $table            = 'trabajador';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre', 'apellido', 'cargo', 'edad', 'telefono'];

    protected $validationRules  = [
        'nombre'        => 'required|min_length[1]|max_length[100]',
        'apellido'           => 'required|min_length[1]|max_length[100]',
        'cargo'        => 'required|min_length[1]|max_length[100]',
        'edad'        => 'required|numeric|min_length[1]|max_length[10]',
        'telefono'        => 'required|numeric|min_length[1]|max_length[10]',
    ];

    protected $validationMessages = [

    ];
  
    protected $skypValidation = false;
}