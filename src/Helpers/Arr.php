<?php

namespace Spatie\Url\Helpers;

class Arr
{
    public static function map(array $items, callable $callback): array
    {
        $keys = array_keys($items);

        $items = array_map($callback, $items, $keys);

        return array_combine($keys, $items);
    }

    public static function mapToAssoc(array $items, callable $callback): array
    {
        return array_reduce($items, function (array $assoc, $item) use ($callback): array {
            [$key, $value] = $callback($item);
            $assoc[$key] = $value;

            return $assoc;
        }, []);
    }
}
