@extends('master')

@section('title')
Welcome
@endsection


@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Product List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="width: 50%; padding-left:200px">
<form id="dataForm" method="POST" action="{{ route('submit.data') }}">
    @csrf
    <table id="example1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <!-- Add more columns if needed -->
            </tr>
        </thead>
        <tbody>
            <!-- Rows will be dynamically added here -->
        </tbody>
    </table>
    <button type="button" id="addRowBtn">Add Row</button>
    <button type="submit" id="submitBtn">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection

@push('myScripts')
<script>
    $(document).ready(function() {
        $('#addRowBtn').on('click', function() {
            $('#example1 tbody').append('<tr>' +
                '<td><input type="text" name="name[]" class="form-control"></td>' +
                '<td><input type="email" name="email[]" class="form-control"></td>' +
                // Add more input fields as needed
                '</tr>');
        });

        $('#dataForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serializeArray();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success response
                },
                error: function(xhr, status, error) {
                    // Handle error response
                }
            });
        });

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
    });
</script>
@endpush