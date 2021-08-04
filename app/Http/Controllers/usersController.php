<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;

use DB;

class usersController extends Controller
{

    // public function __construct()
    // {


    //     $this->middleware('checkAuth', ['except' => ['index', 'login', 'loginIndex']]);
    // }














    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datadisplay = User::orderby('id', 'desc')->get();
        $datadisplay = User::with('histasks')->orderby('id', 'desc')->get();
        return view('users.index', ['data' => $datadisplay]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $this->validate(
            $request,
            [
                "name"  => "required|min:3",
                "email" => "required|email|unique:users",
                "password" => "required|min:6",
                "type" => "required|numeric"
            ]
        );

        $data['password'] = bcrypt($data['password']);


        $op =  User::create($data);


        if ($op) {
            $message = "User Inserted ";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/users'));
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
        $data = User::find($id);

        return view('users.edit', ['data' => $data]);
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
        $data = $this->validate($request, [

            "name"  => "required|min:3",
            "email" => "required|email",

        ]);


        $op = User::where('id', $id)->update($data);

        if ($op) {
            $message = "User Updated ";
        } else {
            $message = "Error Try Again";
        }


        session()->flash('Message', $message);
        return redirect(url('/users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $op = User::where('id', $id)->delete();

        if ($op) {
            $message = "User Deleted ";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/users'));
    }


    public function loginIndex()
    {
        return view('users.login');
    }


    public function login(Request $request)
    {
        // Logic 

        $data = $this->validate($request, [

            "email"     => "required|email",
            "password"  => "required|min:6"
        ]);



        $flag = false;

        if ($request->rem_me) {

            $flag = true;
        }


        $operat = User::where('email', $data['email'])->get('id');


        if (auth()->attempt($data, $flag)) {
            session()->put('userData', $operat);

            if (auth()->user()->id = 1) {

                return redirect(url('/users'));
            } else {

                return redirect(url('/tasks'));
            }
        } else {
            return redirect(url('/login'));
        }
    }





    public function logout()
    {


        auth()->logout();

        return redirect(url('/login'));
    }
}
