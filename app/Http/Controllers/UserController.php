<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::sortable()->orderBy('fname','ASC')->paginate(10);
       //$users = User::where('user_type','!=','paroko')->orderBy('fname','ASC')->Paginate(10);
        return view('pages.LIst_user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.AddUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cmfm_pwd' => 'required',
            'user_type' => 'required'

        ]);

        if ($validator->fails()) {

            return redirect('User')

                ->with('success', 'Please Enter All required filled');
        }

        $user = new User();
              $pass =request('password');
              $cpass = request('cmfm_pwd');
              $file = request('profile');
        $user->fname=request('fname');
        $user->lname=request('lname');
        $user->phone=request('phone');
        $user->email=request('email');
        $user->password=Hash::make($pass);
        $user->user_type=request('user_type');

        /*profile*/
        if(!$file==null)
        {
            $filename = $request->file('profile')->getClientOriginalName();
            $filesize = $request->file('profile')->getClientSize(); $request->file('profile')->storeAs('public/upload',$filename);
            $user->profile =  $filename;

        }

        else{
            $user->profile =  "No Profile";
        }


        if($pass==$cpass)
        {
            if( $user-> save() ){

                return redirect('User')

                    ->with('success','User added successfully');
            }

            else{

                return redirect('User')

                    ->with('success','User fails to be Added');
            }

        }
        else {
                 return redirect('User')->with('success','Password unmatch,Try gain!');


        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);

        return view('edit.user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $pass =request('password');
        $cpass = request('cmfm_pwd');
        $file = request('profile');
        $user->fname=request('fname');
        $user->lname=request('lname');
        $user->phone=request('phone');
        $user->email=request('email');
        $user->password=Hash::make($pass);
        $user->user_type=request('user_type');

        /*profile*/
        if(!$file==null)
        {
            $filename = $request->file('profile')->getClientOriginalName();
            $filesize = $request->file('profile')->getClientSize(); $request->file('profile')->storeAs('public/upload',$filename);
            $user->profile =  $filename;

        }

        else{
            $user->profile =  "No Profile";
        }


        if($pass==$cpass)
        {
            if( $user-> save() ){

                return redirect('User')

                    ->with('success','User Updated successfully');
            }

            else{

                return redirect('User')

                    ->with('success','User fails to be Updated');
            }

        }
        else {
            return redirect('User')->with('success','Password unmatch,Try gain!');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kigango =User::find($id);

        $kigango->delete();

        return redirect('User')->with('success','User has been  deleted successfully');
    }
}
