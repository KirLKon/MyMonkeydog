<?php

namespace App\Models\Vk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VkPost extends Model
{
    use HasFactory;

    protected $table = 'vk_posts';
    protected $guarded = false;

    public function media() :HasMany
    {
        return $this->hasMany(VkPostMedia::class);
    }
}
