<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: ProductModel
 * 
 * Automatically generated via CLI.
 */
class ProductModel extends Model {
    protected $table = 'products';
    protected $primary_key = 'id';
    protected $fillable = [];
    protected $guarded = ['id'];
    protected $allowedFields = ['product_name', 'description', 'price', 'quantity', 'created_at'];

    public function __construct()
    {
        parent::__construct();
    }
}