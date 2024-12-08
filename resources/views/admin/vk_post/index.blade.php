@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Посты в ВК</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-12">
                    <div class="card">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">

                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Текст</th>
                                    <th>Фото</th>
                                    <th>Видео</th>
                                    <th>Показать на сайте*</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vkPosts as $vkPost)
                                    <tr>
                                        <td>{{ $vkPost->datetime }}</td>
                                        <td>{{ urldecode($vkPost->text) }}</td>
                                        <td>{{ urldecode($vkPost->media->where('media_type_id',\App\Models\Vk\VkPostMedia::MEDIA_TYPE_IMAGE_ID)->count()) }}</td>
                                        <td>{{ urldecode($vkPost->media->where('media_type_id',\App\Models\Vk\VkPostMedia::MEDIA_TYPE_VIDEO_ID)->count()) }}</td>
                                        <td align="center">
                                            <form method="POST" action="{{ route('admin.vk_post.update_show_on_site',['vkPost' => $vkPost->id]) }}">
                                                @csrf
                                                @method('patch')
                                                <input type="number" name="show_on_site" hidden value="{{ ($vkPost->show_on_site == 1) ? 0 : 1 }}">
                                                <button type="submit"
                                                        class="btn badge badge-{{ ($vkPost->show_on_site == 1) ? 'success' : 'danger' }}">{{ ($vkPost->show_on_site == 1) ? 'на сайте' : 'не отображается' }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $vkPosts->withQueryString()->links()  }}
                            * в разделе "Наши Аффены". Для показа/скрытия - кликните на кнопку в столбце
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
