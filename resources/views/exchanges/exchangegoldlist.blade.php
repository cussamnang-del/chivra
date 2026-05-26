@extends('master')
@section('title') ExchangeGoldList @endsection
@section('css')
<link href="{{ asset('public/admin') }} /assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" crossorigin="anonymous" />
    <style type="text/css">
      body.wait, body.wait *{
			cursor: wait !important;
		}
         .kh16{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:16px;
            }
            .kh16-b{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:16px;
            font-weight:bold;
            }
            .kh14{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:14px;
            }
            .kh14-b{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:14px;
            font-weight:bold;
            }
            .kh12{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:12px;
            }
            .kh12-b{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:12px;
            font-weight:bold;
            }
        .kh22-b{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:22px;
            font-weight:bold;
            }
        .kh22{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:22px;

            }
        label{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:14px;
            color:blue;
        }
       .txtexchange{
        font-weight:bold;
        font-size:22px;
        text-align:right;
       }
       .tableFixHead{ overflow: auto;background-color:lightgray;}
       .tableFixHead thead th { position: sticky; top: 0; z-index: 1;background-color:aqua }
        .tableFixHead1{ overflow: auto;background-color:rgb(209, 224, 125);}
       .tableFixHead1 thead th { position: sticky; top: 0; z-index: 1;background-color:rgb(185, 238, 124) }
    .tblexchangelist .clickedrow td{
        background-color: #caaf8f;
    }
    .tblexchangelist .clickedrow td input{
        background-color: #caaf8f;
    }
    .tbl_modal .clickedrow td{
        background-color: #0b07d8;
        color:white;
    }
    .tbl_modal .clickedrow td input{
        background-color: #0e12e9;
        color:white;
    }

    .tbl_summary_list .clickedrow td{
        background-color: blue;
        color:white;
    }
    .tbl_summary_list .clickedrow td input{
        background-color: blue;
        color:white;
    }
    .tbl_summary_list td{
        padding:2px 5px;
    }
    .tbl_detail .clickedrow td{
        background-color: blue;
        color:white !important;
    }
    .tbl_detail .clickedrow td input{
        background-color: blue;
        color:white !important;
    }
     .tbl_detail .clickedrow td a{
        background-color: blue;
        color:white !important;
    }
    .tbl_detail td{
        padding:2px 5px;
    }
     .tbl_summary_list th{
        padding:5px;
    }
    .tbl_detail th{
        padding:5px;
    }
    .bgred{
        background-color:red;
    }
    .mybtn{
        border:1px solid black;
        color:blue;
        padding:0px 5px;
    }
    .mybtn:hover{
        background-color:blue;
        color:white !important;
    }
     .dropdown-menu li > a:hover{
        background-color:rgb(21, 40, 214);
        color:white;
    }
    .dropdown-menu li{
        padding:0px;
        border-bottom:1px dotted black;
    }
    #tblgolddeposit td{
        border-style:none;
    }
     #tblgolddeposit2 td{
        border-style:none;
        padding-top:3px;
        padding-bottom:3px;
    }
     .buttonstyle{
        border-style:none;
        padding:10px;
        background-color:skyblue;
     }
    .buttonstyle:hover{
        background-color:rgb(239, 241, 97);
    }
    /* move able modal */
    .draggable-modal .modal-dialog {
        cursor: move;
    }

    .modal-top-left .modal-dialog {
        /* Reset centering properties */
        margin: 0;
        transform: none;

        /* Position the dialog */
        position: absolute;
        top: 0;
        left: 0;

        /* Optional: Adjust width/max-width if needed */
        /* max-width:500px; */
}
    </style>

@endsection
@php
    function phpformatnumber($num)
    {
        if (!is_numeric($num)) {
            return $num;
        }

        $num = (string)$num;
        $dc = 0;

        if (strpos($num, '.') !== false) {
            $decimals = explode('.', $num)[1];
            // Count actual meaningful decimals (but max 4)
            $dc = min(strlen(rtrim($decimals, '0')), 4);
        }

        return number_format((float)$num, $dc, '.', ',');
    }


