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
                <a class="btn btn-outline-success float-right ml-2" href="{{route('product_import')}}">
                    <i class="fas fa-upload"></i> Import Product
                </a>
               
                <a class="btn btn-outline-info float-right" href="{{route('product.create')}}">
                  <i class="fas fa-plus"></i> Add Product
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
                      <h3 class="card-title">Product List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>Product NR</th>
                          <th>Details</th>
                          <th>Category</th>
                          <th>Weight</th>
                          <th>ST/DIA</th>
                          <th>ST/DIA Price</th>
                          <th>Wage</th>
                          <th>Status</th>
                          <th>Supplier</th>
                          <th>Purchase Price</th>
                          <th>Quantity</th>
                          <th>Stock Type</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($products as $product)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$product->product_nr}}</td>
                          <td>{{$product->product_details}}</td>
                          <td>{{$product->product_category_name}}</td>
                          <td>{{$product->weight}}</td>
                          <td>{{$product->st_or_dia}}</td>
                          <td>{{$product->st_or_dia_price}}</td>
                          <td>{{$product->wage}}</td>
                          <td>
                             @if($product->status == 1)
                             Fresh
                             @elseif($product->status == 2)
                             Sold
                             @else
                             Booked
                             @endif
                        </td>
                          <td>{{$product->supplier_name}}</td>
                          <td>{{$product->purchase_price}}</td>
                          <td>{{$product->quantity}}</td>
                          <td>
                            @if($product->stock_type == 1)
                            New Stock
                            @elseif($product->stock_type == 2)
                            Exchange
                            @elseif($product->stock_type == 3)
                            Old Gold
                            @else
                            S. Return
                            @endif
                          </td>
                          <td>
                             <a href="{{route('product.edit', $product->id)}}" style="color: white"><button class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></a> 

                             @if(in_array(12, $permitted_menus_array))
                             |
                             
                            <a onclick="Swal.fire({
                              title: 'Are You Sure?',
                              text: '',
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonText: 'Yes',
                              cancelButtonText: 'Cancel',
                              
                            }).then((result)=>{
                              if (result.isConfirmed){
                                  var deleteProduct = '{{ route('delete_product', $product->id )}}';
                                  window.location.href = deleteProduct;
                                  Swal.fire({
                                  title: 'Deleted!',
                                  text: 'Your file has been deleted.',
                                  icon: 'success'
                                });
                                }
                            })" ><button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i>  Delete </button></a>
                            @endif

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