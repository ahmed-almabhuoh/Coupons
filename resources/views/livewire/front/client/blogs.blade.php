<div class="container">
    <div class="row">
        <div class="main-title fw-bold fs-2 d-flex justify-content-center text-center mb-5 position-relative ">
            <h2 class="position-absolute "> Blog</h2>
        </div>
    </div>
    <div class="row">

        <div class="dropdown" wire:ignore>
            <a class="btn  dropdown-toggle blog" href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
                All
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach ($stores as $store)
                    <li wire:click="dropForStores('{{ $store->id }}')"><a class="dropdown-item text-black-50"
                            href="#">{{ $store->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="filter-buttons">
            <ul id="filter-btns">
                <li class="{{ $selectedCategory == 'all' ? 'active' : '' }}" data-target="all" wire:click="selectByCAT">
                    All</li>
                @foreach ($categories as $category)
                    <li class="{{ $selectedCategory == $category->id ? 'active' : '' }}"
                        wire:click="selectByCAT('{{ $category->id }}')">
                        {{ $category->name }}
                    </li>
                @endforeach
            </ul>
        </div>


    </div>
    <div class="row mb-lg-3">
        <!-- =============Start portfolio=========== -->

        <div class="portfolio-gallery offers-product" id="portfolio-gallery">
            @if (!count($blogs))
                <h3>No blogs found here!</h3>
            @endif

            @foreach ($blogs as $blog)
                <div class="item" data-id="Fashion">
                    <!-- card #1 -->
                    <div class="card offers-product blog">
                        <img src="{{ env('APP_URL') . 'content/' . $blog->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title blog">{{ $blog->title }}</h6>
                            </p>
                        </div>
                        <div class="position-relative">
                            <div class="bottom-text mb-5 d-flex justify-content-around">
                                <button class="button blog btn btn-primary"><span class="m-auto">Git it</span></button>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

            <!-- ============================================= -->
            <!-- =============Start portfolio=========== -->
        </div>

    </div>
</div>
