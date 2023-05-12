

@extends('template.admin')
@section('name')
    

<form method="post" action="/rolle" >
    
    @include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('rolle')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label"> Role name </label>
            <div class="col-sm-10">
              <input type="text" id="name" name="name" class="form-control" />
            </div>
    

    <div class="mb-3 row">
        <label for="tahun" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
    </div>
</div>

</form>

@endsection

