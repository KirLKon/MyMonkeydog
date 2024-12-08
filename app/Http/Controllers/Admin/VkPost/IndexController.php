<?php

namespace App\Http\Controllers\Admin\VkPost;

use App\Http\Controllers\Controller;
use App\Models\Vk\VkPost;

class IndexController extends Controller
{
    public function __invoke()
    {
        $vkPosts = VkPost::orderBy('vkontakte_post_id','DESC')->paginate(15);
        return view('admin.vk_post.index',compact('vkPosts'));
    }
}
