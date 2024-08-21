<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('asdas');
       $users = User::where('name','!=','fabrica')->paginate(10);
       return view('admin.pages.admins.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=new User();
        $roles =Role::where('name','!=','Fabrica')->get();
        return view('admin.pages.admins.form',compact('roles','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $olduser = User::where('email',$request->email)->first();
        if ($olduser) {
            Session::flash('message','This email is already admin');
            return back();
        }
        $user = new User();
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->password =Hash::make($request->password);
        $user->save();
        $user->givePermissionTo($request->position);
        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles =Role::where('name','!=','Fabrica')->get();
        return view('admin.pages.admins.form',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    use FileUploader;
    public function update(Request $request, $id)
    {
        $auth = Auth::user();
        $user = User::find($id);
        if($request->name){

            $user->name = $request->name ;
        }
        if($request->email){
            $user->email = $request->email ;
        }
        if($request->password){
            $user->password =Hash::make($request->password);
            $user->update();
            // dd($auth->email === $user->email);
//            if ($auth->email === $user->email) {
//                Auth::logout();
//                return redirect('dashboard/login');
//            }
        }
        if($request->position){
            $user->syncRoles($request->position);
        }
        $user->update();
        if ($request->image) {
            if(count($user->images)){
                $user->images->first()->delete();
            }
            $imageFile = $request->image->store('/public/users');
            $this->saveImageModel($imageFile,$request->alt_en,$request->alt_en,$user);
        }
        if($request->edit){
            return redirect(route('user.index'));
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message'=>'Success']);
    }
    public function profile()
    {
        $user = auth()->user();
        // $articales =Article::where('author',$user->name)->get();
        return view('admin.pages.admins.profile',compact('user'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('dashboard/login');
    }
}
