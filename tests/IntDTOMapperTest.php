<?php

namespace DMarkHub\DTOMapper\Tests;

use DMarkHub\DTOMapper\DTOMapper;
use PHPUnit\Framework\TestCase;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Int\IntNotNullable;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Int\IntNotNullableWithDefault;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Int\IntNullable;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Int\IntNullableWithDefault;

final class IntDTOMapperTest extends TestCase
{
    private DTOMapper $mapper;

    public function setUp(): void
    {
        $this->mapper = new DTOMapper();
    }

    public function testNullable(): void
    {
        $data = $this->mapper->map(
            IntNullable::class,
            json_decode(
                '{"name": "Name"}',
                true
            )
        );

        $expected = new IntNullable();
        $expected->id = null;

        $this->assertInstanceOf(IntNullable::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNotNullable(): void
    {
        $data = $this->mapper->map(
            IntNotNullable::class,
            json_decode(
                '{"id": 1}',
                true
            )
        );

        $expected = new IntNotNullable();
        $expected->id = 1;

        $this->assertInstanceOf(IntNotNullable::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNullableWithDefault(): void
    {
        $data = $this->mapper->map(
            IntNullableWithDefault::class,
            json_decode(
                '{"name": "Name"}',
                true
            )
        );

        $expected = new IntNullableWithDefault();
        $expected->id = 11;

        $this->assertInstanceOf(IntNullableWithDefault::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNotNullableWithDefault(): void
    {
        $data = $this->mapper->map(
            IntNotNullableWithDefault::class,
            json_decode(
                '{"name": "Name"}',
                true
            )
        );

        $expected = new IntNotNullableWithDefault();
        $expected->id = 10;

        $this->assertInstanceOf(IntNotNullableWithDefault::class, $data);
        $this->assertEquals($expected, $data);
    }
}