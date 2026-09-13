<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ProductController
 * 
 * Automatically generated via CLI.
namespace App\Controllers;

use App\Models\ProductModel;

*/
class ProductController extends Controller {
    public function index() {
        $model = new ProductModel();
        $products = $model->findAll();
        return $this->call->view('index', ['products' => $products]);
    }

    public function create() {
        return $this->call->view('create');
    }

    public function store() {
        $model = new ProductModel();
        $model->insert([
            'product_name' => $_POST['product_name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        ]);
        redirect('/products');
    }

    public function edit($id) {
        $model = new ProductModel();
        $product = $model->find($id);
        return $this->call->view('edit', ['product' => $product]);
    }

    public function update($id) {
        $model = new ProductModel();
        $model->update($id, [
            'product_name' => $_POST['product_name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        ]);
        redirect('/products');
    }

    public function delete($id) {
        $model = new ProductModel();
        $model->delete($id);
        redirect('/products');
    }
}