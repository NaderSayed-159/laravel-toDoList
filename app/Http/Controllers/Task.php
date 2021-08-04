<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\tasksmodule;
use DB;
use Illuminate\Support\Str;

class Task extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data = tasksmodule::where('adder', session()->get('userData')[0]['id'])->get();
        // $data = tasksmodule::where('adder', session()->get('userData')[0]['id'])->orderby('id', 'desc')->get();

        // $data = DB::table('tasks')
        //     ->join('users', 'users.id', '=', 'tasks.adder')
        //     ->select('tasks.*', 'users.id as UserID', 'users.name as userName')
        //     ->where('adder', session()->get('userData')[0]['id'])
        //  // ->where('adder', auth()->user()->id)
        //     ->orderby('id', 'desc')->get();


        // $data = tasksmodule::where('adder', auth()->user()->id )->get();


        $data = tasksmodule::with('add_by')->where('adder', auth()->user()->id)->get();

        return view('tasks.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
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
                "title"  => "required|min:3",
                "describtion" => "required|min:8",
                "adder" => 'required'
            ]
        );



        $op =  tasksmodule::create($data);


        if ($op) {
            $message = "Task Added ";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/tasks'));
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
        $data = tasksmodule::find($id);

        return view('tasks.edit', ['data' => $data]);
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

            "title"  => "required|min:3",
            "describtion" => "required|min:8",

        ]);


        $op = tasksmodule::where('id', $id)->update($data);

        if ($op) {
            $message = "Task Updated ";
        } else {
            $message = "Error Try Again";
        }


        session()->flash('Message', $message);
        return redirect(url('/tasks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $op = tasksmodule::where('id', $id)->delete();

        if ($op) {
            $message = "User Deleted ";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

        return redirect(url('/tasks'));
    }
}
