<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'dogs';
    protected $guarded = false;

    CONST KENNEL_MYMONKEYDOG = 1;
    CONST KENNEL_OTHERS = 2;

    CONST SEX_MALE = 0;
    CONST SEX_FEMALE = 1;
    public static function getKennel()
    {
        return [
            self::KENNEL_MYMONKEYDOG => 'MyMonkeyDog',
            self::KENNEL_OTHERS => 'Другие'
        ];
    }

    public static function getSex()
    {
        return [
            'ru' => [
                self::SEX_MALE => 'Кобель',
                self::SEX_FEMALE => 'Сука'
            ],
            'en' => [
                self::SEX_MALE => 'Male',
                self::SEX_FEMALE => 'Female'
            ],
        ];
    }

}
