@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Щенки MyMonkeyDog</h1>
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
                                        <a class="nav-link active" href="{{ route('admin.puppy.create') }}" data-toggle="tab">Добавить щенка</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Помет</th>
                                    <th>Кличка</th>
                                    <th>Пол</th>
                                    <th>Показать на сайте</th>
                                    <th>Доступен</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($puppies as $puppy)
                                        <tr>
                                            <td class="projects">
                                                <picture>
                                                    <source
                                                        srcset="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy->main_image . '_mini.webp') }}">
                                                    <img class="table-avatar"
                                                         src="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy->main_image . '_mini.jpg') }}">
                                                </picture>
                                            </td>
                                            <td>{{ $puppy->get_litter->letter }} - {{ date("d.m.y", strtotime($puppy->get_litter->dob)) }}</td>
                                            <td>{{ $puppy->name }} <span class="badge right" {{ ($puppy->color) ? 'style=background:'. $puppy->color : '' }}>&nbsp;</span></td>
                                            <td>{{ $sexs['ru'][$puppy->sex] }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.puppy.update_show_on_site', ['puppy' => $puppy->id]) }}">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="number" name="show_on_site" hidden value="{{ ($puppy->show_on_site == 1) ? 0 : 1 }}">
                                                    <button type="submit"
                                                            class="btn badge badge-{{ ($puppy->show_on_site == 1) ? 'success' : 'danger' }}">{{ ($puppy->show_on_site == 1) ? 'на сайте' : 'не отображается' }}</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('admin.puppy.available', ['puppy' => $puppy->id]) }}">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="number" name="available" hidden value="{{ ($puppy->available == 1) ? 0 : 1 }}">
                                                    <button type="submit"
                                                            class="btn badge badge-{{ ($puppy->available == 1) ? 'success' : 'danger' }}">{{ ($puppy->available == 1) ? 'доступен' : 'забронирован' }}</button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href=" {{ route('admin.puppy.show', ['puppy' => $puppy->id]) }}" type="button"
                                                   class="btn btn-block btn-outline-danger btn-sm">Просмотр</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $puppies->withQueryString()->links()  }}
                        </div>
                    </div>
                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
