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
                <a class="btn btn-outline-info float-right" href="{{route('customer.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
           
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Import Customer</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ asset('public/demo_csv_files/customer_import_format.csv') }}" download><button type="button" id="ss" class="btn btn-sm btn-outline-secondary float-right mr-4"><i class="fa-solid fa-download"></i> File Format for Import Customer</button></a>
                        
                        <form id="uploadForm" action="{{ route('upload_customer_excel') }}" method="post" enctype="multipart/form-data">  
                            @csrf                  
                            <div class="card-body">                    
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" required class="custom-file-input form-control" name="customer_excel_file" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                      </div> 
                                    </div>
                                    @if ($errors->has('customer_excel_file'))
                                        <span class="text-danger">{{ $errors->first('customer_excel_file') }}</span>
                                    @endif
                                </div>                            
                            </div>
                            <!-- /.card-body -->
                            <button type="submit"  class="btn btn-info float-right mr-4">Submit</button>
                            
                          </form>

                          <br>
                          <br>
                          <br>
                          @if(!empty($csvData))
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    @foreach($csvData[0] as $header)
                                        <th>{{ $header }}</th>
                                    @endforeach
                                    <th>Action</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach(array_slice($csvData, 1) as $row)
                        <tr>
                            @foreach($row as $cell)
                                <td>{{ $cell }}</td>
                            @endforeach
                            <td><button class="btn btn-delete btn-outline-danger"><i class="fa-solid fa-xmark"></i></button></td>
                        </tr>
                    @endforeach                                              
                        </tfoot>
                          </table>
                          <br>
                          <form id="myForm" method="post" action="{{ route('submit_customer.data') }}">
                            @csrf
                            <input type="hidden" name="name[]" id="name">
                            <input type="hidden" name="mobile_number[]" id="mobile_number">
                            <input type="hidden" name="address[]" id="address">
                            <input type="hidden" name="customer_category_id[]" id="customer_category_id">
                            <input type="hidden" name="district_id[]" id="district_id">
                            <input type="hidden" name="zone_id[]" id="zone_id">
                            <input type="hidden" name="fb_name[]" id="fb_name">
                            <!-- Add more hidden fields as needed for other data -->
                            <button type="submit" class="btn  btn-success float-right">Submit</button>
                        </form>
  
                          @else
            <p>No data found</p>
        @endif
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
    // $(function () {
    // bsCustomFileInput.init();
    // });

  
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

        $(document).ready(function() {
        // Initialize DataTable
        var table = $('#example1').DataTable();

        // Attach click event handler to the delete buttons
        $('#example1 tbody').on('click', '.btn-delete', function() {
            // Get the closest row to the clicked button
            var row = $(this).closest('tr');

            // Remove the row from the DataTable
            table.row(row).remove().draw();
        });

//---------------------------------------sdfs---------------------------------------//
        $('#myForm').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Iterate through each row of the table
        $('#example1 tbody tr').each(function() {
            // Get values from the current row
            var name = $(this).find('td:eq(0)').text(); // Assuming name is in the first column
            var mobile_number = $(this).find('td:eq(1)').text(); // Assuming mobile_number is in the second column
            var address = $(this).find('td:eq(2)').text(); // Assuming address is in the third column
            var customer_category_id = $(this).find('td:eq(3)').text(); // Assuming customer_category_id is in the forth column
            var district_id = $(this).find('td:eq(4)').text(); // Assuming district_id is in the fifth column
            var zone_id = $(this).find('td:eq(5)').text(); // Assuming zone_id is in the sixth column
            var fb_name = $(this).find('td:eq(6)').text(); // Assuming fb_name is in the seven column
          

          // Append values to hidden input fields
            $('<input>').attr({
                type: 'hidden',
                name: 'name[]',
                value: name
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'mobile_number[]',
                value: mobile_number
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'address[]',
                value: address
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'customer_category_id[]',
                value: customer_category_id
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'district_id[]',
                value: district_id
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'zone_id[]',
                value: zone_id
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'fb_name[]',
                value: fb_name
            }).appendTo('#myForm');
        });

        // Submit the form     
        var formData = $(this).serializeArray();
        // var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            // headers: {
            //   'X-CSRF-TOKEN': csrfToken // Set CSRF token in the request header
            // },
            success: function(response) {
                console.log(response)
                var customerlist = '{{ route('customer.index' )}}';
                window.location = customerlist;
            },
            error: function(xhr, status, error) {
              console.log(error)
            }
        });
        
    });
    });
    
</script>
@endpush

