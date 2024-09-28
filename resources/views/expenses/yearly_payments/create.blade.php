@extends('master')

@section('title')
Yearly Payment
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
                    <br> 
                    <div>
                    <div class="row">
                    <div class="col-12">
                        <a class="btn btn-outline-info float-right" href="{{route('yearly_payment_list')}}">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-md-10 col-sm-12">
                    <div class="card" style="">
                    <div class="card-header">                                   
                        <h3 class="card-title ">Add New Yearly Payment</h3>
                    </div>

                <div class="card-body" >
                {{-- form starts  --}}
                <form action="{{route('store_yearly_payment')}}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Field Name</th>
                                    <th>Input</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td>Payment Date</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="date" name="payment_date" class="form-control" required>
                                        </div>
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td>Trade License</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="trade_license" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pahela Boishakh Expenses</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="pahela_boishakh_expenses" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Valentine Gate</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="valentine_gate" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Zakat</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="zakat" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dealing Licence</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="dealing_licence" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            
                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
        {{-- form ends  --}}

            </div> <!--end of card body -->
            </div> <!--end of card -->
        </div> <!-- end of col -->

        </div> <!-- end of row -->   
        
      </div>

      </div> <!-- /.container-fluid -->     
    </div> <!-- /.content-header -->      
  </div> <!-- /.content-wrapper -->   
@endsection
