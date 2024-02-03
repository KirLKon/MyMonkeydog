@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Собаки MyMonkeyDog и прочие, участвующие в разведении</h1>
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
                                        <a class="nav-link active" href="{{ route('admin.dog.create') }}"
                                           data-toggle="tab">Добавить собаку</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Кличка</th>
                                    <th>Пол</th>
                                    <th>Питомник</th>
                                    <th>Титулы</th>
                                    <th>dob</th>
                                    <th>Показать на сайте*</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dogs as $dog)
                                    <tr>
                                        <td>
                                            <picture>
                                                <source
                                                    srcset="{{ asset('storage/images/' . $dog->image_path . '/' . $dog->main_image . '_mini.webp') }}">
                                                <img class="direct-chat-img"
                                                     src="{{ asset('storage/images/' . $dog->image_path . '/' . $dog->main_image . '_mini.jpg') }}">
                                            </picture>
                                        </td>
                                        <td>{{ $dog->name }}</td>
                                        <td>{{ $sex['ru'][$dog->sex] }}</td>
                                        <td>{{ $kennels[$dog->kennel] }}</td>
                                        <td>{{ $dog->ranks }}</td>
                                        <td>{{ date("d.m.Y",strtotime($dog->dob)) }}</td>
                                        <td align="center">
                                            <form method="POST" action="{{ route('admin.dog.update_show_on_site',['dog' => $dog->id]) }}">
                                                @csrf
                                                @method('patch')
                                                <input type="number" name="show_on_site" hidden value="{{ ($dog->show_on_site == 1) ? 0 : 1 }}">
                                                <button type="submit"
                                                   class="btn badge badge-{{ ($dog->show_on_site == 1) ? 'success' : 'danger' }}">{{ ($dog->show_on_site == 1) ? 'на сайте' : 'не отображается' }}</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.dog.show', ['dog' => $dog->id ]) }}" type="button"
                                               class="btn btn-block btn-outline-danger btn-sm">Просмотр</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            * в разделе "Наши Аффены". Для показа/скрытия - кликните на кнопку в столбце
                        </div>
                    </div>
                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
