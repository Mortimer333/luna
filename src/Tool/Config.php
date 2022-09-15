<?php declare(strict_types=1);

namespace Luna\Tool;

/**
 *
 */
abstract class Config
{
    public const URL = 'http://localhost';
    public const ASSET_PREFIX = '/luna/public';
    public const DESC = 'Hallo meine Name ist Marzena Stefaniak und ich bin gelernte und zertifizierte Hundefriseur. Ich bitte Pflege für kleine und grosse Hunde.';
    public const TITLE = 'Luna - Hundefriseur';
    public const SUBTITLE = 'Luna - Hundefriseur';
    public const CARD_GALLERY = [
        "media/assets/gallery-card/1.jpg",
        "media/assets/gallery-card/2.jpg",
        "media/assets/gallery-card/3.jpg",
        "media/assets/gallery-card/4.jpg",
        "media/assets/gallery-card/5.jpg",
        "media/assets/gallery-card/6.jpg",
    ];

    /**
     * Returns file path with cache burst (modification date)
     * @param  string $filePath
     * @return string           Path to the file with cache burst
     */
    public static function getFile(string $filePath): string
    {
        $absolutePath = self::getRoot() . '/public/' . ltrim($filePath, '/');
        $filePath = rtrim(self::ASSET_PREFIX, '/') . '/' . ltrim($filePath, '/');
        if (is_file($absolutePath)) {
            return $filePath . '?burst=' . filemtime($absolutePath);
        }
        return $filePath;
    }

    public static function getRoot(): string
    {
        return dirname(dirname(__DIR__));
    }
}
