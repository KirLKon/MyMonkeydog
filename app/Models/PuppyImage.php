<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PuppyImage extends Model
{
    use HasFactory;

    protected $table = 'puppy_images';
    protected $guarded = false;

    public function get_puppy(): BelongsTo
    {
        return $this->belongsTo(Puppy::class);
    }
}
