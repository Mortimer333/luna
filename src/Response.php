<?php declare(strict_types=1);

namespace Luna;

/**
 *
 */
class Response
{
    public static function new(bool $success, int $code, array $data = [])
    {
        http_response_code($code);
        header("Content-Type: application/json;charset=utf-8");
        return json_encode([
            "success" => $success,
            "data" => $data,
        ]);
    }
}
