{{-- Dashboard --}}
<li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i data-feather="home"></i><span
            class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span
            class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="dashboard-analytics.html"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="eCommerce">eCommerce</span></a>
        </li>
    </ul>
</li>


<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">{{ __('Human Resources') }}</span><svg
        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-more-horizontal">
        <circle cx="12" cy="12" r="1"></circle>
        <circle cx="19" cy="12" r="1"></circle>
        <circle cx="5" cy="12" r="1"></circle>
    </svg>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shield"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('Admins') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('admins.index') }}"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('admins.create') }}"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="Add"> {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('Users') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('users.index') }}"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('users.create') }}"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="Add"> {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">{{ __('Content Management') }}</span><svg
        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-more-horizontal">
        <circle cx="12" cy="12" r="1"></circle>
        <circle cx="19" cy="12" r="1"></circle>
        <circle cx="5" cy="12" r="1"></circle>
    </svg>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="list"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('Categories') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('categories.index') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate"
                    data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('categories.create') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                    {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shopping-bag"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('Stores') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('stores.index') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate"
                    data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('stores.create') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                    {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="tag"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('Coupons') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('coupons.index') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate"
                    data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('coupons.create') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                    {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="package"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('Products') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('products.index') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate"
                    data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('products.create') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                    {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

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
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-message-square">
            {{-- <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
            </path> --}}
            <path
                d="M20 22C20 20.8954 19.1046 20 18 20H6C4.89543 20 4 20.8954 4 22V19C4 17.9391 4.42143 16.9217 5.17157 16.1716C5.92172 15.4214 6.93913 15 8 15H16C17.0609 15 18.0783 15.4214 18.8284 16.1716C19.5786 16.9217 20 17.9391 20 19V22Z" />
            <path
                d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" />
        </svg><span class="menu-title text-truncate" data-i18n="Chat">Update account</span></a>
</li>
