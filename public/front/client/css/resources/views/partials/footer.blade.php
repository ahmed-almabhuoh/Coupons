<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">{{ __('COPYRIGHT') }} &copy;
            {{ Date::now()->year }}<a class="ms-25" href="{{ env('APP_URL') }}"
                target="_blank">{{ __(env('APP_NAME')) }}</a><span class="d-none d-sm-inline-block">,
                {{ __('All rights Reserved') }}</span></span><span
            class="float-md-end d-none d-md-block">{{ __(env('APP_NAME')) }} {{ __('& Made with') }}<i
                data-feather="heart"></i></span></p>
</footer>
