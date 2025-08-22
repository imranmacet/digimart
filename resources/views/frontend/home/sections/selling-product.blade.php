<section class="selling-product padding-y-120 position-relative z-index-1 overflow-hidden"
style="background: url({{ asset('assets/frontend/images/thumbs/selling-product-bg.jpg') }});">

<div class="container container-two">
    <div class="row justify-content-between align-items-center">
        <div class="col-xl-5">
            <div class="section-heading style-left style-white flx-between max-w-unset gap-4 mb-0">
                <div>
                    <h3 class="section-heading__title">{{ $monthlyPickedProductSection?->title }}</h3>
                    <p class="section-heading__desc font-18">{{ $monthlyPickedProductSection?->content }}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="selling-product-slider">
                @foreach ($monthlyPickedProducts as $product)
                <div class="product-item {{ $product->preview_type == 'video' ? 'product-video' : '' }} shadow-sm overlay-none">
                    <div class="product-item__thumb d-flex max-h-unset">
                       
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
                @endforeach

                {{-- <div class="product-item shadow-sm overlay-none">
                    <div class="product-item__thumb d-flex max-h-unset">
                        <a href="product-details.html" class="link w-100">
                            <img src="assets/images/thumbs/product-img1.png" alt="" class="cover-img">
                        </a>
                    </div>
                    <div class="product-item__content">
                        <div class="product-item__bottom flx-between gap-2">
                            <div class="d-flex flex-wrap justify-content-between align-items-center w-100">

                                <div class="d-flex align-items-center gap-1">
                                    <ul class="star-rating">
                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                        </li>
                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                        </li>
                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                        </li>
                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                        </li>
                                        <li class="star-rating__item font-11"><i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                    <span class="star-rating__text text-heading fw-500 font-14">
                                        (16)</span>
                                </div>
                                <span class="product-item__sales font-14"><i class="ti ti-download"></i>
                                    1200</span>

                            </div>
                        </div>
                        <h6 class="product-item__title">
                            <a href="product-details.html" class="link">Title here digital products new
                                marketplace
                                theme</a>
                        </h6>
                        <div class="product-item__info flx-between gap-2">
                            <span class="product-item__author">
                                by
                                <a href="profile.html" class="link hover-text-decoration-underline">
                                    themepix</a>
                            </span>
                            <div class="flx-align gap-2">
                                <h6 class="product-item__price mb-0">$56</h6>
                                <span class="product-item__prevPrice text-decoration-line-through">$65</span>
                            </div>
                        </div>
                        <div class="product_item_footer">
                            <a class="product_cart" href="#">
                                <i class="ti ti-shopping-cart-plus"></i>
                            </a>
                            <a href="product-details.html" class="btn btn-outline-light btn-sm ">Live
                                Demo</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</section>
