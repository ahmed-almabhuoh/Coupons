<style>
    li {
        font-family: 'Cairo', sans-serif !important;
    }
</style>

{{-- Dashboard --}}
{{-- <li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i data-feather="home"></i><span
            class="menu-title text-truncate" data-i18n="Dashboards"> {{ __('Dashboards') }} </span><span
            class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="dashboard-analytics.html"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="eCommerce">eCommerce</span></a>
        </li>
    </ul>
</li> --}}


@if (auth()->user()->can('view-admins') ||
        auth()->user()->can('create-admin') ||
        auth()->user()->can('view-users') ||
        auth()->user()->can('create-users'))
    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">{{ __('Human Resources') }}</span><svg
            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-more-horizontal">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="19" cy="12" r="1"></circle>
            <circle cx="5" cy="12" r="1"></circle>
        </svg>
    </li>
@endif

@if (auth()->user()->can('view-admins') ||
        auth()->user()->can('create-admin'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shield"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">{{ __('Admins') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-admins'))
                <li><a class="d-flex align-items-center" href="{{ route('admins.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-admin'))
                <li><a class="d-flex align-items-center" href="{{ route('admins.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if (auth()->user()->can('view-users') ||
        auth()->user()->can('create-user'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">{{ __('Users') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-users'))
                <li><a class="d-flex align-items-center" href="{{ route('users.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-user'))
                <li><a class="d-flex align-items-center" href="{{ route('users.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif


@if (auth()->user()->can('view-categories') ||
        auth()->user()->can('create-category') ||
        auth()->user()->can('view-users') ||
        auth()->user()->can('create-users'))
    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">{{ __('Content Management') }}</span><svg
            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-more-horizontal">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="19" cy="12" r="1"></circle>
            <circle cx="5" cy="12" r="1"></circle>
        </svg>
    </li>
@endif

@if (auth()->user()->can('view-categories') ||
        auth()->user()->can('create-category') ||
        auth()->user()->can('view-stores') ||
        auth()->user()->can('create-store') ||
        auth()->user()->can('view-coupons') ||
        auth()->user()->can('create-coupon') ||
        auth()->user()->can('view-products') ||
        auth()->user()->can('create-product'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="list"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">{{ __('Categories') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-categories'))
                <li><a class="d-flex align-items-center" href="{{ route('categories.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-category'))
                <li><a class="d-flex align-items-center" href="{{ route('categories.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if (auth()->user()->can('view-countries') ||
        auth()->user()->can('create-country'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="globe"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">{{ __('Countries') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-countries'))
                <li><a class="d-flex align-items-center" href="{{ route('countries.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-country'))
                <li><a class="d-flex align-items-center" href="{{ route('countries.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if (auth()->user()->can('view-stores') ||
        auth()->user()->can('create-store'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                data-feather="shopping-bag"></i><span class="menu-title text-truncate"
                data-i18n="Invoice">{{ __('Stores') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-stores'))
                <li><a class="d-flex align-items-center" href="{{ route('stores.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-store'))
                <li><a class="d-flex align-items-center" href="{{ route('stores.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if (auth()->user()->can('view-coupons') ||
        auth()->user()->can('create-coupon'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="tag"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">{{ __('Coupons') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-coupons'))
                <li><a class="d-flex align-items-center" href="{{ route('coupons.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-coupon'))
                <li><a class="d-flex align-items-center" href="{{ route('coupons.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if (auth()->user()->can('view-products') ||
        auth()->user()->can('create-product'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="package"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">{{ __('Products') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-products'))
                <li><a class="d-flex align-items-center" href="{{ route('products.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-product'))
                <li><a class="d-flex align-items-center" href="{{ route('products.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if (auth()->user()->can('view-A&Qs') ||
        auth()->user()->can('create-A&Q'))
    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">{{ __('Site Settings') }}</span><svg
            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-more-horizontal">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="19" cy="12" r="1"></circle>
            <circle cx="5" cy="12" r="1"></circle>
        </svg>
    </li>
@endif

@if (auth()->user()->can('view-A&Qs') ||
        auth()->user()->can('create-A&Q') ||
        auth()->user()->can('view-offers') ||
        auth()->user()->can('create-offer') ||
        auth()->user()->can('view-blogs') ||
        auth()->user()->can('create-blog'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                data-feather="help-circle"></i><span class="menu-title text-truncate"
                data-i18n="Invoice">{{ __('FQs') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-A&Qs'))
                <li><a class="d-flex align-items-center" href="{{ route('aqs.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-A&Q'))
                <li><a class="d-flex align-items-center" href="{{ route('aqs.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if (auth()->user()->can('view-offers') ||
        auth()->user()->can('create-offer'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                data-feather="play-circle"></i><span class="menu-title text-truncate"
                data-i18n="Invoice">{{ __('Offers') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-offers'))
                <li><a class="d-flex align-items-center" href="{{ route('offers.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-offer'))
                <li><a class="d-flex align-items-center" href="{{ route('offers.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif

{{-- @if (auth()->user()->can('view-blogs') ||
    auth()->user()->can('create-blog'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">{{ __('Blogs') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-blogs'))
                <li><a class="d-flex align-items-center" href="{{ route('blogs.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-blog'))
                <li><a class="d-flex align-items-center" href="{{ route('blogs.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif --}}

{{-- @if (auth()->user()->can('view-articles') ||
    auth()->user()->can('create-article'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="book-open"></i><span
                class="menu-title text-truncate" data-i18n="Invoice">{{ __('Articals') }}</span></a>
        <ul class="menu-content">
            @if (auth()->user()->can('view-articles'))
                <li><a class="d-flex align-items-center" href="{{ route('articals.index') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate"
                            data-i18n="List">{{ __('List') }}</span></a>
                </li>
            @endif
            @if (auth()->user()->can('create-article'))
                <li><a class="d-flex align-items-center" href="{{ route('articals.create') }}"><i
                            data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('Add') }} </span></a>
                </li>
            @endif
        </ul>
    </li>
@endif --}}

@if (auth()->user()->can('manage-website'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('logo.setup') }}">
            <i data-feather="image"></i>
            <span class="menu-title text-truncate" data-i18n="Chat">{{ __('Setup Website') }}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('assign-permissions') ||
        auth()->user()->can('create-role') ||
        auth()->user()->can('view-roles') ||
        auth()->user()->can('edit-role') ||
        auth()->user()->can('delete-role'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('roles.management') }}">
            <i data-feather="user-check"></i>
            <span class="menu-title text-truncate" data-i18n="Chat">{{ __('Roles Management') }}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('contact-us'))
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('contacts.index') }}">
            <i data-feather="phone"></i>
            <span class="menu-title text-truncate" data-i18n="Chat">{{ __('Contact Us') }}</span>
        </a>
    </li>
@endif

<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">{{ __('Account Settings') }}</span><svg
        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-more-horizontal">
        <circle cx="12" cy="12" r="1"></circle>
        <circle cx="19" cy="12" r="1"></circle>
        <circle cx="5" cy="12" r="1"></circle>
    </svg>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('manage.admins.accounts') }}">
        <i data-feather="settings"></i>
        <span class="menu-title text-truncate" data-i18n="Chat">{{ __('Update account') }}</span></a>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('manage.admins.password') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-message-square">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
            </rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
        </svg><span class="menu-title text-truncate" data-i18n="Chat">{{ __('Change password') }}</span></a>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('logout') }}">
        <i data-feather="log-out"></i>
        <span class="menu-title text-truncate" data-i18n="Chat">{{ __('Logout') }}</span>
    </a>
</li>
