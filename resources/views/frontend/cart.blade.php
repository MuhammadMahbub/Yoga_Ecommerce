@extends('frontend.layouts.app')

@section('title')
    Cart
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
<div class="contentWrap">
    <div class="pagePanel clear">
        <div class="pageTitle">your cart</div>
        {{-- <div class="miniCart">
            <i></i>
            <span>{{ cartItem()->count() }}</span>
        </div> --}}
    </div>
    <div class="cartPage clear">
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>{{ __("Price") }}</th>
                        <th>{{ __("Quantity") }}</th>
                        <th>{{ __("Total") }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (cartItem() as $item)
                        <tr>
                            <td>
                                <div class="cartProduct">
                                    <a href="#" class="cartProductImg">
                                        <img src="{{asset('uploads/shops')}}/{{ $item->product->image }}" alt="">
                                    </a>
                                    <h4><a href="{{ route('single_product', $item->product->slug) }}">{{ $item->product->name }} ({{ $item->product->thick }}mm)</a></h4>
                                </div>
                            </td>
                            <td>{{ $item->product->price }}€</td>
                            <td>
                                <div class="quantityBox">
                                    <input type="hidden" name="ids[]" value="{{ $item->id }}">
                                    <input class="" type="number" name="quantity[]" min="1" value="{{ $item->quantity }}" placeholder="">
                                </div>
                            </td>
                            <td>{{ $item->product->price*$item->quantity }}€</td>
                            <td><a href="{{ route('cart.remove', $item->id) }}" class="removeCartItem"></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="clear"></div>
            <div class="cartTotals">
                {{-- <div class="coupon">
                    <form>
                        <label>
                            coupon
                        </label>
                        <input class="" type="text" name="" size="20" value="" placeholder="Enter Coupon">
                        <input class="applyCoupon" type="button" value="Submit">
                    </form>
                </div> --}}
                <div class="cartTotalsWrap clear">
                    <h2>{{ __("Cart totals") }}</h2>
                    <p>{{ __("Subtotal") }} <span>{{ cartTotal() }}€</span></p>
                    <p>{{ __("Shipping") }} <span>{{ __("Free Shipping") }}</span></p>
                    <p>{{ __("Total") }} <span>{{ cartTotal() }}€</span></p>
                    <input class="updateCartBtn" type="submit" name="update_button" value="update cart">
                    <input class="checkoutBtn" type="submit" name="checkout_btn" value="checkout">
                </div>
            </div>
        </form>
        {{-- <div class="calculateShipping">
            <label>Calculate Shipping</label>
            <p class="form-row">
                <select class="country_to_state">
                    <option value="">Select a country…</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
            </p>
            <p class="form-row stateCountry">
                <input class="" type="text" name="" size="20" value="" placeholder="State / Country">
            </p>
            <p class="form-row postcodeZip">
                <input class="" type="text" name="" size="20" value="" placeholder="Postcode / Zip">
            </p>
            <button type="submit">update totals</button>
        </div> --}}
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
                    <a href="#">Giam Sol Premum-Grip Yoga Mat (8mm)</a>
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
                    <a href="#">Giam Sol Premum-Grip Yoga Mat (8mm)</a>
                </h3>
                <p class="price">$28</p>
                <div class="quantity clear">
                    <span>Quantity</span>
                    <input class="" type="text" name="" size="20" value="1" placeholder="">
                </div>
                <span class="removeMiniCartItem"></span>
            </div>
            <div class="miniCartSubTotal">
                Subtotal
                <span>$46</span>
            </div>
            <a href="#" class="btnViewCart">view cart</a>
            <a href="#" class="btnCheckout">checkout</a>
        </div>
    </div>
    <div class="overlay"></div>
</div>



@endsection


@section('js')
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection
