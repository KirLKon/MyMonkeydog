@extends('admin.layouts.app')
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
                            <div class="row">
                                <div class="form-group col-3">
                                    <label>Кличка*</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->name }}" disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Помет*</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->get_litter->letter }} - {{ date("d.m.y",strtotime($puppy->get_litter->dob)) }}"
                                           disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Пол*</label>
                                    <input type="text" class="form-control"
                                           value="{{ $sexs['ru'][$puppy->sex] }}" disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Цвет</label>
                                    <input type="text" class="form-control"
                                           {{ ($puppy->color) ? 'style=background:'.$puppy->color : '' }}
                                           value="{{ (isset($colors['ru'][$puppy->color])) ? $colors['ru'][$puppy->color] : 'без цвета' }}"
                                           disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Основное изображение</label>
                                    <picture>
                                        <source
                                            srcset="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy->main_image . '.webp') }}">
                                        <img class="w-100"
                                             src="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy->main_image . '.jpg') }}">
                                    </picture>
                                </div>
                                @if ($puppy->puppy_additional_images->count() > 0)
                                    @foreach($puppy->puppy_additional_images as $additional_images)
                                        <div class="form-group col-3">
                                            <label>Дополнительное изображение</label>
                                            <picture>
                                                <source
                                                    srcset="{{ asset('storage/images/' . $puppy->image_path . '/' . $additional_images->image_name . '.webp') }}">
                                                <img class="w-100"
                                                     src="{{ asset('storage/images/' . $puppy->image_path . '/' . $additional_images->image_name . '.jpg') }}">
                                            </picture>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <p>Данные о доме щенка</p>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label>Владелец</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->owner }}" disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Телефон владельца</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->owner_phone }}" disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Email владельца</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->owner_email }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label>Страна, на русском языке</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->country_ru }}" disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Страна, на английском языке</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->country_en }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label>Город, на русском языке</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->city_ru }}" disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Город, на английском языке</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->city_en }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label>Координаты города, долгота</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->lon }}" disabled>
                                </div>
                                <div class="form-group col-3">
                                    <label>Координаты города, широта</label>
                                    <input type="text" class="form-control"
                                           value="{{ $puppy->lat }}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <a href="{{ route('admin.puppy.edit', ['puppy' => $puppy->id]) }}" type="button"
                                   class="btn btn-block btn-outline-danger btn-sm">Редактировать</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
