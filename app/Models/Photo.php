<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $guarded = false;

    public static function update_photo_order()
    {
        $photos = self::where('show_on_site',1)->orderBy('order_number','ASC')->get();
        foreach ($photos as $key => $photo) {
            $photo->update(['order_number' => ($key + 1)]);
        }
    }
}
