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
                <a class="btn btn-outline-info float-right" href="{{route('product.index')}}">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
           
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Import Product</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ asset('public/demo_csv_files/product_import_format.csv') }}" download><button type="button" id="ss" class="btn btn-sm btn-outline-secondary float-right mr-4"><i class="fa-solid fa-download"></i> File Format for Import Product</button></a>
                        
                        <form id="uploadForm" action="{{ route('upload_excel') }}" method="post" enctype="multipart/form-data">  
                            @csrf                  
                            <div class="card-body">                    
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" required class="custom-file-input form-control" name="excel_file" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                      </div>  
                                    </div>
                                    @if ($errors->has('excel_file'))
                                        <span class="text-danger">{{ $errors->first('excel_file') }}</span>
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
                          <form id="myForm" method="post" action="{{ route('submit.data') }}">
                            @csrf
                            <input type="hidden" name="product_nr[]" id="product_nr">
                            <input type="hidden" name="product_details[]" id="product_details">
                            <input type="hidden" name="weight[]" id="weight">
                            <input type="hidden" name="st_or_dia[]" id="st_or_dia">
                            <input type="hidden" name="st_or_dia_price[]" id="st_or_dia_price">
                            <input type="hidden" name="wage[]" id="wage">
                            <input type="hidden" name="wage_type[]" id="wage_type">
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
            var product_nr = $(this).find('td:eq(0)').text(); // Assuming product_nr is in the first column
            var product_details = $(this).find('td:eq(1)').text(); // Assuming product_details is in the second column
            var weight = $(this).find('td:eq(2)').text(); // Assuming weight is in the third column
            var st_or_dia = $(this).find('td:eq(3)').text(); // Assuming st_or_dia is in the forth column
            var st_or_dia_price = $(this).find('td:eq(4)').text(); // Assuming st_or_dia_price is in the fifth column
            var wage = $(this).find('td:eq(5)').text(); // Assuming wage is in the sixth column
            var wage_type = $(this).find('td:eq(6)').text(); // Assuming wage_type is in the seven column
          

          // Append values to hidden input fields
            $('<input>').attr({
                type: 'hidden',
                name: 'product_nr[]',
                value: product_nr
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'product_details[]',
                value: product_details
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'weight[]',
                value: weight
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'st_or_dia[]',
                value: st_or_dia
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'st_or_dia_price[]',
                value: st_or_dia_price
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'wage[]',
                value: wage
            }).appendTo('#myForm');
            $('<input>').attr({
                type: 'hidden',
                name: 'wage_type[]',
                value: wage_type
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
                var productList = '{{ route('product.index' )}}';
                window.location = productList;
            },
            error: function(xhr, status, error) {
              console.log(error)
            }
        });
        
    });
    });
    
</script>
@endpush

