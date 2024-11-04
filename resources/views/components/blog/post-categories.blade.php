<div class="aside-widget">
    <div class="section-title">
        <h2>Catagories</h2>
    </div>
    <div class="category-widget">
        <ul>
            @foreach($categories as $category)
                <li>
                    <a 
                        href="{{ route('blog.blogs', array_merge(request()->query(), ['category' => $category->slug])) }}" 
                        class="{{ $category->slug }}" 
                    >
                        {{ $category->name }}<span style="background-color: #{{ $category->color }};">{{ $category->blogs_count }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>


