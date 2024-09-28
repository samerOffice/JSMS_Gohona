@extends('master')

@section('title')
Marketing Cost
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
                    <br> 
                    <div>
                    <div class="row">
                    <div class="col-12">
                        <a class="btn btn-outline-info float-right" href="{{route('marketing_cost_list')}}">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-md-10 col-sm-12">
                    <div class="card" style="">
                    <div class="card-header">                                   
                        <h3 class="card-title ">Edit Marketing Cost</h3>
                    </div>

                <div class="card-body" >
                {{-- form starts  --}}
                <form action="{{route('update_marketing_cost')}}" method="post">
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

                                <tr>
                                    <td>Payment Date</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="date" name="payment_date" class="form-control" value="{{$expense->payment_date}}" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Advertising</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="advertising" value="{{$expense->advertising}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>SMS Buy</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="sms_buy" value="{{$expense->sms_buy}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook Boosting</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="facebook_boosting" value="{{$expense->facebook_boosting}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook Design</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="facebook_design" value="{{$expense->facebook_design}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Website Charge</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="website_charge" value="{{$expense->website_charge}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="form-group text-center mt-3">
                        <input type="hidden" value="{{$expense->id}}" name="id">
                        <button type="submit" class="btn btn-primary btn-lg float-right">Submit</button>
                    </div>
                </form>
            </div> <!--end of card body -->
            </div> <!--end of card -->
        </div> <!-- end of col -->

        </div> <!-- end of row -->          
      </div>


      </div> <!-- /.container-fluid -->     
    </div> <!-- /.content-header -->      
  </div> <!-- /.content-wrapper -->   

@endsection
