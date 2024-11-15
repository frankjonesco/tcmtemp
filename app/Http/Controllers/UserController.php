<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    protected $page;

    public function __construct(){
        
        $this->page = new Page();
        
    }


    

    // VIEW REGISTRATION FORM

    public function viewRegistration() : View
    {
        $this->page->injectMetadata('Create an account', true);

        return view('users.register', [
            'pageHeadings' => [
                'Register',
                'Create an account.'
            ]
        ]);
    }




    // STORE NEW USER

    public function store(Request $request) : RedirectResponse
    {
        $formFields = $request->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = $formFields;

        $user['hex'] = Str::random(11);
        $user['password'] = bcrypt($user['password']);
        $user['user_type_id'] = 1;

        $user = User::create($user);

        auth()->login($user);
        
        return redirect('/')->with('toast', 'Account created!');
        
    }




    // VIEW LOGIN FORM

    public function viewLogin() : View
    {
        $this->page->injectMetadata('Login', true);

        return view('users.login', [
            'pageHeadings' => [
                'Login',
                'Log in to manage your content.'
            ]
        ]);
    }




    // AUTHENTICATE USER FOR LOGIN

    public function authenticate(Request $request) : RedirectResponse
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        $user = User::where('email', $request->username)->orWhere('username', $request->username)->first();


        if(empty($user))
            return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
        
        

        if(
            auth()->attempt(['email' => $user->email, 'password' => $request->password]) || 
            auth()->attempt(['username' => $user->username, 'password' => $request->password])
        ){                
            $request->session()->regenerate();
            return redirect('/admin')->with('toast', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');

    }




    // LOG USER OUT AND DESTRY SESSION

    public function logout(Request $request) : RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('toast', 'You are logged out.');

    }




    // END OF CLASS

}
