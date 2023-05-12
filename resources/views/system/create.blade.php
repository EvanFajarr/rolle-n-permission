

@extends('template.admin')
@section('name')
    

<form method="post" action="/system" >
    
    @include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('system')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">system name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('name')}}"  name='name'id="name">
             
            </div>
        </div>

        
          <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">description</label>
            <div class="col-sm-10">
            <textarea class="form-control  " name="description" value="{{Session::get('description')}}"  id="description"></textarea>
            </div>
        </div>

        
    


        <div class="mb-3 row">
            <label for="ordering" class="col-sm-2 col-form-label">ordering</label>
            <div class="col-sm-10">
                <input type="number" class="form-control"  value="{{Session::get('ordering')}}"   name='ordering'id="ordering">
            </div>
        </div>

    
    <div class="mb-3 row">
        <label for="tahun" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
    </div>
</div>

</form>

@endsection

