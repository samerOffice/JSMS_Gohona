@extends('master')

@section('title')
Welcome
@endsection


@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-outline-info float-right" href="{{route('add_today_rate')}}">
                    <i class="fas fa-plus"></i> Add Today Rate
                </a>            
            </div>

            <div class="col-12">
                <br>
                @if ($message = Session::get('success'))
                <div class="alert alert-info" role="alert">
                  <div class="row">
                    <div class="col-11">
                      {{ $message }}
                    </div>
                    <div class="col-1">
                      <button type="button" class=" btn btn-info" data-dismiss="alert" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                  </div>
                </div>
                @endif
            </div>


            
            
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Today Rate List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>Type</th>
                          <th>Rate</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($today_rates as $today_rate)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$today_rate->name}}</td>
                          <td>{{$today_rate->rate}}</td>
                          <td>
                            @if(($today_rate->status) == 1)                           
                            <button class="btn btn-sm btn-success">Active</button>                           
                            @else                            
                            <button class="btn btn-sm btn-danger">Inactive</button>                           
                            @endif
                          </td>
                          <td>
                             <a href="{{route('edit', $today_rate->id)}}" style="color: white"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a> | 
                            {{-- <a onclick="return confirm('Are you sure?')" href="{{route('delete_product_category', $product_category->id)}}" style="color: white;"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i>  Delete </button></a> --}}
                            <a onclick="Swal.fire({
                              title: 'Are You Sure?',
                              text: '',
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonText: 'Yes',
                              cancelButtonText: 'Cancel',
                              
                            }).then((result)=>{
                              if (result.isConfirmed){
                                  var deleteTodayRate = '{{ route('delete', $today_rate->id )}}';
                                  window.location.href = deleteTodayRate;
                                  Swal.fire({
                                  title: 'Deleted!',
                                  text: 'Your file has been deleted.',
                                  icon: 'success'
                                });
                                }
                            })" ><button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i>  Delete </button></a>
                        </td>
                        </tr> 
                        @endforeach              
                 
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
            
        </div>
        
        <br>
        
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@push('myScripts')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

   
    
  </script>
  @endpush