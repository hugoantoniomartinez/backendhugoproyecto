<?php namespace App\Models;

use CodeIgniter\Model;
 
class VentaModel extends Model 
{
    protected $table            = 'venta';
    protected $primaryKey       = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['fecha', 'cantidad', 'total', 'numeroventa', 'id_trabajador', 'id_producto', 'id_comprador'];

    protected $validationRules  = [
        'fecha'        => 'required|min_length[1]|max_length[100]',
        'cantidad'           => 'required|numeric|min_length[1]|max_length[10]',
        'total'        => 'required|numeric|min_length[1]|max_length[10]',
        'numeroventa'        => 'required|numeric|min_length[1]|max_length[10]',
        'id_trabajador'        => 'required|numeric|min_length[1]|max_length[10]',
        'id_producto'        => 'required|numeric|min_length[1]|max_length[10]',
        'id_comprador'        => 'required|numeric|min_length[1]|max_length[10]',
    ];

    protected $validationMessages = [

    ];
  
    protected $skypValidation = false;
}