<?php

namespace Controllers;

use Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }
}
