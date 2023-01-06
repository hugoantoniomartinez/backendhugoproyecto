<?php 

namespace App\Controllers\API;

use App\Models\CatalogoModel;
use CodeIgniter\RESTful\ResourceController;

class Catalogo extends ResourceController
 
{ 
    public function __construct() {
        $this->model = $this->setModel(new CatalogoModel());
    }

 
    public function index()
    {
        $catalogos = $this->model->findAll();
        return $this->respond($catalogos);
    }

 
    public function create()
    {
        try {
            $catalogo = $this->request->getJSON();
            if($this->model->insert($catalogo)):
                $catalogo->id = $this->model->insertID();
                return $this->respondCreated($catalogo);
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

            $catalogoVerificado = $this->model->find($id);
            if($catalogoVerificado == null)
            return $this->failNotFound('No se ha encontrado el catalogo con el id: '.$id);

            $catalogo = $this->request->getJSON();

            if($this->model->update($id, $catalogo)):
                $catalogo->id = $id;
                return $this->respondUpdated($catalogo);
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

            $catalogoVerificado = $this->model->find($id);
            if($catalogoVerificado == null)
            return $this->failNotFound('No se ha encontrado el catalogo con el id: '.$id);

            if($this->model->delete($id)): 
                return $this->respondDeleted($catalogoVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }
}