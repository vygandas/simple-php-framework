<?php

Routes::Add("/", "index@HomeController", Routes::GET, "home");
Routes::Add("/products", "index@ProductsController", Routes::GET, "products_list");
Routes::Add("/products/details/{id}", "details@ProductsController", Routes::GET, "product_details");
Routes::Add("/users", "index@UsersController", Routes::GET, "users");
Routes::Add("/users", "index@UsersController", Routes::POST, "users");