@extends('master')

@section('title')
Expense
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
                        <h4 class="card-title ">Add Investment Expense</h4>
                    </div>

                <div class="card-body" >
                {{-- form starts  --}}
                <form action="{{route('store_investment_expense')}}" method="post">
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
                                        <input type="date" name="payment_date" class="form-control" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy Old Gold</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="buy_old_gold" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy Ornaments Readymade</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="buy_ornaments_readymade" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy 24K Gold / Ananto</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="buy_24k_gold_ananto" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy Ornaments from Ananto</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="buy_ornaments_from_ananto" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Exchange Own Gold</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="exchange_own_gold" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Exchange Own Diamond</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="exchange_own_diamond" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy or Exchange Own Gold</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="buy_or_exchange_own_gold" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Booking Cancel</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="booking_cancel" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Deposit Customer 24K Gold</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="deposit_customer_24k_gold" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy Diamond from Mihir</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="buy_diamond_from_mihir" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pay to Sajal Bhai</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="pay_to_sajal_bhai" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pay to Ananto</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="pay_to_ananto" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Order Cancel</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="order_cancel" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Deposit in City Bank</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="deposit_in_city_bank" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pay Vangary Profit</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="pay_vangary_profit" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Deposit in Dutch Bangla Bank</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="deposit_in_dutch_bangla_bank" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Shop Decoration Advance</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="shop_decoration_advance" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pay to Customer</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="pay_to_customer" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Due Cancel</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="due_cancel" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Box Bill (Shamim Products)</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="box_bill_shamim_products" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Diamond Test Machine / Wet Machine</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="diamond_test_machine_wet_machine" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy Stone</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="buy_stone" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Software Advance / Payment</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="software_advance_payment" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy Coffee Machine / Computer</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="buy_coffee_machine_computer" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Stationary Printing</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="stationary_printing" class="form-control" step="0.01">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Balance or Cash in Hand</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="balance_or_cash_in_hand" class="form-control" step="0.01">
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
        <div class="col-1"></div>
        </div> <!-- end of row -->   
        
      </div>


      </div> <!-- /.container-fluid -->     
    </div> <!-- /.content-header -->      
  </div> <!-- /.content-wrapper -->   

@endsection

@push('myScripts')
<script>
//  $(document).ready(function() {

// });



document.addEventListener('DOMContentLoaded', function() {

    $('#totalAmount').val('0.00');

    const monthlyStaffSalaryDiv = document.getElementById('monthly_staff_salary');
    const formContainer = document.getElementById('monthly_salary_container');
    const originalContent = formContainer.innerHTML; // Store the original content

    document.getElementById('expense_type').addEventListener('change', function() {
        if (this.value === '2') {
            // Show the 'monthly_staff_salary' div
            monthlyStaffSalaryDiv.style.display = 'block';
            formContainer.innerHTML = originalContent; // Restore the original content
        } else {
            // Hide the 'monthly_staff_salary' div and clear the data
            monthlyStaffSalaryDiv.style.display = 'none';
            formContainer.innerHTML = ''; // Restore the original content
        }
        updateTotal();
    });
});

function initialExpenseAmount(){
        updateTotal();
    }


document.getElementById('addButton').addEventListener('click', function() { 
        const container = document.getElementById('form-container');
        const newRow = document.createElement('div');
        newRow.className = 'form-row';
        newRow.innerHTML = `<div class="row" style="width: 100%; margin-top: 70px !important;">

                           <div class="form-group col-md-4 col-sm-4">
                                <label for="expense_name" class="col-form-label text-start">Expense Name</label>
                                <input type="text" class="form-control expense_name" name="expense_name[]">
                            </div>

                            <div class="form-group col-md-4 col-sm-4">
                                <label for="expense_amount"  class="col-form-label text-start">Expense Amount (BDT)</label>
                                <input type="number" step="0.01" class="form-control expense_amount" name="expense_amount[]"> 
                            </div>
                            
                            <div class="form-group col-md-3 col-sm-4">
                                <label  class="col-form-label text-start">Payment Date</label>         
                                <input type="date" id="expense_pay_date" name="expense_pay_date[]" value="{{ date('Y-m-d') }}" class="form-control" />
                            </div>
            
                            <div class="form-group">                                        
                            <button style="margin-top:35px !important; color: white" class="remove-button btn btn-danger">x</button>   
                            </div>
                        </div>                                         
                    `;
        container.appendChild(newRow);
        newRow.querySelector('.remove-button').addEventListener('click', function() {
            newRow.remove();
            updateTotal();
        });

    // Attach the change event handler to the new input field
    newRow.querySelector('.expense_amount').addEventListener('input', updateTotal);

});

// Attach event listener to the static initial field
document.querySelector('.expense_amount').addEventListener('input', updateTotal);


function updateTotal() {      
        var total = 0;
        $('.expense_amount').each(function() {
            var subtotal = parseFloat($(this).val());
            if (!isNaN(subtotal)) {
                total += subtotal;
            }
        });

        $('#totalAmount').val(total.toFixed(2));
    }




</script>
@endpush