@extends('template.admin')
@section('name')

                  <form action='{{ url('rolle/'.$role->id) }}'  method='post' >
                        @include('pesan.pesan')
                        <a href='{{url('rolle')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>
                        @csrf
                        @method('PUT')
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='name' value="{{$role->name}}" id="name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tahun" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">save</button></div>
                            </div>
                        </div>
                    </form>
            

                    @can('create permision')
                   <form method="POST" action="{{ url('rolle/'.$role->id.'/edit') }}">
                            @csrf
                            <div class="my-3 p-3 bg-body rounded shadow-sm">
                                <div class="mb-3 row">
                                    <label for="permision_name" class="col-sm-2 col-form-label">permision_name</label>
                                    <div class="col-sm-10">
                                        <select type="text" name="permision_name"  name="permision_name"  value="{{Session::get('permision_name')}}" id="permision_name"  class="form-control">
                                                    @foreach ($permissions as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                         @endforeach
                                          </select>
                                    </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tahun" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">assign</button></div>
                                    </div>
                                </form>
                        </div> 
                            @endcan


                            @can('delete permision')
                <div class="mt-6 p-2 bg-slate-100">
                            <h5 class="text-2xl font-semibold">Role Permissions</h5>
                            <div class="flex space-x-2 mt-4 p-2">
                                @if ($role->permissions)
                                    @foreach ($role->permissions as $role_permission)
                                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                            action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">{{ $role_permission->name }}</button>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                        @endcan
                
                    </div>
        

          


@endsection