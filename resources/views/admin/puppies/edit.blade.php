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
                    <h1 class="m-0">{{ $puppy->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Редактирование данных</h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('admin.puppies') }}"
                                           data-toggle="tab">К списку щенков</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.puppy.update', ['puppy' => $puppy->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Кличка*</label>
                                        <input type="text" class="form-control"
                                               value="{{ $puppy->name }}" name="name">
                                        @error('name')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Помет*</label>
                                        <select class="form-control" name="litter_id">
                                            <option value="0">Выбрать</option>
                                            @foreach ($litters as $litter)
                                                <option
                                                    value="{{ $litter->id }}" {{ ($puppy->litter_id == $litter->id) ? 'selected' : '' }}>{{ $litter->letter }}
                                                    - {{ date("d.m.y",strtotime($litter->dob)) }}</option>
                                            @endforeach
                                        </select>
                                        @error('litter_id')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Пол*</label>
                                        <select class="form-control" name="sex">
                                            <option value="0" {{ ($puppy->sex == 0) ? 'selected' : '' }}>Кобель</option>
                                            <option value="1" {{ ($puppy->sex == 1) ? 'selected' : '' }}>Сука</option>
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
                                                <option
                                                    value="{{ $colorKey }}" {{ ($puppy->color == $colorKey) ? 'selected' : '' }}>{{ $colorName }}</option>
                                            @endforeach
                                        </select>
                                        @error('color')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        <p>Основное изображение</p>
                                        <picture>
                                            <source
                                                srcset="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy->main_image . '.webp') }}">
                                            <img class="w-25"
                                                 src="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy->main_image . '.jpg') }}">
                                        </picture>
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image"
                                                   accept="image/jpeg" value="{{ old('main_image') }}">
                                            <label class="custom-file-label" for="exampleInputFile">Для замены
                                                основного изображения - приложите новое фото</label>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group col-12 mt-3">
                                        <p>Дополнительные изображения (удаление уже загруженных дополнительных изображений - внизу страницы)</p>
                                        <div class="row">
                                            @if ($puppy->puppy_additional_images->count() > 0)
                                                @foreach($puppy->puppy_additional_images as $additional_image)
                                                    <div class="form-group col-3">
                                                        <picture>
                                                            <source
                                                                srcset="{{ asset('storage/images/' . $puppy->image_path . '/' . $additional_image->image_name . '.webp') }}">
                                                            <img class="w-100"
                                                                 src="{{ asset('storage/images/' . $puppy->image_path . '/' . $additional_image->image_name . '.jpg') }}">
                                                        </picture>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="form-group col-12">
                                                <label for="exampleInputFile">Дополнительные изображения (можно
                                                    несколько)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input"
                                                               name="additional_images[]"
                                                               accept="image/jpeg" multiple>
                                                        <label class="custom-file-label" for="exampleInputFile">Приложите
                                                            дополнительные изображения</label>
                                                    </div>
                                                </div>
                                                @error('additional_images')
                                                <span class="alert-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>Данные о доме щенка</p>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Владелец</label>
                                        <input type="text" class="form-control"
                                               value="{{ $puppy->owner }}" name="owner">
                                        @error('owner')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Телефон владельца</label>
                                        <input type="text" class="form-control"
                                               value="{{ $puppy->owner_phone }}" name="owner_phone">
                                        @error('owner_phone')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Email владельца</label>
                                        <input type="email" class="form-control"
                                               value="{{ $puppy->owner_email }}" name="owner_email">
                                        @error('owner_email')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Страна, на русском языке</label>
                                        <input type="text" class="form-control"
                                               value="{{ $puppy->country_ru }}" name="country_ru">
                                        @error('country_ru')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Страна, на английском языке</label>
                                        <input type="text" class="form-control"
                                               value="{{ $puppy->country_en }}" name="country_en">
                                        @error('country_en')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Город, на русском языке</label>
                                        <input type="text" class="form-control"
                                               value="{{ $puppy->city_ru }}" name="city_ru">
                                        @error('city_ru')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Город, на английском языке</label>
                                        <input type="text" class="form-control"
                                               value="{{ $puppy->city_en }}" name="city_en">
                                        @error('city_en')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Координаты города, долгота</label>
                                        <input type="text" class="form-control"
                                               value="{{ $puppy->lon }}" name="lon">
                                        @error('lon')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Координаты города, широта</label>
                                        <input type="text" class="form-control"
                                               value="{{ $puppy->lat }}" name="lat">
                                        @error('lat')
                                        <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <p>Координаты записываем в десятичном формате, например координаты Перми: широта - 58.0105, долгота - 56.2502 </p>
                                </div>
                                <p><b>ВАЖНО: названия стран, городов и координаты необходимы всегда, если мы хотим показать данного щенка на глобусе на сайте</b></p>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Изменить</button>
                                </div>
                            </form>


                            <div class="row mt-3">
                                @if ($puppy->puppy_additional_images->count() > 0)
                                    <div class="col-12">
                                        Удаление дополнительных изображений
                                    </div>
                                    @foreach($puppy->puppy_additional_images as $additional_image)
                                        <div class="form-group col-3">
                                            <picture>
                                                <source
                                                    srcset="{{ asset('storage/images/' . $puppy->image_path . '/' . $additional_image->image_name . '.webp') }}">
                                                <img class="w-100"
                                                     src="{{ asset('storage/images/' . $puppy->image_path . '/' . $additional_image->image_name . '.jpg') }}">
                                            </picture>
                                            <form action="{{ route('admin.puppy_image.destroy',['puppy_image' => $additional_image->id ]) }}" method="POST" style="position: absolute; top:1em;right: 1em" >
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm bg-red" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
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
