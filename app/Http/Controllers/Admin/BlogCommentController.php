<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCommentIndexRequest;
use App\Http\Requests\BlogCommentStoreRequest;
use App\Http\Requests\BlogCommentUpdateRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class BlogCommentController extends Controller
{
    public function index(BlogCommentIndexRequest $request)
    {
        $blog_comments = Comment::with('blog:id,title')
            ->select(['id', 'name', 'email', 'comment', 'blog_id'])
            ->filter($request->validated())
            ->orderBy('created_at', 'desc')
            ->paginate(request(['per_page']) ?? 10);

        return view('admin.blog-comment.index', [
            'blog_comments' => $blog_comments,
            'blogs'         => $this->get_request_options(),
        ]);
    }

    public function create()
    {
        return view('admin.blog-comment.create-or-edit', [
            'id'        => null,
            'title'     => "Create New Comment",
            'blogs'     => $this->get_request_options(),
            'item'      => new Comment(),
        ]);
    }

    public function store(BlogCommentStoreRequest $request)
    {
        Comment::create($request->validated());

        return to_route('admin.comment.index')->with('success', 'Successfully Created');
    }

    public function edit(Comment $comment)
    {
        return view('admin.blog-comment.create-or-edit', [
            'id'                => $comment->id,
            'title'             => 'Edit Comment',
            'item'              => $comment,
            'blogs'             => $this->get_request_options(),
        ]);
    }

    public function update(BlogCommentUpdateRequest $request, Comment $comment): RedirectResponse
    {
        $comment->update($request->validated());
        return to_route('admin.comment.index')->with('success', 'Successfully Updated');
    }

    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
            return to_route(route: 'admin.comment.index')->with('success', 'Successfully Deleted');
        } catch (\Throwable $th) {
            return to_route(route: 'admin.comment.index')->with('error', 'Error deleting the comment');
        }

    }

    private function get_request_options(): Collection
    {
        return  Blog::select(['id', 'title'])->get()->mapWithKeys(function($blog) {
            return [$blog->id => $blog->title];
        });
    }
}
