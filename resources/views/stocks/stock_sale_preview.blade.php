@extends('master')

@section('title')
Preview Sale
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('public/plugins/sale_preview.css')}}">
<style>
   @media print {
        #invoice_print {
            display: none;
        }

        /* #payroll_details{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 100px;
            box-sizing: border-box;
        } */

        table {
            border-collapse: collapse;
            margin-top: 7% !important;
            margin-left: 3% !important;
            width: 90% !important; 
            font-size: 20px !important;        
        }
        table, th, td {
            /* border: 1px solid black; */
            font-size: 16px !important;
            
        }

        
        .audit_sign {
           
            width: 170px !important;
            margin-left: 50% !important;
            margin-right: 50% !important;
            margin-top: 10% !important;
        }

        .seller_sign {
            margin-left: 150% !important;
        }

        .remark {
            font-size: 20px !important;
        }

        .sell_by {
            font-size: 20px !important;
        }
 
        
    }
</style>
@endpush

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="main-content">

            <div class="page-content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">                              
                    <a class="btn btn-outline-success float-right" target="_blank" id="invoice_print" >
                        <i class="fas fa-print"></i> PRINT
                    </a> 
                </div>
            </div>


            {{-- <div class="page-title">
                <a href="https://sencotest.xstreambd.com/pos/392" target="_blank">PRINT</a>
            </div> --}}

            <div class="page card" id="payroll_details"  orientation="portrait" size="A4" pages="1"
                style="padding:50px;margin:0 auto;color: #000;">

                
                <table class="table-fw">
                    <thead>
                        <tr>
                            <td style="width: 33.33%;vertical-align: bottom;text-align:left">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="font-size:14px;"><span
                                                style="font-size:14px;font-family: math; font-weight: bold;">CUSTOMER
                                                DETAILS:</span></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:14px;">{{$sale->customer_name}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:14px;">{{$sale->customer_address}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:14px;">{{$sale->customer_mobile_number}}</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width: 33.33%;vertical-align: top;text-align:center">
                                <table style="width: 100%;">
                                    <tr>
                                        <td><span style="font-size:24px;font-family: math; font-weight: bold;">CASH
                                                MEMO</span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="font-size:12px;">(MUSOK-6.3)</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span style="font-size: 14px">FB/REF: </span>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                            <td style="width: 33.33%;vertical-align: bottom;text-align:right">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="font-size:14px;">BIN NO:</td>
                                        <td style="width: 100px;font-size:14px;">{{$sale->bin_no}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:14px;">DATE :</td>
                                        <td style="width: 100px;font-size:14px;">
                                            {{$sale->sale_date}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:14px;">MEMO NO :</td>
                                        <td style="width: 100px;font-size:14px;">{{$sale->sale_number}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </thead>
                </table>

                <table class="table-fw table-border">
                    <thead>
                        <tr>
                            <td class="text-center"
                                style="width:52px;font-size:12px;font-weight: bold;font-family: math; width:100px">TOKEN
                                NO</td>
                            <td class="text-center" style="font-size:12px;font-weight: bold;font-family: math; width:150px">PRODUCT
                                DETAILS
                            </td>
                            <td class="text-right"
                                style="width:59px;font-size:12px;font-weight: bold;font-family: math; width:100px">GOLD
                                WT/GM</td>
                            <td class="text-right"
                                style="width:59px;font-size:12px;font-weight: bold;font-family: math; width:100px">GOLD
                                PRICE</td>
                            <td class="text-center"
                                style="width:59px;font-size:12px;font-weight: bold;font-family: math; width:100px">
                                ST/DIA WT</td>
                            <td class="text-center"
                                style="width:59px;font-size:12px;font-weight: bold;font-family: math; width:100px">
                                ST/DIA PRICE</td>
                            <td class="text-right"
                                style="width: 85px;font-size:12px;font-weight: bold;font-family: math; width:100px">
                                TOTAL TAKA</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($sold_product_details as $sold_product_detail)
                        <tr>
                            <td class="text-center" style="font-size:12px;font-family: math;">
                                {{$sold_product_detail->token_no}}
                            </td>
                            <td class="text-center" style="font-size:12px;font-family: math;">
                                {{$sold_product_detail->product_details}}
                            </td>
                            <td class="text-end" style="font-size:12px;font-family: math;">
                                {{$sold_product_detail->product_weight}}
                            </td>
                            <td class="text-end" style="font-size:12px;font-family: math;">
                                {{$sold_product_detail->unit_price_amount}}
                            </td>
                            <td class="text-end" style="font-size:12px;font-family: math;">
                                {{$sold_product_detail->product_st_or_dia}}
                            </td>
                            <td class="text-end" style="font-size:12px;font-family: math;">
                                {{$sold_product_detail->product_st_or_dia_price}}
                            </td>

                            <td class="text-end" style="font-size:12px;font-family: math;">
                                @php
                                echo number_format($sold_product_detail->product_individual_total_amount, 2, '.', '')
                                @endphp
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-end" style="font-size:12px;font-weight: bold;font-family: math;">TOTAL</td>
                            <td class="text-end" style="font-size:12px;font-family: math;">
                                {{$totals->total_weight}}
                            </td>
                            <td class="text-end" style="font-size:12px;font-family: math;"></td>
                            <td class="text-end" style="font-size:12px;font-family: math;">
                                0
                            </td>
                            <td class="text-end" style="font-size:12px;font-family: math;"></td>
                            
                            <td class="text-end" style="font-size:12px;font-family: math;">
                                @php
                                echo number_format($totals->sum_of_product_individual_total_amount, 2, '.', '')
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="padding: 0;border: none; vertical-align: initial;">
                                <div style="visibility: hidden;">..........</div>
                                <table class="table-border" style="width: 82%;">
                                    <tr>
                                        <td style="font-size:11px;font-weight: bold;font-family: math;width:150px">
                                            PAYMENT TYPE</td>
                                        <td style="font-size:11px;font-weight: bold;font-family: math; width:150px">PAYMENT INFO
                                        </td>
                                        <td
                                            style="font-size:11px;font-weight: bold;font-family: math;width:100px; text-transform:uppercase; text-align:center">
                                            reference</td>
                                        <td
                                            style="font-size:11px;font-weight: bold;font-family: math;text-align:right;width:90px">
                                            AMOUNT</td>
                                    </tr>
                                        @foreach($payment_infos as $payment_info)
                                        <tr>
                                            <td style="font-size:11px;font-family: math;width:90px">
                                                {{$payment_info->payment_type}}
                                            </td>
                                            <td style="font-size:11px;font-family: math;">
                                                {{$payment_info->payment_info}}
                                            </td>
                                            <td style="font-size:11px;font-family: math;">
                                                {{$payment_info->reference}}
                                            </td>
                                            <td style="font-size:11px;font-family: math;text-align:right;width:90px">
                                                @php
                                                echo number_format($payment_info->payment_amount, 2, '.', '')
                                                @endphp
                                            </td>
                                        </tr>
                                        @endforeach
                                </table>

                                <table border="0" style="width: 80%;border: none">
                                    <tr>
                                        <td style="padding: 0;border: none; vertical-align: initial;">
                                                <span style="font-size:12px;font-family: math;" class="remark"><strong>Remark:</strong>
                                                    {{$sale->sale_type_name}}</span>
                                                                                    </td>
                                        <td style="text-align:right;padding: 0;border: none; vertical-align: initial;">
                                            <span style="font-size:12px;font-family: math;" class="sell_by">Sell By:
                                                {{$sale->user_name}}</span>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                            <td colspan="2" style="padding: 0;border: none; vertical-align: initial; width: 128px;">
                                <table class="table-fw table-border"
                                    style="margin-top: -1px;margin-left: -1px;width: calc(100% - -2px);">
                                    {{-- <tr>
                                        <td class="text-end" colspan="2"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            WAGE</td>
                                    </tr> --}}
                                    <tr>
                                        <td class="text-end" colspan="2"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            WAGE</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="2"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            VAT</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="2"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding-bottom: 3px;padding-top: 3px;">
                                            ADJUSTABLE
                                            AMOUNT</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="2"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            DISCOUNT
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="2"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            TOTAL TAKA
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="2"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            PAYMENTS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="2"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            CASHBACK
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="2"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            FINAL DUE
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding: 0;border: none; vertical-align: initial;" class="bl-0">
                                <table class="table-fw table-border" style="margin-top: -1px;">
                                    <tr>
                                        <td class="text-end"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            @php
                                            echo number_format($totals->total_wage, 2, '.', '')
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            {{$sale->vat_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            {{$sale->subtotal_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            @php
                                            echo number_format($sale->discount_amount, 2, '.', '')
                                            @endphp
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td class="text-end"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            {{$sale->total_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            {{$sale->total_paid_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            {{$sale->total_return_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end"
                                            style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                            {{$sale->total_due_amount}}                                           
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <table class="table-fw table-border" style="margin-top: 30px;">
                    <tr>
                        <td style="font-family: math; border: none">

                            <p style="margin-left:20px"><span style="font-size:15px;">শর্তাবলীঃ<br />
                                ১) ক্যাশ মেমো ছাড়া কোন আপত্তি বা পরিবর্তন গ্রহনযোগ্য হবে না।&nbsp;২) স্বর্ণের মূল্য বাংলাদেশ জুয়েলারী সমিতি থেকে নির্ধারন করে দেয়া হয় যা জুয়েলারী সমিতির সদস্য<br />
                                হিসেবে আমাদের অনুসরন করতে হয়। ৩) স্বর্ণের গহনা পরিবর্তনের ক্ষেত্রে বাজার মূল্য থেকে ১০% অথবা &nbsp;টাকা ফেরত নেয়ার ক্ষেত্রে বাজার মূল্য থেকে &nbsp;২০% কাটা হবে।<br />
                                ৪) ডায়মন্ডের&nbsp;গহনা পরিবর্তনের ক্ষেত্রে ক্যাশ মেমোতে উল্লেখিত মূল্য থেকে ১৫%&nbsp;অথবা &nbsp;টাকা ফেরত নেয়ার ক্ষেত্রে ক্যাশ মেমোতে&nbsp;উল্লেখিত মূল্য থেকে ২৫% কাটা হবে।<br />
                                পরিবর্তন বা টাকা ফেরত এর ক্ষেত্রে আরও ১০% মজুরী ও ৫% ভ্যাট বাদ দেয়া হবে। ৫) সর্বোঅবস্থায় যেমন গহনা পরিবর্তন, পুরাতন স্বর্ণ ক্রয় ইত্যাদির সময় ভ্যাট, ট্যাক্স, মজুরী,<br />
                                পাথর, মিনা ইত্যাদি&nbsp;বা যা স্বর্ন বা ডায়মন্ডের&nbsp;মূল্যের&nbsp;আওতার বাইরে তার টাকার পরিমান বাদ দিয়ে হিসাব করা হয় বা হবে । ৬) সরকারী ও বাজুস এর ক্রয় বিক্রয় নির্দেশনা ও&nbsp;<br />
                                নীতিমালা মোতাবেক ক্রেতা নির্দেশনা ও&nbsp;নীতিমালা অনুসরন না করলে বিক্রেতাকে কোনভাবেই নিয়ম বা নীতি মানতে বাধ্য করতে পারবে না।&nbsp;৭) কোন ধরনের শারীরিক সমস্যা<br />
                                বা ক্যামিকেল জাতীয় কোন ধরনের দ্রব্য ব্যবহারের কারনে রং পরিবর্তন হলে বিক্রেতা দায়ী থাকবে না।&nbsp;৮) দুবাই গোল্ড পাথর সহ বিক্রি করা হয় এবং কোন কারনে পরিবর্তন বা<br />
                                ক্যাশব্যাক এর সময় পাথর সহ হিসেব করা হবে। (শর্ত প্রযোজ্য)&nbsp;৯) ব্যবহার না করে অক্ষত অবস্থায় ৭ দিনের মধ্যে পন্য ফেরত দিলে কোন টাকা কাটা যাবে না কিন্তু এই পরিবর্তন<br />
                                একবারের জন্য প্রযোজ্য হবে।&nbsp;&nbsp;১০) ক্রেতা পন্য ও পন্যের ওজন, হলর্মাক, ডিজাইন দেখে ক্রয় করবেন এবং কোন সমস্যা হলে শোরুম কর্তৃপক্ষকে জানাবেন এবং কর্তৃপক্ষ<br />
                                যথাযথ সমাধান করবেন। পরবর্তীতে কোন আপত্তি গ্রহনযোগ্য নয়। ১১) টাকা ফেরত নিতে হলে কমপক্ষে ৭ দিন সময় নিয়ে টাকা ফেরত দেয়া হবে।<br />
                                ১২) স্বর্নের নাকফুল, নথ পরিবর্তন অথবা টাকা ফেরত নেয়ার ক্ষেত্রে ক্যাশ মেমোতে&nbsp;উল্লেখিত মূল্য থেকে ৫০% বাদ দিয়ে হিসেব করা হবে।<br />
                                ১৩) কেডিম রিপেয়ার র্চাজ ফ্রি। কোন ধরনের লেজার রিপেয়ার বা স্বর্ন লাগলে তা র্চাজ প্রযোয্য।</span></p>

                        </td>
                    </tr>
                </table>

                <footer style="font-size: 15px;">
                    <br>

                    <table class="table-fw sign">
                        <tr>
                            <td style="margin-right: 50% !important">
                                <div style="text-align: center;width: 150px;" class="buy_sign" >
                                    ----------------------
                                    <br />
                                    Buyer's signature
                                </div>
                            </td>
                            <td>
                                <div style="text-align: center; width: 170px;" class="audit_sign">
                                    --------------------------------
                                    <br />
                                    Audit/Account signature
                                </div>
                            </td>
                            <td>
                                <div style="text-align: right;width: 150px;margin-left: auto;" class="seller_sign">
                                    ---------------------- <br /> Seller Signature
                                </div>
                            </td>
                        </tr>
                    </table>
                </footer>
            </div>
        </div>
    </div>          
        </div>
        <!-- end main content-->     
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   
    <!-- /.content -->
  </div>

@endsection

@push('myScripts')
<script>
    $(document).ready(function() {
            $('#invoice_print').on('click', function() {      
                var printContent = document.getElementById('payroll_details').innerHTML;
                printContentFunction(printContent);
            });

            function printContentFunction(content) {
                var originalContent = document.body.innerHTML;

                // Set body content to the content you want to print
                document.body.innerHTML = content;

                // Call window.print() to print the content
                 window.print();

                // Restore original content
                document.body.innerHTML = originalContent;

                setTimeout(function() {
                    if (!window.matchMedia('print').matches) {
                        // Redirect to a different page if print was canceled
                        window.location.reload();
                    }
                }, 500);


            }
   
        });
  
  </script>
  @endpush