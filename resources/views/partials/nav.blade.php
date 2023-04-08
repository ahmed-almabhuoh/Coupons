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
            <path fill="none" d="M0 0h24v24H0z" />
            <path
                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
        </svg><span class="menu-title text-truncate" data-i18n="Chat">Update account</span></a>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('manage.admins.password') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-message-square">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
            </rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
        </svg><span class="menu-title text-truncate" data-i18n="Chat">Change password</span></a>
</li>
