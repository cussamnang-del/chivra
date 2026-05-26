<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CommissionList Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@300;400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
   @page {
        size: A4 landscape;
        margin: 0;
    }

    @media print {
        html, body {
            width: 297mm;
            height: 210mm;

        }
    }
    #invoice-pos{
        box-shadow: 0 0 1in -0.25in rgb(0,0,0.5);
        padding:0mm;
        margin:0 auto;
        width:210mm;
        background:#fff;
    }
    #invoice-pos ::selection{
        background:#34495E;
        color:#fff;
    }
    #invoice-pos ::-mox-selection{
        background:#34495E;
        color:#fff;
    }

    thead{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:12px;
        padding:0px;
        color:black;
    }
    tbody{
        font-family:arial;
        font-size:10px;
        padding:0px;
    }
    .logo{
        font-family:khmer os muol light;
        font-size:22px;
        margin-top:5px;
        color:black;
    }
    .info{
        font-family:khmer os muol light;
        font-size:16px;
        color:black;
    }
    #top p{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:12px;
        margin-left:0px;
        padding:0px;
        color:black;
    }
    .receipt_info{
        border-style:none;
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:12px;
        color:black;
        padding:0px;
        margin-left:0px;
    }
    .service{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:12px;
        color:black;
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
        .en16{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }
        .en14{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }
         .en12{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        label{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:14px;
            color:blue;
        }
        .tblreport th{
            padding:5px;
        }
        .tblreport td{
            padding:5px;
            color:black;
        }
        #tbl_commission_list td{
            padding:3px 5px;
        }
        #tbl_commission_list th{
            padding:5px;
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
        <div class="row" style="margin:20px 0px 0px 10px;">

                <table class="" style="width:100%;overflow:hidden">
                    <tr>
                        <td class="kh22-b" style="width:100%;text-align:center;padding:0px;"><abbr title="">{{ $rpttitle }}</abbr> </td>
                    </tr>
                    <tr>
                        <td class="kh22-b" style="width:100%;text-align:center;padding:0px;">
                            <span class="kh22-b">គិតពី {{ date('d-m-Y',strtotime($d1)) }}</span>
                            <span class="kh22-b">ដល់ {{ date('d-m-Y',strtotime($d2)) }}</span>
                        </td>
                    </tr>

                </table>

        </div>
        <div class="table-responsive" style="margin:10px;">

            <table id="tbl_commission_list" class="table table-bordered table-hover kh14-b tbl_transferlist" style="">
                <thead style="text-align:center;" class="kh14">
                    <th style="width:50px;">No</th>
                    <th style="">Property</th>
                    <th style="width:150px;">អ្នកលក់</th>
                    <th style="width:150px;">អតិថិជន</th>

                    <th style="width:100px;">បង់ខែ</th>
                    <th style="width:100px;">ថ្ងៃកក់</th>
                    <th style="width:120px;">កក់ចំនួន</th>
                    <th style="width:120px;">បង់ជើងសារ</th>
                    <th style="width:120px;">កម្រៃជើងសារ</th>
                    <th style="width:120px;">បានទូទាត់រួច</th>
                    <th style="width:120px;">នៅខ្វះ</th>
                    {{-- <th style="width:120px;">ទឹកប្រាក់លក់</th>
                    <th style="width:120px;">សរុបលុយកក់</th>
                    <th style="width:120px;">ទឹកប្រាក់នៅសល់</th> --}}


                </thead>
                <tbody id="body_transaction">
                    @php
                        $j=0;
                        $total_pay=0;
                        $total_paycom=0;
                        $total_com=0;
                        $total_com_paid=0;
                    @endphp
                    @foreach ($transfers as $key => $t)
                        @php
                            $j+=1;
                            $total_paycom +=floatval($t->getcommission);
                            $total_pay +=floatval($t->deposit_amount);
                            $total_com +=floatval($t->commission);
                            $total_com_paid +=floatval($t->commission_paid);
                        @endphp
                        <tr>
                            <td class="en12" style="text-align:center;" >
                                {{ $j }}
                            </td>

                            <td class="kh12-b">{{ $t->propertyname }}</td>
                            <td class="kh12-b">{{ $t->partner->name }}</td>
                            <td class="kh12-b">{{ $t->customername }}</td>
                            <td class="en12">{{ $t->payformonth?date('d-m-Y',strtotime($t->payformonth)) : '' }}</td>
                            <td class="en12">{{ date('d-m-y',strtotime($t->deposit_date)) }}</td>
                            <td class="en14" style="text-align:right;color:red;">{{ phpformatnumber($t->deposit_amount) . $t->currency->sk}}</td>
                            <td class="en14" style="text-align:right;">{{ phpformatnumber($t->getcommission) }}</td>
                            <td class="en14" style="text-align:right;">{{ phpformatnumber($t->commission) . $t->currency->sk}}</td>
                            <td class="en14"  style="text-align:right;">{{ phpformatnumber($t->commission_paid) . $t->currency->sk}}{{ '(' . $t->countpay_commission . ')'}}</td>
                            <td class="en14" style="text-align:right;">{{ phpformatnumber(abs($t->commission)-abs($t->commission_paid)) . $t->currency->sk}}</td>
                            {{-- <td style="text-align:right;">{{ phpformatnumber(abs($t->sold_amount)) . '$'}}</td>
                            <td class="" style="text-align:right;">
                                <a href="{{ route('realestate.showdeposit',['id'=>$t->main_id,'customer_id'=>$t->main_parrent_id,'customertype'=>$t->main_customertype,'term'=>$t->main_term,'rate'=>$t->main_interest_rate,'startdate'=>$t->main_startdate,'enddate'=>$t->main_enddate,'curid'=>$t->currency_id,'cursk'=>$t->currency->sk,'curname'=>$t->currency->shortcut,'payinmonth'=>$t->main_payinmonth,'sendername'=>$t->propertyname]) }}" class="" target="_blank" style="margin:0px;padding:2px;text-decoration:underline;">{{ phpformatnumber($t->sumdeposit) . $t->currency->sk . '(' . $t->countrow . ')' }}</a>
                            </td>
                            <td style="text-align:right;">{{ phpformatnumber(abs($t->sold_amount)-abs($t->sumdeposit)) . '$' }}</td> --}}



                        </tr>
                    @endforeach
                    <tr>
                        <td colspan=6 class="kh16-b" style="text-align:center;">សរុប</td>
                        <td class="en16" style="text-align:right;">{{ phpformatnumber($total_pay) }}$</td>
                        <td class="en16" style="text-align:right;">{{ phpformatnumber($total_paycom) }}$</td>
                        <td class="en16" style="text-align:right;">{{ phpformatnumber($total_com) }}$</td>
                        <td class="en16" style="text-align:right;">{{ phpformatnumber($total_com_paid) }}$</td>
                        <td class="en16" style="text-align:right;">{{ phpformatnumber($total_com+$total_com_paid) }}$</td>
                    </tr>
                </tbody>

            </table>


        </div>


    </div>

</body>
<script type="text/javascript">

    printContent('invoice-pos');
    function printContent(el)
    {

      //var restorpage=document.body.innerHTML;
      var printloc=document.getElementById(el).innerHTML;
      document.body.innerHTML=printloc;
      window.print();
      window.onafterprint = function(){ window.close()};
      //history.back();
      //document.body.innerTHML=restorpage;

    }
</script>
</html>
