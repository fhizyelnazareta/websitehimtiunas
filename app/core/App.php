<?php

class App
{
    // property untuk controller, method dan parameter
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    // function __contruct()
    public function __construct()
    {
        $url = $this->parseURL();
        // controller
        // mengambil controller default yaitu home
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            // mengambil property controller pada class App
            $this->controller = $url[0];
            // mengambil controller dengan memotong url index[0]
            unset($url[0]);
        }
        // instansiasi controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params atau parameter
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Jalankan controller dan method serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    // method parseURL()
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // memotong tanda '/' pada url
            $url = rtrim($_GET['url'], '/');
            // membersihkan url dari character aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // memecah url dengan explode
            $url = explode('/', $url);
            return $url;
        }
    }
}
