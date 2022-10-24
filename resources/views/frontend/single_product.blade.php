@extends('frontend.layouts.app')

@section('title')
    Single Product
@endsection

@section('shop')
    current-menu-item
@endsection

@section('body_class')
    home
@endsection

@section('css')

@endsection

@section('content')

<div class="pageHeader" style="background-image: url({{ asset('frontend_assets/images/content/catalog.jpg')}});">
    <h1>ONLINE BOUTIQUE</h1>
</div>
<div class="contentWrap">
    <div class="pagePanel clear">
        <ul class="productFilter clear">
            {{-- <li><a class="active" href="#">All </a></li>
            @foreach (categories() as $category)
            <li><a href="#">{{ $category->name }}</a></li>
            @endforeach --}}
        </ul>
        {{-- <div class="miniCart">
            <i></i>
            <span>2</span>
        </div> --}}
    </div>
    <div class="singleProductWrap">
        <div class="wrapper clear">
            <div class="productGallery clear">
                <div class="galleryThumb">
                    @foreach ($single_product->get_shop_thumb as $thumb)
                    <a href="#imgId_{{ $loop->index }}" class="galleryThumbItem active">
                        <img src="{{ asset('uploads/shops')}}/{{ $thumb->thumb_image }}" alt="">
                    </a>
                    @endforeach
                    {{-- <a href="#imgId2" class="galleryThumbItem">
                        <img src="{{ asset('frontend_assets/images/content/galleryThumb2.jpg')}}" alt="">
                    </a>
                    <a href="#imgId3" class="galleryThumbItem">
                        <img src="{{ asset('frontend_assets/images/content/galleryThumb3.jpg')}}" alt="">
                    </a>
                    <a href="#imgId4" class="galleryThumbItem">
                        <img src="{{ asset('frontend_assets/images/content/galleryThumb4.jpg')}}" alt="">
                    </a> --}}
                </div>
                <div class="productGalleryWrap">
                    @foreach ($single_product->get_shop_thumb as $thumb)
                    <img class="{{ $loop->index ? 'current' : ''}}" id="imgId_{{ $loop->index }}" src="{{ asset('uploads/shops')}}/{{ $thumb->thumb_image }}" alt="">
                    @endforeach
                    {{-- <img id="imgId2" src="{{ asset('frontend_assets/images/content/proImg2.jpg')}}" alt="">
                    <img id="imgId3" src="{{ asset('frontend_assets/images/content/proImg3.jpg')}}" alt="">
                    <img id="imgId4" src="{{ asset('frontend_assets/images/content/proImg4.jpg')}}" alt=""> --}}
                </div>
            </div>
            <div class="productDesc">
                <h1>{{ $single_product->name ?? 'N/A'}} {{ $single_product->thick ?? ''}}mm</h1>
                <div class="price"><span>$</span>{{ $single_product->price ?? ''}}</div>
                <p>{!! $single_product->description !!}</p>
                {{-- <div class="options clear">
                    <select id="options" name="" >
                        <option value="black">Select Size</option>
                        <option value="black">1m*1m</option>
                        <option value="pink">2m*2m</option>
                    </select>
                    <select id="options2" name="" >
                        <option value="black">Select Color</option>
                        <option value="black">Black</option>
                        <option value="pink">Pink</option>
                    </select>
                </div> --}}
                <form action="{{ route('cart.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $single_product->id }}">
                    <button class="addToCart" type="submit">{{ __("ADD TO CART") }}</button>
                </form>
                <div class="shareSingleProduct">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="relatedProducts">
        <div class="blockTitle">{{ __("Related products") }}</div>
        <div class="shopItems">
            <div class="shopItemsWrap">
                @foreach ($related_products as $related)
                <a href="{{ route('single_product', $related->slug) }}" class="shopItem">
                    <img src="{{ asset('uploads/shops')}}/{{ $related->image }}" alt="">
                    <div class="overlay">
                        <div class="shopItemTextWrap">
                            <p>{{ $related->name }} ({{ $related->thick }}mm)</p>
                        </div>
                        <span class="price"><span>$</span>{{ $related->price }}</span>
                    </div>
                </a>
                @endforeach
                {{-- <a href="#" class="shopItem">
                    <img src="{{ asset('frontend_assets/images/content/shopitem.jpg')}}" alt="">
                    <div class="overlay">
                        <div class="shopItemTextWrap">
                            <p>Citron Sundial Yoga Mat (5mm)</p>
                        </div>
                        <span class="price"><span>$</span>28</span>
                    </div>
                </a>
                <a href="#" class="shopItem">
                    <img src="{{ asset('frontend_assets/images/content/shopitem1.jpg')}}" alt="">
                    <div class="overlay">
                        <div class="shopItemTextWrap">
                            <p>Citron Sundial Yoga Mat (5mm)</p>
                        </div>
                        <span class="price"><span>$</span>28</span>
                    </div>
                </a>
                <a href="#" class="shopItem">
                    <img src="{{ asset('frontend_assets/images/content/shopitem2.jpg')}}" alt="">
                    <div class="overlay">
                        <div class="shopItemTextWrap">
                            <p>Citron Sundial Yoga Mat (5mm)</p>
                        </div>
                        <span class="price"><span>$</span>28</span>
                    </div>
                </a>
                <a href="#" class="shopItem">
                    <img src="{{ asset('frontend_assets/images/content/shopitem0.jpg')}}" alt="">
                    <div class="overlay">
                        <div class="shopItemTextWrap">
                            <p>Citron Sundial Yoga Mat (5mm)</p>
                        </div>
                        <span class="price"><span>$</span>28</span>
                    </div>
                </a> --}}
            </div>
        </div>
    </div>
    <div class="miniCartPopup">
        <div class="miniCartPopupHead">
            <h3>{{ __("YOUR CART") }}</h3>
            <span class="closeCartPopup"></span>
        </div>
        <div class="miniCartItemWrap">
            <div class="miniCartItem">
                <a href="#" class="miniCartItemImg">
                    <img src="{{ asset('frontend_assets/images/content/miniCartImg.jpg')}}" alt="">
                </a>
                <h3>
                    <a href="#">{{ __("Giam Sol Premum-Grip Yoga Mat") }} (8mm)</a>
                </h3>
                <p class="price">$28</p>
                <div class="quantity clear">
                    <span>{{ __("Quantity") }}</span>
                    <input class="" type="text" name="" size="20" value="1" placeholder="">
                </div>
                <span class="removeMiniCartItem"></span>
            </div>
            <div class="miniCartItem">
                <a href="#" class="miniCartItemImg">
                    <img src="{{ asset('frontend_assets/images/content/miniCartImg2.jpg')}}" alt="">
                </a>
                <h3>
                    <a href="#">{{ __("Giam Sol Premum-Grip Yoga Mat") }} (8mm)</a>
                </h3>
                <p class="price">$28</p>
                <div class="quantity clear">
                    <span>{{ __("Quantity") }}</span>
                    <input class="" type="text" name="" size="20" value="1" placeholder="">
                </div>
                <span class="removeMiniCartItem"></span>
            </div>
            <div class="miniCartSubTotal">
                {{ __("Subtotal") }}
                <span>$46</span>
            </div>
            <a href="#" class="btnViewCart">{{ __("view cart") }}</a>
            <a href="#" class="btnCheckout">{{ __("checkout") }}</a>
        </div>
    </div>
    <div class="overlay"></div>
</div>


@endsection


@section('js')

@endsection
