<x-admin.layout>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <div class="flex w-100 mr-0">
                            <div class="col-10 px-0">
                                <h4 class="c-grey-900 mB-20">Categories</h4>
                            </div>
                            <div class="col-2 px-0">
                                <a href="{{ route('admin.category.create') }}" class="btn cur-p btn-primary w-100 ">Create New Item</a>
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
                                    class="col-md-11"
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
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">No. Of Blogs</th>
                                <th scope="col">Color</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- @if(!count($categories))
                                <tr>
                                    <td colspan="7">No Records Found</td>
                                </tr>
                            @endif --}}
                            @forelse($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->blogs_count }}</td>
                                    <td><span class="badge text-white" style="background-color: #{{ $category->color }}">#{{ $category->color }}</span></td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($category->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        <form 
                                            class="d-inline-block" 
                                            action="{{ route('admin.category.destroy', $category->id) }}" 
                                            method="post"
                                            onsubmit="return confirm('Are you sure you want to delete selected category? All the blogs that belong to this category will be also deleted')"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn cur-p btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ route('admin.category.edit', $category->id ) }}" class="btn cur-p btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Records Found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>

