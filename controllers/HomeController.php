<?php

class HomeController extends Controller
{

    public function index()	
    {
        $this->viewBag->hellomessage = "Welcome to Ouvet Framework!";
        return $this->View();
    }

}
