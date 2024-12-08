<?php

namespace App\Http\Controllers\Admin\Api\Vk;

use App\Http\Controllers\Controller;
use App\Models\Vk\VkPost;
use App\Models\Vk\VkPostMedia;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        if (!isset($data['group_id']) or $data['group_id'] !== 188715001
            or !isset($data['secret']) or $data['secret'] !== 'khc9274bahdbcygfakef74927r4hfadljbc'
        ) {
            return response()->json(['access denied'], 403);
        }

        $text = $data['object']['text'];
        if ($text == "" and isset($data['object']['copy_history'])) {
            $text = $data['object']['copy_history'][0]['text'];
        }

        $vk_data = [
            'vkontakte_post_id' => $data['object']['id'],
            'datetime' => date("Y-m-d H:i:s", $data['object']['date']),
            'text' => urlencode($text),
        ];

        $vkPost = VkPost::updateOrCreate(
            ['vkontakte_post_id' => $vk_data['vkontakte_post_id']],
            $vk_data
        );
        $vkPost->media()->delete();


        if (isset($data['object']['attachments'])) {
            foreach ($data['object']['attachments'] as $attachment) {
                if ($attachment['type'] == 'photo') {
                    foreach ($attachment['photo']['sizes'] as $size) {
                        if ($size['type'] == 'x') {
                            $vkPost->media()->create(
                                [
                                    'media_type_id' => VkPostMedia::MEDIA_TYPE_IMAGE_ID,
                                    'url' => $size['url']
                                ]
                            );
                            break;
                        }
                    }
                }
            }
        }



        return response()->json(['success'], 200);
    }
}
