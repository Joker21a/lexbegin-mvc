<?php


namespace app\lib;

/**
 * Class Router
 * @package lib
 */
class Router
{
    /** @var string */
    const CONTROLLER = "Controller";

    /** @var string $module */
    protected string $module = 'Index';
    /** @var string $controller */
    protected string $controller = 'Index';
    /** @var string $action */
    protected string $action = 'Index';
    /** @var array $url */
    protected array $url;
    /** @var string $routeClass */
    protected string $routeClass;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        if (isset($_GET["url"])) {
            $this->url = explode("/", $_GET["url"]);
            $this->cleanUrl();
        }
        $this->find();
    }

    /**
     * This functions load the class that needed for the url.
     */
    public function load(): void
    {
        $class = new $this->routeClass();
        $class->execute();
    }

    /**
     * This functions clean up the url for empty strings.
     */
    private function cleanUrl(): void
    {
        $this->url = array_filter($this->url);
        if (isset($this->url[1]) && strlen($this->url[1])) {
            $this->module = $this->url[1];
            unset($this->url[1]);
        }

        if (isset($this->url[2]) && strlen($this->url[2])) {
            $this->controller = $this->url[2];
            unset($this->url[2]);
        }

        if (isset($this->url[3]) && strlen($this->url[3])) {
            $this->action = $this->url[3];
            unset($this->url[3]);
        }
    }

    /**
     * This functions find the class with the action from the url.
     */
    private function find(): void
    {
        $path = SRC . $this->module . DS . self::CONTROLLER . DS . $this->controller . DS . $this->action . ".php";
        if (file_exists($path)) {
            $this->routeClass = "\app\src\\" . $this->module . "\\" . self::CONTROLLER . "\\" . $this->controller . "\\" . $this->action;
        } else {
            throw new \Error("The page was not found", 404);
        }
    }
}