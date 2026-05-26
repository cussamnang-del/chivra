<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Customer Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@300;400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ config('helper.asset_path') }}/admin/assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
	<link href="{{ config('helper.asset_path') }}/admin/assets/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
	<link href="{{ config('helper.asset_path') }}/admin/assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
    <link href="{{ config('helper.asset_path') }}/css/jquery.datetimepicker.min.css" rel="stylesheet">
    <script src="{{ config('helper.asset_path') }}/admin/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ config('helper.asset_path') }}/admin/assets/plugins/datetimepicker/js/legacy.js"></script>
	<script src="{{ config('helper.asset_path') }}/admin/assets/plugins/datetimepicker/js/picker.js"></script>
	<script src="{{ config('helper.asset_path') }}/admin/assets/plugins/datetimepicker/js/picker.time.js"></script>
	<script src="{{ config('helper.asset_path') }}/admin/assets/plugins/datetimepicker/js/picker.date.js"></script>
	<script src="{{ config('helper.asset_path') }}/admin/assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
	<script src="{{ config('helper.asset_path') }}/admin/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
	<script src="{{ config('helper.asset_path') }}/js/jquery.datetimepicker.full.js"></script>
</head>
<style>
    .kh36{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:36px;
        font-weight:bold;
        }
    .kh10{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:10px;
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
    .kh22-b{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:22px;
        font-weight:bold;
        }
    .kh22{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:22px;
        }
    .kh14-b{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:14px;
        font-weight:bold;
        }
    .kh14{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:14px;
        }
    .kh12-b{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:12px;
        font-weight:bold;
        }
    .kh28{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:28px;
        }
        #tbl_transaction .clickedrow td{
            background-color: yellow;
        }
        #tbl_transaction .clickedrow input{
            background-color: yellow;
        }
        #tbl_transaction thead th {
            position: sticky;
            top: 0;
            background-color: aqua;
            z-index: 5;
        }

        .table-scroll {
            height: calc(100vh - 130px); /* adjust offset */
            overflow-y: auto;
        }
        .cblue{
            color:blue !important;
        }
         .cred{
            color:red !important;
        }
</style>
@php

    function phpformatnumber($num){
        $dc=0;
        $p=strpos((float)$num,'.');
        if($p>0){
        // $fp=substr($num,$p,strlen($num)-$p);
        // $dc=strlen((float)$fp)-2;
            $dc=2;
        }
        return number_format($num,$dc,'.',',');
    }
