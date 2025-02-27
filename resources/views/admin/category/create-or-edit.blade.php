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
                            <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                    <form action="{{ is_null($id) ? route('admin.category.store') : route('admin.category.update', $id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(!is_null($id))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-8 offset-md-2 row">
                                <x-blog.alert-message :success="session('success')" :error="session('error')" />

                                <x-admin.text-input
                                    label="Name"
                                    :value="$item->name ?? old('name')"
                                    name="name"
                                    placeholder="Please Enter Category Name"
                                    class="col-md-12"
                                    :required="true"
                                />

                                <x-admin.text-input
                                    label="Description"
                                    id="description"
                                    :value="$item->description ?? old('description')"
                                    name="description"
                                    placeholder="Please Enter Description"
                                    class="col-md-12"
                                    :textarea="true"
                                    :required="false"
                                />

                                <x-admin.text-input
                                    label="Color"
                                    type="color"
                                    :value="$item->color ? '#' . $item->color : old('color')"
                                    name="color"
                                    placeholder="Please Select Category Color"
                                    class="col-md-6"
                                    :required="true"
                                />

                                <div class="col-md-2 offset-md-10">
                                    <button class="btn cur-p btn-primary w-100">{{ is_null($id) ? 'Submit' : 'Update' }}</button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</x-admin.layout>


