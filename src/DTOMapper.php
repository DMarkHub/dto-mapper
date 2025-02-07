<?php

declare(strict_types=1);

namespace DMarkHub\DTOMapper;

use ReflectionClass;
use ReflectionProperty;

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

            $preparedData[$name] = self::filterValue($property, $value);
        }

        return DTOFactory::create($classname, $preparedData);
    }

    private static function filterValue(ReflectionProperty $reflectionProperty, mixed $value): mixed
    {
        return match ($reflectionProperty->getType()->getName()) {
            'string' => filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            default => $value,
        };
    }
}
