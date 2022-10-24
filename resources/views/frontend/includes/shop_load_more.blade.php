@foreach ($shops as $shop)
    <a href="{{ route('single_product', $shop->slug) }}" class="shopItem">
        <img src="{{asset('uploads/shops')}}/{{ $shop->image }}" alt="">
        <div class="overlay">
            <div class="shopItemTextWrap">
                <p>{{ $shop->name }} ({{ $shop->thick }}mm)</p>
            </div>
            <span class="price"><span></span>{{ $shop->price }}€</span>
        </div>
    </a>
@endforeach
