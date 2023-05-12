

@extends('template.admin')
@section('name')
    

<form method="post" action="/action" >
    
    @include('pesan.pesan')
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('action')}}' class="btn btn-outline-success"><i class="bi bi-skip-backward-btn-fill"></i></a>

        <div class="mb-3 row">
            <label for="action_name" class="col-sm-2 col-form-label">action name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('action_name')}}"  name='action_name'id="action_name">
             
            </div>
        </div>

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
            <label for="route" class="col-sm-2 col-form-label">route</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('route')}}"  name='route'id="route">
             
            </div>
        </div>
    

        <div class="mb-3 row">
            <label for="function" class="col-sm-2 col-form-label">function</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{Session::get('function')}}"  name='function'id="function">
             
            </div>
        </div>
    

    <div class="mb-3 row">
        <label for="tahun" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-outline-primary" name="submit"><i class="bi bi-save"></i></button></div>
    </div>
</div>

</form>

@endsection

