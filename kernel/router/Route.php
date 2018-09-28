<?php

class Route
{
    private $_name;
    private $_url;
    private $_method;
    private $_file;
    private $_params;

    /**
     * Route constructor.
     * @param string $name
     * @param string $url
     * @param string $method
     * @param string $file
     * @param string $params
     */
    public function __construct($name, $url, $method, $file, $params)
    {
        $this->_name = $name;
        $this->_url = trim($url,'/');
        $this->_method = strtoupper($method);
        $this->_file = '../app/' . $file;
        $this->_params = $params;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->_file;
    }

    /**
     * @return string
     */
    public function getParams()
    {
        return $this->_params;
    }
}