@endphp
@section('content')
    <div class="row" style="padding:0px;margin-top:-10px;">
        <div class="col-lg-6">
            <div style="margin-bottom:10px;">
                <table>
                    <tr>
                        {{-- <td class="kh16-b" style="width:40px;">គិតពី</td>
                        <td class="kh16-b" style="width:160px;">
                            <div class="input-group">
                                <input type="text" name="d1" id="d1" class="form-control kh16-b" style="background-color:white;height:30px;width:100px;margin-top:0px;" readonly>
                                <span class="input-group-text" style="height:30px;margin-top:0px;"><i class="fa fa-calendar"></i></span>
                            </div>
                        </td>
                        <td class="kh16-b" style="width:40px;padding-left:10px;">ដល់</td>
                        <td class="kh16-b" style="width:160px;">
                            <div class="input-group">
                                <input type="text" name="d2" id="d2" class="form-control kh16-b" style="background-color:white;height:30px;width:100px;margin-top:0px;" readonly>
                                <span class="input-group-text" style="height:30px;margin-top:0px;"><i class="fa fa-calendar"></i></span>
                            </div>
                        </td> --}}


                        <td>
                            <select name="selcustomergold" id="selcustomergold" class="kh16-b" style="background-color:#d9ee64;">
                                @foreach ($partners->where('is_gold_list',1) as $item)
                                    <option value="{{$item->id}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td style="">
                            <button id="btnsearch" class="mybtn kh14-b" style="height:25px;">Search</button>
                            <button id="btnprintreport" class="mybtn kh14-b" style="height:25px;">Print Report</button>
                            <button id="btndelclearlist" class="mybtn kh14-b" style="height:25px;color:red;padding-left:10px;">ClearList</button>
                        </td>

                    </tr>
                </table>
            </div>
            <div class="tableFixHead" style="padding:0px;margin:0px;background-color:#d8e0aa;">
                <table id="tbl_summary_list" class="table table-bordered table-hover tbl_summary_list kh14-b" style="table-layout: fixed;">
                    <thead style="text-align:center;">
                        <th style="width:70px;">លរ</th>
                        <th style="padding:0px;">
                            <input type="text" class="form-control kh16" style="width:100%;text-align:center;background-color:aqua;padding:3px;" id="myInputname" onkeyup="searchbyname()" placeholder="ឈ្មោះអតិថិជន" title="">
                        </th>
                        <th style="padding:0px;">
                            <input type="text" class="form-control kh16" style="width:100%;text-align:center;background-color:aqua;padding:3px;" id="myInputphone" onkeyup="searchbyphone()" placeholder="លេខទូរស័ព្ទ" title="">
                        </th>
                        <th style="width:150px;">សមតុល្យ</th>
                    </thead>
                    <tbody id="body_summary_list">


                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-lg-6" style="padding:0px;">
            <div style="margin-bottom:10px;">
                <table class="kh16-b">
                    <tr>
                        <td>បញ្ជី</td>
                        <td id="cname" style="padding-left:20px;"></td>
                        <td id="ctel" style="padding-left:20px;"></td>
                    </tr>
                </table>
            </div>
            <div class="row" style="margin:0px;padding:0px;">
                    <div class="tableFixHead" style="padding:0px;margin:0px;">
                    <table id="tbl_detail" class="table table-bordered table-hover tbl_detail kh14-b" style="table-layout: fixed;">
                        <thead style="text-align:center;">
                            <th style="width:60px;">លរ</th>
                            <th style="width:100px;">ID</th>
                            <th style="width:100px;">ថ្ងៃទី</th>
                            <th style="width:100px;">ម៉ោង</th>
                            <th style="width:150px;">ប្រតិបត្តិការណ៏</th>
                            <th style="width:150px;">ចំនួនទឹកប្រាក់</th>
                            <th style="width:60px;">សក</th>
                            <th style="width:200px;">អ្នកកត់ត្រា</th>
                            <th style="width:250px;">GroupId</th>


                        </thead>
                        <tbody id="body_detail">



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade draggable-modal modal-top-left .modal-dialog" id="modalSummary" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header kh16-b">
                    <h2 class="modal-title">Summary Gold Depsit</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" >

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <form action="" id="frmgolddeposit2">

                           <div class="table-responsive">
                                <table id="tblgolddeposit2" class="table kh16-b">
                                    <tr>
                                        <td class="kh16-b" style="">កាលបរិច្ឆេទ</td>
                                        <td colspan=2 class="kh16-b" style="">
                                            <div class="input-group">
                                                <input type="text" name="deposit_date2" id="deposit_date2" class="form-control kh16-b" style="background-color:white;" readonly>
                                                <span class="input-group-text" style="margin-top:0px;"><i class="fa fa-calendar"></i></span>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ចូលបញ្ជី</td>
                                        <td colspan=2>
                                            <select name="selcustomergold2" id="selcustomergold2" class="form-select kh16-b" style="">
                                                @foreach ($partners->where('is_gold_list',1) as $item)
                                                    <option value="{{$item->id}}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ទឹកប្រាក់ត្រូវទូទាត់</td>
                                        <td style="">
                                            <input type="text" name="txtdebt2" id="txtdebt2" class="form-control canenter kh16-b" style="text-align:right;" autocomplete="off" readonly>
                                        </td>
                                        <td style="width:100px;">
                                            <select name="selcur2" id="selcur2" class="form-select kh16-b" style="width:100px;font-weight:bold;">

                                                @foreach ($currencies as $c)
                                                    <option value="{{ $c->id }}" lomeang="{{ $c->lomeang }}" isgold="{{ $c->isgold }}" tuochek="{{ $c->tuochek }}">{{ $c->shortcut }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ទូទាត់ចំនួន</td>
                                        <td style="">
                                            <input type="text" name="txtdeposit2" id="txtdeposit2" class="form-control canenter kh16-b" style="text-align:right;background-color:yellow;" autocomplete="off">
                                        </td>
                                        <td style="width:100px;">
                                            <input type="text" value="USD" style="width:100px;" class="form-control kh16-b" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>សមតុល្យ</td>
                                        <td style="">
                                            <input type="text" name="txtbalance2" id="txtbalance2" class="form-control canenter kh16-b" style="text-align:right;" autocomplete="off" readonly>
                                        </td>
                                        <td style="width:100px;">
                                            <input type="text" value="USD" style="width:100px;" class="form-control kh16-b" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>ទូទាត់តាម</td>
                                        <td colspan=2>
                                            <select name="selbankdeposit2" id="selbankdeposit2" class="form-select kh16-b">
                                                <option value="" customertype="">Cash</option>
                                                @foreach ($partners->where('customertype','BANK') as $item)
                                                    <option value="{{$item->id}}" customertype="{{$item->customertype}}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                        <tr>
                                        <td>ចំនួនទូទាត់</td>
                                        <td style="">
                                            <input type="text" name="txtdeposit3" id="txtdeposit3" class="form-control canenter kh16-b" style="text-align:right;background-color:yellow;" autocomplete="off">
                                        </td>
                                        <td style="width:100px;">
                                            <select name="selcurdeposit12" id="selcurdeposit12" class="form-select kh16-b" style="width:100px;font-weight:bold;">

                                                @foreach ($currencies as $c)
                                                    <option value="{{ $c->id }}" lomeang="{{ $c->lomeang }}" isgold="{{ $c->isgold }}" tuochek="{{ $c->tuochek }}">{{ $c->shortcut }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ឈ្មោះអតិថិជន</td>
                                        <td colspan=2>
                                            <input type="text" class="form-control canenter kh16-b" id="client_name2" name="client_name2" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>លេខទូរស័ព្ទ</td>
                                        <td colspan=2>
                                            <input type="text" class="form-control canenter kh16-b" id="client_tel2" name="client_tel2" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan=3 style="text-align:right;">
                                            <button id="btnsavedeposit2" class="buttonstyle kh14-b">រក្សាទុក</button>
                                            <button id="btnsavedepositprint2" class="buttonstyle kh14-b">រក្សាទុកព្រីន</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

     <div class="modal fade draggable-modal modal-top-left .modal-dialog" id="modalClearlist" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header kh16-b">
                    <h5 class="modal-title">Clear List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" >
                    <table id="tbl_clearlist" class="table table-bordered table-hover">
                        <thead>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Phone Number</th>
                            <th>Clear Date</th>
                            <th>Clear By</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="body_clearlist">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('public/admin') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/admin') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $('#h1_title').text('បញ្ជីមាស');
        resizefixhead(170);
        $(window).resize(function() {
           resizefixhead(170);
        });

        function resizefixhead(h)
        {
            var windowWidth = $(window).width();
            var windowHeight = $(window).height();
            var divheight=windowHeight-h;
            var tableFixHead=document.getElementsByClassName('tableFixHead');
            for(i=0; i<tableFixHead.length; i++) {
                tableFixHead[i].style.height=divheight+'px';
            }
        }

        $(document).ready(function () {


            var cleave_txtdeposit2 = new Cleave('#txtdeposit2', {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });
            var cleave_txtdeposit3 = new Cleave('#txtdeposit3', {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });
            var today=new Date();
            $('#d1,#d2,#deposit_date,#deposit_date2').datetimepicker({
                timepicker:false,
                datepicker:true,
                value:today,
                format:'d-m-Y',
                autoclose:true,
                todayBtn:true,
                startDate:today,

            });

            function makeModalDraggable(modalId) {
                const modal = document.getElementById(modalId);
                const dialog = modal.querySelector('.modal-dialog');
                const header = modal.querySelector('.modal-header');

                let offsetX = 0;
                let offsetY = 0;
                let isDragging = false;

                header.style.cursor = "move";

                header.addEventListener('mousedown', function (e) {

                    isDragging = true;

                    const rect = dialog.getBoundingClientRect();
                    offsetX = e.clientX - rect.left;
                    offsetY = e.clientY - rect.top;

                    // Prevent Bootstrap auto-resize / auto-center
                    dialog.classList.remove("modal-dialog-centered");
                    dialog.style.position = "absolute";
                    dialog.style.margin = 0;

                    // ✨ THE FIX — lock modal current size
                    dialog.style.width = rect.width + "px";
                    dialog.style.maxWidth = "none";
                    dialog.style.transform = "none";

                    document.body.style.userSelect = "none";
                });

                document.addEventListener('mousemove', function (e) {
                    if (!isDragging) return;
                    dialog.style.left = (e.clientX - offsetX) + "px";
                    dialog.style.top = (e.clientY - offsetY) + "px";
                });

                document.addEventListener('mouseup', function () {
                    isDragging = false;
                    document.body.style.userSelect = "auto";
                });
            }

            // Enable draggable modal when shown
            document.getElementById('modalSummary').addEventListener('shown.bs.modal', function () {
                makeModalDraggable('modalSummary');
                $('#txtdeposit2').focus();
                $('#txtdeposit2').select();

            });

            $(document).on('click','.btn-delete',function(e){
                e.preventDefault();
                //debugger
                Swal.fire({
                    title: 'Are you sure to remove this payment?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id=$(this).data('id');
                        var group_id=$(this).data('groupid');
                        $.ajax({
                            async: true,
                            type: 'GET',
                            dataType:'JSON',
                            contentType: 'application/json;charset=utf-8',
                            url: "{{ route('deletegoldpayment') }}",
                            data: { id: id,group_id:group_id },
                            success: function (data) {
                                //console.log(data);
                                if (data.success === true) {
                                    getexchangelist();
                                    getpaymentdetail($('#selcustomergold').val(),$('#cname').text(),$('#ctel').text());
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
                            error: function () {
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

             $(document).on('click','.btnpayment',function(e){
                e.preventDefault();
                var balance=$(this).data('balance');
                var client=$(this).data('recname');
                var phone=$(this).data('rectel');
                $('#client_name2').val(client);
                $('#client_tel2').val(phone);
                $('#txtdebt2').val(formatNumber(balance));
                $('#txtdeposit2').val(formatNumber(Math.abs(balance)));
                $('#txtbalance2').val(0);
                $('#txtdeposit3').val(formatNumber(Math.abs(balance)));
                // show modal
                let modal = new bootstrap.Modal(document.getElementById('modalSummary'));
                modal.show();
             })
              $(document).on('click','#btndelclearlist',function(e){
                e.preventDefault();

                // show modal
                let modal = new bootstrap.Modal(document.getElementById('modalClearlist'));
                modal.show();
                getclearlist();


             })
             function getclearlist()
             {
                  $('body').addClass("wait");
                var customer=$('#selcustomergold').val();
                var url="{{ route('getcleardate') }}";
                let k=0;
                let total=0;
                $.ajax({
                    async:true,
                    type: 'GET',
                    url: url,
                    data: {customer:customer},
                    complete: function () {},
                    success: function (data) {
                        console.log(data)
                        let row='';
                        for(i=0;i<data['data'].length;i++){
                            k+=1;

                            row +=`
                                <tr style="">
                                    <td style="text-align:center;"> ${ k } </td>
                                    <td class="kh16">${ data['data'][i].recname }</td>
                                    <td class="kh16">${ data['data'][i].rectel }</td>
                                    <td class="kh16">${ moment(data['data'][i].clear_date).format("DD-MM-YYYY") }</td>
                                    <td class="kh16">${ data['data'][i].clear_by }</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-danger btn-remove_cleardate" data-recname="${data['data'][i].recname}" data-rectel="${data['data'][i].rectel}" data-cleardate="${data['data'][i].clear_date}" data-clearby="${data['data'][i].clear_by}">Remove</a>
                                    </td>
                                </tr>
                            `;

                        }

                            $('#body_clearlist').empty().append(row);

                        $('body').removeClass("wait");

                    },
                    error: function () {
                        $('body').removeClass("wait");
                        alert('Read Data Error.')
                    }
                })
             }
              $(document).on('click','.btn-remove_cleardate',function(e){
                e.preventDefault();

                  Swal.fire({
                    title: 'Are you sure to remove clear list?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove clear list!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var recname=$(this).data('recname');
                            var rectel=$(this).data('rectel');
                            var cleardate=$(this).data('cleardate');
                            var clearby=$(this).data('clearby');
                            var customer=$('#selcustomergold').val();
                            $.ajax({
                                async: true,
                                type: 'GET',
                                dataType:'JSON',
                                contentType: 'application/json;charset=utf-8',
                                url: "{{ route('deletecleargoldlist') }}",
                                data: { customer: customer,recname:recname,rectel:rectel,cleardate:cleardate,clearby:clearby },
                                success: function (data) {
                                    //console.log(data);
                                    if (data.success === true) {
                                         getclearlist();
                                        // getexchangelist();
                                        // getpaymentdetail($('#selcustomergold').val(),$('#cname').text(),$('#ctel').text());
                                        Swal.fire(
                                            'Clear!',
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
                                error: function () {
                                    Swal.fire(
                                        'Error!',
                                        'Clear Error.',
                                        'Error'
                                    )
                                }

                            })

                        }
                    })
             })
             $(document).on('click','.btnclearlist',function(e){
                e.preventDefault();

                  Swal.fire({
                    title: 'Are you sure to clear list?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, clear it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var recname=$(this).data('recname');
                            var rectel=$(this).data('rectel');
                            var customer=$('#selcustomergold').val();
                            $.ajax({
                                async: true,
                                type: 'GET',
                                dataType:'JSON',
                                contentType: 'application/json;charset=utf-8',
                                url: "{{ route('cleargoldlist') }}",
                                data: { customer: customer,recname:recname,rectel:rectel },
                                success: function (data) {
                                    //console.log(data);
                                    if (data.success === true) {
                                        getexchangelist();
                                        getpaymentdetail($('#selcustomergold').val(),$('#cname').text(),$('#ctel').text());
                                        Swal.fire(
                                            'Clear!',
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
                                error: function () {
                                    Swal.fire(
                                        'Error!',
                                        'Clear Error.',
                                        'Error'
                                    )
                                }

                            })

                        }
                    })
             })
             // Remove previous highlight class
             $(document).on('click','.tbl_summary_list td',function(e){
                $(this).closest('table').find('tr.clickedrow').removeClass('clickedrow');
               // add highlight to the parent tr of the clicked td
               $(this).parent('tr').addClass("clickedrow");
            })
             $(document).on('click','.tbl_detail td',function(e){
                $(this).closest('table').find('tr.clickedrow').removeClass('clickedrow');
               // add highlight to the parent tr of the clicked td
               $(this).parent('tr').addClass("clickedrow");
            })
             $(document).on('click','.tbl_modal td',function(e){
                $(this).closest('table').find('tr.clickedrow').removeClass('clickedrow');
               // add highlight to the parent tr of the clicked td
               $(this).parent('tr').addClass("clickedrow");
            })
            $(document).on('click','.tbl_mainlist td',function(e){
                $(this).closest('table').find('tr.clickedrow').removeClass('clickedrow');
               // add highlight to the parent tr of the clicked td
               $(this).parent('tr').addClass("clickedrow");
            })
            $(document).on('click','.item',function(e){
                e.preventDefault();
                var rowind=$(this).closest('tr').index();
                var row=$(this).closest('tr');
                var curname=row.find("td:eq(1)").text();
                $('#btnsearch').attr('title',curname);
                searchtblexchangelist(curname);

            })
            $(document).on('change','#txtdeposit',function(e){
                e.preventDefault();

                let dep=$(this).val().replace(/,/g,'');
                let debt=$('#txtdebt').val().replace(/,/g,'');
                let bal=parseFloat(debt)-parseFloat(dep);
                $('#txtbalance').val(formatNumber(bal));
                $('#txtdeposit1').val(formatNumber(dep));
            })
             $(document).on('change','#txtdeposit2',function(e){
                e.preventDefault();

                let dep=$(this).val().replace(/,/g,'');
                let debt=$('#txtdebt2').val().replace(/,/g,'');
                let bal=parseFloat(Math.abs(debt))-parseFloat(Math.abs(dep));
                $('#txtbalance2').val(formatNumber(bal));
                $('#txtdeposit3').val(formatNumber(dep));
            })
             $(document).on('keydown', '.canenter', function (e) {
                 if (e.keyCode == 13) {
                    var id = $(this).attr("id");
                    if (id=='txtdeposit'){
                        $('#txtdeposit1').focus();
                    }else if (id=='txtdeposit1'){
                        $('#btnsavedeposit').focus();
                    }else if(id=='txtdeposit2'){
                        $('#txtdeposit3').focus();
                        $('#txtdeposit3').select();
                    }else if(id=='txtdeposit3'){
                        $('#btnsavedeposit2').focus();
                    }
                    e.preventDefault();
                 }
             })

            $(document).on('click','#btnsavedeposit2,#btnsavedepositprint2',function(e){
                e.preventDefault();

                var btnid=$(this).attr('id');
                let deposit = parseFloat($('#txtdeposit2').val().replace(/,/g, '')) || 0;
                let depositBank = parseFloat($('#txtdeposit3').val().replace(/,/g, '')) || 0;
                let payvia = $('#selbankdeposit2').val();

                if (deposit < 0 || depositBank < 0) {
                    alert('Invalid deposit amount.');
                    return;
                }

                if (payvia == '') {
                    bank_amount=0;
                    cash_amount=deposit;
                    if (deposit !== depositBank) {
                        alert('Deposit amount must match exactly for cash payment.');
                        return;
                    }
                } else {
                    bank_amount=depositBank;
                    cash_amount=deposit - depositBank;
                    if (deposit < depositBank) {
                        alert('Bank deposit amount cannot be greater than customer deposit.');
                        return;
                    }
                }
                $('body').addClass("wait");
                customertype = $('#selbankdeposit2').find(':selected').attr('customertype');

                var formdata=new FormData(frmgolddeposit2);
                formdata.append("customertype_deposit",customertype);
                formdata.append("bank_amount",bank_amount);
                formdata.append("cash_amount",cash_amount);
                formdata.append("paidform",'goldlist');

                formdata.append('deposit_via',$('#selbankdeposit2 option:selected').text());
                var url="{{ route('exchange.savedepositgold2') }}";
                $.ajax({
                    async: true,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    url: url,
                    data: formdata,
                    complete: function () {

                    },
                    success: function (data) {
                        console.log(data)
                        if($.isEmptyObject(data.error)){
                            toastr.success("Saved");
                            if(btnid=='btnsavedepositprint2'){
                              prints(data.id,data.groupid,0);
                          }
                            $('#modalSummary').modal('hide');
                            $('body').removeClass("wait");
                            getexchangelist();
                            getpaymentdetail($('#selcustomergold').val(),$('#cname').text(),$('#ctel').text());

                        }else{
                            $('body').removeClass("wait");
                            alert(data.error)
                        }
                    },
                    error: function () {
                        $('body').removeClass("wait");
                        alert('Save Error.')
                    }

                })

             })
            function prints(id,group_id,reprint){
                var redirectWindow = window.open('{{ url('/') }}'+'/goldlistpayment/prints?id='+id+'&group_id='+group_id+'&reprint='+reprint, '_blank');
                redirectWindow.location;
            }

            // ✅ Focus after modal fully visible
            $('#depositgold_modal').on('shown.bs.modal', function () {
                $('#txtdeposit').trigger('focus');
            });
            $('#btnprintreport').click(function(e){
                e.preventDefault();
                var userid=$('#seluser').val();
                var username=$('#seluser option:selected').text();
                var status=$('#selstatus').val();
                var d1=$('#d1').val();
                var d2=$('#d2').val();
                var redirectWindow = window.open('{{ url('/') }}'+'/getexchangelist?userid='+userid+'&d1='+d1+'&d2='+d2+'&status='+status+'&location='+2+'&isprint='+1+'&username='+username, '_blank');
                redirectWindow.location;
            })
            $('#btnsearch').click(function(e){
                e.preventDefault();
                getexchangelist();
            })

            function getexchangelist()
            {
                $('body').addClass("wait");
                var customer=$('#selcustomergold').val();
                var url="{{ route('getgoldlist') }}";
                let k=0;
                let total=0;
                $.ajax({
                    async:true,
                    type: 'GET',
                    url: url,
                    data: {customer:customer},
                    complete: function () {},
                    success: function (data) {
                        //console.log(data)
                        let row='';
                        for(i=0;i<data['sumtransfer'].length;i++){
                            k+=1;
                            total +=parseFloat(data['sumtransfer'][i].total);
                            if(parseFloat(data['sumtransfer'][i].total)>0){
                                color='color:red';
                            }else{
                                color='color:blue';
                            }
                            row +=`
                                <tr style="${color}">
                                    <td class="kh16" style="text-align:center;">
                                        <div class="dropdown">
                                                    <button style="width:100%;" type="button" class="mybtn dropdown-toggle kh14" data-bs-toggle="dropdown">${k}</button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" class="dropdown-item kh16-b btnpayment" data-recname="${ data['sumtransfer'][i].recname }" data-rectel="${ data['sumtransfer'][i].rectel }" data-balance="${ data['sumtransfer'][i].total }">ទូទាត់</a></li>
                                                        <li><a href="#" class="dropdown-item kh16-b btnclearlist" data-recname="${ data['sumtransfer'][i].recname }" data-rectel="${ data['sumtransfer'][i].rectel }" data-balance="${ data['sumtransfer'][i].total }">Clear List</a></li>

                                                    </ul>
                                                </div>
                                    </td>
                                    <td class="kh16">${ data['sumtransfer'][i].recname }</td>
                                    <td class="kh16">${ data['sumtransfer'][i].rectel }</td>
                                    <td class="kh16-b" style="text-align:right;">${ formatNumber(data['sumtransfer'][i].total) } ${ data['sumtransfer'][i]['currency'].shortcut}</td>

                                </tr>
                            `;

                        }
                         row +=`
                                <tr class="total_row" style="background-color:yellow;">
                                    <td colspan=3 class="kh16" style="text-align:center;">សរុបទាំងអស់</td>

                                    <td class="kh16-b" style="text-align:right;">${ formatNumber(total) } USD</td>

                                </tr>
                            `;
                            $('#body_summary_list').empty().append(row);
                            //resizefixhead(170);
                            document.querySelectorAll('#tbl_summary_list tr').forEach(function(row) {
                                row.addEventListener('click', function() {
                                    if (this.classList.contains('total_row')) {
                                            return; // stop click action
                                    }

                                    let tds = this.querySelectorAll('td');
                                    let name = tds[1].innerText;
                                    let phone = tds[2].innerText;
                                    let total = tds[3].innerText;
                                    let customer=$('#selcustomergold').val();
                                    $('#cname').text(name);
                                    $('#ctel').text(phone);
                                    //---------------------------
                                    getpaymentdetail(customer,name,phone);
                                    //--------------------------
                                });
                            });
                        $('body').removeClass("wait");

                    },
                    error: function () {
                        $('body').removeClass("wait");
                        alert('Read Data Error.')
                    }
                })
            }

            function getpaymentdetail(customer,name,phone)
            {
                $('body').addClass("wait");
                var url="{{ route('getgoldlistdetail') }}";
                $.ajax({
                    async:true,
                    type: 'GET',
                    url: url,
                    data:{customer:customer,recname:name,rectel:phone},
                    complete: function () {},
                    success: function (data) {
                        //console.log(data)

                        $('#body_detail').empty().html(data);
                        $('body').removeClass("wait");
                    },
                    error: function () {
                        $('body').removeClass("wait");
                        alert('Save Error.')
                    }

                })
            }

        })//end document

        function searchbyname() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputname");
            filter = input.value.toUpperCase();
            table = document.getElementById("tbl_summary_list");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    } else {
                    tr[i].style.display = "none";
                    }
                }
            }
            // ✅ Renumber visible rows
            // var visibleIndex = 1;
            // for (i = 0; i < tr.length; i++) {
            //     if (tr[i].style.display !== "none") {
            //         var tdNo = tr[i].getElementsByTagName("td")[0];
            //         if (tdNo) {
            //             tdNo.textContent = visibleIndex++;
            //         }
            //     }
            // }
        }

         function searchbyphone() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInputphone");
            filter = input.value.toUpperCase();
            table = document.getElementById("tbl_summary_list");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    } else {
                    tr[i].style.display = "none";
                    }
                }
            }

        }


    </script>

@endsection
