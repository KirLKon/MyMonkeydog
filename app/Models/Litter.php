<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\CollectionModify;
use function Termwind\renderUsing;

class Litter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'litters';
    protected $guarded = false;

    CONST IN_ROW_2 = 2;
    CONST IN_ROW_3 = 3;
    CONST IN_ROW_4 = 4;

    public static function inRowStyle()
    {
        return [
            self::IN_ROW_2 => 'span6',
            self::IN_ROW_3 => 'span4',
            self::IN_ROW_4 => 'span3'
        ];
    }


    public function getSirDog() :HasOne
    {
        return $this->hasOne(Dog::class,'id','sir_dog_id');
    }

    public function getDamDog() :HasOne
    {
        return $this->hasOne(Dog::class,'id','dam_dog_id');
    }

    public function get_puppies() :HasMany
    {
        return $this->hasMany(Puppy::class);
    }

    public function get_litter_in_row_style()
    {
        return self::inRowStyle()[$this->in_row];
    }
}
