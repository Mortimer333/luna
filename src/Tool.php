<?php declare(strict_types=1);

namespace Luna;

/**
 *
 */
abstract class Tool
{
    /**
     * Returns file path with cache burst (modification date)
     * @param  string $filePath
     * @return string           Path to the file with cache burst
     */
    public static function getFile(string $filePath): string
    {
        $absolutePath = self::getRoot() . '/public/' . ltrim($filePath, '/');

        $filePath = rtrim(ASSET_PREFIX, '/') . '/' . ltrim($filePath, '/');
        if (is_file($absolutePath)) {
            return $filePath . '?burst=' . filemtime($absolutePath);
        }

        return $filePath;
    }

    public static function getRoot(): string
    {
        return dirname(__DIR__);
    }

    public static function getComponent(string $path): string
    {
        return self::getRoot() . '/src/components/' . rtrim($path, '.php') . '.php';
    }
}
