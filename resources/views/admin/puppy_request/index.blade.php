@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Запросы по щенкам</h1>
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
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Щенок</th>
                                    <th>Сообщение</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($puppy_requests as $puppy_request)
                                    <tr>
                                        <td> {{ date("d.m.Y H:i", strtotime($puppy_request->created_at)) }}</td>
                                        <td> {{ $puppy_request->name }}</td>
                                        <td> {{ $puppy_request->email }}</td>
                                        <td>
                                            @if(!empty($puppy_request->puppy))
                                                {{ $puppy_request->puppy->name }} ({{ $puppy_request->puppy->get_litter->letter }})
                                            @else
                                                Общий запрос
                                            @endif
                                        </td>
                                        <td> {{ $puppy_request->message }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $puppy_requests->withQueryString()->links()  }}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
