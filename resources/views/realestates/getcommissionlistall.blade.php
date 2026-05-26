@php
    function phpformatnumber($num){
        $dc=0;
        $p=strpos((float)$num,'.');
        if($p>0){
        $fp=substr($num,$p,strlen($num)-$p);
        $dc=strlen((float)$fp)-2;

        }
        return number_format($num,$dc,'.',',');
    }
@endphp

    <div  class="print-title" style="margin-top:-50px;margin-bottom:5px;">
        <span class="kh22-b" id="rpt_title"></span>
        <span class="kh16-b" id="rpt_title1" style="float:right;"></span>
        <br>
    </div>

    <div class="table-responsive" style="height:70vh;overflow-y: auto;">
        <table id="tbl_commission_list" class="table table-bordered table-hover kh14-b tbl_transferlist" style="">
            <thead style="text-align:center;" class="kh14">
                <th data-col="0" class="selected selected_header" style="width:50px;">No</th>
                <th data-col="1" class="" style="width:100px;text-align:left;padding-left:5px;">
                    <input class="form-check-input" type="checkbox" name="ckidall" value="" id="ckidall" />
                    <label class="form-check-label" for="ckidall">ALL</label>
                </th>
                <th data-col="2" class="selected selected_header" style="">
                    <button id="btnsortproperty" class="mybtn kh12-b">Sort A->Z</button>
                </th>
                <th data-col="3" class="" style="">អ្នកលក់</th>
                <th data-col="4" class="selected selected_header" style="">អតិថិជន</th>
                <th data-col="5" class="selected selected_header" style="width:85px;">បង់ខែ</th>
                <th data-col="14" class="selected selected_header" style="width:85px;">ថ្ងៃកក់</th>
                <th data-col="6" class="selected selected_header" style="width:85px;">កក់ចំនួន</th>
                <th data-col="7" class="selected selected_header" style="width:100px;">បង់ជើងសារ</th>
                <th data-col="8" class="selected selected_header" style="width:100px;">កម្រៃជើងសារ</th>
                <th data-col="9" class="selected selected_header" style="width:100px;">បានទូទាត់រួច</th>
                <th data-col="10" class="selected selected_header" style="width:100px;">នៅខ្វះ</th>
                <th data-col="11" class="selected selected_header" style="width:100px;">ទឹកប្រាក់លក់</th>
                <th data-col="12" class="selected selected_header" style="width:120px;">សរុបលុយកក់</th>
                <th data-col="13" class="selected selected_header" style="width:100px;">ទឹកប្រាក់នៅសល់</th>

                <th data-col="15" class="" style="width:100px;">Action</th>

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
                        <td data-col="0" class="selected" style="text-align:center;padding:0px;" >
                            {{ $j }}
                        </td>
                        <td data-col="1">
                            @if($t->over_pay==0 && !$t->ispaytosaler)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="ckid" value="{{ $t->id }}" id="ckid{{ $t->id }}" />
                                    <label class="form-check-label" for="ckid{{ $t->id }}"> {{ $t->id }}</label>
                                </div>
                            @else
                                    {{ $t->id }}
                            @endif
                        </td>
                        <td data-col="2" class="selected">{{ $t->propertyname }}</td>
                        <td data-col="3">{{ $t->partner->name }}</td>
                        <td data-col="4" class="selected">{{ $t->customername }}</td>
                        <td data-col="5" class="selected">{{ $t->payformonth?date('d-m-Y',strtotime($t->payformonth)) : '' }}</td>
                        <td data-col="14" class="selected">{{ date('d-m-Y',strtotime($t->deposit_date)) }}</td>
                        <td data-col="6" class="selected" style="text-align:right;color:red;">{{ phpformatnumber($t->deposit_amount) . $t->currency->sk}}</td>
                        <td data-col="7" class="selected" style="padding:0px;">
                            <input type="text" style="text-align:right;width:100%;height:100%;@if($t->ispaytosaler==1) border-style:none; @else background-color:yellow; @endif" class="kh16-b txtcommission tdcanenter" data-default="{{ phpformatnumber($t->getcommission) }}"  value="{{ phpformatnumber($t->getcommission) }}"  @if($t->ispaytosaler) readonly @endif>
                        </td>
                        <td data-col="8" class="selected" style="text-align:right;">{{ phpformatnumber($t->commission) . $t->currency->sk}}</td>
                        <td data-col="9" class="selected" style="text-align:right;">
                            <a href="{{ route('realestate.showcommissionpaid_detail',['payonid'=>$t->payonid,'customer_id'=>$t->parrent_id,'id'=>$t->id]) }}" class=" " target="_blank" style="margin:0px;padding:2px;text-decoration:underline;"> {{ phpformatnumber($t->commission_paid) . $t->currency->sk}}{{ '(' . $t->countpay_commission . ')'}}</a>
                        </td>
                        <td data-col="10" class="selected" style="text-align:right;background-color:yellow;">{{ phpformatnumber(abs($t->commission)-abs($t->commission_paid)) . $t->currency->sk}}</td>
                        <td data-col="11" class="selected" style="text-align:right;">{{ phpformatnumber(abs($t->sold_amount)) . '$'}}</td>
                        <td data-col="12" class="selected" class="" style="text-align:right;">
                            <a href="{{ route('realestate.showdeposit',['id'=>$t->main_id,'customer_id'=>$t->main_parrent_id,'customertype'=>$t->main_customertype,'term'=>$t->main_term,'rate'=>$t->main_interest_rate,'startdate'=>$t->main_startdate,'enddate'=>$t->main_enddate,'curid'=>$t->currency_id,'cursk'=>$t->currency->sk,'curname'=>$t->currency->shortcut,'payinmonth'=>$t->main_payinmonth,'sendername'=>$t->propertyname]) }}" class="" target="_blank" style="margin:0px;padding:2px;text-decoration:underline;">{{ phpformatnumber($t->sumdeposit) . $t->currency->sk . '(' . $t->countrow . ')' }}</a>
                        </td>
                        <td data-col="13" class="selected" style="text-align:right;">{{ phpformatnumber(abs($t->sold_amount)-abs($t->sumdeposit)) . '$' }}</td>


                        <td data-col="15" style="text-align:center;">
                            <a href="" class="btnupdatecommission" data-id="{{ $t->id }}" style="color:red;">Update</a>
                        </td>
                    </tr>
                @endforeach
                <tr style="background-color:silver">
                    <td data-col="0" class="selected" style="border-style:none;" ></td>
                    <td data-col="1" style="border-style:none;"></td>
                    <td data-col="2" class="selected" style="border-style:none;">សរុបទឹកប្រាក់</td>
                    <td data-col="3" style="border-style:none;"></td>
                    <td data-col="4" class="selected" style="border-style:none;"></td>
                    <td data-col="5" class="selected" style="border-style:none;"></td>
                    <td data-col="14" class="selected" style="border-style:none;"></td>
                    <td data-col="6" class="selected" style="text-align:right;">{{ phpformatnumber($total_pay) }}$</td>
                    <td data-col="7" class="selected" style="text-align:right;">{{ phpformatnumber($total_paycom) }}$</td>
                    <td data-col="8" class="selected" style="text-align:right;">{{ phpformatnumber($total_com) }}$</td>
                    <td data-col="9" class="selected" style="text-align:right;">{{ phpformatnumber($total_com_paid) }}$</td>
                    <td data-col="10" class="selected" style="text-align:right;" >{{ phpformatnumber($total_com+$total_com_paid) }}$</td>
                    <td data-col="11" class="selected" ></td>
                    <td data-col="12" class="selected" class="" style="text-align:right;"></td>
                    <td data-col="13" class="selected" ></td>
                    <td data-col="15" style="text-align:center;"></td>
                </tr>
            </tbody>

        </table>

    </div>




