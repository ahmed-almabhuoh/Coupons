    <div class="footer pt-2 pb-2 text-white-50 text-center text-md-start">
        <div class="container text-center">
            <div class="row ">

                <div class="col-md-12 col-lg-12">
                    <div class="links">
                        <h5 class="text-light">
                            <img src="{{ env('APP_URL') . 'content/' . $new_website_settings->logo }}" alt=""
                                class="website-logo">
                        </h5>
                        <ul class="links  list-unstyled lh-lg d-flex justify-content-center gap-3 flex-wrap">
                            <li><a class="@if (Route::currentRouteName() == 'pages.home') text-light
                                @else
                                text-white-50 @endif"
                                    href="{{ route('pages.home') }}">{{ __('Home') }}</a></li>
                            <li><a class="@if (Route::currentRouteName() == 'pages.about') text-light
                                        @else
                                        text-white-50 @endif"
                                    href="{{ route('pages.about') }}">{{ __('About') }}</a>
                            </li>
                            <li><a class="@if (Route::currentRouteName() == 'pages.fqs') text-light
                                @else
                                text-white-50 @endif"
                                    href="{{ route('pages.fqs') }}">{{ __('Common Questions') }}</a>
                            </li>
                            <li><a
                                    class="@if (Route::currentRouteName() == 'pages.offers') text-light
                                @else
                                text-white-50 @endif">{{ __('Offers') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
