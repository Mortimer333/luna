<?php declare(strict_types=1);

namespace Luna;

use Luna\Tool;

/**
 *
 */
class Kernel
{
    function __construct()
    {
        $this->setupConfig();
    }

    protected function setupConfig()
    {
        $root = Tool::getRoot();
        $envPath = $root . '/.env.php';

        if (!is_file($envPath)) {
            throw new \Exception("Config file doesn't exist", 500);
        }

        $env = require_once $envPath;

        if (!is_array($env)) {
            throw new \Exception('Config file is not returning an array', 500);
        }

        $envLocalPath = $root . '/.env.local.php';
        if (is_file($envLocalPath)) {
            $envLocal = require_once $envLocalPath;

            if (!is_array($envLocal)) {
                throw new \Exception('Local config file is not returning an array', 500);
            }

            $env = array_merge($env, $envLocal);
        }

        foreach ($env as $key => $value) {
            define($key, $value);
        }
    }
}
