<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            @foreach($blogs as $blog)
                <div class="col-md-4">
                    <x-blog.post-bottomed-text-card :blog="$blog" />
                </div>
            @endforeach
        </div>

    </div>
</div>
