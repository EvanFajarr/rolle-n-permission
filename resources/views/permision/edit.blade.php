@extends('template.admin')
@section('name')

                    <form action='{{ url('permision/'.$data->id) }}'  method='post' >
                        @include('pesan.pesan')
                        <a href='{{url('permision')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

                        @csrf
                        @method('PUT')
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">permision name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name='name' value="{{$data->name}}" id="name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tahun" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">save</button></div>
                            </div>
                        
                        </div>
                    </form>



@endsection