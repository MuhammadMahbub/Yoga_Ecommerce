@extends('frontend.layouts.app')

@section('title')
    Checkout
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

<div class="pageHeader" style="background-image: url({{ asset('frontend_assets/images')}}/content/cart.jpg);">
    <h1>ONLINE BOUTIQUE</h1>
</div>
<form action="{{ route('checkout.payment') }}" method="post">
    @csrf
<div class="contentWrap">
    <div class="pagePanel clear">
        <div class="pageTitle">{{ __("checkout") }}</div>
        {{-- <div class="miniCart">
            <i></i>
            <span>2</span>
        </div> --}}
    </div>
    <div class="checkoutPage clear">
        <div class="fcell">
            <h3>{{ __("Billing Details") }}</h3>
            <p class="form-row form-row-first">
                <label>{{ __("First Name") }}</label>
                <input id="billing_first_name" class="input-text " type="text" value="" placeholder="" name="billing_first_name">
            </p>
            <p class="form-row form-row-last">
                <label>{{ __("Last Name") }}</label>
                <input id="billing_last_name" class="input-text " type="text" value="" placeholder="" name="billing_last_name">
            </p>
            <div class="clear"></div>
            <p class="form-row form-row-wide">
                <label class="" for="billing_company">{{ __("Company Name") }}</label>
                <input id="billing_company" class="input-text " type="text" value="" placeholder="" name="billing_company">
            </p>
            <p class="form-row form-row-wide">
                <label class="" for="billing_address_1">{{ __("Address") }}</label>
                <input id="billing_address_1" class="input-text " type="text" value="" placeholder="Street address" name="billing_address_1">
            </p>
            <p class="form-row form-row-wide">
                <input id="billing_address_2" class="input-text " type="text" value="" placeholder="Apartment, suite, unit etc. (optional)" name="billing_address_2">
            </p>
            <p class="form-row form-row-wide">
                <label class="" for="billing_country">{{ __("Country") }}</label>
                <input id="billing_country" class="input-text " type="text" value="" placeholder="Town / City" name="billing_country">
            </p>
            <p class="form-row form-row-wide">
                <label class="" for="billing_city">{{ __("Town") }} / {{ __("City") }}</label>
                <input id="billing_city" class="input-text " type="text" value="" placeholder="Town / City" name="billing_city">
            </p>
            <p class="form-row form-row-first">
                <label class="" for="billing_state">{{ __("State") }} / {{ __("Country") }}</label>
                <input id="billing_state" class="input-text " type="text" name="billing_state" placeholder="State / County" value="">
            </p>
            <p class="form-row form-row-last">
                <label class="" for="billing_postcode">{{ __("Postcode") }} / {{ __("Zip") }}</label>
                <input id="billing_postcode" class="input-text " type="text" value="" placeholder="Postcode / Zip" name="billing_postcode">
            </p>
            <div class="clear"></div>
            <p class="form-row form-row-first">
                <label class="" for="billing_email">{{ __("Email Address") }}</label>
                <input id="billing_email" class="input-text " type="text" value="" placeholder="" name="billing_email">
            </p>
            <p class="form-row form-row-last">
                <label class="" for="billing_phone">{{ __("Phone") }}</label>
                <input id="billing_phone" class="input-text " type="text" value="" placeholder="" name="billing_phone">
            </p>
            <div class="clear"></div>
        </div>
        <div class="mcell">
            <h3>{{ __("Ship to a different address?") }}
                <label class="checkboxBox" for="checkboxId">
                    <input id="checkboxId" class="" type="checkbox" name="shipping_same_address" value="no">
                    <span></span>
                </label>
            </h3>
            <p class="form-row form-row-first">
                <label>{{ __("First Name") }}</label>
                <input id="billing_first_name2" class="input-text " type="text" value="" placeholder="" name="billing_first_name2">
            </p>
            <p class="form-row form-row-last">
                <label>{{ __("Last Name") }}</label>
                <input id="billing_last_name2" class="input-text " type="text" value="" placeholder="" name="billing_last_name2">
            </p>
            <div class="clear"></div>
            <p class="form-row form-row-wide">
                <label class="" for="billing_company2">{{ __("Company Name") }}</label>
                <input id="billing_company2" class="input-text " type="text" value="" placeholder="" name="billing_company2">
            </p>
            <p class="form-row form-row-wide">
                <label class="" for="billing_address_1_2">{{ __("Address") }}</label>
                <input id="billing_address_1_2" class="input-text " type="text" value="" placeholder="Street address" name="billing_address_1_2">
            </p>
            <p class="form-row form-row-wide">
                <input id="billing_address_2_2" class="input-text " type="text" value="" placeholder="Apartment, suite, unit etc. (optional)" name="billing_address_2_2">
            </p>
            <p class="form-row form-row-wide">
                <label class="" for="billing_country_2">{{ __("Country") }}</label>
                <input id="billing_country_2" class="input-text " type="text" value="" placeholder="Country" name="billing_country_2">
            </p>
            <p class="form-row form-row-wide">
                <label class="" for="billing_city_2">{{ __("Town") }} / {{ __("City") }}</label>
                <input id="billing_city_2" class="input-text " type="text" value="" placeholder="Town / City" name="billing_city_2">
            </p>
            <p class="form-row form-row-first">
                <label class="" for="billing_state_2">{{ __("State") }} / {{ __("Country") }}</label>
                <input id="billing_state_2" class="input-text " type="text" name="billing_state_2" placeholder="State / County" value="">
            </p>
            <p class="form-row form-row-last">
                <label class="" for="billing_postcode_2">{{ __("Postcode") }} / {{ __("Zip") }}</label>
                <input id="billing_postcode_2" class="input-text " type="text" value="" placeholder="Postcode / Zip" name="billing_postcode_2">
            </p>
            <div class="clear"></div>
            <p class="form-row form-row-wide">
                <label class="" for="order_notes">{{ __("Order Notes") }}</label>
                <input id="order_notes" class="input-text " type="text" value="" placeholder="" name="order_note">
            </p>
        </div>
        <div class="scell">
            <h3>{{ __("Your Order") }}</h3>
            <div class="cartItemWrap">
                @foreach (cartItem() as $item)
                    <div class="cartItem">
                        <a href="{{ route('single_product', $item->product->slug) }}" class="cartItemImg">
                            <img src="{{asset('uploads/shops')}}/{{ $item->product->image }}" alt="">
                        </a>
                        <h4><a href="{{ route('single_product', $item->product->slug) }}">{{ $item->product->name }} ({{ $item->product->thick }}mm)</a></h4>
                        <p>{{ $item->product->price }}€</p>
                        <p>Quantity: {{ $item->quantity }}</p>
                    </div>
                @endforeach
            </div>
            <div class="cartTotalsWrap clear">
                <p>{{ __("Cart Subtotal") }} <span>{{ cartTotal() }}€</span></p>
                <p>{{ __("Shipping") }} <span>{{ __("Free Shipping") }}</span></p>
                <p><strong>{{ __("Order Total") }} <span>{{ cartTotal() }}€</span></strong></p>
                <ul class="payment_methods methods">
                    {{-- <li class="payment_method_securetrading">
                        <input id="payment_method_securetrading" class="input-radio" type="radio" value="securetrading" name="payment_method">
                        <label for="payment_method_securetrading">
                        Direct Bank Transfer
                        </label>
                    </li>
                    <li class="payment_method_cheque">
                        <input id="payment_method_cheque" class="input-radio" type="radio" value="cheque" name="payment_method">
                        <label for="payment_method_cheque"> Cheque Payment </label>
                    </li> --}}
                    <li class="payment_method_paypal">
                        <input id="payment_method_paypal" checked class="input-radio" type="radio" value="stripe" name="payment_method">
                        <label for="payment_method_paypal">
                        Stripe
                        </label>
                    </li>
                </ul>
                <input class="checkoutBtn" id="checkoutButton" type="submit" value="Place order">
            </div>
        </div>
    </div>

    <div class="stripe mt-20" id="stripteButton">
        @php
            $cents = cartTotal()*100;
        @endphp


            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-amount="{{ $cents }}"
                data-name="Pay With stripe"
                data-description=""
                data-image="{{ asset('uploads/stripe_logo.png') }}"
                data-currency="eur"
                data-email=""
            >
            </script>
        </form>
    </div>
    <div class="miniCartPopup">
        <div class="miniCartPopupHead">
            <h3>YOUR CART</h3>
            <span class="closeCartPopup"></span>
        </div>
        <div class="miniCartItemWrap">
            <div class="miniCartItem">
                <a href="#" class="miniCartItemImg">
                    <img src="{{ asset('frontend_assets/images')}}/content/miniCartImg.jpg" alt="">
                </a>
                <h3>
                    <a href="#">{{ __("Giam Sol Premum-Grip Yoga Mat") }} (8mm)</a>
                </h3>
                <p class="price">$28</p>
                <div class="quantity clear">
                    <span>Quantity</span>
                    <input class="" type="text" name="" size="20" value="1" placeholder="">
                </div>
                <span class="removeMiniCartItem"></span>
            </div>
            <div class="miniCartItem">
                <a href="#" class="miniCartItemImg">
                    <img src="{{ asset('frontend_assets/images')}}/content/miniCartImg2.jpg" alt="">
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
                Subtotal
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
    $(document).ready(function(){
        $('#stripteButton').hide();
        $('#checkoutButton').click(function(e){
            e.preventDefault();
            console.log('clicked');
            $('.stripe-button-el span').click();
        });
    });
</script>
@endsection
