<?php
namespace App\Core;

class Router {

    public function dispatcher(){

        $uri = $_SERVER['REQUEST_URI'];

        
        $response = $this->resolveURI($uri);
        $this->execute($response);
    }

    public function resolveURI($uri){
       
        if($uri === '/'){
            return[
                'controller' =>'AuthController',
                'method' => 'index'
            ];
        }

        $arrayuri = explode('/', $uri);
        $controller = $arrayuri[2];
        $method = $arrayuri[3];
      
        $controller = ucfirst($controller). 'Controller';
        // var_dump($controller);
        // var_dump($method);

        return [
            'controller' => $controller,
            'method'  => $method
        ];
    }

    public function execute($response){

        $controller = '\App\Controllers\\' .$response['controller'];
    //    var_dump($controller);
        $controller = new $controller();
        

        return call_user_func(array($controller, $response['method']));
    }
}