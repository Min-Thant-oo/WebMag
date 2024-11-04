<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogIndexRequest;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\BlogStatus;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{  
    public function index(BlogIndexRequest $request)
    {
        $blogs = Blog::with(['category:id,name', 'blog_status:id,name,color', 'user:id,name'])
            // ->select(['id', 'title', 'category_id', 'blog_status_id', 'user_id', 'published_at'])
            ->filter($request->validated())
            ->withCount(['blog_comments'])
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page') ?? 10);

        $options = $this->get_required_options();

        return view('admin.blog.index', [
            'blogs' => $blogs,
            'blog_statuses' => $options['blog_statuses'],
            'categories' => $options['categories'],
        ]);
    }

    public function create()
    {
        $options = $this->get_required_options();

        return view('admin.blog.create-or-edit', [
            'title'             => 'Create New Blog',
            'item'              => new Blog(),
            'blog_statuses'     => $options['blog_statuses'],
            'categories'        => $options['categories'],
            'id'                => null,
        ]);
    }

    public function store(BlogStoreRequest $request)
    {
        $params = $request->validated();

        $params['user_id'] = Auth::id();
        $params['slug'] = Str::slug($request->get('title')) . '-' . Str::random(5);

        if ($request->hasFile('thumbnail') && $request->hasFile('image')) {
            $params['thumbnail'] = Storage::putFile('blogs', $request->file('thumbnail'));
            $params['image'] = Storage::putFile('blogs', $request->file('image'));
        }

        Blog::create($params);

        return to_route('admin.blog.index')->with('success', 'Successfully Created');
    }

    public function edit(Blog $blog)
    {
        $blog->load('blog_comments');
        $options = $this->get_required_options();

        return view('admin.blog.create-or-edit', [
            'title'             => 'Edit Blog',
            'item'              => $blog,
            'blog_statuses'     => $options['blog_statuses'],
            'categories'        => $options['categories'],
            'id'                => $blog->id
        ]);
    }

    public function update(BlogUpdateRequest $request, Blog $blog): RedirectResponse
    {
        $params = $request->validated();

        $params['user_id'] = Auth::id();
        $params['slug'] = Str::slug($request->get('title')) . '-' . Str::random(5);

        if ($request->hasFile('thumbnail')) {
            if(Storage::disk('public')->exists($blog->thumbnail)) {
                Storage::disk('public')->delete($blog->thumbnail);
            }
            $params['thumbnail'] = Storage::putFile('blogs', $request->file('thumbnail'));
        }else {
            $params['thumbnail'] = $blog->thumbnail;
        }

        if($request->hasFile('image')) {
            if(Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $params['image'] = Storage::putFile('blogs', $request->file('image'));
        }else {
            $params['image'] = $blog->image;
        }


        $blog->update($params);

        return to_route('admin.blog.index')->with('success', 'Successfully Updated');

    }

    public function destroy(Blog $blog)
    {
        try {
            if($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
                Storage::disk('public')->delete($blog->thumbnail);
            }
            if($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->delete();
            return to_route('admin.blog.index')->with('success', 'Successfully Deleted');
        } catch (\Exception $e) {
            return to_route('admin.blog.index')->with('error',"Error deleting the blog! Please try again");
        }
    }

    private function get_required_options(): array
    {
        $blog_statues = BlogStatus::select(['id', 'name'])->get();
        $blog_statues = $blog_statues->mapWithKeys(function ($status) {
            return [$status->id => $status->name];
        });

        $categories = Category::select(['id', 'name'])->get();
        $categories = $categories->mapWithKeys(function ($category) {
            return [$category->id => $category->name];
        });

        return [
            'blog_statuses' => $blog_statues,
            'categories'    => $categories,
        ];
    }
}
