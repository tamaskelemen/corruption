<?php
namespace frontend\components;

class Hero
{
    const MESZAROS_LORINC = 1;
    const ANDY_VAJNA = 2;
    const MATOLCSY = 3;

    public static function listValues($type, $value)
    {
        $items = [
            'name' => [
                self::MESZAROS_LORINC => 'Mészáros Lőrinc',
                self::ANDY_VAJNA => 'Andy Vajna',
                self::MATOLCSY => 'Matolcsy György',
            ],
        ];

        if (empty($value)){
            return $items[$type] ?? null;
        } elseif (!empty($value)) {
            return $items[$type][$value] ?? null;
        }
        return null;
    }
}