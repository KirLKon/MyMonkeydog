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
                    <h1 class="m-0">Добавить щенка</h1>
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
                            <h3 class="card-title">Надо заполнить все поля с *</h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('admin.puppies') }}" data-toggle="tab">К списку щенков</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('admin.puppy.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Кличка*</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Кличка щенка" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Помет*</label>
                                        <select class="form-control" name="litter_id">
                                            <option value="0">Выбрать</option>
                                            @foreach ($litters as $litter)
                                                <option value="{{ $litter->id }}" {{ (old('litter_id') == $litter->id) ? 'selected' : '' }}>{{ $litter->letter }} - {{ date("d.m.y",strtotime($litter->dob)) }}</option>
                                            @endforeach
                                        </select>
                                        @error('litter_id')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Пол*</label>
                                        <select class="form-control" name="sex">
                                            <option value="0" {{ (old('sex') == 0) ? 'selected' : '' }}>Кобель</option>
                                            <option value="1" {{ (old('sex') == 1) ? 'selected' : '' }}>Сука</option>
                                        </select>
                                        @error('sex')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Цвет</label>
                                        <select class="form-control" name="color">
                                            <option value="NULL">Без цвета</option>
                                            @foreach($colors['ru'] as $colorKey => $colorName)
                                                <option value="{{ $colorKey }}" {{ (old('color') == $colorKey) ? 'selected' : '' }}>{{ $colorName }}</option>
                                            @endforeach
                                        </select>
                                        @error('color')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Основное изображение*</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image"
                                                   accept="image/jpeg" value="{{ old('main_image') }}">
                                            <label class="custom-file-label" for="exampleInputFile">Приложите
                                                фото</label>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Дополнительные изображения (можно несколько)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="additional_images[]"
                                                   accept="image/jpeg" multiple>
                                            <label class="custom-file-label" for="exampleInputFile">Приложите
                                                фото</label>
                                        </div>
                                    </div>
                                    @error('additional_images')
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
