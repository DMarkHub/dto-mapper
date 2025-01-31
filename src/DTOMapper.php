<?php

use function PHPSTORM_META\type;

class DTOMapper
{
    public static function map(string $classname, string $json): object
    {
        $dto = new $classname();
        $decoded = json_decode($json, true);

        $dto = self::resolve($dto, $decoded);

        // foreach ($ref->getProperties() as $property) {

        //     $type = $property->getType();
        //     var_dump($type);
        //     $name = $property->getName();

        //     if ($type instanceof ReflectionNamedType) {
        //         $typeName = $type->getName();
        //         $typeValue = $decoded[$name] ?? null;
        //         var_dump($typeName);
        //         var_dump($typeValue);

        //         $dto->{$name} = self::parse($typeName, $typeValue);
        //     }
        // }

        return $dto;
    }

    public static function resolve(object $object, array $array): object
    {
        $reflection = new ReflectionClass($object);
        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            $propertyType = $property->getType();
            $propertyName = $property->getName();
            $defaultValue = $property->getDefaultValue();
            $jsonValue = $array[$propertyName] ?? null;

            if ($jsonValue === null) {
                continue;
            }

            if ($propertyType instanceof ReflectionNamedType) {
                var_dump($propertyType->getName());
                $object->{$propertyName} = match ($propertyType->getName()) {
                    'string' => (string) $jsonValue,
                    'int' => (int) $jsonValue,
                    default => $defaultValue
                };
            } elseif ($propertyType instanceof ReflectionUnionType) {

            } else {

            }
        }

        return $object;
    }

    private static function parse(string $type, mixed $value): mixed
    {
        if ($value === null) {
            return null;
        }

        // if ($value is_scalar())

        return match ($type) {
            'string' => (string) $value,
            'int' => (int) $value,
            default => null,
        };
    }
}



class TestDTO
{
    public int|string|null $id;
    public ?string $name;

    public TestDTO $child;
}

var_dump(json_decode('{
  "price-check": "Artm",
  "a": [ {"id": 1, "name": "Name"} ]
}
', true));
die;

$result = DTOMapper::map(TestDTO::class, '{"id":1, "name": "Test name", "child": {"id":2, "name":"child"}}');
var_dump($result);