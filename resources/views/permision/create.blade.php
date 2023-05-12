

@extends('template.admin')
@section('name')
    

<form method="post" action="/permision" >
    
    @include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('permision')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">permision name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('name')}}"  name='name'id="name">
            </div>
        </div>
    <div class="mb-3 row">
        <label for="tahun" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-outline-success" name="submit"><i class="bi bi-save"></i></button></div>
    </div>
</div>

</form>

@endsection

