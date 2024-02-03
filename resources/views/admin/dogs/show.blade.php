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
                    <h1 class="m-0">Информация о собакe</h1>
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
                            <h3 class="card-title">{{ $dog->name }}</h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('admin.dogs') }}" data-toggle="tab">К
                                            списку собак</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label>Кличка</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Кличка собаки" value="{{ old('name', $dog->name) }}" disabled>
                                </div>
                                <div class="form-group col-2">
                                    <label>Пол</label>
                                    <select class="form-control" name="sex" disabled>
                                        <option value="0" {{ (old('sex', $dog->sex) == 0 ) ? 'selected' : '' }}>Кобель
                                        </option>
                                        <option value="1" {{ (old('sex', $dog->sex) == 1) ? 'selected' : '' }}>Сука
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <label>Питомник</label>
                                    <select class="form-control" name="kennel" disabled>
                                        <option value="1" {{ (old('kennel') == 1) ? 'selected' : '' }}>MyMonkeyDog
                                        </option>
                                        <option value="2" {{ (old('kennel') == 2) ? 'selected' : '' }}>Всякие левые
                                            противные питомники
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label>Дата рождения</label>
                                    <input type="date" class="form-control" name="dob"
                                           value="{{ old('dob',$dog->dob) }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Титулы</label>
                                <textarea class="form-control" name="ranks"
                                          rows="5" disabled> {{ old('ranks', $dog->ranks) }}</textarea>
                                <span>не обязательное поле. Перечислите все титулы собаки, только латиница, так как на сайте этот текст будет использоваться для всех языков</span>
                            </div>
                            <picture>
                                <source
                                    srcset="{{ asset('storage/images/' . $dog->image_path . '/' . $dog->main_image . '.webp') }}">
                                <img class="w-25"
                                     src="{{ asset('storage/images/' . $dog->image_path . '/' . $dog->main_image . '.jpg') }}">
                            </picture>

                        </div>
                        <div class="form-group col-3">
                            <a href="{{ route('admin.dog.edit', ['dog' => $dog->id]) }}" type="button"
                               class="btn btn-block btn-outline-danger btn-sm">Редактировать</a>
                        </div>

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

