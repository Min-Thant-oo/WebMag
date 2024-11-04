<x-blog.layout>
    <div>
        <div class="section">
            <div class="container">
                <div class="col-md-8">
                    @if(count($blogs))
                        <x-blog.most-read-posts
                            :blogs="$blogs"
                            :title="\Illuminate\Support\Str::plural('Result', count($blogs))"
                        />

                        {{ $blogs->links() }}
                    @else
                        <h4>No result found</h4>
                        <x-blog.most-read-posts
                            :blogs="$recent_posts"
                            title="Recent Posts"
                        />
                        
                    @endif
                </div>
                <div class="col-md-4">
                    <x-blog.post-categories :categories="$categories" />
                </div>
            </div>
        </div>
    </div>
</x-blog.layout>

