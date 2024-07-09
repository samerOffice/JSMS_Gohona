@extends('master')

@section('title')
Booking List
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">                              
                <a class="btn btn-outline-primary float-right" href="{{route('booking.create')}}">
                    <i class="fas fa-plus"></i> Add Booking
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
                      <h3 class="card-title">Booking List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Serial No.</th>                 
                          <th>Booking Number</th>
                          <th>Booking Date</th>
                          <th>Client Name</th>
                          <th>Item Total Amount (BDT)</th>
                          <th>VAT Amount (BDT)</th>
                          <th>Sub Total Amount (BDT)</th>
                          <th>Discount Amount (BDT)</th>
                          <th>Total Amount (BDT)</th>
                          <th>Paid Amount (BDT)</th>
                          <th>Due Amount (BDT)</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach($bookings as $booking)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$booking->booking_number}}</td>                          
                          <td>{{$booking->booking_date}}</td>
                          <td>{{$booking->customer_name}}</td>
                          <td>{{$booking->item_total_amount}}</td>
                          <td>{{$booking->vat_amount}}</td>
                          <td>{{$booking->subtotal_amount}}</td>
                          <td>
                            @php
                            echo number_format($booking->discount_amount, 2, '.', '')
                            @endphp
                          </td>
                          <td>{{$booking->total_amount}}</td>
                          <td>{{$booking->total_paid_amount}}</td>
                          <td>{{$booking->total_due_amount}}</td>
                          <td>
                             <a href="{{route('booking.edit',$booking->id)}}" style="color: white"><button class="btn btn-success"><i class="fa-solid fa-print"></i></button></a>
                             <a href="{{route('booking.edit',$booking->id)}}" style="color: white"><button class="btn btn-warning"><i class="fa-solid fa-edit"></i></button></a>
                             <a href="{{route('booking.edit',$booking->id)}}" style="color: white"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
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
