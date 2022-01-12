<?php
class Route{
    private  $_uri = NULL;
    public function __construct($route) {
        if($this->_uri == NULL)$this->_uri = $route;
        $this->submit();
    }
    protected function submit() {
    $url = (isset($_REQUEST['url']) && $_REQUEST['url'] != "") ? $_REQUEST['url'] : 'login';
        foreach ($this->_uri as $key => $value){
            if(preg_match("#^$key$#" , $url)){
                include $this->_uri[$key];
                new $key();
            }
        }
    }
}