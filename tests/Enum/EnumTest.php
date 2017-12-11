<?php

use PHPUnit\Framework\TestCase;
use Enum\Enum;

/**
 * Class DummyEnum
 * @method static DummyEnum DUMMY()
 * @method static DummyEnum DUMMY_ANOTHER()
 */
final class DummyEnum extends Enum
{
    const DUMMY         = 'dummyValue';
    const DUMMY_ANOTHER = 'dummyValueAnother';
}

/**
 * Class EnumTest
 *
 * @package Tests\Bag
 */
class EnumTest extends TestCase
{
    /**
     * @test
     */
    public function EnumCanAccessConstValue()
    {
        $this->assertSame('dummyValue', DummyEnum::DUMMY);
        $this->assertSame('dummyValueAnother', DummyEnum::DUMMY_ANOTHER);
    }

    /**
     * @test
     */
    public function StaticMethodReturnsEnumObject()
    {
        $this->assertInstanceOf(DummyEnum::class, DummyEnum::DUMMY());
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function throwExceptionIfUnexpectedConstantValue()
    {
        $dummy = new DummyEnum('InvalidValue');
    }

    /**
     * @test
     */
    public function valueMethodReturnsConstantValue()
    {
        $dummy = new DummyEnum(DummyEnum::DUMMY);
        $this->assertSame('dummyValue', $dummy->value());
    }

    /**
     * @test
     */
    public function isValidMethodReturnsExistsConstants()
    {
        $this->assertTrue(DummyEnum::isValid(DummyEnum::DUMMY));
    }

    /**
     * @test
     */
    public function toArrayMethodReturnsAllConstants()
    {
        $this->assertEquals([
            'DUMMY'         => 'dummyValue',
            'DUMMY_ANOTHER' => 'dummyValueAnother',
        ], DummyEnum::toArray());
    }

    /**
     * @test
     */
    public function valuesMethodReturnsAllConstantsValues()
    {
        $this->assertEquals([
            'dummyValue',
            'dummyValueAnother',
        ], DummyEnum::values());
    }

    /**
     * @test
     */
    public function keysMethodReturnsAllConstantsKeys()
    {
        $this->assertEquals([
            'DUMMY',
            'DUMMY_ANOTHER',
        ], DummyEnum::keys());
    }

    /**
     * @test
     */
    public function toStringMethodReturnsStringValue()
    {
        $dummy = new DummyEnum(DummyEnum::DUMMY);
        $this->assertSame('dummyValue', (string)$dummy);
    }
}
