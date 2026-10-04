<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->database();
        $this->call->model('ProductModel');
        $this->call->library('auth'); // authentication middleware
    }

    public function index() {
        $this->auth->check();
        $this->call->view('products', [
            'products' => $this->ProductModel->all(),
        ]);
    }

    public function store() {
        $this->auth->check();
        $id = $this->ProductModel->insert($this->request->post());
        if ($id === false) {
            $this->response->send_json_error('Unable to add product.', 422);
            return;
        }

        $this->response->send_json_success(['id' => $id], 'Product added successfully', 201);
    }

    public function update($id) {
        $this->auth->check();
        $updated = $this->ProductModel->update($id, $this->request->put());
        if ($updated === false) {
            $this->response->send_json_error('No valid product fields provided.', 422);
            return;
        }

        $this->response->send_json_success(null, 'Product updated successfully');
    }

    public function delete($id) {
        $this->auth->check();
        $this->ProductModel->delete($id);
        $this->response->send_json_success(null, 'Product deleted successfully');
    }
}
