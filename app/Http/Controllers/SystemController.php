<?php

namespace App\Http\Controllers;

use App\Models\system;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
         $this->middleware('permission:system index', ['only' => ['index']]);
         $this->middleware('permission:create system', ['only' => ['create', 'store']]);
         $this->middleware('permission:edit system', ['only' => ['edit', 'update']]);
         $this->middleware('permission:delete system', ['only' => ['destroy']]);
     }
    public function index(Request $Request)
    {
        $katakunci = $Request->katakunci;
        $baris = 5;
        if (strlen($katakunci)) {
            $data = system::where('id', 'like', "%$katakunci%")
                ->orWhere('ordering', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->orWhere('description', 'like', "%$katakunci%")
                ->paginate($baris);
        } else {
            $data = system::orderBy('id', 'desc')->paginate($baris);
        }

        return view('system.index')->with('data', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.create', [
            'title' => 'add system',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('ordering', $request->ordering);
        Session::flash('description', $request->description);
        $request->validate([
            'name' => 'required',
            'ordering' => 'required|numeric',
            'description' => 'required',
        ],);

      

        $data = [
            'name' => $request->input('name'),
            'ordering' => $request->input('ordering'),
            'description' => $request->input('description'),
        ];
        system::create($data);

        return redirect('/system')->with('success', 'Successfully input data');
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
        $data = system::where('id', $id)->first();
        return view('system/edit')->with('data', $data);
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
        Session::flash('name', $request->name);
        Session::flash('ordering', $request->ordering);
        Session::flash('description', $request->description);

        $request->validate([
            'ordering' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = [
            'ordering' => $request->input('ordering'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
           
        ];

        system::where('id', $id)->update($data);
        return redirect('/system')->with('success', 'Successfully update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        system::where('id', $id)->delete();
        return redirect('/system')->with('success', 'Delete data successfully');
    }

    // public function tampil()
    // {
    //     $system = system::orderBy('id', 'desc')->get();

    //     return view('module.create')->with('system', $system);
    // }

    // public function editing($id)
    // {
    //     $system = system::where('id', $edit)->fisrt();
    //     return view('module.edit')->with('system', $system);
    // }
}
