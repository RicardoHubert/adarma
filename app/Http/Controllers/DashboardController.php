<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\LandingPage;
use App\Model\LandingPageCarousel;
use App\Model\Product;
use App\Model\ProductRequest;
use App\Model\Role;
use App\Model\Writer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Dashboard';

        $user = User::where('role_id', 1)->get();
        $editor = User::where('role_id', 2)->get();
        $admin = User::where('role_id', 3)->get();
        $super_admin = User::where('role_id', 4)->get();
        $products = Product::get();
        $articles = Article::get();
        $articles_editor = Article::where('editor', Auth::user()->id)->get();
        $landingpage = LandingPage::latest()->first();
        $product_request = ProductRequest::get();

        return view('dashboard.index', compact('title', 'user', 'editor', 'articles_editor', 'admin', 'super_admin', 'products', 'articles', 'landingpage', 'product_request'));
    }

    public function profile()
    {
        $title = 'Profile';

        return view('dashboard.profile', compact('title'));
    }

    public function profile_update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->email !== $user->email) {
            $validated = request()->validate([
                'image' => 'nullable|file|image|mimes:jpeg,jpg,png,gif|max:1024',
                'name' => 'nullable|string',
                'email' => 'nullable|string|email|unique:users',
            ]);
        } else {
            $validated = request()->validate([
                'image' => 'nullable|file|image|mimes:jpeg,jpg,png,gif|max:1024',
                'name' => 'nullable|string',
                'email' => 'nullable|string|email',
            ]);
        }

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('profile-image');
            if ($user->image !== null) {
                unlink(public_path('storage/' . $user->image));
            }
        }

        User::where('id', $user->id)->update($validated);

        return redirect()->back()->with('success', 'Profil kamu sudah diperbarui!');
    }

    public function profile_image_destroy()
    {
        $profile = User::find(Auth::user()->id);
        if ($profile->image != null) {
            unlink(public_path('storage/' . $profile->image));
        }
        
        $profile->image = null;
        $profile->save();

        return redirect()->back()->with('success', 'Profile berhasil dihapus!');
    }
    
    public function password(Request $request)
    {
        $user = User::find(Auth::user()->id);
                
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        if( !(Hash::check($request->current_password, $user->password)) ) {
            return redirect()->back()->with('error', 'Password lama kamu tidak sesuai!');
        } else {
            if(strcmp($request->get('current_password'), $request->get('password')) == 0){
                return redirect()->back()->with('error', 'Password lama kamu tidak boleh sama dengan password baru!');
            } else {
                $user->password = bcrypt($request->get('password'));
                $user->save();
                
                return redirect()->back()->with('success', 'Password kamu berhasil diubah');
            }
        }        

    }

    public function users()
    {
        $title = 'Users';

        $users = User::where('role_id', '!=', 4)->get();
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.users', compact('title', 'users', 'landingpage'));
    }

    public function roles_edit($id)
    {
        $title = 'Edit Role';

        $user = User::find($id);
        $roles = Role::where('name', '!=', 'super_admin')->get();
        $landingpage = LandingPage::latest()->first();

        return view('dashboard.edit_roles', compact('title', 'user', 'roles', 'landingpage'));
    }

    public function roles_update($id)
    {
        $user = User::find($id);

        $validated = request()->validate([
            'role_id' => 'required|numeric',
        ]);

        User::where('id', $user->id)->update($validated);
        return redirect()->route('users')->with('success', 'Role berhasil diperbarui!');
    }

    public function landingpage()
    {
        $title = 'Landing Page';

        $landingpage = LandingPage::latest()->first();
        $carousel = LandingPageCarousel::latest()->first();

        return view('dashboard.landingpage', compact('title', 'landingpage', 'carousel'));
    }

    public function landingpage_store(Request $request)
    {
        $landingpage = LandingPage::latest()->first();
        
        $validated = request()->validate([
            'img_logo' => 'nullable|file|image|mimes:jpeg,jpg,png,gif|max:1024',
            'img_landing' => 'nullable|file|image|mimes:jpeg,jpg,png,gif|max:1024',
            'text_landing_large' => 'nullable|string',
            'text_landing_small' => 'nullable|string',
        ]);

        if ($landingpage == null) {
            if ($request->file('img_logo')) {
                $validated['img_logo'] = $request->file('img_logo')->store('landingpage');
            }
            if ($request->file('img_landing')) {
                $validated['img_landing'] = $request->file('img_landing')->store('landingpage');
            }
            
            LandingPage::create($validated);
        } else {
            if ($request->file('img_logo')) {
                $validated['img_logo'] = $request->file('img_logo')->store('landingpage');
                if ($landingpage->img_logo != null) {
                    unlink(public_path('storage/' . $landingpage->img_logo));
                }
            }
            if ($request->file('img_landing')) {
                $validated['img_landing'] = $request->file('img_landing')->store('landingpage');
                if ($landingpage->img_landing != null) {
                    unlink(public_path('storage/' . $landingpage->img_landing));
                }
            }
            
            LandingPage::where('id', $landingpage->id)->update($validated);
        }
        
        return redirect()->back()->with('success', 'Landing Page berhasil diperbarui!');
    }

    public function landingpage_destroy()
    {
        $landingpage = LandingPage::latest()->first();
        if ($landingpage->img_logo != null) {
            unlink(public_path('storage/' . $landingpage->img_logo));
        }
        if ($landingpage->img_landing != null) {
            unlink(public_path('storage/' . $landingpage->img_landing));
        }
        
        $landingpage->delete();

        return redirect()->back()->with('success', 'Landing Page berhasil disetel ulang!');
    }

    public function carousel(Request $request)
    {
        $carousel = LandingPageCarousel::latest()->first();

        $validated = request()->validate([
            'img_first' => 'nullable|file|image|mimes:jpeg,jpg,png,gif|max:1024',
            'img_second' => 'nullable|file|image|mimes:jpeg,jpg,png,gif|max:1024',
            'img_third' => 'nullable|file|image|mimes:jpeg,jpg,png,gif|max:1024',
        ]);

        if ($carousel == null) {           
            if ($request->file('img_first')) {
                $validated['img_first'] = $request->file('img_first')->store('carousel');
            }
            if ($request->file('img_second')) {
                $validated['img_second'] = $request->file('img_second')->store('carousel');
            }
            if ($request->file('img_third')) {
                $validated['img_third'] = $request->file('img_third')->store('carousel');
            }
            LandingPageCarousel::create($validated);
        } else {
            if ($request->file('img_first')) {
                $validated['img_first'] = $request->file('img_first')->store('carousel');
                if ($carousel->img_first != null) {
                    unlink(public_path('storage/' . $carousel->img_first));
                }
            }
            if ($request->file('img_second')) {
                $validated['img_second'] = $request->file('img_second')->store('carousel');
                if ($carousel->img_second != null) {
                    unlink(public_path('storage/' . $carousel->img_second));
                }
            }
            if ($request->file('img_third')) {
                $validated['img_third'] = $request->file('img_third')->store('carousel');
                if ($carousel->img_third != null) {
                    unlink(public_path('storage/' . $carousel->img_third));
                }
            }

            LandingPageCarousel::where('id', $carousel->id)->update($validated);
        }

        return redirect()->back()->with('success', 'Carousel berhasil diperbarui!');
    }

    public function carousel_destroy()
    {
        $carousel = LandingPageCarousel::latest()->first();
        if ($carousel->img_first != null) {
            unlink(public_path('storage/' . $carousel->img_first));
        }
        if ($carousel->img_second != null) {
            unlink(public_path('storage/' . $carousel->img_second));
        }
        if ($carousel->img_third != null) {
            unlink(public_path('storage/' . $carousel->img_third));
        }
        
        $carousel->delete();

        return redirect()->back()->with('success', 'Carousel berhasil disetel ulang!');
    }

    public function editor()
    {
        $title = 'Editor';
        $landingpage = LandingPage::latest()->first();
        $editors = User::where('role_id', 2)->get();

        return view('dashboard.article.editor.index', compact('title', 'landingpage', 'editors'));
    }

}
