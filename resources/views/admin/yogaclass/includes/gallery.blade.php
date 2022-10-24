@if($product->gallery)
@foreach ($product->gallery as $image)
    <div class="col-3">
        <img src="{{ asset('uploads/products/gallery/' . $image->product_image) }}" alt="{{ $product->title }}" class="img-fluid">
        <a  id="delete-gallery" data-id="{{ $image->id }}" class="btn btn-danger btn-sm">
            <i data-feather="x"></i>
        </a>
    </div>
@endforeach
@endif