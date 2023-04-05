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

<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">{{ __('Categories') }}</span><svg
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
