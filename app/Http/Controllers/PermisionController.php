<?php

namespace App\Http\Controllers;
use App\Models\action;
use App\Models\permision;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class PermisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('permission:permision index', ['only' => ['index']]);
         $this->middleware('permission:create permision', ['only' => ['create', 'store']]);
         $this->middleware('permission:edit permision', ['only' => ['edit', 'update']]);
         $this->middleware('permission:delete permision', ['only' => ['destroy']]);
     }

    public function index(Request $Request)
    {
        $katakunci = $Request->katakunci;
        $baris = 5;
        if (strlen($katakunci)) {
            $data = Permission::where('id', 'like', "%$katakunci%")
                ->orWhere('name', 'like', "%$katakunci%")
                ->paginate($baris);
        } else {
            $data = Permission::orderBy('id', 'desc')->paginate($baris);
        }

        return view('permision.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permision.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
    $validated = $request->validate(['name' => 'required']);

    Permission::create($validated);

    return redirect('/permision')->with('message', 'Permission created.');
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
        $action = action::all();
        $data = Permission::where('id', $id)->first();
        return view('permision/edit',compact('data','action'));
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
        // Session::flash('action_name', $request->action_name);
        // Session::flash('description', $request->description);

        $request->validate([
            'name' => 'required',
            // 'action_name' => 'required',
            // 'description' => 'nullable',
        ]);

        $data = [
            'name' => $request->input('name'),
            // 'description' => $request->input('description'),
            // 'action_name' => $request->input('action_name'),
           
        ];

        Permission::where('id', $id)->update($data);
        return redirect('/permision')->with('success', 'Successfully update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::where('id', $id)->delete();
        return redirect('/permision')->with('success', 'Delete data successfully');
    }
}
