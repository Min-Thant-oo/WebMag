<x-admin.layout>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <div class="flex w-100 mr-0">
                            <div class="col-10 px-0">
                                <h4 class="c-grey-900 mB-20">Blogs</h4>
                            </div>
                            <div class="col-2 px-0">
                                <a href="{{ route('admin.blog.create') }}" class="btn cur-p btn-primary w-100 ">Create New Item</a>
                            </div>
                        </div>
                        <x-blog.alert-message :success="session('success')" :error="session('error')" />

                        <form method="get">
                            <div class="row">
                                <x-admin.text-input
                                    label="Search"
                                    :value="request('search')"
                                    name="search"
                                    placeholder="Please Enter To Search"
                                    class="col-md-5"
                                    :required="false"
                                />

                                <x-admin.select-input
                                    name="category_id"
                                    label="Category"
                                    :options="$categories"
                                    :value="request('category_id')"
                                    placeholder="All"
                                    class="col-md-3"
                                    :required="false"
                                />

                                <x-admin.select-input
                                    name="blog_status_id"
                                    label="Status"
                                    :options="$blog_statuses"
                                    :value="request('blog_status_id')"
                                    placeholder="All"
                                    class="col-md-3"
                                    :required="false"
                                />

                                <div class="col-md-1 flex flex-column justify-content-end mb-3 w-100">
                                    <button type="submit" class="btn cur-p btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Published At</th>
                                <th scope="col">Comments</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $blog)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#blogModal{{ $blog->id }}">
                                                <img src="{{ $blog->thumbnailUrl }}" alt="{{ $blog->title }}" style="height: 50px; width: 75px; object-fit: cover">
                                            </a>
                                        </td>
                                        <td>{{ $blog->user->name }}</td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>
                                            <span class="badge text-white" style="background-color: #{{ $blog->blog_status->color }}">{{ $blog->blog_status->name }}</span>
                                        </td>
                                        <td>{{ $blog->blog_comments_count }}</td>
                                        <td>{{ $blog->published_at ? \Illuminate\Support\Carbon::parse($blog->published_at)->format('d-m-Y') : 'Not Yet' }}</td>
                                        <td>
                                            <form 
                                                action="{{ route('admin.blog.destroy', $blog->id) }}" 
                                                method="post" 
                                                onsubmit="return confirm('Are you sure you want to delete selected blog?')"
                                                class="d-inline-block" 
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn cur-p btn-danger">Delete</button>
                                            </form>
                                            <a href="{{ route('admin.blog.edit', $blog->id ) }}" class="btn cur-p btn-primary">Edit</a>
                                        </td>
                                    </tr>


                                @empty
                                    <tr>
                                        <td colspan="7">No Records Found</td>
                                    </tr>
                                @endforelse
                               

                            </tbody>
                        </table>


                        @foreach ($blogs as $blog)
                            <div class="modal fade" id="blogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="blogModalLabel{{ $blog->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="blogModalLabel{{ $blog->id }}">{{ $blog->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: red; font-size: 1rem;"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img 
                                                src='{{ asset($blog->thumbnail ? "/storage/$blog->thumbnail" : "https://picsum.photos/520/450?random=" . $blog->id) }}' 
                                                alt=""
                                                class="img-fluid"
                                                style="max-height: 80vh; width: auto;"
                                            > 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
