<section class="arrival-product padding-y-120 position-relative z-index-1">
    <div class="container container-two">

        <div class="section-heading">
            <h3 class="section-heading__title">Recently Arrived New Items</h3>
        </div>

        <ul class="nav common-tab justify-content-center nav-pills mb-48" id="pills-tab" role="tablist">
            @foreach ($featuredItems as $category => $item)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="pills-all-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-{{ Str::replace(' ', '-', $category) }}" type="button" role="tab"
                        aria-controls="pills-all" aria-selected="false" tabindex="-1">{{ $category }}</button>
                </li>
            @endforeach

        </ul>

        <div class="tab-content" id="pills-tabContent">
            @foreach ($featuredItems as $category => $items)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pills-{{ Str::replace(' ', '-', $category) }}" role="tabpanel"
                    aria-labelledby="pills-all-tab" tabindex="0">
                    <div class="row gy-4">
                        @foreach ($items as $product)
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="product-item {{ $product->preview_type == 'video' ? 'product-video' : '' }}">
                                    <div class="product-item__thumb d-flex">
                                       
                                            @if ($product->preview_type == 'image')
                                            <a href="{{ route('products.show', $product->slug) }}" class="link w-100">
                                                <img src="{{ asset($product->preview_image) }}" alt="" class="product-img">
                                            </a>
                                            @elseif($product->preview_type == 'video')
                                                <video class="player" playsinline controls data-poster="">
                                                    <source src="{{ asset($product->preview_video) }}" type="video/mp4" />
                                                </video>
                                            @elseif($product->preview_type == 'audio')
                                                <audio class="audio-player" controls>
                                                    <source src="{{ asset($product->preview_audio) }}" type="audio/mp3" />
                                                </audio>
                                            @endif
                                    </div>
                                    <div class="product-item__content">
                                        <div class="product-item__bottom flx-between gap-2">
                                            <div class="d-flex flex-wrap justify-content-between align-items-center w-100">
                            
                                                <div class="d-flex align-items-center gap-1">
                                                    <ul class="star-rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if(round($product->reviews_avg_stars) >= $i)
                                                            <li class="star-rating__item font-11"><i class="fas fa-star"></i></li>
                                                           @else 
                                                            <li class="star-rating__item font-11"><i class="fas fa-star text-muted"></i></li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                    <span class="star-rating__text text-heading fw-500 font-14">
                                                        ({{ $product->reviews_count }})</span>
                                                </div>
                                                <span class="product-item__sales font-14"><i class="ti ti-download"></i>{{ $product->sales_count }}</span>
                            
                                            </div>
                                        </div>
                                        <h6 class="product-item__title">
                                            <a href="{{ route('products.show', $product->slug) }}" class="link">{{ $product->name }}</a>
                                        </h6>
                                        <div class="product-item__info flx-between gap-2">
                                            <span class="product-item__author">
                                                {{ __('by') }}
                                                <a href="profile.html" class="link hover-text-decoration-underline">{{ $product->author->name }}</a>
                                            </span>
                                            <div class="flx-align gap-2">
                                                @if ($product->discount_price > 0)
                                                    <h6 class="product-item__price mb-0">${{ $product->discount_price }}</h6>
                                                    <span class="product-item__prevPrice text-decoration-line-through">${{ $product->price }}</span>
                                                @else
                                                    <h6 class="product-item__price mb-0">${{ $product->price }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_item_footer">
                                            @if(in_array($product->id, session('purchase_ids', [])))
                                            <a class="product_cart bg-warning text-white"  href="javascript:;">
                                                <i class="ti ti-shopping-cart-plus"></i> <span id="cart-btn-{{ $product->id }}">{{ __('Already Purchased') }}</span>
                                            </a>
                                            @else
                                            <a class="product_cart add-cart" data-id="{{ $product->id }}" href="javascript:;">
                                                <i class="ti ti-shopping-cart-plus"></i> <span id="cart-btn-{{ $product->id }}">{{ __('Add to cart') }}</span>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>

        <div class="text-center mt-64">
            <a href="{{ route('products') }}" class="btn btn-main btn-lg fw-300">
                {{ __('View All Products') }}
            </a>
        </div>

    </div>
</section>
