<?php


namespace app\lib;

/**
 * Class App
 * @package lib
 */
class App
{
    protected Router $router;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        $this->router->load();
    }
}