<?php 

namespace App\Controllers\API;

use App\Models\CompradorModel;
use CodeIgniter\RESTful\ResourceController;

class Comprador extends ResourceController
 
{ 
    public function __construct() {
        $this->model = $this->setModel(new CompradorModel());
    }

 
    public function index()
    {
        $compradores = $this->model->findAll();
        return $this->respond($compradores);
    }

 
    public function create()
    {
        try {
            $comprador = $this->request->getJSON();
            if($this->model->insert($comprador)):
                $comprador->id = $this->model->insertID();
                return $this->respondCreated($comprador);
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

            $compradorVerificado = $this->model->find($id);
            if($compradorVerificado == null)
            return $this->failNotFound('No se ha encontrado el comprador con el id: '.$id);

            $comprador = $this->request->getJSON();

            if($this->model->update($id, $comprador)):
                $comprador->id = $id;
                return $this->respondUpdated($comprador);
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

            $compradorVerificado = $this->model->find($id);
            if($compradorVerificado == null)
            return $this->failNotFound('No se ha encontrado el comprador con el id: '.$id);

            if($this->model->delete($id)): 
                return $this->respondDeleted($compradorVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

}