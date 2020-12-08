<?php

namespace App\Constants;

use Illuminate\Support\Str;
use ReflectionClass;

abstract class AbstractAppConstant implements AppConstantInterface
{
    /**
     * @return array
     */
    public static function all(): array
    {
        $constants = collect((new ReflectionClass(static::class))->getConstants());
        $values = collect();
        $constants->each(
            static function ($constant, $index) use ($values) {
                $values->put($constant, Str::title(str_replace('_', ' ', $index)));
            }
        );

        return $values->toArray();
    }

    /**
     * @param  string $name
     * @return string
     */
    public static function getTitle(string $name): string
    {
        $constants = static::all();

        return $constants[$name];
    }

    public static function allValues()
    {
        $constants = collect((new ReflectionClass(static::class))->getConstants());
        $values = collect();
        $constants->each(
            static function ($constant, $index) use ($values) {
                $values->put($index, $constant);
            }
        );

        return $values->toArray();
    }
}
