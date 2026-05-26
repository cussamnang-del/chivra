@extends('master')
@section('title')
    ExchangeListsnew
@endsection
@section('css')
    <link href="{{ asset('public/admin') }} /assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        crossorigin="anonymous" />
    <style type="text/css">
        body.wait,
        body.wait * {
            cursor: wait !important;
        }

        .kh16 {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 16px;
        }

        .kh16-b {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .kh14 {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 14px;
        }

        .kh14-b {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 14px;
            font-weight: bold;
        }

        .kh12 {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 12px;
        }

        .kh12-b {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 12px;
            font-weight: bold;
        }

        .kh22-b {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 22px;
            font-weight: bold;
        }

        .kh22 {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 22px;

        }

        label {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 14px;
            color: blue;
        }

        .txtexchange {
            font-weight: bold;
            font-size: 22px;
            text-align: right;
        }

        .tableFixHead {
            overflow: auto;
            background-color: lightgray;
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: aqua
        }

        .tblexchangelist .clickedrow td {
            background-color: #caaf8f;
        }

        .tblexchangelist .clickedrow td input {
            background-color: #caaf8f;
        }

        .tblexchangelist td {
            padding: 2px 5px;
        }

        .tblexchangelist th {
            padding: 2px;
        }

        .tbl_mainlist .clickedrow td {
            background-color: #6DD8B4FF;
        }

        .tbl_mainlist .clickedrow td input {
            background-color: #6DD8B4FF;
        }

        .tbl_mainlist td {
            padding: 2px;
        }

        .tbl_mainlist th {
            padding: 2px;
        }

        .bgred {
            background-color: red;
        }

        .mybtn {
            border: 1px solid black;
            color: blue;
            padding: 0px 5px;
        }

        .mybtn:hover {
            background-color: blue;
            color: white;
        }
        .tr-main {
            cursor: pointer;
        }
    </style>
@endsection
@php
    function phpformatnumber($num)
    {
        if (!is_numeric($num)) {
            return $num;
        }

        $num = (string) $num;
        $dc = 0;

        if (strpos($num, '.') !== false) {
            $decimals = explode('.', $num)[1];
            // Count actual meaningful decimals (but max 4)
            $dc = min(strlen(rtrim($decimals, '0')), 4);
        }

        return number_format((float) $num, $dc, '.', ',');
    }

@endphp
@section('content')
    <div class="row" style="padding:0px;margin-top:-10px;">
        <input id="txtrole" type="hidden" value="{{ Auth::user()->role->name }}">
        <input id="txtuserid" type="hidden" value="{{ Auth::id() }}">
        <div class="table-responsive" style="margin-bottom:10px;">
            <table>
                <tr>
                    <td class="kh16-b" style="width:40px;">គិតពី</td>
                    <td class="kh16-b" style="width:160px;">
                        <div class="input-group">
                            <input type="text" name="d1" id="d1" class="form-control kh16-b"
                                style="background-color:white;height:30px;width:100px;margin-top:0px;" readonly>
                            <span class="input-group-text" style="height:30px;margin-top:0px;"><i
                                    class="fa fa-calendar"></i></span>
                        </div>
                    </td>
                    <td class="kh16-b" style="width:40px;padding-left:10px;">ដល់</td>
                    <td class="kh16-b" style="width:160px;">
                        <div class="input-group">
                            <input type="text" name="d2" id="d2" class="form-control kh16-b"
                                style="background-color:white;height:30px;width:100px;margin-top:0px;" readonly>
                            <span class="input-group-text" style="height:30px;margin-top:0px;"><i
                                    class="fa fa-calendar"></i></span>
                        </div>
                    </td>
                    <td style="padding-left:5px;">
                        <label class="form-check-label kh16-b">
                            <input class="form-check-input kh16-b" type="checkbox" name="ckalldate" id="ckalldate">
                            All Date
                        </label>
                    </td>

                    <td style="padding-left:5px;">
                        <button id="btnsearch" class="mybtn kh14-b" style="height:25px;">Search</button>
                        <button id="btnprintreport" class="mybtn kh14-b" style="height:25px;">Print Report</button>
                    </td>
                    {{-- <td style="padding:0px;border-style:none;">
                        <input type="text" class="kh16" id="tableSearch" style="width:250px;"
                            placeholder="Search here ..." title="Type what you khnow">
                    </td> --}}
                </tr>
            </table>
        </div>
        <div class="row" id="row_display" style="margin:0px;padding:0px;">
            <div class="col-lg-4" style="margin:0px;padding:0px;">
                <div class="table-responsive" style="">
                    <table class="table table-bordered table-hover kh14-b tbl_mainlist" style="">
                        <thead style="text-align:center;background-color:aqua;">
                            <th style="width:40px;">N <sup>o</sup></th>
                            <th style="width:100%;">អតិថិជន</th>
                            <th style="width:100%;">រូបិយប័ណ្ណ</th>
                            <th style="width:130px;">ចំនួន</th>
                            <th style="width:130px;">ទឹកប្រាក់</th>
                            <th style="width:90px;">អត្រា</th>
                            <th style="display:none;">CID</th>
                            <th style="display:none;">CURID</th>
                        </thead>
                        <tbody>
                            @php
                                $allamount = 0;
                            @endphp
                            @foreach ($sumexchanges as $k => $item)
                                @php
                                    $allamount += $item->total_amount;
                                @endphp
                                <tr class="tr-main" data-customer="{{ $item->customer }}"
                                    data-currency="{{ $item->sk }}" data-sign="{{ $item->total_product > 0 ? '+' : '-' }}"
                                    style="@if ($item->total_product > 0) color:blue; @else color:red @endif">
                                    <td style="text-align:center;">{{ ++$k }}</td>
                                    <td>{{ $item->customer }}</td>
                                    <td style="">
                                        @if ($item->total_product > 0)
                                            +{{ $item->curname }}
                                        @else
                                            -{{ $item->curname }}
                                        @endif
                                    </td>

                                    <td style="text-align:center;" class="td_total_amount">
                                        @if ($item->total_product > 0)
                                            +{{ phpformatnumber($item->total_product) . $item->sk }}
                                        @else
                                            {{ phpformatnumber($item->total_product) . $item->sk }}
                                        @endif
                                    </td>
                                    <td style="text-align:right;" class="td_total_amount">
                                        {{ phpformatnumber($item->total_amount) }}$</td>
                                    @if ($item->optsign == '/')
                                        <td style="text-align:right;" class="td_total_amount">
                                            {{ phpformatnumber(abs($item->total_product / $item->total_amount)) }}</td>
                                    @else
                                        <td style="text-align:right;" class="td_total_amount">
                                            {{ phpformatnumber(abs($item->total_amount / $item->total_product)) }}</td>
                                    @endif
                                    <td style="display:none;">{{ $item->customer_id }}</td>
                                    <td style="display:none;">{{ $item->currency_id }}</td>

                                </tr>
                            @endforeach
                            @foreach ($sumByCurrency as $sum)
                                <tr class="tr-main currency-total" data-currency="{{ $sum->currency->sk }}"
                                    style="background:#f2f2f2;font-weight:bold;border:1px solid black;">
                                    <td colspan="3" class="kh16-b">Total {{ $sum->currency->curname }}</td>

                                    <td style="text-align:right;" class="kh16-b">
                                        {{ phpformatnumber($sum->total_qty) }} {{ $sum->currency->sk }}
                                    </td>
                                    <td style="text-align:right;" class="kh16-b">
                                        {{ phpformatnumber($sum->total_amount) }} $
                                    </td>
                                    <td colspan=3></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-8" style="margin:0px;padding:0px;">
                <div id="div_detail" class="tableFixHead" style="padding:0px;margin:0px;">
                    <table id="tblexchangelist" class="table table-bordered table-hover tblexchangelist kh14-b"
                        style="table-layout: fixed;">
                        <thead style="text-align:center;">
                            <th style="width:65px;">លរ</th>
                            <th style="width:150px;">អតិថិជន</th>
                            <th style="width:100px;">រូបិយប័ណ្ណ</th>
                            <th style="width:80px;">ចំនួន</th>
                            <th style="width:80px;">អត្រា</th>
                            <th style="width:130px;">ទឹកប្រាក់</th>
                            <th style="width:80px;">អត្រាចុង</th>
                            <th style="width:80px;">P/L</th>
                            <th style="width:100px;">ប្រាក់កក់</th>
                            <th style="width:100px;">ថ្ងៃទី</th>
                            <th style="width:80px;">ម៉ោង</th>
                            <th style="width:100px;">អ្នកកត់ត្រា</th>
                            <th style="width:60px;">Close</th>
                            <th style="width:80px;">Gold Req</th>
                        </thead>
                        <tbody id="bodyexchangelist">
                            @php
                                $dd = '';
                                $created_at = '';
                                $total_qty = 0;
                                $total_amt = 0;
                            @endphp
                            @foreach ($exchanges as $key => $e)
                                @php
                                    $dd = date('Y-m-d', strtotime($e->dd));
                                    $created_at = date('Y-m-d', strtotime($e->created_at));

                                @endphp
                                <tr data-currency="{{ $e->currency->sk }}"
                                    style="@if ($e->qty > 0) color:blue; @else color:red; @endif">
                                    <td class="kh14"
                                        style="text-align:center;@if ($dd != $created_at) background-color:brown;color:white; @endif">
                                        {{ ++$key }}</td>
                                    <td style="">{{ $e->customer->name }}</td>
                                    <td style="@if ($e->qty > 0) color:blue; @else color:red; @endif">
                                        @if ($e->qty > 0)
                                            +{{ $e->currency->curname }}
                                        @else
                                            -{{ $e->currency->curname }}
                                        @endif
                                    </td>
                                    <td style="text-align:right;">
                                        {{ phpformatnumber($e->qty) . ' ' . $e->currency->sk }}</td>
                                    <td style="text-align:right;">{{ phpformatnumber($e->rate) }}</td>
                                    <td style="text-align:right;">
                                        {{ phpformatnumber($e->amount) . ' $' }}</td>
                                    <td style="text-align:right;">{{ phpformatnumber($e->price_last) }}</td>
                                    <td style="text-align:right;">{{ phpformatnumber($e->pl) . ' $' }}</td>
                                    <td style="text-align:right;">{{ phpformatnumber($e->deposit) . ' $' }}</td>

                                    <td style="">{{ date('d-m-Y', strtotime($e->dd)) }}</td>
                                    <td style="">{{ $e->tt }}</td>
                                    <td style="">{{ $e->user->name }}</td>
                                    <td style="">{{ $e->is_close == 1 ? 'បិទ' : '' }}</td>
                                    <td style="">{{ $e->gold_req == 1 ? 'ស្នើមាស' : '' }}</td>

                                </tr>
                            @endforeach
                            @foreach ($sumByCurrency as $sum)
                                <tr class="total-row" data-currency="{{ $sum->currency->sk }}"
                                    style="background:#f2f2f2;font-weight:bold;border:1px solid black;">
                                    <td colspan="3" class="kh16-b">Total {{ $sum->currency->curname }}</td>

                                    <td style="text-align:right;" class="kh16-b">
                                        {{ phpformatnumber($sum->total_qty) }} {{ $sum->currency->sk }}
                                    </td>

                                    <td></td>

                                    <td style="text-align:right;" class="kh16-b">
                                        {{ phpformatnumber($sum->total_amount) }} $
                                    </td>

                                    <td colspan="9"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('public/admin') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/admin') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $('#h1_title').text('របាយការណ៏ទិញលក់');
        resizefixhead(170);
        $(window).resize(function() {
            resizefixhead(170);
        });

        function resizefixhead(h) {
            var windowWidth = $(window).width();
            var windowHeight = $(window).height();
            var divheight = windowHeight - h;
            var tableFixHead = document.getElementsByClassName('tableFixHead');
            for (i = 0; i < tableFixHead.length; i++) {
                tableFixHead[i].style.height = divheight + 'px';
            }
        }
        $(document).ready(function() {
            var today = new Date();
            $('#d1,#d2').datetimepicker({
                timepicker: false,
                datepicker: true,
                value: today,
                format: 'd-m-Y',
                autoclose: true,
                todayBtn: true,
                startDate: today,

            });

            function getUserPermissions(userId) {
                const permusers = JSON.parse(localStorage.getItem("permusers") || "[]");
                return permusers
                    .filter(item => item.userid == userId)
                    .map(item => item.code);
            }
            var isAdmin = "{{ Auth::user()->role->name }}" === "Admin"; // Check admin in JS
            const userId = "{{ Auth::id() }}";
            const userPerms = new Set(getUserPermissions(userId));
            if (!isAdmin) {
                $('#d1').datetimepicker("destroy");
                $('#d2').datetimepicker("destroy");
                $('#seluser').attr('disabled', true);
                $('#seluser').val($('#txtuserid').val());
                if (!userPerms.has('3.1.3')) {
                    $('.btndel').hide();
                }
                if (!userPerms.has('3.1.4')) {
                    $('.btnprint').hide();
                }
            }
            // Remove previous highlight class
            $(document).on('click', '.tblexchangelist td', function(e) {
                $(this).closest('table').find('tr.clickedrow').removeClass('clickedrow');
                // add highlight to the parent tr of the clicked td
                $(this).parent('tr').addClass("clickedrow");
            })
            $(document).on('click', '.tbl_mainlist td', function(e) {
                $(this).closest('table').find('tr.clickedrow').removeClass('clickedrow');
                // add highlight to the parent tr of the clicked td
                $(this).parent('tr').addClass("clickedrow");
            })

            $('#btnprintreport').click(function(e) {
                e.preventDefault();
                var userid = $('#seluser').val();
                var username = $('#seluser option:selected').text();
                var status = $('#selstatus').val();
                var d1 = $('#d1').val();
                var d2 = $('#d2').val();
                var redirectWindow = window.open('{{ url('/') }}' + '/getexchangelist?userid=' +
                    userid + '&d1=' + d1 + '&d2=' + d2 + '&status=' + status + '&location=' + 2 +
                    '&isprint=' + 1 + '&username=' + username, '_blank');
                redirectWindow.location;
            })
            $('#btnsearch').click(function(e) {
                e.preventDefault();
                getexchangelist();
            })
            $(document).on('click', '.tr-main', function(e) {
                e.preventDefault();
                var rowind = $(this).closest('tr').index();
                var row = $(this).closest('tr');
                var cus_id = row.find("td:eq(6)").text().replace(/\s+/g, '');
                var cur_id = row.find("td:eq(7)").text().replace(/\s+/g, '');
                var sign = row.find("td:eq(3)").text().replace(/\s/g, '').charAt(0);
                var sss='';
                if(cus_id!=''){
                    sss = cus_id + '|' + cur_id + '|' + sign;
                }
                $('#btnsearch').attr('title', sss);
                getexchangelist1();
            })

            $(document).on('click', '.btnprint', function(e) {
                e.preventDefault();
                var mapid = $(this).data('id');
                //alert(mapid)
                prints(mapid)
            })

            $(document).on('click', '.btndel', function(e) {
                e.preventDefault();
                //debugger
                //var rowind=$(this).closest('tr').index();
                Swal.fire({
                    title: 'Are you sure to remove this exchange?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var mapid = $(this).data('id');

                        $.ajax({
                            async: true,
                            type: 'GET',
                            dataType: 'JSON',
                            contentType: 'application/json;charset=utf-8',
                            url: "{{ route('deleteexchange') }}",
                            data: {
                                id: mapid
                            },
                            success: function(data) {
                                console.log(data);
                                if (data.success === true) {
                                    //document.getElementById("tblexchangelist").deleteRow(rowind);
                                    if($('#btnsearch').attr('title')==''){
                                        getexchangelist();
                                    }else{
                                        getexchangelist1();
                                    }
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'Delete Error.',
                                    'Error'
                                )
                            }

                        })

                    }
                })
            })

            function prints(mapid) {

                var redirectWindow = window.open('{{ url('/') }}' + '/exchange/prints?mapid=' + mapid,
                    '_blank');
                redirectWindow.location;
            }
        }) //end document


    </script>
    <script>
        function getexchangelist() {
            $('body').addClass("wait");
            var status = 1;
            var d1 = $('#d1').val();
            var d2 = $('#d2').val();
            var alldate = document.getElementById("ckalldate").checked;
            var url = "{{ route('exchangegoldapp.search') }}";

            $.ajax({
                async: true,
                type: 'GET',
                url: url,
                data: {
                    d1: d1,
                    d2: d2,
                    status: status,
                    alldate:alldate

                },
                complete: function() {},
                success: function(data) {
                    console.log(data)
                    $('#row_display').empty().html(data);
                    resizefixhead(170);

                    $('body').removeClass("wait");

                },
                error: function() {
                    $('body').removeClass("wait");
                    alert('Read Data Error.')
                }
            })
        }
        function getexchangelist1() {
            $('body').addClass("wait");
          // Initialize variables with default null or empty values
            var cus_id = '', cur_id = '', sign = '';
            // Check if searchtext has a value and contains the delimiter
            var searchtext=$('#btnsearch').attr('title');
            if (searchtext && searchtext.includes('|')) {
                var search = searchtext.split('|');
                cus_id = search[0] || '';
                cur_id = search[1] || '';
                sign   = search[2] || '';
            }
            var status = 1;
            var d1 = $('#d1').val();
            var d2 = $('#d2').val();
            var alldate = document.getElementById("ckalldate").checked;
            var url = "{{ route('exchangegoldapp.search1') }}";

            $.ajax({
                async: true,
                type: 'GET',
                url: url,
                data: {
                    cus_id: cus_id,
                    cur_id:cur_id,
                    sign:sign,
                    d1: d1,
                    d2: d2,
                    status: status,
                    alldate:alldate

                },
                complete: function() {},
                success: function(data) {
                    //console.log(data)
                    $('#div_detail').empty().html(data);
                    resizefixhead(170);

                    $('body').removeClass("wait");

                },
                error: function() {
                    $('body').removeClass("wait");
                    alert('Read Data Error.')
                }
            })
        }
        window.addEventListener("DOMContentLoaded", function() {
            if (window.Echo) {
                const channel = window.Echo.channel('gold-orders');
                channel.listen('.new-order', (e) => {
                    appendRow(e.order);
                    updateSummary(e.order); // summary table
                });
            }

        });

        function appendRow(order) {

            let color = order.qty > 0 ? "blue" : "red";
            let sign = order.qty > 0 ? "+" : "-";
            let currency = order.currency.sk;

            let no = $("#bodyexchangelist tr:not(.total-row)").length + 1;

            let row = `
            <tr data-currency="${currency}" style="color:${color}">
                <td style="text-align:center">${no}</td>
                <td>${order.customer.name}</td>
                <td>${sign}${order.currency.curname}</td>
                <td style="text-align:right">${order.qty}${currency}</td>
                <td style="text-align:right">${numberFormat(order.rate)}</td>
                <td style="text-align:right">${numberFormat(order.amount)} $</td>
                <td style="text-align:right">${numberFormat(order.price_last)}</td>
                <td style="text-align:right">${numberFormat(order.pl)} $</td>
                <td style="text-align:right">${numberFormat(order.deposit)} $</td>
                <td>${order.dd}</td>
                <td>${order.tt}</td>
                <td>${order.user.name}</td>
                <td>${order.is_close==1?'បិទ':''}</td>
                <td>${order.gold_req==1?'ស្នើមាស':''}</td>
            </tr>
            `;

            let totalRow = $(`#bodyexchangelist tr.total-row[data-currency="${currency}"]`);

            if (totalRow.length) {
                totalRow.before(row);
            } else {
                $("#bodyexchangelist").append(row);
            }

            updateCurrencyTotal(currency);
            // ✅ AUTO SCROLL
            let container = $('#bodyexchangelist').closest('.tableFixHead');
            container.scrollTop(container[0].scrollHeight);
        }

        function updateCurrencyTotal(currency) {

            let qty = 0;
            let amount = 0;

            let rows = $(`#bodyexchangelist tr[data-currency="${currency}"]:not(.total-row)`);

            rows.each(function() {

                let q = $(this).children().eq(3).text().replace(/[^\d.-]/g, '');
                let a = $(this).children().eq(5).text().replace(/[^\d.-]/g, '');

                qty += parseFloat(q) || 0;
                amount += parseFloat(a) || 0;

            });

            let totalRow = $(`#bodyexchangelist tr.total-row[data-currency="${currency}"]`);

            if (totalRow.length) {

                totalRow.children().eq(1).text(numberFormat(qty) + " " + currency);
                totalRow.children().eq(3).text(numberFormat(amount) + " $");

            }

        }

        function updateSummary_old(order) {

            let currency = order.currency.sk;
            let customer = order.customer.name;
            let qty = parseFloat(order.qty);
            let amount = parseFloat(order.amount);

            // 1️⃣ Update customer + currency row
            let row = $(`.tbl_mainlist tr[data-customer="${customer}"][data-currency="${currency}"]`);

            if (row.length) {

                let qtyCell = row.find("td:eq(3)");
                let amtCell = row.find("td:eq(4)");

                let oldQty = parseFloat(qtyCell.text().replace(/[^\d.-]/g, '')) || 0;
                let oldAmt = parseFloat(amtCell.text().replace(/[^\d.-]/g, '')) || 0;

                qtyCell.text(numberFormat(oldQty + qty) + " " + currency);
                amtCell.text(numberFormat(oldAmt + amount) + " $");

            }

            // 2️⃣ Update currency total
            let totalRow = $(`.tbl_mainlist .currency-total[data-currency="${currency}"]`);

            if (totalRow.length) {

                let qtyCell = totalRow.find("td:eq(1)");
                let amtCell = totalRow.find("td:eq(2)");

                let oldQty = parseFloat(qtyCell.text().replace(/[^\d.-]/g, '')) || 0;
                let oldAmt = parseFloat(amtCell.text().replace(/[^\d.-]/g, '')) || 0;

                qtyCell.text(numberFormat(oldQty + qty) + " " + currency);
                amtCell.text(numberFormat(oldAmt + amount) + " $");

            }

            // 3️⃣ Update grand total
            let grand = $("#grand_total_amount");

            if (grand.length) {

                let oldTotal = parseFloat(grand.text().replace(/[^\d.-]/g, '')) || 0;
                grand.text(numberFormat(oldTotal + amount) + " $");

            }

        }

        function updateSummary(order) {

            let currency = order.currency.sk;
            let customer = order.customer.name;
            let sign = order.qty > 0 ? "+" : "-";

            let qty = parseFloat(order.qty);
            let amount = parseFloat(order.amount);

            // 1️⃣ Update customer + currency + sign row
            let row = $(`.tbl_mainlist tr[data-customer="${customer}"][data-currency="${currency}"][data-sign="${sign}"]`);

            if (row.length) {

                let qtyCell = row.find("td:eq(3)");
                let amtCell = row.find("td:eq(4)");

                let oldQty = parseFloat(qtyCell.text().replace(/[^\d.-]/g, '')) || 0;
                let oldAmt = parseFloat(amtCell.text().replace(/[^\d.-]/g, '')) || 0;

                qtyCell.text(numberFormat(oldQty + qty) + " " + currency);
                amtCell.text(numberFormat(oldAmt + amount) + " $");

            }

            // 2️⃣ Update currency total
            let totalRow = $(`.tbl_mainlist .currency-total[data-currency="${currency}"]`);

            if (totalRow.length) {

                let qtyCell = totalRow.find("td:eq(1)");
                let amtCell = totalRow.find("td:eq(2)");

                let oldQty = parseFloat(qtyCell.text().replace(/[^\d.-]/g, '')) || 0;
                let oldAmt = parseFloat(amtCell.text().replace(/[^\d.-]/g, '')) || 0;

                qtyCell.text(numberFormat(oldQty + qty) + " " + currency);
                amtCell.text(numberFormat(oldAmt + amount) + " $");

            }
        }

        function numberFormat(num) {
            if (!num) return '0'
            return new Intl.NumberFormat('en-US').format(num)
        }
    </script>
@endsection
