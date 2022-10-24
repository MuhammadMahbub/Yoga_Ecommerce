@extends('frontend.layouts.app')

@section('title')
    Shop
@endsection

@section('shop')
    current-menu-item
@endsection

@section('body_class')
    home
@endsection

@section('css')
    <style>
        .shopItemsWrap{
            padding-top: 80px;
        }
        .shopItem img{
            width: 300px;
            height: 300px;
        }
    </style>
@endsection

@section('content')


<div class="pageHeader" style="background-image: url({{asset('uploads/shops')}}/{{ $shopbanner->banner_image }});">
    <h1>{{ $shopbanner->banner_title }}</h1>
</div>
<div class="contentWrap">
    <div class="pagePanel clear">
        {{-- <ul class="productFilter clear">
            <li><a class="active" href="#">All </a></li>
            @foreach (categories() as $category)
            <li><a href="#">{{ $category->name }}</a></li>
            @endforeach
        </ul> --}}
        {{-- <div class="miniCart">
            <i></i>
            <span>2</span>
        </div> --}}
    </div>
    <div class="shopItems">
        <div class="shopItemsWrap" id="products_load_more">

            @include('frontend.includes.shop_load_more')

            {{-- <a href="single-product.html" class="shopItem">
                <img src="{{asset('frontend_assets/images')}}/content/shopitem.jpg" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{asset('frontend_assets/images')}}/content/shopitem1.jpg" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{asset('frontend_assets/images')}}/content/shopitem2.jpg" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{asset('frontend_assets/images')}}/content/shopitem0.jpg" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{asset('frontend_assets/images')}}/content/shopitem.jpg" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{asset('frontend_assets/images')}}/content/shopitem1.jpg" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a>
            <a href="single-product.html" class="shopItem">
                <img src="{{asset('frontend_assets/images')}}/content/shopitem2.jpg" alt="">
                <div class="overlay">
                    <div class="shopItemTextWrap">
                        <p>Citron Sundial Yoga Mat (5mm)</p>
                    </div>
                    <span class="price"><span>$</span>28</span>
                </div>
            </a> --}}
        </div>
        <a href="#!" data-count="8" class="load_more_products load_more_button showAllItems">{{ __("LOAD MORE") }}</a>
    </div>
    <div class="miniCartPopup">
        <div class="miniCartPopupHead">
            <h3>{{ __("YOUR CART") }}</h3>
            <span class="closeCartPopup"></span>
        </div>
        <div class="miniCartItemWrap">
            <div class="miniCartItem">
                <a href="#" class="miniCartItemImg">
                    <img src="{{asset('frontend_assets/images')}}/content/miniCartImg.jpg" alt="">
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
                    <img src="{{asset('frontend_assets/images')}}/content/miniCartImg2.jpg" alt="">
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
    <script>
        $(document).ready(function () {
            $('.load_more_products').click(function () {

                let count = $(this).attr('data-count');
                // alert(count)
                let load_more = $(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('shops.load_more') }}",
                    type: "post",
                    data:{
                        count: count,
                    },
                    success: function(data)
                    {

                        $(load_more).attr('data-count', data.count);

                        if ((1*data.shop_count) < 8) {
                            $('.load_more_button').hide();
                        }

                        $('#products_load_more').append(data.data);

                    }
                })

            });
        });
    </script>
@endsection
