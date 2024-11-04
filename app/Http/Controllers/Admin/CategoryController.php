<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryIndexRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(CategoryIndexRequest $request)
    {
        $categories = Category::select(['id', 'name', 'slug', 'color', 'created_at'])
            ->withCount(['blogs'])
            ->filter($request->validated())
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page') ?? 10);

        return view('admin.category.index', [
            'categories'  => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.category.create-or-edit', [
            'id'        => null,
            'title'     => "Create New Category",
            'item'      => new Category(),
        ]);
    }
    
    public function store(CategoryStoreRequest $request)
    {
        $params = $request->validated();
        $params['slug'] = Str::slug($request->get('name')) . '-' . Str::random(5);
        $params['color'] = substr($params['color'], 1);

        Category::create($params);

        return to_route('admin.category.index')->with('success', 'Successfully Created');
    }

    public function edit(Category $category)
    {
        return view('admin.category.create-or-edit', [
            'id'        => $category->id,
            'title'     => 'Edit Category',
            'item'      => $category,
        ]);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $params = $request->validated();

        $params['slug'] = Str::slug($request->get('name')) . '-' . Str::random(5);
        $params['color'] = substr($params['color'], 1);

        $category->update($params);

        return to_route('admin.category.index')->with('success', 'Successfully Updated');
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return to_route('admin.category.index')->with('success', 'Successfully Deleted');
        } catch (\Throwable $th) {
            return to_route('admin.category.index')->with('error', "Error deleting category! Please Try Again");
        }
    }
}
