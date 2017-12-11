<?php

namespace Enum;

/**
 * Class Enum
 */
abstract class Enum
{
    /**
     * @var array
     */
    protected static $constants = [];

    /**
     * @var mixed
     */
    private $value;

    /**
     * Enum constructor.
     *
     * @param mixed $value
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        if (!static::isValid($value)) {
            throw new \InvalidArgumentException("'$value' is not part of the enum " . get_called_class());
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    final public function value()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public static function isValid($value)
    {
        return in_array($value, static::toArray(), true);
    }

    /**
     * @return array
     */
    public static function toArray()
    {
        $className = get_called_class();

        if (!array_key_exists($className, static::$constants)) {
            $reflection = new \ReflectionClass($className);
            $constants  = $reflection->getConstants();

            static::$constants[$className] = $constants;
        }

        return static::$constants[$className];
    }

    /**
     * @return array
     */
    public static function keys()
    {
        return array_keys(static::toArray());
    }

    /**
     * @return array
     */
    public static function values()
    {
        return array_values(static::toArray());
    }

    /**
     * @param string $name
     * @param array  $arguments
     * @return static
     * @throws \BadMethodCallException
     */
    public static function __callStatic($name, $arguments)
    {
        $constants = static::toArray();

        if (array_key_exists($name, $constants)) {
            return new static($constants[$name]);
        }

        throw new \BadMethodCallException("No static method '$name' in class " . get_called_class());
    }

    /**
     * @return string
     */
    final public function __toString()
    {
        return (string)$this->value;
    }
}
