<?php

declare(strict_types=1);

namespace DMarkHub\DTOMapper;

class DTOFactory
{
    public static function create(string $classname, array $preparedData): object
    {
        $output = new $classname();

        foreach ($preparedData as $key => $value) {
            $output->{$key} = $value;
        }

        return $output;
    }
}
