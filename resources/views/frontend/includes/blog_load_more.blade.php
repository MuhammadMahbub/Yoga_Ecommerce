@foreach ($blogs as $blog)
    <div class="postItem">
        <div class="blogPostImg">
            <a href="{{ route('single_post', $blog->slug) }}" class="postItemImg">
                <img src="{{ asset('uploads/blogs')}}/{{ $blog->image }}" alt="">
            </a>
        </div>
        <time class="postItemTime" datetime="2015-02-01">{{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</time>
        <h4><a href="{{ route('single_post', $blog->slug) }}">{{ $blog->title }}</a></h4>
        <p>{{ Str::limit($blog->short_description, 100) }}</p>
    </div>
@endforeach
