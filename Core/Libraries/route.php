<?php

namespace Core\Libraries;

class Route extends controller
{

    /*====== 
     * @Framework: SlimPHP
     * @Auther: Shakil Khan
     * @Licence: MIT
     * @Version: 1.0
     ======*/


    public $controller;
    public $method;
    public $params;
    public function __construct($default)
    {
        parent::__construct();
        // $whoops = new \Whoops\Run;
        // $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
        // $whoops->register();
        $this->controller = $default['controller'];
        $this->method = $default['method'];
        $this->params = $default['params'];
        $url = $this->Routing();
        // Make sure the $url is not empty
        if (!empty($url)) {
            if (file_exists("../App/Controllers/" . $url[0] . ".php")) {
                // replace default controller 
                $this->controller = $url[0];
                $contollerName = $url[0];
                // remove controller from the $url array
                unset($url[0]);
            } else {

                // trigger_error("$url[0].php is not found, check your controller file name", E_USER_ERROR);
                throw new \Exception("404: $url[0].php is not found, check your controller file name");
            }
        }

        // Include the controller file default controller OR user desired controller
        // require_once "../App/Controllers/" . $this->controller . ".php";
        // Instantiate controller class
        $this->controller = 'App\\Controllers\\' . $this->controller;
        $this->controller = new $this->controller;

        if (isset($url[1]) && !empty($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                // method found
                // replace default method 
                $this->method = $url[1];
                // remove method from the $url array
                unset($url[1]);
            } else {

                // echo $url[1];
                // trigger_error("$url[1] method is not found!", E_USER_ERROR);
                throw new \Exception("$url[1] is method not found in  $contollerName");
            }
        }

        if (isset($url)) {
            $this->params = $url;
        } else {
            $this->params = [];
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function Routing()
    {
        if (isset($_GET['url'])) {
            // get url
            $url = $_GET['url'];
            // trim spaces from the url
            $url = trim($url);
            // validate url remove illegal characters
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // split url on forward slashes
            $url = explode("/", $url);
            // return url
            return $url;
        }
    }
}
