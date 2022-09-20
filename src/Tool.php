<?php declare(strict_types=1);

namespace Luna;

/**
 *
 */
abstract class Tool
{
    private const FIELDS = [
        "text" => '
            <div class="input-container {{class}}">
              <p class="label">{{label}}</p>
              <input type="text" name="{{name}}" value="" placeholder="{{label}}">
            </div>
        ',
        "date" => '
            <div class="input-container {{class}}">
              <p class="label">{{label}}</p>
              <input type="date" name="{{name}}" value="{{now}}" placeholder="{{label}}">
            </div>
        ',
        "number" => '
            <div class="input-container {{class}}">
              <p class="label">{{label}}</p>
              <input type="number" name="{{name}}" value="" min="{{min}}" max="{{max}}" placeholder="{{label}}">
            </div>
        ',
    ];

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

    public static function generateFormFields(array $formSchemat): string
    {
        $form = '';
        foreach ($formSchemat as $key => $value) {
            $form .= self::getField($key, $value);
        }
        return $form;
    }

    public static function getField($key, array $field): string
    {
        $fieldStr = '';
        if (is_string($key)) {
            $fieldStr .= "<div class='$key'>";
        }

        foreach ($field as $name => $value) {
            if (is_array($value)) {
                $fieldStr .= self::getField($name, $value);
                unset($field[$name]);
            }
        }

        if (empty($field)) {
            if (is_string($key)) {
                $fieldStr .= "</div>";
            }
            return $fieldStr;
        }

        $fieldStr .= self::generateField($field);
        if (is_string($key)) {
            $fieldStr .= "</div>";
        }
        return $fieldStr;
    }

    public static function generateField(array $field): string
    {
      if (!isset(self::FIELDS[$field['type']])) {
        throw new \Exception('Field type not found', 500);
      }
        $template = self::FIELDS[$field['type']];
        if ($field['type'] == 'date') {
            $field['now'] = date('Y-m-d');
        }
        foreach ($field as $key => $value) {
            $template = str_replace('{{' . $key . '}}', $value, $template);
        }
        return $template;
    }

    public static function getGalleryItems(): array
    {
        $iter = new \DirectoryIterator(self::getRoot() . '/public/media/assets/gallery');
        $files = [];
        foreach ($iter as $file) {
            if ($file->isDot()) {
                continue;
            }
            $files[] = self::getFile('media/assets/gallery/' . $file->getFilename());
        }
        natsort($files);
        return $files;
    }
}
