<x-blog.layout>
    <div>
        <div id="post-header" class="page-header">
            <div class="background-img" style="background-image: url('{{ $blog->thumbnailUrl }}');"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="post-meta">
                            <a 
                                class="post-category cat-2" 
                                href="{{ route('blog.blogs', array_merge(request()->query(), ['category' => $blog->category->slug])) }}"
                            >
                                {{ $blog->category->name }}
                            </a>
                            <span class="post-date">{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans() }}</span>
                        </div>
                        <h1>{{ $blog->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            
            <div class="container">
                
                <div class="row">

                    <div class="col-md-8">
                        <div class="section" style="padding-bottom: 7rem;">
                            <div class="main-post">
                                <h3>{{ $blog->title }}</h3>
                                <div class="" style="padding: 10px 0;">
                                    <img class="img-responsive" alt="" src="{{ $blog->imageUrl }}" style="height: px; object-fit: cover">
                                </div>
                                {!! $blog->content !!}

                            </div>
                        </div>

                        <div class="section-row">
                            <div class="post-author">
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="img/author.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h3>{{ $blog->user->name }}</h3>
                                        </div>
                                        <p>{{ $blog->user->description }}</p>
                                        <ul class="author-social">
                                            <li><a href="{{ $blog->user->github_link }}"><i class="fa fa-github"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="section-row">
                            <div class="section-title">
                                <h2>{{ $blog->blog_comments_count }} {{ \Illuminate\Support\Str::plural('Comment', $blog->blog_comments_count) }}</h2>
                            </div>
                            <div class="post-comments">
                                @foreach($blog->blog_comments as $comment)
                                    <div class="media">
                                        <div class="media-left">
                                            <img class="media-object" src="img/avatar.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <h4>{{ $comment->name }}</h4>
                                                <span class="time">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                            </div>
                                            {!! $comment->comment !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        
                        <div class="section-row">
                            <div class="section-title">
                                <h2>Leave a reply</h2>
                                <p>your email address will not be published. required fields are marked *</p>
                                <x-blog.alert-message :success="session('success')" :error="session('error')" />
                                
                                
                            </div>
                            <form class="post-reply" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>Name *</span>
                                            <input class="input" required type="text" name="name" value="{{ old('name') }}">
                                            <x-error name='name' />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>Email *</span>
                                            <input class="input" required type="email" name="email" value="{{ old('email') }}">
                                            <x-error name='email' />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>Website</span>
                                            <input class="input" type="text" name="website" value="{{ old('website') }}">
                                            <x-error name='website' />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="input" required name="comment" placeholder="Message">{{ old('comment') }}</textarea>
                                            <x-error name='comment' />
                                        </div>
                                        <button class="primary-button">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    

                    <div class="col-md-4">
                        <x-blog.most-read-posts-tile :blogs="$most_read_posts" />
                        <x-blog.post-categories :categories="$categories" />
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-blog.layout>