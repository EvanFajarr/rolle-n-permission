
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH data -->
                @can('create rolle')
                <div class="pb-3">
                  <a href='/rolle/create' class="btn btn-primary"> add</a>
               </div> 
               @endcan
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">rolle</th>
                            <th class="col-md-2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                      
                        <tr>
                            <td>{{ $role->name }}</td>
                         
                            <td>
                                @can('edit rolle')
                                <a href= '{{url('rolle/'.$role->id.'/edit')}}'  class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                @endcan
                                @can('delete rolle')
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('rolle/'.$role->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            @endcan
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
          </div> 
          @endsection