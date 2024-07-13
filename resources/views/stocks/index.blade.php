@extends('master')

@section('title')
Sales List
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">  
              
              <a class="btn btn-outline-danger float-right ml-2" href="{{route('stock_list')}}">
                <i class="fas fa-list"></i> Stock List
              </a> 
                <a class="btn btn-outline-primary float-right ml-2" href="{{route('stock.create')}}">
                    <i class="fas fa-plus"></i> Add Stock
                </a> 

                <a class="btn btn-outline-success float-right" href="">
                    <i class="fas fa-plus"></i> Add Sale
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
                      <h3 class="card-title">Stocks</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="datatable" class="mb-0 table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead" style="background: #ddd;color: #000;">
                            <tr>
                                <th>DETAILS</th>
                                <th>18K</th>
                                <th>21K</th>
                                <th>22K</th>
                                <th>ST.</th>
                                <th>D 18K</th>
                                <th>DIA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BALACE B/F</td>
                                <td>17.49</td>
                                <td>84.05</td>
                                <td>62.55</td>
                                <td>9.54</td>
                                <td>13.17</td>
                                <td>3.88</td>
                            </tr>

                            <tr>
                                <td>SALE</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>

                            <tr>
                              <td>SALE FROM STOCK</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                              <td>0</td>
                          </tr>

                            <tr style=" font-weight: bold;">
                                <td>BALANCE</td>
                                <td>17.49</td>
                                <td>84.05</td>
                                <td>62.55</td>
                                <td>9.54</td>
                                <td>13.17</td>
                                <td>3.88</td>
                            </tr>

                            <tr>
                                <td>NEW STOCK</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>

                            <tr>
                                <td>EXCHANGE</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            
                            <tr>
                                <td>OLD GOLD</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            
                            <tr>
                                <td>S. RETURN</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            
                        </tbody>
                        <tfoot class="thead">
                            <tr style=" font-weight: bold;">
                                <td>BALANCE</td>
                                <td>17.49</td>
                                <td>84.05</td>
                                <td>62.55</td>
                                <td>9.54</td>
                                <td>13.17</td>
                                <td>3.88</td>
                            </tr>
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
