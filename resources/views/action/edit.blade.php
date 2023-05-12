@extends('template.admin')
@section('name')

                    <form action='{{ url('action/'.$data->id) }}'  method='post' >
                        @include('pesan.pesan')
                        <a href='{{url('action')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

                        @csrf
                        @method('PUT')
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <div class="mb-3 row">
                                <label for="action_name" class="col-sm-2 col-form-label">action name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='action_name' value="{{$data->action_name}}" id="action_name">
                                </div>
                            </div>
                    

                            <div class="my-3 p-3 bg-body rounded shadow-sm">
                                <div class="mb-3 row">
                                    <label for="system_name" class="col-sm-2 col-form-label">system name</label>
                                    <div class="col-sm-10">
                                        <select type="text" name="system_name"  name="system_name"  value="{{Session::get('system_name')}}" id="system_name"  class="form-control">
                                            @foreach ($module as $item)
                                            <option value="{{ $item->id }}"> {{  $item->system->name ?? 'None' }}->{{ $item->modul_name }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    </div>
                                
                                

                            <div class="mb-3 row">
                                <label for="ordering" class="col-sm-2 col-form-label">ordering</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name='ordering' value="{{$data->ordering}}" id="ordering">
                                </div>

                     <div class="mb-3 row">
                        <label for="description" class="col-sm-2 col-form-label">description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " name='description' value="{{ $data->description }}" id="description">   
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="route" class="col-sm-2 col-form-label">file name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " name='route' value="{{ $data->route }}" id="route">   
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="function" class="col-sm-2 col-form-label">class name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " name='function' value="{{ $data->function }}" id="function">   
                        </div>
                    </div>


                    
    
                            <div class="mb-3 row">
                                <label for="tahun" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">save</button></div>
                            </div>
                        
                        </div>
                    </form>



@endsection