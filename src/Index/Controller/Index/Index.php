<?php

namespace app\src\Index\Controller\Index;

use app\lib\Interfaces\ControllerInterface;

/**
 * Class Index
 * @package app\src\Index\Controller\Index
 */
class Index implements ControllerInterface
{
    public function execute()
    {
        echo "Index Controller";
    }
}