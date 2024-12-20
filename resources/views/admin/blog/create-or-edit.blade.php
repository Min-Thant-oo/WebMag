<x-admin.layout>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <div class="flex w-100 mr-0">
                            <div class="col-md-7 offset-2 px-3">
                                <h4 class="c-grey-900 mB-20">{{ $title }}</h4>
                            </div>
                            <div class="col-1">
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        <form action="{{ is_null($id) ? route('admin.blog.store') : route('admin.blog.update', $id) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @if(!is_null($id))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-8 offset-md-2 row">
                                    <x-blog.alert-message :success="session('success')" :error="session('error')" />

                                    <x-admin.text-input
                                        label="Title"
                                        :value="$item->title ?? old('title')"
                                        name="title"
                                        placeholder="Please Enter Title"
                                        class="col-md-12"
                                        :required="true"
                                    />

                                    <x-admin.text-input
                                        label="Content"
                                        id="content"
                                        :value="$item->content ?? old('content')"
                                        name="content"
                                        placeholder="Please Enter To Content"
                                        class="col-md-12"
                                        :textarea="true"
                                        :required="true"
                                    />

                                    <x-admin.file-input
                                        label="Thumbnail"
                                        :old="$item->thumbnailUrl"
                                        name="thumbnail"
                                        placeholder="Please Select File"
                                        type="image/*"
                                        class="col-md-12"
                                        :required="is_null($id) ? true : false"
                                    />

                                    <x-admin.file-input
                                        label="Image"
                                        :old="$item->imageUrl"
                                        name="image"
                                        placeholder="Please Select File"
                                        type="image/*"
                                        class="col-md-12"
                                        :required="is_null($id) ? true : false"
                                    />

                                    <x-admin.select-input
                                        name="category_id"
                                        label="Blog Category"
                                        :options="$categories"
                                        :value="$item->category_id ?? old('category_id')"
                                        placeholder="Please Select Category"
                                        class="col-md-12"
                                        :required="true"
                                    >
                                        <a href="{{ route('admin.category.create') }}">Create New Category</a>
                                    </x-admin.select-input>

                                    <x-admin.select-input
                                        name="blog_status_id"
                                        label="Status"
                                        :options="$blog_statuses"
                                        :value="$item->blog_status_id ?? old('blog_status_id')"
                                        placeholder="Please Select Blog Status"
                                        class="col-md-12"
                                        :required="true"
                                    >
                                        <a href="{{ route('admin.status.create') }}">Create New Blog Status</a>
                                    </x-admin.select-input>

                                    <x-admin.text-input
                                        label="Publishing Date"
                                        type="datetime-local"
                                        :value="$item->published_at ? \Illuminate\Support\Carbon::parse($item->published_at)->format('Y-m-d\TH:i') : old('published_at')"
                                        name="published_at"
                                        placeholder="Please Enter To Content"
                                        class="col-md-12"
                                        :required="false"
                                    />

                                    <x-admin.select-input
                                        name="is_featured"
                                        label="Is Featured?"
                                        :options="['0' => 'No', '1' => 'Yes']"
                                        :value="$item->is_featured ?? old('is_featured')"
                                        placeholder="Please Select Option"
                                        class="col-md-12"
                                        :required="true"
                                    />

                                    <div class="col-md-2 offset-md-10">
                                        <button
                                            class="btn cur-p btn-primary w-100">{{ is_null($id) ? 'Submit' : 'Update' }}
                                        </button>
                                    </div>
                                    @if(!is_null($id))
                                        <div class="col-md-12 row">
                                            <div class="col-md-12">
                                                <h4>Comments</h4>
                                            </div>
                                            @if(!count($item->blog_comments))
                                                <div class="col-md-12">
                                                    <h5>There is no comment.</h5>
                                                </div>
                                            @endif
                                            @foreach($item->blog_comments as $comment)
                                                <a href="{{ route('admin.comment.edit', $comment->id) }}" class="col-6 d-flex p-2 c-grey-100 mb-1">
                                                    <div class="px-2 flex-grow-1 border-gray-200 border-radius-10px">
                                                        <h6 class="d-block -mt-5 text-black">{{ $comment->name }}</h6>
                                                        <p class="d-block text-black">{{ \Illuminate\Support\Str::limit(strip_tags($comment->comment), 90) }}</p>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>   
</x-admin.layout>