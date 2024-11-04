<div class="row">
    <div class="col-md-12">
        <div class="section-title">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    @foreach($blogs as $blog)
        <div class="col-md-12">
            <x-blog.post-row :blog="$blog" />
        </div>

    @endforeach
</div>


