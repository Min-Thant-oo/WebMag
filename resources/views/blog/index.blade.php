<x-blog.layout>
    <div>
        <div class="section">
            <div class="container">
                <div class="row">
                    @foreach($featured_posts->take(2) as $index => $blog)
                        <div class="col-md-6">
                            <x-blog.post-text-over-card :blog="$blog" :height="$index % 2 == 0 ? '340px' : '350px'" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <x-blog.recent-posts :blogs="$recent_posts" />
        <x-blog.featured-posts :blogs="$featured_posts" />
        <div class="section">
            <div class="container">
                <div class="col-md-8">
                    <x-blog.most-read-posts :blogs="$most_read_posts" />
                    <div class="section-row">
                        <a href="{{ route('blog.blogs') }}" class="primary-button d-inline-block w-100px">Show More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <x-blog.post-categories :categories="$categories" />
                </div>
            </div>
        </div>
    </div>
</x-blog.layout>
