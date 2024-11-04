<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\BlogView;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $total_blogs = Blog::count();
        $total_categories = Category::count();
        $total_comments =  Comment::count();
        $total_views = BlogView::count();

        $popular_blogs = Blog::where([
            ['blog_status_id', '=', 3],
            ['published_at', '<=', Carbon::now()],
        ])
            ->with('category')
            ->withCount('blog_views')
            ->orderBy('blog_views_count', 'desc')
            ->limit(4)
            ->get();


        $recent_comments = Comment::orderBy('created_at', 'desc')
            ->with(['blog:id,title'])
            ->limit(5)
            ->get();

        return view('admin.index', [
            'total_blogs'           => $total_blogs,
            'total_categories'      => $total_categories,
            'total_comments'        => $total_comments,
            'total_views'           => $total_views,
            'popular_blogs'         => $popular_blogs,
            'recent_comments'       => $recent_comments,
        ]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function post_login(LoginRequest $request): RedirectResponse
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        $remember = $request->get('remember') ?? false;

        if (Auth::attempt($credentials, $remember)) {
            return to_route('admin.index')->with('success', 'Welcome back!');
        } else {
            return redirect()->back()->with('error', 'Login Failed! Please Try Again');
        }
    }


    // public function post_login(LoginRequest $request): RedirectResponse 
    // {
    //     try {
    //         $credentials = [
    //             'email' => $request->get('email'),
    //             'password' => $request->get('password'),
    //         ];

    //         // First, check if the email exists
    //         $user = \App\Models\User::where('email', $credentials['email'])->first();
            
    //         if (!$user) {
    //             return redirect()->back()
    //                 ->with('error', 'Email not found')
    //                 ->withInput();
    //         }

    //         // Then attempt authentication
    //         if (Auth::attempt($credentials, $request->get('remember') ?? false)) {
    //             return redirect()->intended('admin.index');
    //         }

    //         // If we get here, the password was wrong
    //         return redirect()->back()
    //             ->with('error', 'Invalid password')
    //             ->withInput();

    //     } catch (\Exception $e) {
    //         // Log the actual error for debugging
    //         \Log::error('Login error: ' . $e->getMessage());
            
    //         return redirect()->back()
    //             ->with('error', 'Login error: ' . $e->getMessage())
    //             ->withInput();
    //     }
    // }

    public function logout()
    {
        Auth::logout();
        return to_route('admin.login');
    }
}
