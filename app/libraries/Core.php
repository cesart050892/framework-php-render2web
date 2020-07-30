<?php
class Core
{

    protected $UrlController = 'Home';
    protected $UrlActualMethod = 'index';
    protected $UrlParams = [];

    public function __construct()
    {
        //print_r($this->getUrl());
        $url = $this->getUrl();
        //print_r($url);

        //print_r('../app/controllers/' . ucwords($url[0]) . '.php');
        //return;

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->UrlController = ucwords($url[0]);

            print_r($url[0]);
            return;

            unset($url[0]);
        }
        //require_once '../app/controllers/' . $this->UrlController . 'php';
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim(($_GET['url']), '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}
