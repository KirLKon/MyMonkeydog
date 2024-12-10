<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PuppyRequest extends Model
{
    use HasFactory;

    protected $table = 'puppy_requests';
    protected $guarded = false;

    public function puppy() :BelongsTo
    {
        return $this->belongsTo(Puppy::class);
    }
}
