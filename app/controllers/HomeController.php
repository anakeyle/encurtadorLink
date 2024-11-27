<?php

namespace App\controllers;

use App\models\Url;

class HomeController
{
    public function index()
    {
        echo '
        <form method="POST" action="/encurtar">
            <label for="url">Insira a URL:</label>
            <input type="text" id="url" name="url" required>
            <button type="submit">Encurtar</button>
        </form>';
    }
}
