<?php

namespace Core;

class Router
{
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];

        switch ($url) {
            case '/':
                $controllerName = 'App\controllers\HomeController';
                $actionName = 'index';
                break;
            case '/encurtar':
                $controllerName = 'App\controllers\UrlController';
                $actionName = 'encurtar';
                break;
            default:
                http_response_code(404);
                echo "Página não encontrada!";
                exit;
            case '/' . $_SESSION['slink']:
                 $controllerName = 'App\controllers\UrlController';
                 $actionName = 'longUrl';
              break;
             //Adicionar novas rotas aqui....

        }

        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $actionName)) {
                $controller->$actionName();
            } else {
                echo "Método '$actionName' não encontrado no controller '$controllerName'!";
            }
        } else {
            echo "Controller '$controllerName' não encontrado!";
        }
    }
}