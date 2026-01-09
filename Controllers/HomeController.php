<?php

namespace Controllers;

use Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
