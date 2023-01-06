<?php 

namespace App\Controllers\API;

use App\Models\VentaModel;
use CodeIgniter\RESTful\ResourceController;

class Venta extends ResourceController
 
{ 
    public function __construct() {
        $this->model = $this->setModel(new VentaModel());
    }

 
    public function index()
    {
        $ventas = $this->model->findAll();
        return $this->respond($ventas);
    }

 
    public function create()
    {
        try {
            $venta = $this->request->getJSON();
            if($this->model->insert($venta)):
                $venta->id = $this->model->insertID();
                return $this->respondCreated($venta);
            endif;
                return $this->failValidationErrors($this->model->validation->listErrors());
        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }


    public function update($id = null)
    {
        try {
            if ($id == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $ventaVerificado = $this->model->find($id);
            if($ventaVerificado == null)
            return $this->failNotFound('No se ha encontrado el venta con el id: '.$id);

            $venta = $this->request->getJSON();

            if($this->model->update($id, $venta)):
                $venta->id = $id;
                return $this->respondUpdated($venta);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete($id = null)
    {
        try {
            if ($id == null)
            return $this->failValidationErrors('No se ha pasado un ID valido');

            $ventaVerificada = $this->model->find($id);
            if($ventaVerificada == null)
            return $this->failNotFound('No se ha encontrado el venta con el id: '.$id);

            if($this->model->delete($id)): 
                return $this->respondDeleted($ventaVerificada);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }








}
