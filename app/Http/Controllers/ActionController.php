<?php

namespace App\Http\Controllers;

use App\Models\module;
use App\Models\action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('permission:action index', ['only' => ['index']]);
         $this->middleware('permission:create action', ['only' => ['create', 'store']]);
         $this->middleware('permission:edit action', ['only' => ['edit', 'update']]);
         $this->middleware('permission:delete action', ['only' => ['destroy']]);
     }

    public function index(Request $Request)
    {
        $katakunci = $Request->katakunci;
        $baris = 5;
        if (strlen($katakunci)) {
            $data = action::where('id', 'like', "%$katakunci%")
                ->orWhere('action_name', 'like', "%$katakunci%")
                ->orWhere('system_name', 'like', "%$katakunci%")
                ->paginate($baris);
        } else {
            $data = action::orderBy('id', 'desc')->paginate($baris);
        }

        return view('action.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module = module::all();
        return view('action.create',compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('action_name', $request->action_name);
        Session::flash('system_name', $request->system_name);
        Session::flash('description', $request->description);
        Session::flash('ordering', $request->ordering);
        Session::flash('route', $request->route);
        Session::flash('function', $request->function);
        $request->validate([
            'action_name' => 'required',
            'system_name' => 'required',
            'ordering' => 'required|numeric',
            'description' => 'nullable',
            'route' => 'required',
            'function' => 'nullable',
        ],);

      

        $data = [
            'action_name' => $request->input('action_name'),
            'system_name' => $request->input('system_name'),
            'ordering' => $request->input('ordering'),
            'description' => $request->input('description'),
            'route' => $request->input('route'),
            'function' => $request->input('function'),
        ];
        action::create($data);
        return redirect('/action')->with('success', 'Successfully input data');
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
        $module = module::all();
        $data = action::where('id', $id)->first();
        return view('action/edit',compact('data','module'));
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
        Session::flash('action_name', $request->action_name);
        Session::flash('system_name', $request->system_name);
        Session::flash('ordering', $request->ordering);
        Session::flash('description', $request->description);
        Session::flash('route', $request->route);
        Session::flash('function', $request->function);

        $request->validate([
            'ordering' => 'required',
            'action_name' => 'required',
            'system_name' => 'required',
            'description' => 'nullable',
            'route' => 'required',
            'function' => 'nullable',
        ]);

        $data = [
            'ordering' => $request->input('ordering'),
            'action_name' => $request->input('action_name'),
            'description' => $request->input('description'),
            'route' => $request->input('route'),
            'function' => $request->input('function'),
            'system_name' => $request->input('system_name'),
           
        ];

        action::where('id', $id)->update($data);
        return redirect('/action')->with('success', 'Successfully update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        action::where('id', $id)->delete();
        return redirect('/action')->with('success', 'Delete data successfully');
    }
}
