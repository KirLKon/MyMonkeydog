@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пометы MyMonkeyDog</h1>
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
                                        <a class="nav-link active" href="{{ route('admin.litter.create') }}" data-toggle="tab">Добавить помет</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Помет</th>
                                    <th>Кобель</th>
                                    <th>Сука</th>
                                    <th>dob</th>
                                    <th>Щенков</th>
                                    <th>Показать на сайте*</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($litters as $litter)
                                    <tr>
                                        <td>{{ $litter->letter }}</td>
                                        <td>{{ $litter->getSirDog->name }}</td>
                                        <td>{{ $litter->getDamDog->name }}</td>
                                        <td>{{ date("d.m.Y",strtotime($litter->dob)) }}</td>
                                        <td>{{ $litter->get_puppies->count() }}</td>
                                        <td align="center">
                                            @if($litter->get_puppies->count() > 0)
                                                <form method="POST" action="{{ route('admin.litter.update_show_on_site', ['litter' => $litter->id]) }}">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="number" name="status" hidden value="{{ ($litter->status == 1) ? 0 : 1 }}">
                                                    <button type="submit"
                                                            class="btn badge badge-{{ ($litter->status == 1) ? 'success' : 'danger' }}">{{ ($litter->status == 1) ? 'на сайте' : 'не отображается' }}</button>
                                                </form>
                                            @else
                                                добавьте <a href="{{ route('admin.puppy.create') }}">щенков</a> в помет
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.litter.show', ['litter' => $litter->id]) }}" type="button"
                                               class="btn btn-block btn-outline-danger btn-sm">Просмотр</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            * данная информация о помете и соответствующие щенки будут показыватся на сайте в разделе Щенки.
                        </div>
                    </div>
                </section>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
