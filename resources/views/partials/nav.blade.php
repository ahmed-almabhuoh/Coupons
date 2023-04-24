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

<li class=" navigation-header"><span data-i18n="Apps &amp; Pages">{{ __('Site Settings') }}</span><svg
        xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-more-horizontal">
        <circle cx="12" cy="12" r="1"></circle>
        <circle cx="19" cy="12" r="1"></circle>
        <circle cx="5" cy="12" r="1"></circle>
    </svg>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="help-circle"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('FQs') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('aqs.index') }}"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('aqs.create') }}"><i data-feather="circle"></i><span
                    class="menu-item text-truncate" data-i18n="Add">
                    {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="play-circle"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('Offers') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('offers.index') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate"
                    data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('offers.create') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                    {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('Blogs') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('blogs.index') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate"
                    data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('blogs.create') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                    {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="book-open"></i><span
            class="menu-title text-truncate" data-i18n="Invoice">{{ __('Articals') }}</span></a>
    <ul class="menu-content">
        <li><a class="d-flex align-items-center" href="{{ route('articals.index') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate"
                    data-i18n="List">{{ __('List') }}</span></a>
        </li>
        <li><a class="d-flex align-items-center" href="{{ route('articals.create') }}"><i
                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">
                    {{ __('Add') }} </span></a>
        </li>
    </ul>
</li>

<li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('contacts.index') }}">
        <i data-feather="phone"></i>
        <span class="menu-title text-truncate" data-i18n="Chat">Contact Us</span>
    </a>
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
        <i data-feather="settings"></i>
        <span class="menu-title text-truncate" data-i18n="Chat">Update account</span></a>
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
        <i data-feather="log-out"></i>
        <span class="menu-title text-truncate" data-i18n="Chat">Logout</span>
    </a>
</li>
