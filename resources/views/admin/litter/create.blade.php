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
                    <h1 class="m-0">Добавить помет</h1>
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
                                        <a class="nav-link active" href="{{ route('admin.litters') }}" data-toggle="tab">К списку пометов</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.litter.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Буква</label>
                                        <input type="text" class="form-control" name="letter" value="{{ old('letter') }}">
                                        @error('letter')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Кобель</label>
                                        <select class="form-control" name="sir_dog_id">
                                            <option value="0">Выбрать</option>
                                            @foreach($sirs as $sir)
                                                <option value="{{ $sir->id }}" {{ (old('sir_dog_id') == $sir->id) ? 'selected' : '' }}>{{ $sir->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sir_dog_id')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Сука</label>
                                        <select class="form-control" name="dam_dog_id">
                                            <option value="0">Выбрать</option>
                                            @foreach($dams as $dam)
                                                <option value="{{ $dam->id }}" {{ (old('dam_dog_id') == $dam->id) ? 'selected' : '' }}>{{ $dam->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('dam_dog_id')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Дата рождения</label>
                                        <input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
                                        @error('dob')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Описание помета на сайт на русском языке</label>
                                    <textarea class="form-control" name="description_ru" rows="5"> {{ old('description_ru') }}</textarea>
                                    @error('description_ru')
                                    <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Описание помета на сайт на английском языке</label>
                                    <textarea class="form-control" name="description_en" rows="5"> {{ old('description_en') }}</textarea>
                                    @error('description_en')
                                    <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Презентация</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="presentation_image"
                                                   accept="image/jpeg" value="{{ old('presentation_image') }}">
                                            <label class="custom-file-label" for="exampleInputFile">Приложите
                                                презентацию</label>
                                        </div>
                                    </div>
                                    @error('presentation_image')
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
    </section>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
