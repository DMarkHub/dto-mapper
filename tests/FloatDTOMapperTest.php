<?php

namespace DMarkHub\DTOMapper\Tests;

use DMarkHub\DTOMapper\DTOMapper;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Float\FloatNotNullable;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Float\FloatNotNullableWithDefault;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Float\FloatNullable;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\Float\FloatNullableWithDefault;
use PHPUnit\Framework\TestCase;

final class FloatDTOMapperTest extends TestCase
{
    const JSON_DATA = '{"price":0.99}';


    private DTOMapper $mapper;

    public function setUp(): void
    {
        $this->mapper = new DTOMapper();
    }

    public function testPositive(): void
    {
        $data = $this->mapper->map(
            FloatNullable::class,
            json_decode(
                self::JSON_DATA,
                true
            )
        );

        $expected = new FloatNullable();
        $expected->price = 0.99;

        $this->assertInstanceOf(FloatNullable::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNullable(): void
    {
        $data = $this->mapper->map(
            FloatNullable::class,
            json_decode(
                '{}',
                true
            )
        );

        $expected = new FloatNullable();
        $expected->price = null;

        $this->assertInstanceOf(FloatNullable::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNotNullable(): void
    {
        $data = $this->mapper->map(
            FloatNotNullable::class,
            json_decode(
                self::JSON_DATA,
                true
            )
        );

        $expected = new FloatNotNullable();
        $expected->price = 0.99;

        $this->assertInstanceOf(FloatNotNullable::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNullableWithDefault(): void
    {
        $data = $this->mapper->map(
            FloatNullableWithDefault::class,
            json_decode(
                '{}',
                true
            )
        );

        $expected = new FloatNullableWithDefault();
        $expected->price = 0.99;

        $this->assertInstanceOf(FloatNullableWithDefault::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNotNullableWithDefault(): void
    {
        $data = $this->mapper->map(
            FloatNotNullableWithDefault::class,
            json_decode(
                '{}',
                true
            )
        );

        $expected = new FloatNotNullableWithDefault();
        $expected->price = 0.99;

        $this->assertInstanceOf(FloatNotNullableWithDefault::class, $data);
        $this->assertEquals($expected, $data);
    }
}
