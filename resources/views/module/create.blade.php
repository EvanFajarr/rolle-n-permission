

@extends('template.admin')
@section('name')
    

<form method="post" action="/module" >
    
    @include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('module')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

        <div class="mb-3 row">
            <label for="modul_name" class="col-sm-2 col-form-label">module name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('modul_name')}}"  name='modul_name'id="modul_name">
             
            </div>
        </div>

        <div class="mb-3 row">
            <label for="system_name" class="col-sm-2 col-form-label">system name</label>
            <div class="col-sm-10">
                <select type="text" name="system_name"  name="system_name"  value="{{Session::get('system_name')}}" id="system_name"  class="form-control">
                    @foreach ($system as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                    @endforeach
                  </select>
            </div>
        </div>

        
          <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">description</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="description" value="{{Session::get('description')}}"  id="description"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="ordering" class="col-sm-2 col-form-label">ordering</label>
            <div class="col-sm-10">
                <input type="number" class="form-control"  value="{{Session::get('ordering')}}"   name='ordering'id="ordering">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="file_name" class="col-sm-2 col-form-label">file name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('file_name')}}"  name='file_name'id="file_name">
             
            </div>
        </div>
    

        <div class="mb-3 row">
            <label for="class_name" class="col-sm-2 col-form-label">class name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('class_name')}}"  name='class_name'id="class_name">
             
            </div>
        </div>
    

    <div class="mb-3 row">
        <label for="tahun" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
    </div>
</div>

</form>

@endsection

