<?php

declare(strict_types=1);

namespace DMarkHub\DTOMapper;

use ReflectionClass;
use RuntimeException;

class DTOMapper
{
    public static function map(string $classname, array $data): object
    {
        $reflection = new ReflectionClass($classname);
        $preparedData = [];

        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            $name = $property->getName();
            $value = $data[$name] ?? $property->getDefaultValue();

            // if ($value === null && !$property->getType()->allowsNull()) {
            //     throw new RuntimeException(sprintf('%s property of %s class cannot be null', $name, $classname));
            // }

            // if ($value && $property->getType()->isBuiltin()) {
            //     $value = match ($property->getType()->getName()) {
            //         'int' => (int) $value,
            //         'float' => (float) $value,
            //         'string' => (string) $value,
            //         'bool' => (bool) $value,
            //     };
            // }

            $preparedData[$name] = $value;
        }

        return DTOFactory::create($classname, $preparedData);
    }
}