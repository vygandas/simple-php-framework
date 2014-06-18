<?php

class UsersController extends Controller
{

    public function index()
    {
        $this->viewBag->hellomessage = "This is users page!";
        return $this->View();
    }
}
