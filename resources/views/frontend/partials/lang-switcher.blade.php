@php
    $site = DB::table('website_settings')->first();
@endphp

@if ($site->lang_is_shown)
    <nav class="header">
        <div class="language-switcher">
            <ul>
                <li><a href="{{ route('admins.change.locale', 'en') }}"
                        class="{{ session('lang') == 'en' ? 'active' : '' }}">{{ __('English') }}</a></li>
                <li><a href="{{ route('admins.change.locale', 'en') }}"
                        class="{{ session('lang') == 'ar' ? 'active' : '' }}">{{ __('Arabic') }}</a></li>
            </ul>
        </div>
    </nav>
@endif
