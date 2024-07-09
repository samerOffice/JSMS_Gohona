@extends('master')

@section('title')
Booking Preview
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('public/plugins/print.css')}}">
<style>
        .bl-0 td.text-end {
            border-left: none;
        }

        ul {
            padding: 0;
            margin: 0;
        }
        footer {
            position: absolute;
            bottom: 50px;
            width: 194mm;
        }
</style>
@endpush


<div class="page" orientation="portrait" size="A4" pages="1" style="padding-top: 80px;">
        <table class="table-fw">
            <thead>
                <tr>
                    <td style="width: 33.33%;vertical-align: bottom;">
                        <span style="font-size:14px;font-family: math; font-weight: bold;">CUSTOMER
                            DETAILS:</span>
                    </td>
                    <td class="text-center" style="width: 33.33%">
                        <span style="font-size:24px;font-family: math; font-weight: bold;">BOOKING MEMO</span>
                    </td>
                    <td class="text-end" style="width: 33.33%"></td>
                </tr>
                <tr>
                    <td style="width: 33.33%;vertical-align: baseline;" colspan="2">
                        <span style="font-size: 14px" colspan="2"
                            rowspan="2">A.S.M. ZILLUR RAHMAN</span><br />
                        <span style="font-size: 14px" colspan="2"
                            rowspan="2">NULL</span><br />
                        <span style="font-size: 14px" colspan="2"
                            rowspan="2">01726173571</span><br />
                    </td>
                    <td class="text-end" style="width: 33.33%">
                        <table style="width: 100%;">
                            <tr>
                                <td style="font-size:14px;">BIN NO:</td>
                                <td style="width: 100px;font-size:14px;">004315254-0101</td>
                            </tr>
                            <tr>
                                <td style="font-size:14px;">DATE :</td>
                                <td style="width: 100px;font-size:14px;">--</td>
                            </tr>
                            <tr>
                                <td style="font-size:14px;">BK NO :</td>
                                <td style="width: 100px;font-size:14px;">--</td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </thead>
        </table>

        <table class="table-fw table-border">
            <thead>
                <tr>
                    <td class="text-center" style="width:52px;font-size:12px;font-weight: bold;font-family: math;">TOKEN
                        NO</td>
                    <td class="text-center" style="font-size:12px;font-weight: bold;font-family: math;">PRODUCT DETAILS
                    </td>
                    <td class="text-center" style="width:59px;font-size:12px;font-weight: bold;font-family: math;">GOLD
                        WT/GM</td>
                    <td class="text-center" style="width:59px;font-size:12px;font-weight: bold;font-family: math;">GOLD
                        RATE</td>
                    <td class="text-center" style="width:59px;font-size:12px;font-weight: bold;font-family: math;">
                        ST/DIA WT</td>
                    <td class="text-center" style="width:59px;font-size:12px;font-weight: bold;font-family: math;">
                        ST/DIA RATE</td>
                    
                    <td class="text-center" style="width: 85px;font-size:12px;font-weight: bold;font-family: math;">
                        TOTAL TAKA</td>
                </tr>
            </thead>
            <tbody>
                                                                        <tr>
                        <td class="text-center" style="font-size:12px;font-family: math;">
                            BNG-101</td>
                        <td style="font-size:12px;font-family: math;">ONE PC BANGLE 21 KDM</td>
                        <td class="text-end" style="font-size:12px;font-family: math;">4.19</td>
                        <td class="text-end" style="font-size:12px;font-family: math;">
                            100.00</td>
                        <td class="text-end" style="font-size:12px;font-family: math;"></td>
                        <td class="text-end" style="font-size:12px;font-family: math;">
                            </td>
                                                <td class="text-end" style="font-size:12px;font-family: math;">
                            419.00</td>
                    </tr>
                                                        <tr>
                        <td class="text-center" style="font-size:12px;font-family: math;">
                            BNG-095</td>
                        <td style="font-size:12px;font-family: math;">ONE PC BANGLE 22 KDM</td>
                        <td class="text-end" style="font-size:12px;font-family: math;">7.23</td>
                        <td class="text-end" style="font-size:12px;font-family: math;">
                            25.00</td>
                        <td class="text-end" style="font-size:12px;font-family: math;"></td>
                        <td class="text-end" style="font-size:12px;font-family: math;">
                            </td>
                                                <td class="text-end" style="font-size:12px;font-family: math;">
                            181.00</td>
                    </tr>
                            </tbody>
            <tfoot>
                <tr>
                    <td class="text-center"></td>
                    <td class="text-end" style="font-size:12px;font-weight: bold;font-family: math;">TOTAL</td>
                    <td class="text-end" style="font-size:12px;font-family: math;">11.42
                    </td>
                    <td class="text-end" style="font-size:12px;font-family: math;"></td>
                    <td class="text-end" style="font-size:12px;font-family: math;">0
                    </td>
                    <td class="text-end" style="font-size:12px;font-family: math;"></td>
                    <td class="text-end" style="font-size:12px;font-family: math;">
                        600.00</td>
                </tr>
                <tr>
                    <td colspan="4" style="padding: 0;border: none; vertical-align: initial;">
                        <div style="visibility: hidden;">..........</div>
                        <table class="table-border" style="width: 80%;">
                            <tr>
                                <td style="font-size:11px;font-weight: bold;font-family: math;width:90px">PAYMENT TYPE</td>
                                <td style="font-size:11px;font-weight: bold;font-family: math;">PAYMENT INFO</td>
                                <td style="font-size:11px;font-weight: bold;font-family: math; text-transform:uppercase">reference</td>
                                <td style="font-size:11px;font-weight: bold;font-family: math;text-align:right;width:90px">AMOUNT</td>
                            </tr>
                                                            <tr>
                                    <td style="font-size:11px;font-family: math;width:90px">CASH</td>
                                    <td style="font-size:11px;font-family: math;">CASH</td>
                                    <td style="font-size:11px;font-family: math;"></td>
                                    <td style="font-size:11px;font-family: math;text-align:right;width:90px">
                                        200.00</td>
                                </tr>
                                                    </table>
                        
                    </td>
                    <td colspan="2" style="padding: 0;border: none; vertical-align: initial;">
                        <table class="table-fw table-border"
                            style="margin-top: -1px;margin-left: -1px;width: calc(100% - -1px);">
                            <tr>
                                <td class="text-end" colspan="2"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">WAGE</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="2"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">VAT</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="2"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">ADJUSTABLE
                                    AMOUNT</td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="2"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">DISCOUNT
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="2"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">TOTAL TAKA
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="2"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">PAYMENTS
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end" colspan="2"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">FINAL DUE
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding: 0;border: none; vertical-align: initial;" class="bl-0">
                        <table class="table-fw table-border" style="margin-top: -1px;">
                            <tr>
                                <td class="text-end"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                    51.00</td>
                            </tr>
                            <tr>
                                                                <td class="text-end"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                    33.00</td>
                            </tr>
                            <tr>
                                <td class="text-end"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                    684.00</td>
                            </tr>
                            <tr>
                                <td class="text-end"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                    10.00</td>
                            </tr>
                            <tr>
                                <td class="text-end"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                    674.00</td>
                            </tr>
                            <tr>
                                <td class="text-end"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                    200.00</td>
                            </tr>
                            <tr>
                                <td class="text-end"
                                    style="font-size:11px;font-weight: bold;font-family: math;padding: 3px;">
                                    474.00</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tfoot>
        </table>

        <table class="table-fw table-border" style="margin-top: 30px;">
            <tr>
                <td style="font-family: math; border: none">
                    <html>
<head>
	<title></title>
</head>
<body>
<p style="margin-left:8px"><span style="font-size:10px;">শর্তাবলীঃ<br />
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

<p style="margin-left:8px">&nbsp;</p>
</body>
</html>
                </td>
            </tr>
        </table>

        <footer style="font-size: 14px;">
            <table class="table-fw">
                <tr>
                    <td>
                        <div style="text-align: center;width: 115px;">
                            ----------------------
                            <br />
                            Buyer's signature
                        </div>
                    </td>
                    <td>
                        <div style="text-align: center;">
                            --------------------------------
                            <br />
                            Audit/Account signature
                        </div>
                    </td>
                    <td>
                        <div style="text-align: center;width: 115px;margin-left: auto;">
                            ---------------------- <br /> Seller Signature
                        </div>
                    </td>
                </tr>
            </table>
        </footer>
    </div>

@push('myScripts')
<script>
    
</script>
@endpush
