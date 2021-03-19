<?php


namespace Kl;


abstract class TableModel
{

    private static $instances = [];

    protected function __construct() { }


    protected function __clone() { }


    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): self
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}
