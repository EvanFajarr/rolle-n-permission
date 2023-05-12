
  

@extends('template.admin')
@section('name')  

                    @include('pesan.pesan')

                  
   <!-- START data -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{'action'}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Search</button>
                  </form>
                </div>
                <!-- TOMBOL TAMBAH data -->
                @can('create action')
                <div class="pb-3">
                  <a href='/action/create' class="btn btn-primary"> add</a>
               </div> 
               @endcan

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">system name</th>
                            <th class="col-md-3">modul name</th>
                            <th class="col-md-2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                      
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{  $item->module->system->name ?? 'None' }}</td>
                            <td>{{ $item->module->modul_name ?? 'None' }}</td>
                         
                            <td>
                                @can('edit action')
                                <a href= '{{url('action/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                               @endcan
                               @can('delete action')
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('action/'.$item->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            @endcan
                            </td>
                        </tr>
                              <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
               {{$data->links()}}
          </div> 
          @endsection