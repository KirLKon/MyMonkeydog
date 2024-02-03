@extends('admin.layouts.app')
@section('scriptandstyles')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Информация о помете</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Помет {{ $litter->letter }} - {{ $litter->dob }}</h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('admin.litters') }}"
                                           data-toggle="tab">К списку пометов</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-2">
                                    <label>Буква</label>
                                    <input type="text" class="form-control" name="letter"
                                           value="{{ old('letter',$litter->letter) }}" disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Кобель</label>
                                    <select class="form-control" name="sir_dog_id" disabled>
                                        <option value="0">Выбрать</option>
                                        @foreach($sirs as $sir)
                                            <option
                                                value="{{ $sir->id }}" {{ ($litter->sir_dog_id == $sir->id ) ? 'selected' : '' }}>{{ $sir->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>Сука</label>
                                    <select class="form-control" name="dam_dog_id" disabled>
                                        <option value="0">Выбрать</option>
                                        @foreach($dams as $dam)
                                            <option
                                                value="{{ $dam->id }}" {{ ($litter->dam_dog_id == $dam->id ) ? 'selected' : '' }}>{{ $dam->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <label>Дата рождения</label>
                                    <input type="date" class="form-control" name="dob"
                                           value="{{ (old('dob')) ? old('dob') : $litter->dob }}" disabled>
                                </div>
                                <div class="form-group col-2">
                                    <label>Щенков в ряд на сайте</label>
                                    <select class="form-control" name="in_row" disabled>
                                            <option
                                                value="{{ $litter->in_row }}">{{ $litter->in_row }}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Описание помета на сайт на русском языке</label>
                                <textarea class="form-control" name="description_ru"
                                          rows="5"
                                          disabled> {{ (old('description_ru')) ? old('description_ru') : $litter->description_ru }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Описание помета на сайт на английском языке</label>
                                <textarea class="form-control" name="description_en"
                                          rows="5"
                                          disabled> {{ (old('description_en')) ? old('description_en') : $litter->description_en }}</textarea>
                            </div>
                            <picture>
                                <source
                                    srcset="{{ asset('storage/images/' . $litter->image_path . '/' . $litter->presentation_image . '.webp') }}">
                                <img class="w-25"
                                     src="{{ asset('storage/images/' . $litter->image_path . '/' . $litter->presentation_image . '.jpg') }}">
                            </picture>

                        </div>

                        <div class="form-group col-3">
                            <a href="{{ route('admin.litter.edit', ['litter' => $litter->id]) }}" type="button"
                               class="btn btn-block btn-outline-danger btn-sm">Редактировать</a>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
