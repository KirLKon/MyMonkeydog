<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Termwind\renderUsing;

class Puppy extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'puppies';
    protected $guarded = false;

    const COLOR_BLACK = 'black';
    const COLOR_RED = 'red';
    const COLOR_BLUE = 'blue';
    const COLOR_GREY = 'grey';
    const COLOR_GREEN = 'green';
    const COLOR_ORANGE = 'orange';
    const COLOR_YELLOW = 'yellow';
    const COLOR_PURPLE = 'purple';
    const COLOR_LIME = 'lime';
    const COLOR_ROSE = '#ffd1dc';

    public static function puppyColors()
    {
        return [
            'ru' => [
                self::COLOR_BLACK => 'Черный',
                self::COLOR_RED => 'Красный',
                self::COLOR_BLUE => 'Синий',
                self::COLOR_GREY => 'Серый',
                self::COLOR_GREEN => 'Зеленый',
                self::COLOR_ORANGE => 'Оранжевый',
                self::COLOR_YELLOW => 'Желтый',
                self::COLOR_PURPLE => 'Фиолетовый',
                self::COLOR_LIME => 'Лайм',
                self::COLOR_ROSE => 'Розовый'
            ],
            'en' => [
                self::COLOR_BLACK => 'Black',
                self::COLOR_RED => 'Red',
                self::COLOR_BLUE => 'Blue',
                self::COLOR_GREY => 'Grey',
                self::COLOR_GREEN => 'Зеленый',
                self::COLOR_ORANGE => 'Green',
                self::COLOR_YELLOW => 'Yellow',
                self::COLOR_PURPLE => 'Purple',
                self::COLOR_LIME => 'Lime',
                self::COLOR_ROSE => 'Rose'
            ]
        ];
    }

    public function puppy_images() :HasMany
    {
        return $this->hasMany(PuppyImage::class);
    }

    public function get_litter(): BelongsTo
    {
        return $this->belongsTo(Litter::class,'litter_id');
    }

    public function puppy_additional_images(): HasMany
    {
        return $this->hasMany(PuppyImage::class);
    }

}
