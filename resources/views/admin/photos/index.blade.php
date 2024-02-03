@extends('admin.layouts.app')
@section('content')
    <style>
        .arrow-td {
            display: grid;
            grid-template-columns: 1fr 20px 1fr;
        }

        .arrow-td-down {
            grid-column: 1;
            text-align: right;
        }

        .arrow-td-number {
            grid-column: 2;
            text-align: center;
        }

        .arrow-td-up {
            grid-column: 3;
            text-align: left;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Фото для раздела Фото на сайте</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-12">
                    <div class="card">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <h3 class="card-title">

                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('admin.photo.create') }}"
                                           data-toggle="tab">Добавить фото</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body row">
                            @foreach($photos->chunk(ceil($photos->count()/2)) as $photo_part)
                                <table class="table col-6">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Показать на сайте</th>
                                        <th align="center">Порядок</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($photo_part as $photo)
                                        <tr>
                                            <td>
                                                <picture>
                                                    <source
                                                        srcset="{{ asset('storage/images/' . $photo->image_path . '/' . $photo->image_name . '_mini.webp') }}">
                                                    <img class="w-25"
                                                         src="{{ asset('storage/images/' . $photo->image_path . '/' . $photo->image_name . '_mini.jpg') }}">
                                                </picture>
                                            </td>
                                            <td>
                                                <form method="POST"
                                                      action="{{ route('admin.photo.update_show_on_site', ['photo' => $photo->id ]) }}">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="number" name="show_on_site" hidden
                                                           value="{{ ($photo->show_on_site == 1) ? 0 : 1 }}">
                                                    <button type="submit"
                                                            class="btn badge badge-{{ ($photo->show_on_site == 1) ? 'success' : 'danger' }}">{{ ($photo->show_on_site == 1) ? 'на сайте' : 'не отображается' }}</button>
                                                </form>
                                            </td>
                                            <td class="arrow-td">
                                                @if ($photo->show_on_site == 1)
                                                    <div class="arrow-td-down">
                                                        @if($photo->order_number < $photos->max('order_number'))
                                                            <form method="POST"
                                                                  action="{{ route('admin.photo.change_order', ['photo' => $photo->id, 'new_order_number' => ($photo->order_number + 1) ]) }}"
                                                                  class="form-check-inline m-0">
                                                                @csrf @method('patch')
                                                                <button type="submit" class="btn"
                                                                        style="padding-top: 0"><i
                                                                        class="far fa-arrow-down"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                    <div class="arrow-td-number">
                                                        {{ $photo->order_number }}
                                                    </div>
                                                    <div class="arrow-td-up">
                                                        @if($photo->order_number > 1)
                                                            <form method="POST"
                                                                  action="{{ route('admin.photo.change_order', ['photo' => $photo->id, 'new_order_number' => ($photo->order_number - 1) ]) }}"
                                                                  class="form-check-inline m-0">
                                                                @csrf @method('patch')
                                                                <button type="submit" class="btn"
                                                                        style="padding-top: 0"><i
                                                                        class="far fa-arrow-up"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            @endforeach
                            {{ $photos->links() }}
                        </div>

                    </div>
                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
