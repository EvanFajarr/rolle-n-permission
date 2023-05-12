<?php

namespace App\Http\Controllers;
use App\Models\module;
use App\Models\system;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('permission:module index', ['only' => ['index']]);
         $this->middleware('permission:create module', ['only' => ['create', 'store']]);
         $this->middleware('permission:edit module', ['only' => ['edit', 'update']]);
         $this->middleware('permission:delete module', ['only' => ['destroy']]);
     }

     
    public function index(Request $Request)
    {
        $katakunci = $Request->katakunci;
        $baris = 5;
        if (strlen($katakunci)) {
            $data = module::where('id', 'like', "%$katakunci%")
                ->orWhere('modul_name', 'like', "%$katakunci%")
                ->orWhere('system_name', 'like', "%$katakunci%")
                ->orWhere('ordering', 'like', "%$katakunci%")
                ->paginate($baris);
        } else {
            $data = module::orderBy('id', 'desc')->paginate($baris);
        }

        return view('module.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $system = system::all();
        return view('module.create',compact('system'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('modul_name', $request->modul_name);
        Session::flash('system_name', $request->system_name);
        Session::flash('description', $request->description);
        Session::flash('ordering', $request->ordering);
        Session::flash('file_name', $request->file_name);
        Session::flash('class_name', $request->class_name);
        $request->validate([
            'modul_name' => 'required',
            'system_name' => 'required',
            'ordering' => 'required|numeric',
            'description' => 'required',
            'file_name' => 'nullable',
            'class_name' => 'nullable',
        ],);

      

        $data = [
            'modul_name' => $request->input('modul_name'),
            'system_name' => $request->input('system_name'),
            'ordering' => $request->input('ordering'),
            'description' => $request->input('description'),
            'file_name' => $request->input('file_name'),
            'class_name' => $request->input('class_name'),
        ];
        module::create($data);
        return redirect('/module')->with('success', 'Successfully input data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $system = system::all();
        $data = module::where('id', $id)->first();
        return view('module/edit',compact('data','system'));
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
        Session::flash('modul_name', $request->modul_name);
        Session::flash('system_name', $request->system_name);
        Session::flash('ordering', $request->ordering);
        Session::flash('description', $request->description);
        Session::flash('file_name', $request->file_name);
        Session::flash('class_name', $request->class_name);

        $request->validate([
            'ordering' => 'required',
            'modul_name' => 'required',
            'system_name' => 'required',
            'description' => 'required',
            'file_name' => 'nullable',
            'class_name' => 'nullable',
        ]);

        $data = [
            'ordering' => $request->input('ordering'),
            'modul_name' => $request->input('modul_name'),
            'description' => $request->input('description'),
            'file_name' => $request->input('file_name'),
            'class_name' => $request->input('class_name'),
            'system_name' => $request->input('system_name'),
           
        ];

        module::where('id', $id)->update($data);
        return redirect('/module')->with('success', 'Successfully update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        module::where('id', $id)->delete();
        return redirect('/module')->with('success', 'Delete data successfully');
    }
}
