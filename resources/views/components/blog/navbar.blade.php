<header id="header">
    <div id="nav">

        <div id="nav-fixed">
            <div class="container">

                <div class="nav-logo">
                    <a href="{{ route('blog.index') }}" class="logo"><img src="{{ $configs->logoUrl  }}" alt=""></a>
                </div>

                <ul class="nav-menu nav navbar-nav">
                    <li><a href="{{ route('blog.blogs') }}">Blogs</a></li>
                    @foreach($categories->take(6) as $category)
                        <li class="{{ $category->slug }}">
                            <a
                                href="{{ route('blog.blogs', array_merge(request()->query(), ['category' => $category->slug]) ) }}"
                            >
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>


                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <form action="{{ route('blog.blogs', array_merge(request()->query(), ['search' => request('search')]) ) }}" method="get">
                        <div class="search-form">
                            <input 
                                type="text" 
                                class="search-input border-0" 
                                style="outline: none;"
                                value="{{ request('search') }}"
                                name="search" 
                                placeholder="Enter Your Search ..." 
                            >
                            <button class="search-close"><i class="fa fa-times"></i></button>
                        </div>
                    </form>

                </div>

            </div>
        </div>


        <div id="nav-aside">

            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="{{ route('blog.index') }}">Home</a></li>
                    <li><a href="{{ route('blog.about') }}">About Us</a></li>
                </ul>
            </div>


            <div class="section-row">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="https://facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>


            <button class="nav-aside-close"><i class="fa fa-times"></i></button>

        </div>

    </div>

</header>
