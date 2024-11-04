<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStatusIndexRequest;
use App\Http\Requests\BlogStatusStoreRequest;
use App\Http\Requests\BlogStatusUpdateRequest;
use App\Models\BlogStatus;
use Illuminate\Http\RedirectResponse;

class BlogStatusController extends Controller
{
    public function index(BlogStatusIndexRequest $request)
    {
        $blog_statuses = BlogStatus::select(['id', 'name', 'created_at', 'color'])
            ->withCount(['blogs'])
            ->filter($request->validated())
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page') ?? 10);

        return view('admin.blog-status.index', [
            'blog_statuses'     => $blog_statuses,
        ]);
    }

    public function create()
    {
        return view('admin.blog-status.create-or-edit', [
            'id'        => null,
            'title'     => "Create New Blog Status",
            'item'      => new BlogStatus(),
        ]);
    }

    public function store(BlogStatusStoreRequest $request)
    {
        $params = $request->validated();
        $params['color'] = substr($params['color'], 1);

        BlogStatus::create($params);

        return to_route('admin.status.index')->with('success', 'Successfully Created');
    }

    public function edit(BlogStatus $status)
    {
        return view('admin.blog-status.create-or-edit', [
            'id'                => $status->id,
            'title'             => 'Edit Blog Status',
            'item'              => $status,
        ]);
    }

    public function update(BlogStatusUpdateRequest $request, BlogStatus $status)
    {
        $params = $request->validated();
        $params['color'] = substr($params['color'], 1);

        $status->update($params);

        return to_route('admin.status.index')->with('success', 'Successfully Updated');
    }

    public function destroy(BlogStatus $status): RedirectResponse
    {
        try {
            $status->delete();
            return to_route('admin.status.index')->with('success', 'Successfully Deleted');
        } catch (\Exception $e) {
            return to_route('admin.status.index')->with('error', "Error deleting category! Please Try Again");
        }
    }
}
