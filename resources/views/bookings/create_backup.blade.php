@extends('master')

@section('title')
Booking Create
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                            </div>
        </div>
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <a class="btn btn-outline-info float-right" href="{{route('booking.index')}}">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        
                    </div>
                    <br>
                    <!-- end page title -->
        
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">                                   
                                    <h4 class="card-title ">Add Booking</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="https://sencotest.xstreambd.com/booking" id="order-form" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="8eyHwlhgbvUWRrPpYCRndSFGl7lkmT1kALo2D2Wr">                                <div class="row">
            <div class="col-12 col-md-12">
                <div class="mb-3 row">
                    <div class="col-md-4">
                        <label for="client" class="col-form-label text-start">Client</label>
        
                        
                        <select required id="client" class="form-control" name="client"><option selected="selected" value="">Select client</option></select>
                        
                    </div>
                    <div class="col-md-4">
                        <label for="booked_by" class="col-form-label text-start">Client</label>
                        <select required id="client" class="form-control" name="booked_by"><option selected="selected" value="">Select Booked By</option><option value="1">SAJAL</option><option value="2">MANAGER</option><option value="3">KARTIK</option><option value="4">MODHU</option><option value="5">SUDARSHAN</option><option value="6">PRADIP</option><option value="7">BISHOWJIT</option><option value="8">RANA</option><option value="9">APP</option></select>
                        
                    </div>
                    <div class="col-md-12 mt-4">
                        <table>
                            <tbody id="selected_client">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <label for="product_nr" class="col-form-label text-start">Product Nr</label>
                    </div>
                    <div class="col-md-12">
                        {{-- <select id="product_nr" class="form-control" name="product_nr"><option selected="selected" value="">Product Nr</option></select> --}}
                        <select class="form-control select2bs4" id="product_nr" required name="product_nr" style="width: 100%;">
                            @foreach($products as $product)
                            <option value="{{$product->id}}" selected="selected">{{$product->product_nr}}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="col-md-12 mt-4">
                        <table class="table table-bordered nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <td style="width: 80px">Nr</td>
                                    <td>Details</td>
                                    <td style="width: 50px">Weight</td>
                                    <td style="width: 50px">ST/DIA</td>
                                    <td style="width: 100px">ST/DIA Price</td>
                                    <td style="width: 100px">Unit Price</td>
                                    <td style="width: 100px">Wage</td>
                                    <td style="width: 80px;">Subtotal</td>
                                    <td style="width: 40px"></td>
                                </tr>
                            </thead>
                            <tbody id="selected_product_list">
                                                            
                                                    </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-end">Total Weight</td>
                                    <td id="total_weight"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2" id="subtotal_without_vat"></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end justify-end" style="padding: 1px;">
                                        <div style="width: 90px; float:right">
                                            <select id="vat" required class="form-control" name="vat"><option value="5" selected="selected">5% VAT</option></select>
                                        </div>
                                    </td>
                                    <td colspan="2" id="vat_amount"></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">Subtotal</td>
                                    <td colspan="2" id="subtotal_with_vat"></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">Discount</td>
                                    <td colspan="2" style="padding: 1px;">
                                        <input id="discount" class="form-control" name="discount" type="text" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-end">Total</td>
                                    <td colspan="2" id="total"></td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                                                                                                
                                                                        
                                                                                
                                        <div class="row">
                                            <div class="col-md-3" id="payment_type_0">
                                                <label for="payment_type" class="col-form-label text-start">Payment type</label>
                                                <select required class="form-control" onchange="paymentTypeChange(this, 0)" name="payment[]"><option value="cash">Cash</option><option value="gold">Gold</option><option value="card">Card</option><option value="bank">Bank</option><option value="mobile_banking">Mobile Banking</option><option value="other">Other</option></select>
                                                
                                            </div>
        
                                            <div class="col-md-3 paymentinfo_0">
                                                <label for="payment_info" class="col-form-label text-start">Payment Info</label>
                                                <select required class="form-control" name="payment_info[]"><option selected="selected" value="">Payment Info</option><option value="CASH">CASH</option><option value="ADVANCE">ADVANCE</option><option value="SALES RETURN">SALES RETURN</option><option value="BY CHEQUE">BY CHEQUE</option><option value="CASH BACK">CASH BACK</option></select>
                                                
                                            </div>
                                            <div class="col-md-3 reference_{index}">
                                                <label for="reference" class="col-form-label text-start">Reference</label>
                                                <input class="form-control" name="reference[]" type="text">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <label for="amount" class="col-form-label text-start">Amount</label>
                                                <input required class="form-control numberonly payment_amount" onkeyup="calculatePaid()" name="amount[]" type="text">
                                                
                                            </div>
                                        </div>
                                                                                                                    <div id="payments_container">
                                                </div>
                                                                            <div class="row mt-2">
                                            <div class="col-md-3">
                                                <a href="#" id="addNewPayment" class="btn btn-info">Add</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end" colspan="7">
                                        Paid
                                    </td>
                                    <td id="paid" style="padding: 1px;" colspan="2">
                                        <input id="paidAmount" required readonly class="form-control" name="paid" type="text" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end" colspan="7">
                                        Due
                                    </td>
                                    <td id="due" style="padding: 1px;" colspan="2">
                                        <input id="dueAmount"  readonly class="form-control" name="due" type="text" value="">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box-footer mt20 text-end">
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    <button id="preview" class="btn btn-primary btn-lg">Preview</button>
                </div>
            </div>
        </div>
        <a href="" id="preview-link"></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
         
      </div>
      <!-- /.container-fluid -->
    </div>
   
    <table style="display:none">
        <tbody id="template">
            <tr id="row_id_{index}">
                <td>
                    {product_nr}
                    <input name="product_id[]" value="{product_id}" type="hidden" class="product_id"/>
                </td>
                <td>{product_details}</td>
                <td>
                    {weight}
                    <input name="weight[]" value="{weight}" type="hidden" class="{weight_class}"/>
                </td>
                <td>
                    {st_dia}
                    <input name="st_dia[]" value="{st_dia}" type="hidden" class="{st_dia_class}"/>
                </td>
                <td style="padding: 2px 2px 3px;">
                    <input class="form-control st_dia_price"  name="st_dia_price[]" value="{st_dia_price}" {st_dia_price_required} onkeyup="calculateUnitPrice('row_id_{index}')"/>
                </td>
                <td style="padding: 2px 2px 3px;">
                    <input class="form-control unit_price"  name="unit_price[]" value="{unit_price}" required="true" onkeyup="calculateUnitPrice('row_id_{index}')"/>
                </td>
                <td style="padding: 2px 2px 3px;">
                    <input class="form-control wage" data-wage="{wage}" data-wage-type="{wage_type}"  name="wage[]" value="" required="true" onkeyup="handleChangeWage('row_id_{index}')"/>
                </td>
                <td class="subtotal">{subtotal}</td>
                <td style="padding: 2px 2px 3px;">
                    <button onclick="removeRow({index})" type="button"
                        class="btn btn-danger glyphicon glyphicon-remove row-remove">
                        <span aria-hidden="true">×</span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="display:none">
        <tbody id="client-template">
            <tr>
                <th>Name</th>
                <td>: </td>
                <td style="padding-left: 5px">{name}</td>
            </tr>
            <tr>
                <th>Client No</th>
                <td>: </td>
                <th style="padding-left: 5px">{client_no}</th>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>: </td>
                <th style="padding-left: 5px">{mobile_number}</th>
            </tr>
            <tr>
                <th>Address</th>
                <td>: </td>
                <td style="padding-left: 5px">{address}</td>
            </tr>
        </tbody>
    </table>

    <div id="payment-template" style="display:none">
        <div class="row" id="payment_row_id_{index}">
            <div class="col-md-3" id="payment_type_{index}">
                <label for="payment_type" class="col-form-label text-start">Payment type</label>
                <select required class="form-control" onchange="paymentTypeChange(this,{index})" name="payment[]"><option value="cash">Cash</option><option value="gold">Gold</option><option value="card">Card</option><option value="bank">Bank</option><option value="mobile_banking">Mobile Banking</option><option value="other">Other</option></select>
                
            </div>            
            <div class="col-md-3 paymentinfo_{index}">
                <label for="payment_info" class="col-form-label text-start">Payment Info</label>
                <select required class="form-control" name="payment_info[]"><option selected="selected" value="">Payment Info</option><option value="CASH">CASH</option><option value="ADVANCE">ADVANCE</option><option value="SALES RETURN">SALES RETURN</option><option value="BY CHEQUE">BY CHEQUE</option><option value="CASH BACK">CASH BACK</option></select>
                
            </div>
            <div class="col-md-3 reference_{index}">
                <label for="reference" class="col-form-label text-start">Reference</label>
                <input class="form-control" name="reference[]" type="text">
                
            </div>
            <div class="col-md-3">
                <label for="amount" class="col-form-label text-start">Amount</label>
                <div class="d-flex">
                    <input required class="form-control numberonly payment_amount" onkeyup="calculatePaid()" name="amount[]" type="text">
                    <button onclick="removePaymentRow({index})" type="button"
                        class="btn btn-danger glyphicon glyphicon-remove row-remove"
                        style="margin-left: 5px;">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="paymentinfo-template-cash" style="display:none">
        <div class="col-md-3 paymentinfo_{index}">
            <label for="payment_info" class="col-form-label text-start">Payment Info</label>
            <select required class="form-control" name="payment_info[]"><option value="CASH">CASH</option><option value="ADVANCE">ADVANCE</option><option value="SALES RETURN">SALES RETURN</option><option value="BY CHEQUE">BY CHEQUE</option><option value="CASH BACK">CASH BACK</option></select>
            
        </div>
    </div>

    <div id="paymentinfo-template-mobile-banking" style="display:none">
        <div class="col-md-3 paymentinfo_{index}">
            <label for="payment_info" class="col-form-label text-start">Mobile Banking</label>
            <select required class="form-control" name="payment_info[]"><option selected="selected" value="">Select Operator</option><option value="BKASH-CITY BANK">BKASH-CITY BANK</option></select>
            
        </div>
    </div>
    <div id="paymentinfo-template-banks" style="display:none">
        <div class="col-md-3 paymentinfo_{index}">
            <label for="payment_info" class="col-form-label text-start">Bank</label>
            <select required class="form-control" name="payment_info[]"><option selected="selected" value="">Select Operator</option><option value="DBBL-TRANSFER">DBBL-TRANSFER</option><option value="CITY-TRANSFER">CITY-TRANSFER</option><option value="CBBL-TRANSFER">CBBL-TRANSFER</option><option value="COMMUNITY BANK">COMMUNITY BANK</option></select>
            
        </div>
    </div>
    <div id="paymentinfo-template-others" style="display:none">
        <div class="col-md-3 paymentinfo_{index}">
            <label for="payment_info" class="col-form-label text-start">Payment Info</label>
            <select required class="form-control" name="payment_info[]"><option selected="selected" value="">Select</option><option value="EMI-SSL">EMI-SSL</option></select>
            
        </div>
    </div>
    <div id="paymentinfo-template-golds" style="display:none">
        <div class="col-md-3 paymentinfo_{index}">
            <label for="payment_info" class="col-form-label text-start">Payment Info</label>
            <select required class="form-control" name="payment_info[]"><option selected="selected" value="">Select</option><option value="EXCHANGE GOLD (SENCO)">EXCHANGE GOLD (SENCO)</option><option value="SENCO OLD GOLD">SENCO OLD GOLD</option><option value="CUSTOMER OWN GOLD">CUSTOMER OWN GOLD</option></select>
            
        </div>
    </div>
    <div id="paymentinfo-template-cards" style="display:none">
        <div class="col-md-3 paymentinfo_{index}">
            <label for="payment_info" class="col-form-label text-start">Payment Info</label>
            <select required class="form-control" name="payment_info[]"><option selected="selected" value="">Select</option><option value="DBBL-CARD">DBBL-CARD</option><option value="CITY-CARD">CITY-CARD</option><option value="CBBL-CARD">CBBL-CARD</option></select>
            
        </div>
    </div>
  </div>

