<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class sign extends Controller
{
    public static function register(Request $request)
    {
        $request->validate([
            'username' => 'required | unique:users,username',
            'password' => 'required',
            'password_confirmation' => 'same:password',
            'genre' => 'required'
        ]);
        $user = new Users;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->genre = $request->genre;
        // $user->password = $request->password;
        $user->save();
        return redirect()->action(
            [sign::class, 'logPage']
        );
    }

    public static function login(Request $request)
    {

        $request->validate([
            'username' => 'exists:users',
            //'password'=> 'exists:users'
        ]);

        echo "<pre>";
        $user = Users::all();
        //dd($user);
        $users = Users::where('username', $request->username)->first();
        if (Hash::check($request->password, $users->password)) {

            session(['username' => $request->username]);

            return redirect()->action(
                [sign::class, 'homePage']
            );

        } else {
            $error = "Password is Invalid";
            return redirect('/login');
        }

    }

    public static function changePost(Request $request){
        
        $name = session()->get('username');
        $user = Users::where('username', $name)->first();    
        $user->genre = $request->genre;
        $user->save();

        return redirect('/homepage');
    }

    public static function regPage()
    {
        return view('register');
    }

    public static function logPage()
    {
        return view('login');
    }

    public static function logout()
    {
        session()->flush();   
        return redirect('/login');
    }

    public static function homePage()
    {
        return view('index');
    }

    public static function change(){
        return view('change');
    }

    public static function viewArticle(Request $request){
        return view('article', ['id' => $request->id]);
    }

    public static function deleteArticle(Request $request){
        News::find($request->id)->delete();  
        return redirect('/admin/all');
    }

    //-------------------------------------------------------------------------------
    /* Admin Related Function */
    //-------------------------------------------------------------------------------
    public static function admin(){
        return view('Admin/admin');
    }
    public static function adminLogin(){
        return view('Admin/admin-login');
    }
    public static function adminLoginPost(Request $request){
        $request->validate([
            'username'=> 'required',
            'password' => 'required'
        ]);
        if($request->username == 'sahil' && $request->password == 'sahil'){
            session(['isAdmin' => true]);
            return redirect('/admin');
        }
    }
    public static function adminPostArticle(Request $request){
        $news = new News;
        $news->name = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->blurb = $request->blurb;
        $news->genre = $request->genre;
        $news->save();

        return redirect('/admin');
    }

    public static function adminNew(){
        return view('Admin/new');
    }
    public static function adminAll(){
        return view('Admin/all');
    }

    public static function adminLogout(){
        session()->forget('isAdmin');
        return redirect('/login');
    }
}
