<?php

namespace app\controllers;

use app\Router;

class ProductController
{
    static function index(Router $router)
    {
        $products = $router->db->getProducts();

        echo '<pre>';
        print_r($products);
        echo '</pre>';

        $router->renderView('products/index', ['products' => $products]);
    }

    public function create()
    {
        echo 'Create page';
    }

    public function update()
    {
        echo 'Update page';
    }

    public function delete()
    {
        echo 'Delete page';
    }
}
