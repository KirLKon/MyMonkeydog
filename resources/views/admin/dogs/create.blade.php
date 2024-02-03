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
                    <h1 class="m-0">Добавить собаку</h1>
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
                            <h3 class="card-title">Надо заполнить все поля</h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('admin.dogs') }}" data-toggle="tab">К списку собак</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.dog.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Кличка</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Кличка собаки" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-2">
                                        <label>Пол</label>
                                        <select class="form-control" name="sex">
                                            <option value="0" {{ (old('sex') == 0) ? 'selected' : '' }}>Кобель</option>
                                            <option value="1" {{ (old('sex') == 1) ? 'selected' : '' }}>Сука</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-2">
                                        <label>Питомник</label>
                                        <select class="form-control" name="kennel">
                                            <option value="1" {{ (old('kennel') == 1) ? 'selected' : '' }}>MyMonkeyDog
                                            </option>
                                            <option value="2" {{ (old('kennel') == 2) ? 'selected' : '' }}>Всякие левые
                                                противные питомники
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Дата рождения</label>
                                        <input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
                                        @error('dob')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Титулы</label>
                                    <textarea class="form-control" name="ranks" rows="5"> {{ old('ranks') }}</textarea>
                                    <span>не обязательное поле. Перечислите все титулы собаки, только латиница, так как на сайте этот текст будет использоваться для всех языков</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Фото собаки, jpg</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image"
                                                   accept="image/jpeg" value="{{ old('main_image') }}">
                                            <label class="custom-file-label" for="exampleInputFile">Приложите
                                                картинку</label>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </form>
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

