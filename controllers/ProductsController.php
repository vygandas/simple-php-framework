<?php

class ProductsController extends Controller
{

    private $dataMock = array(
        array('name' => 'Loaf of white bread', 'price' => '1.10', 'delivery-time' => 'everyday'),
        array('name' => 'Loaf of brown bread', 'price' => '1.10', 'delivery-time' => 'everyday'),
        array('name' => 'Delicious cheese cake', 'price' => '5.99', 'delivery-time' => 'everyday'),
        array('name' => 'Delicious chocolate cake', 'price' => '5.99', 'delivery-time' => 'everyday'),
        array('name' => 'Box of chocolate cookies', 'price' => '2.69', 'delivery-time' => 'everyday'),
        array('name' => 'Wedding cake', 'price' => 'from 50.00', 'delivery-time' => 'on order')
    );

    public function index()
    {
        $this->viewBag->products = $this->dataMock;
        return $this->View();
    }

    public function details()
    {
        $this->viewBag->product = $this->dataMock[Request::Get("id")];
        return $this->View();
    }

}