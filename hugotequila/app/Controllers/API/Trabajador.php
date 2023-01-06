<?php 

namespace App\Controllers\API;

use App\Models\TrabajadorModel;
use CodeIgniter\RESTful\ResourceController;

class Trabajador extends ResourceController
 
{ 
    public function __construct() {
        $this->model = $this->setModel(new TrabajadorModel());
    }

 
    public function index()
    {
        $trabajadores = $this->model->findAll();
        return $this->respond($trabajadores);
    }

 
    public function create()
    {
        try {
            $trabajador = $this->request->getJSON();
            if($this->model->insert($trabajador)):
                $trabajador->id = $this->model->insertID();
                return $this->respondCreated($trabajador);
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

            $trabajadorVerificado = $this->model->find($id);
            if($trabajadorVerificado == null)
            return $this->failNotFound('No se ha encontrado el trabajador con el id: '.$id);

            $trabajador = $this->request->getJSON();

            if($this->model->update($id, $trabajador)):
                $trabajador->id = $id;
                return $this->respondUpdated($trabajador);
            else:
                return $this->failValidationErrors($this->model->validation->listErrors());
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

    public function delete ($id = null)
    {
        try {
            if ($id == null)
            return $this->failValidationErrors('No se ha pasado un id valido');

            $trabajadorVerificado = $this->model->find($id);
            if($trabajadorVerificado == null)
            return $this->failNotFound('No se ha encontrado el comprador con el id: '.$id);
            if($this->model->delete($id)): 
                return $this->respondDeleted($trabajadorVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }

}