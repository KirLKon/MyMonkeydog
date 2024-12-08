<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vk\VkPost;
use App\Models\Vk\VkPostMedia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->import_vk_post_data();
    }

    private function import_vk_post_data()
    {
        $link  = 'https://mymonkeydog.com/js/vk/vk_data.txt';
        $vk_data = file_get_contents($link);
        $vk_data = json_decode($vk_data);
        foreach ($vk_data as $vk_post_id => $vk_post_data) {
            $post_id = str_replace('_','',$vk_post_id);

            $vk_data = [
                'vkontakte_post_id' => $post_id,
                'datetime' => date("Y-m-d H:i:s", strtotime($vk_post_data->date)),
                'text' => urlencode($vk_post_data->text),
            ];

            $vkPost = VkPost::updateOrCreate(
                ['vkontakte_post_id' => $vk_data['vkontakte_post_id']],
                $vk_data
            );
            $vkPost->media()->delete();

            foreach ($vk_post_data->photos as $photo) {
                $vkPost->media()->create(
                    [
                        'media_type_id' => VkPostMedia::MEDIA_TYPE_IMAGE_ID,
                        'url' => $photo
                    ]
                );
            }

        }
    }
}
