@extends('master')

@section('title')
Daily Payment
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
                    <br> 
                    <div>
                    <div class="row">
                    <div class="col-12">
                        <a class="btn btn-outline-info float-right" href="{{route('daily_payment_list')}}">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-md-10 col-sm-12">
                    <div class="card" style="">
                    <div class="card-header">                                   
                        <h3 class="card-title ">Edit Daily Payments</h3>
                    </div>

                <div class="card-body" >
                {{-- form starts  --}}
                <form action="{{route('update_daily_payment')}}" method="post">
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
                                            <input type="date" name="payment_date" value="{{$expense->payment_date}}" class="form-control" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="mobile_bill" value="{{$expense->mobile_bill}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Snacks</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="snacks" value="{{$expense->snacks}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Entertainment Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="entertainment_bill" value="{{$expense->entertainment_bill}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Others</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="others" value="{{$expense->others}}"  class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gift for Customer</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="gift_for_customer" value="{{$expense->gift_for_customer}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ornaments Binding Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="ornaments_binding_bill" value="{{$expense->ornaments_binding_bill}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Interest for Gold Lending</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="interest_for_gold_lending" value="{{$expense->interest_for_gold_lending}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vangary Loss</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="vangary_loss" value="{{$expense->vangary_loss}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pay Repair Bill</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="pay_repair_bill" value="{{$expense->pay_repair_bill}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Photocopy</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="photocopy" value="{{$expense->photocopy}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Management Expenses</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="management_expenses" value="{{$expense->management_expenses}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Transport</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="transport" value="{{$expense->transport}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bkash Cost</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="bkash_cost" value="{{$expense->bkash_cost}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Repairing Cost</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="repairing_cost" value="{{$expense->repairing_cost}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Conveyance</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="conveyance" value="{{$expense->conveyance}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buy Lock / Locker</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_lock_locker" value="{{$expense->buy_lock_locker}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cash Back</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="cash_back" value="{{$expense->cash_back}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Live Cost</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="live_cost" value="{{$expense->live_cost}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Parking Cost</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="parking_cost" value="{{$expense->parking_cost}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VAT Machine</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="vat_machine" value="{{$expense->vat_machine}}" class="form-control expense_amount" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Door Greese</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="door_grease" value="{{$expense->door_grease}}" class="form-control" step="0.01">
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
