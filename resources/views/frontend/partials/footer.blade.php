<div class="footer common-question pt-2 pb-2 text-white-50 text-center text-md-start">
    <div class="container text-center">
        <div class="row ">
            <div class="col-md-12 col-lg-12">
                <div class="links">
                    <h5 class="text-light">
                        @php
                            $logo = DB::table('website_settings')
                                ->orderByDESC('created_at')
                                ->first()->logo;
                        @endphp
                        <img src="{{ env('APP_URL') . 'content/' . $logo }}" alt=""
                            style="width: 50px; height: 50px;" class="website-logo mt-1 mb-1">
                    </h5>
                    <ul class="links list-unstyled lh-lg d-flex justify-content-center gap-3 flex-wrap">
                        <li><a class="text-light" href="{{ route('pages.home') }}">{{ __('Home') }}</a></li>
                        <li><a class="text-white-50" href="{{ route('pages.coupons') }}"> {{ __('Coupons') }} </a></li>
                        <li><a class="text-white-50" href="{{ route('pages.about') }}"> {{ __('About') }} </a></li>
                        <li><a class="text-white-50" href="{{ route('pages.fqs') }}"> {{ __('Common Questions') }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