@endphp
<body>


    <div id="invoice-pos">


        <div class="row" style="margin:20px;">

                <table class="" style="">
                    <tr>
                        <td class="kh22-b" style="text-align:center;">ប្រតិបត្តិការណ៏របស់អតិថិជន <span class="kh36">{{ $customername }}</span>  ល្វែង <span class="kh36">{{ $property }}</span></td>
                    </tr>

                </table>

        </div>

        <div class="table-responsive table-scroll">
                <table id="tbl_transaction" class="table table-bordered table-hover" style="">
                    <thead style="text-align:center;background-color:aqua;position:sticky;top:0" class="kh16">
                        <th style="width:40px;">No</th>
                        <th style="width:80px;">ID</th>
                        <th style="width:60px;">Trcode</th>
                        <th style="width:180px;">ថ្ងៃទី</th>
                        <th style="width:150px;">ប្រតិបត្តិការណ៏</th>
                        <th style="">អតិថិជន</th>
                        <th style="width:150px;">ចំនួនទឹកប្រាក់</th>
                        <th style="width:100px;">ពិន័យ</th>
                        <th style="width:100px;">លើកលែង</th>

                        <th style="width:120px;">បង់ខែ</th>
                        <th style="width:120px;">ខែបន្ទាប់</th>
                        <th style="width:150px;">អ្នកកត់ត្រា</th>
                        <th style="width:150px;">Created</th>
                    </thead>

                    <tbody id="body_transaction">
                        @php
                            $total=0;
                        @endphp
                        @foreach ($lists as $k => $tr)
                            @php
                                $total +=$tr->amount;
                            @endphp
                            <tr>
                                <td style="text-align:center;" class="kh12">{{ ++$k }}</td>
                                <td style="text-align:center;" class="kh16">{{ $tr->id }}</td>
                                <td class="kh16" style="text-align:right;">{{ $tr->trancode }}</td>
                                <td class="kh16-b" style="">{{ date('d/m/Y',strtotime($tr->dd)) . ' ' . $tr->tt }}</td>
                                <td class="kh16">
                                    <a href="#inv{{ $tr->id }}" data-groupid="{{ $tr->ref_group_id }}" class="kh14-b" style="text-decoration:underline;" data-bs-toggle="collapse" >{{ $tr->tranname }}</a>
                                </td>
                                <td class="kh16" style="">{{ $tr->partner->name }}</td>
                                <td class="kh16-b" style="text-align:right;@if($tr->amount>0)color:blue; @else color:red; @endif">{{ phpformatnumber($tr->amount) . $tr->currency->sk}}</td>
                                <td class="kh16-b" style="text-align:right;">{{ phpformatnumber($tr->cuscharge) . $tr->cuschargecur->sk}}</td>
                                <td class="kh16-b" style="text-align:right;">{{ phpformatnumber($tr->discount) . $tr->cuschargecur->sk}}</td>
                                <td class="kh16-b" style="text-align:right;">{{ $tr->payformonth?date('d/m/Y',strtotime($tr->payformonth)):'' }}</td>
                                <td class="kh16-b" style="text-align:right;">{{ $tr->nextpayment?date('d/m/Y',strtotime($tr->nextpayment)):'' }}</td>
                                <td class="kh16" style="text-align:right;">{{ $tr->user->name }}</td>
                                <td class="kh16-b" style="">{{ date('d/m/Y',strtotime($tr->created_at)) }}</td>
                            </tr>
                             <tr id="inv{{ $tr['id'] }}" class="collapse borderset2" style="">
                                <td colspan=12 style="">
                                    <table class="table table-bordered" style="margin:0px;">
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                            @foreach (App\PartnerTransfer::showbygroup($tr->id,$tr->ref_group_id) as $item)
                                                @php
                                                    $i=$i+1;
                                                @endphp
                                                @if($i==1)
                                                    <tr class="kh12-b" style="text-align:center;border-top:none;background-color:antiquewhite">
                                                        <td style="width:100px;">ID</td>
                                                        <td style="width:100px;">ថ្ងៃទូទាត់</td>
                                                        <td style="width:80px;">Time</td>
                                                        <td style="width:90px;">បង់ខែ</td>
                                                        <td style="width:150px;">ប្រតិបត្តិការណ៏</td>
                                                        <td style="width:150px;">ដៃគូ</td>
                                                        <td style="width:120px;">ចំនួនទឹកប្រាក់</td>
                                                        <td style="width:80px;">ពិន័យ</td>
                                                        <td style="width:80px;">លើកលែង</td>
                                                        <td style="width:100px;">អ្នកកត់ត្រា</td>
                                                        <td style="width:100px;">ថ្ងៃកត់ត្រា</td>
                                                        <td style="width:200px;">ផ្សេងៗ</td>
                                                        <td style="width:120px;">Update Date</td>
                                                        <td style="width:150px;">Action</td>
                                                    </tr>
                                                @endif
                                                <tr class="kh12-b" style="">
                                                    <td style="text-align:center;">{{ $item->id }}</td>
                                                    <td>{{ date('d-m-Y',strtotime($item->dd))}}</td>
                                                    <td>{{ $item->tt }}</td>
                                                    <td>{{ $item->payformonth?date('d-m-Y',strtotime($item->payformonth)):''}}</td>
                                                    <td>{{ $item->tranname }}</td>
                                                    <td>{{ $item->partner->name }}</td>
                                                    <td style="text-align:right;">{{ phpformatnumber($item->amount) . ' ' . $item->currency->sk }}</td>
                                                    <td style="text-align:right;">{{ phpformatnumber($item->trancode==-8?0:$item->cuscharge) . ' ' . $item->cuschargecur->sk }}</td>
                                                    <td style="text-align:right;">{{ phpformatnumber($item->discount_amount) . ' ' . $item->cuschargecur->sk }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ date('d-m-Y',strtotime($item->created_at))}}</td>
                                                    <td>{{ $item->note }}</td>
                                                    <td>
                                                         <input type="text" class="form-control kh16-b dd" style="background-color:white;height:30px;width:120px;margin-top:0px;" readonly>

                                                    </td>
                                                    <td>
                                                        <button class="btnupdate kh12-b" data-id="{{$item->id}}">Update Date</button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </td>

                            </tr>
                        @endforeach
                            <tr class="{{$total>0?'cblue':'cred'}}" style="background-color:aqua;">
                                <td colspan=6 class="kh22-b">សរុប</td>
                                <td class="kh22-b" style="text-align:right;">{{ phpformatnumber($total) . 'USD'}}</td>

                            </tr>
                    </tbody>

                </table>


        </div>


    </div>

</body>
<script type="text/javascript">
    $(document).ready(function () {
       var today = new Date();

        $('.dd').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'd-m-Y',
            value: today,   // ✅ set date here
            autoclose: true,
            todayBtn: true
        });
        $(document).on('click','#tbl_transaction td',function(e){
               // Remove previous highlight class
               $(this).closest('table').find('tr.clickedrow').removeClass('clickedrow');
               // add highlight to the parent tr of the clicked td
               $(this).parent('tr').addClass("clickedrow");
           })

        $(document).on('click', '.btnupdate', function () {

            var btn = $(this);
            var id  = btn.data('id');

            // get date from same row
            var dd  = btn.closest('tr').find('.dd').val();

            if (!dd) {
                alert('Please select date');
                return;
            }

            $.ajax({
                url: "{{ route('realestate.updatetransactiondate') }}", // Laravel route
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    dd: dd
                },
                success: function (res) {
                    if (res.status === 'success') {
                        alert('Date updated successfully');
                    } else {
                        alert(res.message);
                    }
                },
                error: function () {
                    alert('Update failed');
                }
            });
        });


    })


</script>
</html>
