<?php

namespace DMarkHub\DTOMapper\Tests;

use DMarkHub\DTOMapper\DTOMapper;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\String\StringNotNullable;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\String\StringNotNullableWithDefault;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\String\StringNullable;
use DMarkHub\DTOMapper\Tests\Class\BuiltIn\Scalar\String\StringNullableWithDefault;
use PHPUnit\Framework\TestCase;

final class StringDTOMapperTest extends TestCase
{
    private DTOMapper $mapper;

    public function setUp(): void
    {
        $this->mapper = new DTOMapper();
    }

    public function testNullable(): void
    {
        $data = $this->mapper->map(
            StringNullable::class,
            json_decode(
                '{"name": "Name"}',
                true
            )
        );

        $expected = new StringNullable();
        $expected->name = 'Name';

        $this->assertInstanceOf(StringNullable::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNotNullable(): void
    {
        $data = $this->mapper->map(
            StringNotNullable::class,
            json_decode(
                '{"name": "Name"}',
                true
            )
        );

        $expected = new StringNotNullable();
        $expected->name = 'Name';

        $this->assertInstanceOf(StringNotNullable::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNullableWithDefault(): void
    {
        $data = $this->mapper->map(
            StringNullableWithDefault::class,
            json_decode(
                '{"name": "Name"}',
                true
            )
        );

        $expected = new StringNullableWithDefault();
        $expected->name = 'Name';

        $this->assertInstanceOf(StringNullableWithDefault::class, $data);
        $this->assertEquals($expected, $data);
    }

    public function testNotNullableWithDefault(): void
    {
        $data = $this->mapper->map(
            StringNotNullableWithDefault::class,
            json_decode(
                '{"name": "Name"}',
                true
            )
        );

        $expected = new StringNotNullableWithDefault();
        $expected->name = 'Name';

        $this->assertInstanceOf(StringNotNullableWithDefault::class, $data);
        $this->assertEquals($expected, $data);
    }
}