@endsection

@push('myScripts')
<script>

$(document).ready(function() {      
//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
    });
//summernote   
$('#summernote').summernote();
});

var selectedProduct = [];

   //district and zone dependancy dropdown logic start
   $('#product_nr').on('change',function(event){
        event.preventDefault();
        var selectedTheProduct = $('#product_nr').val();
        // Function to get CSRF token from meta tag
        function getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }
        // Set up Axios defaults
        axios.defaults.withCredentials = true;
        axios.defaults.headers.common['X-CSRF-TOKEN'] = getCsrfToken();

        const baseUrl = "{{ url('/') }}/";

        //  axios.get('sanctum/csrf-cookie').then(response=>{
        axios.post(baseUrl +'product_dependancy',{
                data: selectedTheProduct
            }).then(response=>{
                selectedProduct = response.id;
                addRow(response)
                $("#product_nr").val('').trigger('change')
                console.log(response.data);
            });
        //  });
        });
        //district and zone dependancy dropdown logic end



///******************************** test start ************************
function buildSearchData(object) {
            if (object.start > 0) {
                object.page = (object.start / object.length) + 1;
            }
                        return object;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "8eyHwlhgbvUWRrPpYCRndSFGl7lkmT1kALo2D2Wr"
            }
        });

        function formatted_amount(amount) {
            const symbol = "BDT";
            return symbol + " " + (Math.round(amount * 100) / 100).toFixed(2);
        }

        function isInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)

            );
        }


        function onClickShowHandeler(element) {
            $('#showMoreModal').modal('show');
            $.ajax({
                    url: $(element).data('route'),
                    type: 'get',
                })
                .done(function(response) {
                    $("#showMoreModal .modal-title").html(response.title);
                    $("#showMoreModal .modal-body").html(response.body);
                })
                .fail(function(response) {
                    $('#showMoreModal').modal('hide');
                    if (response.status === 419) {
                        Swal.fire("Cancelled!", response.responseJSON.message, "error")
                    } else {
                        Swal.fire("Cancelled!", response.statusText, "error")
                    }
                });
        }

        function onClickDeleteHandeler(element) {
            Swal.fire({
                title: 'Are you sure?',
                text: $(element).data('desc') ?? "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#1cbb8c",
                cancelButtonColor: "#ff3d60",
                confirmButtonText: 'Yes, delete it!'
            }).then(function(t) {
                if (t.isConfirmed) {
                    $.ajax({
                            url: $(element).data('route'),
                            type: 'POST',
                            data: {
                                _token: "8eyHwlhgbvUWRrPpYCRndSFGl7lkmT1kALo2D2Wr",
                                _method: "DELETE"
                            },
                        })
                        .done(function() {
                            Swal.fire("Deleted!", "Your item has been deleted.", "success");
                            if ($(element).data('redirect')) {
                                location.href = $(element).data('redirect');
                            } else {
                                table.ajax.reload(null, false);
                            }
                        })
                        .fail(function(response) {
                            if (response.status === 419) {
                                Swal.fire("Cancelled!", response.responseJSON.message, "error")
                            } else {
                                Swal.fire("Cancelled!", response.statusText, "error")
                            }
                        });
                }
            })
        }

        $(document).ready(function() {
            $("input[required]").parents('.form-group').find('label').addClass('required');
            $("select[required]").parents('.form-group').find('label').addClass('required');

            $(document).on('keypress', '.numberonly', function(e) {

                var charCode = (e.which) ? e.which : event.keyCode

                if (String.fromCharCode(charCode).match(/[^0-9.]/g))

                    return false;

            });
        });

        function bd_money_format(x) {
            x = parseFloat(x).toFixed(2)
            if (isNaN(x)) return x;

            x = x.toString();
            var afterPoint = '';
            if (x.indexOf('.') > 0)
                afterPoint = x.substring(x.indexOf('.'), x.length);
            x = Math.floor(x);
            x = x.toString();
            var lastThree = x.substring(x.length - 3);
            var otherNumbers = x.substring(0, x.length - 3);
            if (otherNumbers != '')
                lastThree = ',' + lastThree;
            var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
            return res;
        }
    </script>





        <script>
        // var selectedProduct = [];

        $('#client').select2bs4({
            placeholder: "Select client",
            allowClear: true,
            ajax: {
                url: 'https://sencotest.xstreambd.com/select2-client',
                dataType: 'json'
            }
        });

        $('#client').on('change', function(e) {
            if ($(this).val()) {
                $.ajax({
                        url: "https://sencotest.xstreambd.com/clients/" + $(this).val(),
                        headers: {
                            'Accept': 'application/json'
                        }
                    })
                    .done(function(resp) {
                        var template = $("#client-template").html();
                        template = template.replace(/{name}/g, resp.name);
                        template = template.replace(/{client_no}/g, resp.client_no);
                        template = template.replace(/{mobile_number}/g, resp.mobile_number);
                        template = template.replace(/{address}/g, resp.address);
                        $("#selected_client").html(template);
                    })
                    .fail(function(response) {
                        if (response.status === 419) {
                            Swal.fire("Error!", response.responseJSON.message, "error")
                        } else {
                            Swal.fire("Error!", response.statusText, "error")
                        }
                    });
            } else {
                $("#selected_client").html("");
            }
        });

        // $('#product_nr').select2({
        //     theme: 'bootstrap4',
        //     placeholder: "Select Product",
        //     allowClear: true,
        //     ajax: {
        //         url: 'https://sencotest.xstreambd.com/select2-product',
        //         dataType: 'json',
        //         data: function(params) {
        //             var query = {
        //                 term: params.term,
        //                 selectedProduct: selectedProduct
        //             }
        //             return query;
        //         }
        //     }
        // });



        // $('#product_nr').on('change', function(e) {

        //     if (!$(this).val()) {
        //         return;
        //     }
        //     $.ajax({
        //             url: "https://localhost/gohona/product/" + $(this).val(),
        //             headers: {
        //                 'Accept': 'application/json'
        //             }
        //         })
        //         .done(function(resp) {
        //             console.log(resp);
        //             selectedProduct.push(resp.id);
        //             addRow(resp)
        //             $("#product_nr").val('').trigger('change')
        //         })
        //         .fail(function(response) {
        //             if (response.status === 419) {
        //                 Swal.fire("Error!", response.responseJSON.message, "error")
        //             } else {
        //                 Swal.fire("Error!", response.statusText, "error")
        //             }
        //         });
        // });


     
                var row = 1;
                var dirtyWage = [];

        function addRow(resp) {
            console.log(resp.st_dia ? resp.st_dia : '');

            var template = $("#template").html();
            template = template.replace(/{product_id}/g, resp.id);
            template = template.replace(/{product_nr}/g, resp.product_nr);
            template = template.replace(/{product_details}/g, resp.product_details);
            template = template.replace(/{weight}/g, resp.weight);
            template = template.replace(/{weight_class}/g, 'weight');
            template = template.replace(/{st_dia}/g, resp.st_dia ? resp.st_dia : '');
            template = template.replace(/{st_dia_price_required}/g, resp.st_dia ? 'required="true"' : '');
            template = template.replace(/{st_dia_class}/g, 'st_dia');
            template = template.replace(/{unit_price}/g, resp.price ? resp.price : '');
            template = template.replace(/{st_dia_price}/g, resp.st_dia_price ? resp.st_dia_price : '');

            var wage;
            var wage_type = 'fixed';

            if (parseFloat(resp.wage) > 0) {
                if (resp.wage_type == 'Percentage') {
                    wage = parseFloat(resp.wage) / 100;
                    wage_type = "Percentage";
                } else {
                    wage = resp.wage;
                }
            }

            template = template.replace(/{wage}/g, resp.wage ? wage : '');
            template = template.replace(/{wage_type}/g, wage_type);
            template = template.replace(/{subtotal}/g, '');
            $("#selected_product_list").append(template.replace(/{index}/g, row));

            if (!resp.st_dia) {
                $(document).find('#row_id_' + row + ' .st_dia_price').attr('readonly', true);
            }

            row++;
            recalculate()
        }

        function removeRow(id) {
            var elem = $("#row_id_" + id + " .product_id").val();
            selectedProduct = selectedProduct.filter(function(e) {
                return e != elem
            })
            $("#row_id_" + id).remove();
            delete dirtyWage["row_id_" + id];
            recalculate()
        }

        $("#discount").on('keyup', function() {
            recalculate()
        })

        var subtotal_without_vat = 0;
        var vat = 0;

        function recalculate() {
            calculateWeight();
            cal_subtotal_without_vat();
        }

        function cal_subtotal_without_vat() {
            var subtotal = 0;
            
            $("#selected_product_list .subtotal").each(function(e) {
                var v = $(this).text();
                subtotal += parseFloat(v ? v.replace(/,/g, '') : 0)
            })
            subtotal_without_vat = subtotal;

            $("#subtotal_without_vat").text(subtotal_without_vat ? bd_money_format(subtotal_without_vat.toFixed(0)) : '--');

            var vat_percent = parseFloat($('#vat').val());
            vat = subtotal_without_vat * (vat_percent / 100);

            $("#vat_amount").text(vat ? bd_money_format(vat.toFixed(0)) : '--');

            var total = subtotal_without_vat + vat;

            $("#subtotal_with_vat").text(total ? bd_money_format(total.toFixed(0)) : '--');

            var discount = parseFloat($("#discount").val() ? $("#discount").val() : 0);

            var payable = total - discount;

            $("#total").text(payable ? bd_money_format(payable.toFixed(0)) : '--');
            calculatePaid();
        }

        function calculateWeight() {
            var weight = 0;
            $('.weight').each(function() {
                weight += parseFloat($(this).val())
            })
            $("#total_weight").text(weight);
        }

        function handleChangeWage(row) {
            dirtyWage[row] = 1;
            calculateUnitPrice(row);
        }

        function calculateUnitPrice(row) {
            var weight = $("#" + row + " .weight").val();
            var unitprice = $("#" + row + " .unit_price").val();
            var stDiaPrice = $("#" + row + " .st_dia_price").val();

            if (!dirtyWage[row]) {
                var wage = $("#" + row + " .wage").data('wage');
                var wage_type = $("#" + row + " .wage").data('wage-type');

                if (wage_type == 'Percentage') {
                    wage = (parseFloat(weight) * parseFloat(unitprice)) * parseFloat(wage ? wage : 0);
                    wage = wage.toFixed(0);
                }

                $("#" + row + " .wage").val(wage);
            } else {
                var wage = $("#" + row + " .wage").val();
                wage = parseFloat(wage);
            }

            //var wage = $("#" + row + " .wage").val();
            var subtotal = (parseFloat(weight) * parseFloat(unitprice)) + parseFloat(wage ? wage : 0) + parseFloat(
                stDiaPrice ? stDiaPrice : 0);
            $("#" + row + " .subtotal").text(subtotal ? bd_money_format(subtotal.toFixed(0)) : '--')

            cal_subtotal_without_vat();
        }

        var paymentRow = 1;
        $("#addNewPayment").on('click', function(e) {
            e.preventDefault();
            var template = $("#payment-template").html();
            $("#payments_container").append(template.replace(/{index}/g, paymentRow));
            paymentRow++;
            calculatePaid();
        });

        function removePaymentRow(id) {
            $("#payment_row_id_" + id).remove();
            calculatePaid();
        }

        function calculatePaid() {
            var paid = 0;

            var total = parseFloat($("#total").text().replace(/,/g, ''));

            $('.payment_amount').each(function() {
                if ($(this).val().length > 0) {
                    paid += parseFloat($(this).val() ? $(this).val() : 0);
                }
            });

            $("#paidAmount").val(bd_money_format(paid));

            if (!isNaN(total)) {
                $("#dueAmount").val(bd_money_format((total - paid).toFixed(2)))
            } else {
                if($("#total").text() === '--'){
                    $("#dueAmount").val(bd_money_format(-1 * paid))
                }
            }
        }

        function paymentTypeChange(elem, id) {
            if ($(elem).val() === 'mobile_banking') {
                var template = $("#paymentinfo-template-mobile-banking").html();
            } else if ($(elem).val() === 'bank') {
                var template = $("#paymentinfo-template-banks").html();
            } else if ($(elem).val() === 'other') {
                var template = $("#paymentinfo-template-others").html();
            } else if ($(elem).val() === 'gold') {
                var template = $("#paymentinfo-template-golds").html();
            } else if ($(elem).val() === 'card') {
                var template = $("#paymentinfo-template-cards").html();
            } else {
                var template = $("#paymentinfo-template-cash").html();
            }
            $(".paymentinfo_" + id).remove();
            $("#payment_type_" + id).after(template.replace(/{index}/g, id));
        }

        $("#preview").on("click", function(e) {
            e.preventDefault();
            var formData = $("#order-form").serialize();
            openWindow("https://sencotest.xstreambd.com/booking-preview?" + formData);
        });

        function openWindow(url, title) {
            var left = (screen.width - 900) / 2;
            var top = (screen.height - 500) / 2;
            return window.open(url, title, 'width=900,height=500,left=' + left + ',top=' + top + ',screenX=' + left +
                ',screenY=' + top + ',status=no,scrollbars=yes');
        }
///******************************** test end ************************


</script>


 @endpush

