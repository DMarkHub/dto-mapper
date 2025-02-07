<?php

namespace DMarkHub\DTOMapper\Tests;

use DMarkHub\DTOMapper\DTOMapper;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Bool\BoolNotNullable;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Bool\BoolNotNullableWithDefault;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Bool\BoolNullable;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Bool\BoolNullableWithDefault;
use PHPUnit\Framework\TestCase;

final class BoolDTOMapperTest extends TestCase
{
    private DTOMapper $mapper;

    public function setUp(): void
    {
        $this->mapper = new DTOMapper();
    }

    public function testNullable(): void
    {
        $data = $this->mapper->map(
            BoolNullable::class,
            json_decode(
                '{"isEmpty": true}',
                true
            )
        );

        $expected = new BoolNullable();
        $expected->isEmpty = true;

        $this->assertInstanceOf(BoolNullable::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNotNullable(): void
    {
        $data = $this->mapper->map(
            BoolNotNullable::class,
            json_decode(
                '{"isEmpty": true}',
                true
            )
        );

        $expected = new BoolNotNullable();
        $expected->isEmpty = true;

        $this->assertInstanceOf(BoolNotNullable::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNullableWithDefault(): void
    {
        $data = $this->mapper->map(
            BoolNullableWithDefault::class,
            json_decode(
                '{"isEmpty": true}',
                true
            )
        );

        $expected = new BoolNullableWithDefault();
        $expected->isEmpty = true;

        $this->assertInstanceOf(BoolNullableWithDefault::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNotNullableWithDefault(): void
    {
        $data = $this->mapper->map(
            BoolNotNullableWithDefault::class,
            json_decode(
                '{"isEmpty": true}',
                true
            )
        );

        $expected = new BoolNotNullableWithDefault();
        $expected->isEmpty = true;

        $this->assertInstanceOf(BoolNotNullableWithDefault::class, $data);
        $this->assertEquals($expected, $data);
    }
}
