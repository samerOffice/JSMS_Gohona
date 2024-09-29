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
                        <a class="btn btn-outline-info float-right" href="{{route('investment_expense_list')}}">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-md-10 col-sm-12">
                    <div class="card" style="">
                    <div class="card-header">                                   
                        <h3 class="card-title ">Edit Investment Expense</h3>
                    </div>

                <div class="card-body" >
                {{-- form starts  --}}
                <form action="{{route('update_investment_expense')}}" method="post">
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
                                    <td>Buy Old Gold</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_old_gold" value="{{$expense->buy_old_gold}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buy Ornaments Readymade</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_ornaments_readymade" value="{{$expense->buy_ornaments_readymade}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buy 24K Gold / Ananto</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_24k_gold_ananto" value="{{$expense->buy_24k_gold_ananto}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buy Ornaments from Ananto</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_ornaments_from_ananto" value="{{$expense->buy_ornaments_from_ananto}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Exchange Own Gold</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="exchange_own_gold" value="{{$expense->exchange_own_gold}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Exchange Own Diamond</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="exchange_own_diamond" value="{{$expense->exchange_own_diamond}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buy or Exchange Own Gold</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_or_exchange_own_gold" value="{{$expense->buy_or_exchange_own_gold}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Booking Cancel</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="booking_cancel" value="{{$expense->booking_cancel}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deposit Customer 24K Gold</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="deposit_customer_24k_gold" value="{{$expense->deposit_customer_24k_gold}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buy Diamond from Mihir</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_diamond_from_mihir" value="{{$expense->buy_diamond_from_mihir}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pay to Sajal Bhai</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="pay_to_sajal_bhai" value="{{$expense->pay_to_sajal_bhai}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pay to Ananto</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="pay_to_ananto" value="{{$expense->pay_to_ananto}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Order Cancel</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="order_cancel" value="{{$expense->order_cancel}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deposit in City Bank</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="deposit_in_city_bank" value="{{$expense->deposit_in_city_bank}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pay Vangary Profit</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="pay_vangary_profit" value="{{$expense->pay_vangary_profit}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deposit in Dutch Bangla Bank</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="deposit_in_dutch_bangla_bank" value="{{$expense->deposit_in_dutch_bangla_bank}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shop Decoration Advance</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="shop_decoration_advance" value="{{$expense->shop_decoration_advance}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pay to Customer</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="pay_to_customer" value="{{$expense->pay_to_customer}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Due Cancel</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="due_cancel" value="{{$expense->due_cancel}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Box Bill (Shamim Products)</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="box_bill_shamim_products" value="{{$expense->box_bill_shamim_products}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Diamond Test Machine / Wet Machine</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="diamond_test_machine_wet_machine" value="{{$expense->diamond_test_machine_wet_machine}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buy Stone</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_stone" value="{{$expense->buy_stone}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Software Advance / Payment</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="software_advance_payment" value="{{$expense->software_advance_payment}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Buy Coffee Machine / Computer</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="buy_coffee_machine_computer" value="{{$expense->buy_coffee_machine_computer}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stationary Printing</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="stationary_printing" value="{{$expense->stationary_printing}}" class="form-control" step="0.01">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Balance or Cash in Hand</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="balance_or_cash_in_hand" value="{{$expense->balance_or_cash_in_hand}}" class="form-control" step="0.01">
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
