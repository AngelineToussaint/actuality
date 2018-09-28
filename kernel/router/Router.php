<?php

class Router
{
    private $_currentUrl;
    private $_currentMethod;
    private $_routes = [];

    /**
     * Router constructor.
     * @param string $currentUrl
     * @param string $currentMethod
     */
    public function __construct($currentUrl, $currentMethod)
    {
        $this->_currentUrl = $currentUrl;
        $this->_currentMethod = $currentMethod;
    }

    /**
     * @return string
     */
    public function getCurrentUrl()
    {
        return $this->_currentUrl;
    }

    /**
     * @return string
     */
    public function getCurrentMethod()
    {
        return $this->_currentMethod;
    }

    /**
     * @return mixed
     */
    public function getRoutes()
    {
        return $this->_routes;
    }

    /**
     * @param mixed $route
     */
    public function setRoutes($route)
    {
        $this->_routes[] = $route;
    }

    /**
     * @param string $name
     * @param string $url
     * @param string $method
     * @param string $file
     * @param array $params
     */
    public function addRoute($name, $url, $method, $file, $params = [])
    {
        $route = new Route($name, $url, $method, $file, $params);
        $this->setRoutes($route);
    }

    public function run()
    {
        foreach ($this->_routes as $route)
        {
            if ($this->getCurrentUrl() == $route->getUrl() && $this->getCurrentMethod() == $route->getMethod())
            {
                $counterParams = 0;
                foreach ($route->getParams() as $param)
                {
                    if (array_key_exists($param, $_GET))
                    {
                        $counterParams++;
                    }
                }
                if ($counterParams == count($route->getParams()))
                {
                    include '../app/includes/header.php';
                    include $route->getFile();
                    include '../app/includes/footer.php';
                    die();
                }
            }
        }
    }
}