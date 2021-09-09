<?php 
namespace VthSupport\Enums;
class BaseEnum {
    private static $constCaches = NULL;
    private function __construct(){}
    public static function getConstants() {
        if (self::$constCaches == NULL) {
            self::$constCaches = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCaches)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCaches[$calledClass] = $reflect->getConstants();
        }
        return self::$constCaches[$calledClass];
    }
    public static function isValidName($name, $strict = false) {
        $constants = self::getConstants();
        if ($strict) {
            return array_key_exists($name, $constants);
        }
        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }
    public static function isValidValue($value) {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict = true);
    }
}