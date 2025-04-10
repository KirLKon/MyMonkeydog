@extends('layouts.site')
@section('content')
    @if (session('success'))
        <div class="success-message-sent">
            <button type="button" class="success-message-sent-close" data-dismiss="alert" aria-hidden="true">×</button>
            <div class="text-sm">{{ session('success') }}</div>
        </div>
    @endif
    <div id="home">
        <div class="demo-1">
            <div id="slider" class="sl-slider-wrapper">
                <div class="sl-slider">
                    <div class="sl-slide bg-1" data-orientation="horizontal" data-slice1-rotation="-25"
                         data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                        <div class="sl-slide-inner">
                            <picture class="deco">
                                <source type="image/webp" srcset="{{ asset('assets/images/logo/mmdlogoblack.webp') }}"
                                        alt="affenpincsher">
                                <img src="{{ asset('assets/images/logo/mmdlogoblack.png') }}" alt="affenpincsher">
                            </picture>
                            <h1>{{__('S1_HEAD')}}</h1>
                            <blockquote><p>{{__('S1_TEXT')}}</p><cite>{{__('TAG_NAME')}}</cite></blockquote>
                        </div>
                    </div>
                    <div class="sl-slide bg-2" data-orientation="vertical" data-slice1-rotation="10"
                         data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                        <div class="sl-slide-inner">
                            <picture class="deco">
                                <source type="image/webp" srcset="{{ asset('assets/images/logo/mmdlogogold.webp') }}"
                                        alt="affenpincsher">
                                <img src="{{ asset('assets/images/logo/mmdlogogold.png') }}" alt="affenpincsher">
                            </picture>
                            <h2>{{__('S2_HEAD')}}</h2>
                            <blockquote><p>{{__('S2_TEXT')}}</p><cite>{{__('TAG_NAME')}}</cite></blockquote>
                        </div>
                    </div>
                    <div class="sl-slide bg-4" data-orientation="vertical" data-slice1-rotation="-5"
                         data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                        <div class="sl-slide-inner">
                            <picture class="deco">
                                <source type="image/webp" srcset="{{ asset('assets/images/logo/mmdlogowhite.webp') }}"
                                        alt="affenpincsher">
                                <img src="{{ asset('assets/images/logo/mmdlogowhite.png') }}" alt="affenpincsher">
                            </picture>
                            <h2>{{__('S3_HEAD')}}</h2>
                            <blockquote><p>{{__('S3_TEXT')}}</p><cite>{{__('TAG_NAME')}}</cite></blockquote>
                        </div>
                    </div>
                </div>
                <nav id="nav-arrows" class="nav-arrows"><span class="nav-arrow-prev">Previous</span><span
                        class="nav-arrow-next">Next</span></nav>
                <nav id="nav-dots" class="nav-dots"><span class="nav-dot-current"></span><span></span><span></span>
                </nav>
            </div>
        </div>
    </div>
    <script>StartSlider();</script>
    <div id="services" class="color black">
        <div class="container">
            <div class="wrapper span12">
                <div id="page-title">
                    <div id="page-title-inner"><h2><span>{{ __('BREED_ABOUT') }}</span></h2></div>
                </div>
                <div class="row-fluid">
                    <div class="span6"><p>{!! __('THE_ONE_AND_THE_ONLY_1') !!}</p></div>
                    <div class="span6"><p>{!! __('THE_ONE_AND_THE_ONLY_2') !!}</p></div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <h3>{{ __('BREED_PARS') }}</h3>
                        <ul class="progress-bar">
                            <li><h5>{{ __('BREED_AGGR') }} ( 2/5 )</h5></li>
                            <li>
                                <div class="meter"><span style="width: 40%"></span></div>
                            </li>
                            <li><h5>{{ __('BREED_HEALTH') }} ( 4/5 )</h5></li>
                            <li>
                                <div class="meter"><span style="width: 80%"></span></div>
                            </li>
                            <li><h5>{{ __('BREED_CARE') }} ( 2/5 )</h5></li>
                            <li>
                                <div class="meter"><span style="width: 40%"></span></div>
                            </li>
                            <li><h5>{{ __('BREED_GUARD') }} ( 5/5 )</h5></li>
                            <li>
                                <div class="meter"><span style="width: 100%"></span></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr class="clean">
            </div>
        </div>
    </div>
    <div id="puppies" class="color white">
        <div class="wrapper span12">
            <div class="container">
                <div id="page-title">
                    <div id="page-title-inner"><h2><span>{{ __('PUPPIES') }}</span></h2></div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        @if ($litters->count() == 0)
                            <h3 class="puppies-for-sale">
                                <span>{{ __('PUPPIES_FOR_SALE') }}</span>
                                <br>
                                {{ __('RESERVE_PUPPY') }}
                            </h3>
                        @else
                            @foreach($litters as $litter)
                                <h3 class="puppies-for-sale">
                                    <span>{{ __('PUPPIES_FOR_SALE') }}</span>
                                    <br>
                                    {{ $litter->{'description_'.app()->getLocale()} }}
                                </h3>
                                @foreach($litter->get_puppies->where('show_on_site',1)->chunk($litter->in_row) as $in_row)
                                    <div class="row-fluid">
                                        @foreach($in_row as $puppy)
                                            <div class="{{ $litter->get_litter_in_row_style() }}">
                                                <div class="avatar" id="{{ $puppy->main_image }}">
                                                    <picture class="picture" id="{{ $puppy->main_image }}">
                                                        <source
                                                            srcset="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy->main_image . '.webp') }}">
                                                        <img class="img-circle pupPic"
                                                             style="box-shadow: 0px 0px 1em 0px {{ $puppy->color }};"
                                                             alt="{{ __('AFFEN_PUPPY_ALT') }}"
                                                             src="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy->main_image . '.jpg') }}"
                                                             loading="lazy">
                                                        @if ($puppy->puppy_additional_images->count() > 0)
                                                            <div class="nextPhotoPleaseBlockPrevPuppy"
                                                                 onclick="showpic('{{ $puppy->main_image }}','{{ $puppy->puppy_additional_images->last()->image_name }}')">
                                                                <div class="prevPhotoPlease"></div>
                                                            </div>
                                                            <div class="nextPhotoPleaseBlockNextPuppy"
                                                                 onclick="showpic('{{ $puppy->main_image }}','{{ $puppy->puppy_additional_images->first()->image_name }}')">
                                                                <div class="nextPhotoPlease"></div>
                                                            </div>
                                                        @endif
                                                    </picture>
                                                </div>
                                                @foreach($puppy->puppy_additional_images as $puppy_additional_image_key => $puppy_additional_image)
                                                    <div class="avatar" style="display:none"
                                                         id="{{ $puppy_additional_image->image_name }}">
                                                        <picture class="picture">
                                                            <source
                                                                srcset="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy_additional_image->image_name . '.webp') }}">
                                                            <img class="img-circle pupPic"
                                                                 style="box-shadow: 0px 0px 1em 0px {{ $puppy->color }};"
                                                                 alt="{{ __('AFFEN_PUPPY_ALT') }}"
                                                                 src="{{ asset('storage/images/' . $puppy->image_path . '/' . $puppy_additional_image->image_name . '.jpg') }}"
                                                                 loading="lazy">
                                                            <div class="nextPhotoPleaseBlockPrevPuppy"
                                                                 onclick="showpic('{{ $puppy_additional_image->image_name }}','{{ (isset($puppy->puppy_additional_images[$puppy_additional_image_key-1])) ? $puppy->puppy_additional_images[$puppy_additional_image_key-1]->image_name : $puppy->main_image }}')">
                                                                <div class="prevPhotoPlease"></div>
                                                            </div>
                                                            <div class="nextPhotoPleaseBlockNextPuppy"
                                                                 onclick="showpic('{{ $puppy_additional_image->image_name }}','{{ (isset($puppy->puppy_additional_images[$puppy_additional_image_key+1])) ? $puppy->puppy_additional_images[$puppy_additional_image_key+1]->image_name : $puppy->main_image }}')">
                                                                <div class="nextPhotoPlease"></div>
                                                            </div>
                                                        </picture>
                                                    </div>
                                                @endforeach
                                                <div class="position">
                                                    {{ $puppy->name }},
                                                    {{ mb_strtolower($sexs[app()->getLocale()][$puppy->sex]) }},
                                                    @if ($puppy->available == 1)
                                                        <span class="puppyAvail">{{ __('AVAIL_FOR_RESERVE') }}</span>
                                                    @else
                                                        {{ __('NOT_AVAIL_FOR_RESERVE') }}
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach

                            @endforeach
                        @endif
                        <div class="team-name span12"
                             style="text-transform: uppercase">{{__('ASK_QUESTION')}}</div>
                        <div class="row-fluid">
                            @if (isset( $litter))
                            <div class="span4">
                                <picture>
                                    <source
                                        srcset="{{ asset('storage/images/' . $litter->image_path . '/' . $litter->presentation_image . '.webp') }}">
                                    <img class="presentation"
                                        src="{{ asset('storage/images/' . $litter->image_path . '/' . $litter->presentation_image . '.jpg') }}">
                                </picture>
                            </div>
                            @else
                                <div class="span2"></div>
                            @endif
                            <div class="span8">
                                <form method="POST"
                                      action="{{ route('puppy_request', ['locale' => app()->getLocale()]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="styled-select">
                                            <select name="puppy_id" required>
                                                <option value="0">{{ __('CHOOSE_PUPPY') }}</option>
                                                @foreach($litters as $litter)
                                                    @foreach($litter->get_puppies->where('available',1) as $puppy)
                                                        <option
                                                            value="{{ $puppy->id }}" {{ (old('puppy_id') == $puppy->id) ? 'selected' : '' }}>{{ $puppy->name }}
                                                            ({{ \App\Models\Puppy::puppyColors()[app()->getLocale()][$puppy->color] }}
                                                            )
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            @error('puppy_id')
                                            <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="{{__('YOUR_NAME')}}"
                                               value="{{ old('name') }}"
                                               required>
                                        @error('name')
                                        <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="{{__('YOUR_EMAIL')}}"
                                               value="{{ old('email') }}"
                                               required>
                                        @error('email')
                                        <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                                    <textarea name="message" rows="7"
                                                              placeholder="{{__('YOUR_QUESTION')}}">{{ old('message') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="read_more_less"
                                                type="submit">{{ __('SEND_MESSAGE') }}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="span2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="library" class="color blue">
        <div class="container">
            <div class="wrapper span12">
                <div id="page-title">
                    <div id="page-title-inner"><h2><span>{{ __('LIBRARY_HEAD') }}</span></h2></div>
                </div>
                <div class="four-tables">
                    <div class="row-fluid">
                        <div class="span4 picture">
                            <div class="item-description alt"><h5><a href="{{ __('LIB1_LINK') }}"
                                                                     target="_blank">{{ __('LIB1_HEAD') }}</a></h5>
                                <p>{{ __('LIB1_TEXT') }}</p></div>
                        </div>
                        <div class="span4 picture">
                            <div class="item-description alt"><h5><a href="{{ __('LIB2_LINK') }}"
                                                                     target="_blank">{{ __('LIB2_HEAD') }}</a></h5>
                                <p>{{ __('LIB2_TEXT') }}</p></div>
                        </div>
                        <div class="span4 picture">
                            <div class="item-description alt"><h5><a href="{{ __('LIB3_LINK') }}"
                                                                     target="_blank">{{ __('LIB3_HEAD') }}</a></h5>
                                <p>{{ __('LIB3_TEXT') }}</p></div>
                        </div>
                        <div class="span4 picture" style="margin-left:0">
                            <div class="item-description alt"><h5><a href="{{ __('LIB4_LINK') }}"
                                                                     target="_blank">{{ __('LIB4_HEAD') }}</a></h5>
                                <p>{{ __('LIB4_TEXT') }}</p></div>
                        </div>
                        <div class="span4 picture">
                            <div class="item-description alt"><h5><a href="{{ __('LIB5_LINK') }}"
                                                                     target="_blank">{{ __('LIB5_HEAD') }}</a></h5>
                                <p>{{ __('LIB5_TEXT') }}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="portfolio" class="color white">
        <div class="container">
            <div class="wrapper span12">
                <div id="page-title">
                    <div id="page-title-inner"><h2><span>{{ __('PHOTO') }}</span></h2></div>
                </div>
                <div class="slider">
                    <div id="flex1" class="flexslider">
                        <ul id="photoForSlider" class="slides">
                            @foreach($photos as $photo)
                                <li>
                                    <div class="picture">
                                        <picture>
                                            <source
                                                srcset="{{ asset('storage/images/' . $photo->image_path . '/' . $photo->image_name . '.webp') }}">
                                            <img
                                                src="{{ asset('storage/images/' . $photo->image_path . '/' . $photo->image_name . '.jpg') }}"
                                                loading="lazy">
                                        </picture>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="about" class="color yellow mt-2">
        <div class="container">
            <div class="wrapper span12">
                <div id="page-title">
                    <div id="page-title-inner"><h2><span>{{  __('ABOUT_KENNEL') }}</span></h2></div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div id="story">{{  __('ABOUT_KENNEL_1') }}</div>
                        <div id="history">
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_2'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_2'),1) }}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_3'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_3'),1) }}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_4'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_4'),1) }}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_5'),0,1) }}</span>{!! mb_substr( __('ABOUT_KENNEL_5'),1) !!}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_6'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_6'),1) }}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_7'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_7'),1) }}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_8'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_8'),1) }}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_9'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_9'),1) }}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_10'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_10'),1) }}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_11'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_11'),1) }}
                            </p>
                            <p><span
                                    class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_12'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_12'),1) }}
                            </p>
                            @if (app()->getLocale() == 'en')
                                <p><span
                                        class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_13'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_13'),1) }}
                                </p>
                                <p><span
                                        class="dropcap dark">{{ mb_substr( __('ABOUT_KENNEL_14'),0,1) }}</span>{{ mb_substr( __('ABOUT_KENNEL_14'),1) }}
                                </p>
                            @endif
                            <div id="story">{{  __('ABOUT_KENNEL_END') }}</div>
                        </div>
                    </div>
                    <div class="span12" style="display: inline-block;text-align: center;margin-top: -1rem;">
                        <div class="social-icons-list">
                            <a href="https://t.me/mymonkeydog" class="social-icons" title="Telegram" target="_blank">
                                <picture>
                                    <source srcset="{{ asset('assets/images/socials/Telegram.webp') }}">
                                    <img src="{{ asset('assets/images/socials/Telegram.png') }}" loading="lazy">
                                </picture>
                            </a>
                            <a href="viber://chat?number=79024732961" class="social-icons" title="Viber"
                               target="_blank">
                                <picture>
                                    <source srcset="{{ asset('assets/images/socials/Viber.webp') }}">
                                    <img src="{{ asset('assets/images/socials/Viber.png') }}" loading="lazy">
                                </picture>
                            </a>
                            <a href="https://www.instagram.com/mymonkeydog_affenpinscher/" class="social-icons"
                               title="Instagram" target="_blank">
                                <picture>
                                    <source srcset="{{ asset('assets/images/socials/Instagram.webp') }}">
                                    <img src="{{ asset('assets/images/socials/Instagram.png') }}" loading="lazy">
                                </picture>
                            </a>
                            <a href="https://vk.com/public188715001" class="social-icons" title="VK" target="_blank">
                                <picture>
                                    <source srcset="{{ asset('assets/images/socials/VK.webp') }}">
                                    <img src="{{ asset('assets/images/socials/VK.png') }}" loading="lazy">
                                </picture>
                            </a>
                        </div>
                        <br><br>
                        {{ __('PERM_RUSSIA') }} •
                        <span style="font-size:1.4em;">&#9993;</span> se-tasha@yandex.ru •
                        <span style="font-size:1.4em;">&#9990;</span> +7 (902) 4732961

                        <picture>
                            <source srcset="{{ asset('assets/images/socials/WhatsApp.webp') }}">
                            <img class="social-icons-mini" src="{{ asset('assets/images/socials/WhatsApp.png') }}"
                                 loading="lazy">
                        </picture>
                        /
                        <picture>
                            <source srcset="{{ asset('assets/images/socials/Viber.webp') }}">
                            <img class="social-icons-mini" src="{{ asset('assets/images/socials/Viber.png') }}"
                                 loading="lazy">
                        </picture>
                        Web: mymonkeydog.com
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="team" class="color white">
        <div class="container">
            <div class="wrapper span12">
                <div id="page-title">
                    <div id="page-title-inner"><h2><span>{{ __('TEAM_HEAD') }}</span></h2></div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div id="team">
                            @foreach($dogs->chunk(3) as $dogRow)
                                <div class="row-fluid">
                                    @foreach($dogRow as $dog)
                                        <div class="span4">
                                            <div class="avatar" style="width: 100%;">
                                                <picture class="picture">
                                                    <source
                                                        srcset="{{ asset('storage/images/' . $dog->image_path . '/' . $dog->main_image . '.webp') }}">
                                                    <img class="pupPic" alt="{{ __('AFFEN_PUPPY_ALT') }}"
                                                         src="{{ asset('storage/images/' . $dog->image_path . '/' . $dog->main_image . '.jpg') }}"
                                                         loading="lazy">
                                                </picture>
                                            </div>
                                            <div class="team-name">{{ $dog->name }}</div>
                                            <div class="position">{{ $sexs[app()->getLocale()][$dog->sex] }}
                                                , {{ date("d.m.Y", strtotime($dog->dob)) }}</div>
                                            <p>{{ $dog->ranks }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div id="page-title">
                    <div id="page-title-inner">
                        <h2 style="margin-top:2rem;margin-bottom:-2rem"><span>{{ __('OUR_FAMILY') }}</span></h2>
                    </div>
                </div>
                <div id="mapBlock">
                    <div id="mainMapcol">
                        <div id="myearth" class="little-earth">
                            <div id="tip-layer">
                                <div style="width:100%;height:inherit"><img src='' id="globeDogPhoto">
                                    <div id="tip-big"></div>
                                    <div id="tip-small"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="color blue" style="    margin-bottom: 2em;">
        <div class="container">
            <div class="wrapper span12">
                <div id="page-title">
                    <div id="page-title-inner"><h2><span>{{ __('AFFEN_AND_CHILDS_HEAD') }}</span></h2></div>
                </div>
                <div class="row-fluid">
                    <div class="span12"><p>{!! __('AFFEN_AND_CHILDS_TEXT') !!}</p></div>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <div class="picture">
                            <picture>
                                <source srcset="{{ asset('assets/images/childs/1.webp') }}">
                                <img class="sc-childs-img img" src="{{ asset('assets/images/childs/1.jpg') }}"
                                     alt="affenpincsher" loading="lazy">
                            </picture>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="picture">
                            <picture>
                                <source srcset="{{ asset('assets/images/childs/2.webp') }}">
                                <img class="sc-childs-img img" src="{{ asset('assets/images/childs/2.jpg') }}"
                                     alt="affenpincsher" loading="lazy">
                            </picture>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="picture">
                            <picture>
                                <source srcset="{{ asset('assets/images/childs/3.webp') }}">
                                <img class="sc-childs-img img" src="{{ asset('assets/images/childs/3.jpg') }}"
                                     alt="affenpincsher" loading="lazy">
                            </picture>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="picture">
                            <picture>
                                <source srcset="{{ asset('assets/images/childs/4.webp') }}">
                                <img class="sc-childs-img img" src="{{ asset('assets/images/childs/4.jpg') }}"
                                     alt="affenpincsher" loading="lazy">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="news" class="color white">
        <div class="container">
            <div class="wrapper span12">
                <div id="page-title">
                    <div id="page-title-inner"><h2><span>{{ __('NEWS') }}</span></h2></div>
                    @foreach($vkPosts->chunk(3) as $vkPostRow)
                        <div class="row-fluid news">
                            @foreach($vkPostRow as $vkPost)
                                <div class="span4">
                                    @if ($vkPost->media->count() > 0)
                                        <div class="avatar" id="vk_image_{{ $vkPost->media->first()->id }}">
                                            <picture class="picture">
                                                <img class="vk_image"
                                                     alt="mymonkeydog"
                                                     src="{{ $vkPost->media->first()->url }}"
                                                     loading="lazy">
                                                @if ($vkPost->media->count() > 1)
                                                    <div class="nextPhotoPleaseBlockPrevPuppy"
                                                         onclick="showpic('vk_image_{{ $vkPost->media->first()->id }}','vk_image_{{ $vkPost->media->first()->previous()->id }}')">
                                                        <div class="prevPhotoPlease"></div>
                                                    </div>
                                                    <div class="nextPhotoPleaseBlockNextPuppy"
                                                         onclick="showpic('vk_image_{{ $vkPost->media->first()->id }}','vk_image_{{ $vkPost->media->first()->next()->id }}')">
                                                        <div class="nextPhotoPlease"></div>
                                                    </div>
                                                @endif
                                            </picture>
                                        </div>
                                    @endif
                                    @if ($vkPost->media->count() > 1)
                                        @foreach($vkPost->media->where('id','>',$vkPost->media->first()->id)->all() as $media)
                                            <div class="avatar" style="display:none;"
                                                 id="vk_image_{{ $media->id }}">
                                                <picture class="picture">
                                                    <img class="vk_image"
                                                         alt="mymonkeydog"
                                                         src="{{ $media->url }}"
                                                         loading="lazy">
                                                    <div class="nextPhotoPleaseBlockPrevPuppy"
                                                         onclick="showpic('vk_image_{{ $media->id }}','vk_image_{{ $media->previous()->id }}')">
                                                        <div class="prevPhotoPlease"></div>
                                                    </div>
                                                    <div class="nextPhotoPleaseBlockNextPuppy"
                                                         onclick="showpic('vk_image_{{ $media->id }}','vk_image_{{ $media->next()->id }}')">
                                                        <div class="nextPhotoPlease"></div>
                                                    </div>
                                                </picture>
                                            </div>
                                        @endforeach
                                    @endif
                                    <p>
                                        {{ mb_substr(urldecode($vkPost->text),0,125) }}
                                        <span id="dots_for_{{ $vkPost->id }}">...</span>
                                        <span class="more" id="more_for_{{ $vkPost->id }}">
                                            {{ mb_substr(urldecode($vkPost->text),125) }}
                                            <br>
                                            <a href="https://vk.com/public188715001?w=wall-188715001_{{ $vkPost->vkontakte_post_id }}">{{ __('LINK_TO_VK_POST') }}</a>
                                        </span>
                                    </p>
                                    <button class="read_more_less" onclick="show_more({{ $vkPost->id }},'show')"
                                            id="read_more_btn_{{ $vkPost->id }}">{{ __('READ_MORE') }}</button>
                                    <button class="read_more_less read_less"
                                            onclick="show_more({{ $vkPost->id }}, 'hide')"
                                            id="read_less_btn_{{ $vkPost->id }}">{{ __('READ_LESS') }}</button>

                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="color blue transparent">
        <div class="container">
            <div class="wrapper span12">
                <div id="page-title">
                    <div id="page-title-inner"><h2><span>{{ __('CONTACT') }}</span></h2></div>
                </div>
                <div class="row-fluid">
                    <div class="span12 contacts">
                        <div>
                            <a href="https://t.me/mymonkeydog" class="social-icons" title="Telegram" target="_blank">
                                <picture>
                                    <source srcset="{{ asset('assets/images/socials/Telegram.webp') }}">
                                    <img src="{{ asset('assets/images/socials/Telegram.png') }}" loading="lazy">
                                </picture>
                            </a>
                            <a href="viber://chat?number=79024732961" class="social-icons" title="Viber"
                               target="_blank">
                                <picture>
                                    <source srcset="{{ asset('assets/images/socials/Viber.webp') }}">
                                    <img src="{{ asset('assets/images/socials/Viber.png') }}" loading="lazy">
                                </picture>
                            </a>
                            <a href="https://www.instagram.com/mymonkeydog_affenpinscher/" class="social-icons"
                               title="Instagram" target="_blank">
                                <picture>
                                    <source srcset="{{ asset('assets/images/socials/Instagram.webp') }}">
                                    <img src="{{ asset('assets/images/socials/Instagram.png') }}" loading="lazy">
                                </picture>
                            </a>
                            <a href="https://vk.com/public188715001" class="social-icons" title="VK" target="_blank">
                                <picture>
                                    <source srcset="{{ asset('assets/images/socials/VK.webp') }}">
                                    <img src="{{ asset('assets/images/socials/VK.png') }}" loading="lazy">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="clean">
            </div>
        </div>
    </div>

@endsection
