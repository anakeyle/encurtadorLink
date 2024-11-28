<?php

namespace App\controllers;

use Core\Controller;
use App\models\Url;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('/home/link');
    }

}
