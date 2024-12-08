<?php

namespace App\Models\Vk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VkPostMedia extends Model
{
    use HasFactory;

    protected $table = 'vk_post_media';
    protected $guarded = false;

    const MEDIA_TYPE_IMAGE_ID = 1;
    const MEDIA_TYPE_VIDEO_ID = 2;

    public static function media_types()
    {
        return [
            self::MEDIA_TYPE_IMAGE_ID => [
                'name' => 'Фото',
                'icon' => ''
            ],
            self::MEDIA_TYPE_VIDEO_ID => [
                'name' => 'Видео',
                'icon' => ''
            ],
        ];
    }

    public function vk_post(): BelongsTo
    {
        return $this->belongsTo(VkPost::class);
    }

    public function next()
    {
        $next = $this->vk_post->media->where('id','>',$this->id)->first();
        if (empty($next)) $next = $this->vk_post->media->first();
        return $next;
    }

    public function previous()
    {
        $previous = $this->vk_post->media->where('id','<',$this->id)->last();
        if (empty($previous)) $previous = $this->vk_post->media->last();
        return $previous;
    }
}
