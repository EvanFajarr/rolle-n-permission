@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')    
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- TOMBOL TAMBAH data -->
                <div class="pb-3">
                  <a href='/user/create' class="btn btn-primary"> add</a>
               </div> 
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">rolle</th>
                            <th class="col-md-2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                      
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href= '{{url('user/'.$user->id.'/show')}}'  class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('user/'.$user->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
          </div> 
     
@endsection
