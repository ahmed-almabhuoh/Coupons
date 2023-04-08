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

<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('logout') }}">
        <svg fill="#000000" height="14px" width="14px" version="1.1" id="Capa_1"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 384.971 384.971" xml:space="preserve">
            <g>
                <g id="Sign_Out">
                    <path
                        d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03
       C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03
       C192.485,366.299,187.095,360.91,180.455,360.91z" />
                    <path
                        d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279
       c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179
       c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z" />
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
            </g>
        </svg>
        <span class="menu-title text-truncate" data-i18n="Chat">Logout</span>
    </a>
</li>
