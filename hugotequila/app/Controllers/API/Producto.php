<?php 

namespace App\Controllers\API;

use App\Models\ProductoModel;
use CodeIgniter\RESTful\ResourceController;

class Producto extends ResourceController
 
{ 
    public function __construct() {
        $this->model = $this->setModel(new ProductoModel());
    }

 
    public function index()
    {
        $productos = $this->model->findAll();
        return $this->respond($productos);
    }

 
    public function create()
    {
        try {
            $producto = $this->request->getJSON();
            if($this->model->insert($producto)):
                $producto->id = $this->model->insertID();
                return $this->respondCreated($producto);
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

            $productoVerificado = $this->model->find($id);
            if($productoVerificado == null)
            return $this->failNotFound('No se ha encontrado el producto con el id: '.$id);

            $producto = $this->request->getJSON();

            if($this->model->update($id, $producto)):
                $producto->id = $id;
                return $this->respondUpdated($producto);
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

            $productoVerificado = $this->model->find($id);
            if($productoVerificado == null)
            return $this->failNotFound('No se ha encontrado el producto con el id: '.$id);

            if($this->model->delete($id)): 
                return $this->respondDeleted($productoVerificado);
            else:
                return $this->failServerError('No se ha podido eliminar el registro');
            endif;

        } catch (\Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor');
        }
    }



}