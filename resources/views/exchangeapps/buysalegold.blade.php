@extends('master')
@section('title')
    ប្តូរប្រាក់
@endsection
@section('css')
    <style type="text/css">
        body.wait,
        body.wait * {
            cursor: wait !important;
        }

        .bankid+.select2 .select2-selection__rendered {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 14px;
        }

        #selpartner+.select2 .select2-selection__rendered {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 14px;
            height: 35px;
        }

        /* Each result */
        #select2-selpartner-results {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 14px;
        }

        /* Search field */
        .select2-search input {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 14px;
        }

        .select2-selection__rendered {
            line-height: 35px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }

        .select2-selection__arrow {
            height: 35px !important;
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

        .kh12-b {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 12px;
            font-weight: bold;
        }

        .kh14-b {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 14px;
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

        .kh32 {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 32px;
        }

        label {
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 14px;
            color: blue;
        }

        .buttonstyle:hover {
            background-color: aqua;
        }

        .buttonstyle {
            border: 1px solid gray;
        }

        .buttonstyle1:hover {
            background-color: yellow;
            color: black;
            border: 1px solid black;
        }

        .buttonstyle1 {
            border-style: none;
            background-color: inherit;
            color: rgb(2, 34, 2);
            padding: 0px 10px;
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 28px;
        }

        .threedtext {
            font-size: 2em;
            font-weight: bold;
            color: #e4f314;
            text-shadow:
                1px 1px 0 black,
                2px 2px 0 black,
                3px 3px 0 black,
                4px 4px 0 black,
                5px 5px 0 black;
        }

        .txtexchange {
            font-weight: bold;
            font-size: 16px;
            text-align: right;
        }

        input.blue {
            color: blue;
        }

        input.red {
            color: red;
        }

        #tableexchange td {
            border-style: none;
        }

        #tablemultiexchange td {
            padding: 5px;
        }

        #tbl_pnl td {
            border-style: none;
            padding: 5px;
        }

        #tblratedisplay .clickedrow td {
            background-color: #d9ee64;
        }

        .tblexchangelist .clickedrow td {
            background-color: #caaf8f;
        }

        .tblexchangelist .clickedrow td input {
            background-color: #caaf8f;
        }

        .tblexchangelist td {
            border: 1px solid black;
            padding: 5px;
        }


        #tblgolddeposit td {
            border-style: none;
            padding: 5px;
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

        .dropdown-menu li>a:hover {
            background-color: rgb(57, 8, 233);
            color: white;
        }

        .dropdown-menu li {
            padding: 0px;
        }

        #tbl_viewmoney th {
            padding: 2px;
        }

        #tbl_viewmoney td {
            padding: 2px;
        }

        #tbl_moneycashin th {
            padding: 2px;
        }

        #tbl_moneycashin td {
            padding: 2px;
            border: 1px solid black;
        }

        #tbl_moneycashout th {
            padding: 2px;
        }

        #tbl_moneycashout td {
            padding: 2px;
            border: 1px solid black;
        }

        .btnshowrate:hover {
            background-color: pink;
        }

        ul.ui-autocomplete {
            z-index: 1100;
            font-family: 'Noto Sans Khmer', sans-serif;
            font-size: 16px;
        }


        #tableexchange td {
            padding: 6px;
            vertical-align: middle;
        }

        .txtexchange {
            height: 38px;
            border-radius: 6px;
        }

        #tableexchange select {
            height: 38px;
        }

        #tableexchange input {
            font-weight: 600;
        }

        #tableexchange textarea {
            border-radius: 6px;
        }

        .buttonstyle {
            padding: 7px 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
            background: #f8f9fa;
            font-weight: 600;
            transition: 0.2s;
        }

        .buttonstyle:hover {
            background: #e9ecef;
            border-color: #999;
        }

        .buttonstyle1 {
            padding: 6px 14px;
            border-radius: 6px;
            border: 1px solid #0d6efd;
            background: #0d6efd;
            color: white;
            font-weight: 600;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card-footer {
            background: #f8f9fa;
            border-top: 1px solid #eee;
        }

        /* .circular--landscape img {
                            width: 70px;
                            height: 70px;
                            border-radius: 50%;
                            object-fit: cover;
                            border: 2px solid #eee;
                        } */

        #txtbuy {
            /* border: 2px solid #2f6fed; */
            font-size: 22px;
        }

        #txtsale {
            /* border: 2px solid #e53935; */
            font-size: 22px;
        }

        #txtrate {
            border: 2px solid green;
            font-size: 22px;
        }

        .card-footer button {
            margin-right: 6px;
        }

        .select-pro {
            width: 120px;
            height: 40px;
            padding: 5px 10px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            background-color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .select-pro:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 3px rgba(13, 110, 253, 0.5);
            outline: none;
        }

        #tblratedisplay {
            border-collapse: separate;
            border-spacing: 8px;
            background: #f5f6fa;
        }

        #tblratedisplay td {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            transition: 0.2s;
        }

        #tblratedisplay td:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }

        .btnshowrate {
            width: 100%;
            height: 65px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            box-shadow: 5px 5px 10px #d1d1d1,
                -5px -5px 10px #ffffff;
            transition: 0.2s;
        }

        .btnshowrate:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .currency-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .currency-cell img {
            width: 55px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .rate-buy {
            font-size: 32px;
            font-weight: bold;
            color: #0d6efd;
        }

        .rate-sale {
            font-size: 32px;
            font-weight: bold;
            color: #dc3545;
        }

        #tblratedisplay thead {
            background: linear-gradient(90deg, #0d6efd, #4b7bec);
            color: white;
        }

        #tblratedisplay th {
            border: none;
            padding: 12px;
            font-size: 20px;
        }
    </style>
@endsection
@php
    function phpformatnumber($num)
    {
        $dc = 0;
        $p = strpos((float) $num, '.');
        if ($p > 0) {
            $fp = substr($num, $p, strlen($num) - $p);
            $dc = strlen((float) $fp) - 2;
        }
        return number_format($num, $dc, '.', ',');
    }
@endphp
@section('content')
    <div class="row" style="margin-top:-20px;">
        <div class="col-lg-6">
            <table id="tblratedisplay" class="table table-bordered table-hover table-striped" style="table-layout: fixed;">
                <thead class="kh22-b" style="text-align:center;">
                    <th style="">រូបិយប័ណ្ណ</th>
                    <th style="width:200px;">ទិញចូល</th>
                    <th style="width:200px;">លក់ចេញ</th>

                </thead>
                <tbody id="body_displayrate">
                    @php
                        $nbuy = '';
                        $nsale = '';
                        $ratebuy = '';
                        $ratesale = '';
                    @endphp
                    @foreach ($curgold as $c1)
                        @php
                            if ($c1->ispandp == 1) {
                                $ssh = explode('-', $c1->shortcut);
                                $nbuy = $ssh[1] . '-' . $ssh[0];
                                $nsale = $ssh[0] . '-' . $ssh[1];
                                $ratebuy = $c1->ratesale;
                                $ratesale = $c1->ratebuy;
                            } else {
                                $nbuy = $c1->shortcut . '-USD';
                                $nsale = 'USD-' . $c1->shortcut;
                                $ratebuy = $c1->ratebuy;
                                $ratesale = $c1->ratesale;
                            }
                        @endphp
                        <tr class="">
                            <td class="kh22-b currency-cell">
                                <img src="{{ config('helper.asset_path') . '/myimages/' . $c1->imgpath }}">
                                <span style="height:60px;position: relative;top:10px;">{{ $c1->curname }} (
                                    {{ $c1->shortcut }} )</span>
                            </td>
                            <td style="text-align:right;color:blue;padding:0px;width:100px;">
                                <button class="btnshowrate" title="{{ $nbuy }}" style="width:100%;height:75px;">
                                    <span class="kh16-b badge bg-secondary"
                                        style="position: relative;top:-5px;color:white;">
                                        {{ $nbuy }}
                                    </span>
                                    <br>
                                    <span class="rate-buy"
                                        style="position: relative;top:-6px;font-weight:bold;font-size:32px;color:blue;">
                                        {{ $ratebuy }}
                                    </span>
                                </button>
                            </td>
                            <td style="text-align:right;color:red;padding:0px;">
                                <button class="btnshowrate" title="{{ $nsale }}" style="width:100%;height:75px;">
                                    <span class="kh16-b badge bg-secondary"
                                        style="position: relative;top:-5px;color:white;">
                                        {{ $nsale }}
                                    </span>
                                    <br>
                                    <span class="rate-sale"
                                        style="position: relative;top:-6px;font-weight:bold;font-size:32px;color:red;">
                                        {{ $ratesale }}
                                    </span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="part1" class="">
                <form id="frmexchange" action="">
                    <div class="card" style="border:1px solid silver;">
                        <div class="card-body" style="padding:0px 25px 0px 25px;">
                            <input id="txtrole" type="hidden" value="{{ Auth::user()->role->name }}">
                            <div class="table-responsive" style="margin-top:5px;overflow-y:hidden;">
                                <table class="table">

                                    <tr style="">
                                        <td class="kh16-b" style="width:40px;padding-top:15px;border-style:none;">
                                            ថ្ងៃទី
                                        </td>
                                        <td style="width:130px;border-style:none;">
                                            <input type="text" name="invdate" id="invdate" class="form-control kh22-b"
                                                style="padding:2px;width:130px;background-color:inherit;border-style:none;"
                                                readonly>
                                        </td>

                                        <td style="padding:0px 0px 0px 20px;text-align:center;border-style:none;">
                                            <div style="">
                                                <button class="buttonstyle1" id="curcur"
                                                    style="">CUR1-CUR2</button>
                                            </div>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <div class="row mb-3" style="margin-top:20px;">

                                <table id="tableexchange" class="kh16-b">


                                    <tr>
                                        <td style="">

                                            <div class="circular--landscape" style="display:inline;">
                                                <img id="imgbuy" style=" width: 100px;" src="" />
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" name="txtsign" id="txtsign" value="+"
                                                class="form-control txtexchange"
                                                style="width:80px;text-align:center;float:right;display:inline;color:blue;"
                                                readonly>
                                        </td>
                                        <td style="">
                                            <input type="text" name="txtbuy" id="txtbuy"
                                                class="form-control txtexchange canenter" style="color:blue;"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                autocomplete="off">
                                        </td>
                                        <td style="width:100px;">
                                            <select name="lblbuy" id="lblbuy" class="select-pro kh22-b"
                                                style="width:120px;height:40px;font-weight:bold;">
                                                <option value=""></option>
                                                @foreach ($allcur as $c)
                                                    <option value="{{ $c->id }}" lomeang="{{ $c->lomeang }}"
                                                        isgold="{{ $c->isgold }}" tuochek="{{ $c->tuochek }}">
                                                        {{ $c->shortcut }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=2><input type="text" value="Rate" id="lblrate"
                                                class="form-control txtexchange"
                                                style="width:80px;text-align:center;float:right;" readonly></td>
                                        <td style=""><input type="text" name="txtrate" id="txtrate"
                                                class="form-control txtexchange canenter" style=""
                                                autocomplete="off"></td>
                                        <td style="width:120px;"><input type="button" id="btnaddlist" value="ADD"
                                                class="buttonstyle txtexchange"
                                                style="width:120px;height:40px;text-align:center;" readonly></td>
                                    </tr>

                                    <tr>
                                        <td>

                                            <div class="circular--landscape" style="display:inline;">
                                                <img id="imgsale" style=" width: 100px;" src="" />
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" id="txtsign1" value="-"
                                                class="form-control txtexchange"
                                                style="width:80px;text-align:center;float:right;display:inline;color:red;"
                                                readonly>
                                        </td>
                                        <td style=""><input type="text" name="txtsale" id="txtsale"
                                                class="form-control txtexchange canenter" style="color:red;"
                                                autocomplete="off"></td>

                                        <td style="width:100px;">
                                            <select name="lblsale" id="lblsale" class="select-pro kh22-b"
                                                style="width:120px;height:40px;font-weight:bold;">
                                                <option value=""></option>
                                                @foreach ($allcur as $c)
                                                    <option value="{{ $c->id }}" lomeang="{{ $c->lomeang }}"
                                                        isgold="{{ $c->isgold }}" tuochek="{{ $c->tuochek }}">
                                                        {{ $c->shortcut }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=2>
                                            <label id="lblcashreceive" for="" style="font-weight:bold;"
                                                class="kh16">ប្រាក់ទទួល</label>
                                        </td>

                                        <td style=""><input type="text" name="txtcashreceive"
                                                id="txtcashreceive" style="font-size:22px;"
                                                class="form-control txtexchange canenter" style=""></td>
                                        <td style="width:100px;">

                                            <select name="lblcashin" id="lblcashin" class="select-pro kh22-b"
                                                style="width:120px;height:40px;font-weight:bold;">
                                                <option value=""></option>
                                                @foreach ($allcur as $c)
                                                    <option value="{{ $c->id }}">{{ $c->shortcut }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=2>
                                            <label id="lblcashreturn" for="" style="font-weight:bold;"
                                                class="kh16">ប្រាក់អាប់</label>
                                        </td>
                                        <td colspan=2>
                                            <textarea class="form-control" style="font-size:22px;" id="txtcashreturn" name="txtcashreturn" rows="2"
                                                style=""></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=2>
                                            ***សំគាល់
                                        </td>
                                        <td colspan=2>
                                            <textarea class="form-control kh16" id="txtdesr" name="txtdesr" rows="2" style=""></textarea>
                                        </td>
                                    </tr>
                                </table>
                                {{-- </div> --}}
                            </div>

                        </div>
                        <div class="card-footer">
                            <button id="btnclear" class="buttonstyle kh14-b">សំអាត</button>

                            {{-- <button class="buttonstyle kh14-b" id="btnhasmoney" style="color:blue;">មានលុយ</button>
                            <button class="buttonstyle kh14-b" id="btnneedmoney" style="color:red;">ត្រូវការលុយ</button> --}}
                            <button class="buttonstyle kh14-b" data-sign='-1' id="btnbankin"
                                style="color:blue;">បាញ់ចូល</button>
                            <button class="buttonstyle kh14-b" data-sign='1' id="btnbankout"
                                style="color:red;">បាញ់ចេញ</button>


                            <div style="float:right">
                                @if (config('helper.exchange_printtest') == 1)
                                    <button class="buttonstyle kh14-b" id="btnprint_test" style="">Print
                                        Test</button>
                                @endif

                                <button id="btnsave" class="buttonstyle kh14-b">រក្សាទុក</button>
                                <button id="btnsaveprint" class="buttonstyle kh14-b">រក្សាទុកព្រីន</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
              <div class="row" id="rowmultiexchange" style="margin:0px;padding:0px;">
                <form id="frmmultiexchange" action="" style="padding:0px;">
                    <div class="card" style="">
                        <div class="card-header" style="height:40px;">
                            <p class="kh16-b">Multi Exchange</p>
                        </div>
                        <div class="card-body" id="tblexchangemultiple" style="padding:0px;">
                            <div class="row" style="">
                                <div class="table-responsive">
                                    <table id="tablemultiexchange" class="table table-bordered">
                                        <thead style="text-align:center;">
                                            <th>No</th>
                                            <th>Buy</th>
                                            <th>Cur</th>
                                            <th style="display:none;">Buyinfo</th>
                                            <th>Rate</th>
                                            <th style="display:none;">Rateinfo</th>
                                            <th>GW</th>
                                            <th>Sale</th>
                                            <th>Cur</th>
                                            <th style="display:none;">Saleinfo</th>
                                            <th style="display:none;">Drate</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody id="multiexlist">
                                            @foreach ($mex as $key => $m)
                                                <tr class="multiexchange">
                                                    <td style="text-align:center;padding-top:5px;">{{ ++$key }}</td>
                                                    <td>
                                                        <input type="text" name="txtbuys[]"
                                                            class="form-control txtbuys"
                                                            style="width:100%;border-style:none;text-align:right;background-color:white;font-weight:bold;"
                                                            readonly value="{{ phpformatnumber($m->buy) }}">
                                                    </td>
                                                    <td style="width:60px;">
                                                        <input type="text" name="txtcurbuys[]"
                                                            class="form-control txtcurbuys"
                                                            style="width:60px;border-style:none;text-align:center;background-color:white;font-weight:bold;"
                                                            readonly value="{{ $m->curbuy }}">
                                                    </td>
                                                    <td style="display:none;">
                                                        <input type="text" name="txtbuyinfoes[]"
                                                            class="form-control txtbuyinfoes"
                                                            style="width:50px;border-style:none;font-weight:bold;" readonly
                                                            value="{{ $m->buyinfo }}">
                                                    </td>
                                                    <td style="width:100px;">
                                                        <input type="text" name="txtrates[]"
                                                            class="form-control txtrates"
                                                            style="width:100px;border-style:none;text-align:center;background-color:white;font-weight:bold;"
                                                            readonly value="{{ floatval($m->rate) }}">
                                                    </td>
                                                    <td style="display:none;">
                                                        <input type="text" name="txtrateinfoes[]"
                                                            class="form-control txtrateinfoes"
                                                            style="width:50px;border-style:none;padding:0px;font-weight:bold;"
                                                            readonly value="{{ $m->rateinfo }}">
                                                    </td>
                                                    <td style="width:70px;">
                                                        <input type="text" name="txtgoldwaters[]"
                                                            class="form-control txtgoldwaters"
                                                            style="width:100%;border-style:none;text-align:right;background-color:white;font-weight:bold;"
                                                            readonly value="{{ phpformatnumber($m->goldwater) }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txtsales[]"
                                                            class="form-control txtsales"
                                                            style="width:100%;border-style:none;text-align:right;background-color:white;font-weight:bold;"
                                                            readonly value="{{ phpformatnumber($m->sale) }}">
                                                    </td>
                                                    <td style="width:60px;">
                                                        <input type="text" name="txtcursales[]"
                                                            class="form-control txtcursales"
                                                            style="width:60px;border-style:none;text-align:center;background-color:white;font-weight:bold;"
                                                            readonly value="{{ $m->cursale }}">
                                                    </td>
                                                    <td style="display:none;">
                                                        <input type="text" name="txtsaleinfoes[]"
                                                            class="form-control txtsaleinfoes"
                                                            style="width:50px;border-style:none;font-weight:bold;"
                                                            value="{{ $m->saleinfo }}">
                                                    </td>
                                                    <td style="display:none;">
                                                        <input type="text" name="txtdrates[]"
                                                            class="form-control txtdrates"
                                                            style="width:50px;border-style:none;padding:5px;font-weight:bold;"
                                                            value="{{ $m->drate }}">
                                                    </td>
                                                    <td style="text-align:center;padding-top:2px;">
                                                        <a data-id="{{ $m->id }}"
                                                            class="btn btn-danger btn-sm btndelmxlist"
                                                            style="" href="">Del</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row" style="margin-top:-20px;">
                                <div class="col-lg-8">
                                    <div class="table-responsive">
                                        <table class="table" id="tbl_in">
                                            <thead class="kh16" style="text-align:center;">
                                                <th style="display:none;">No</th>
                                                <th style="width:33.33%">ប្រាក់ប្តូរ</th>
                                                <th style="display:none;">Amount</th>
                                                <th style="display:none;">Cur</th>
                                                <th style="display:none;">Action</th>
                                                <th style="width:33.33%">ប្រាក់ទទួល</th>
                                                <th style="width:33.33%">ប្រាក់អាប់</th>
                                            </thead>
                                            <tbody>

                                                @php
                                                    $i1 = 0;
                                                @endphp
                                                @foreach ($cashin as $ci)
                                                    @php
                                                        $i1 += 1;
                                                    @endphp
                                                    <tr style="color:blue">
                                                        <td class="no1" style="display:none;">{{ $i1 }}</td>
                                                        <td
                                                            style="font-size:16px;text-align:right;font-weight:bold;border:1px solid black;background-color:gainsboro;">
                                                            {{ phpformatnumber($ci['value']) }} {{ $ci['cur'] }}</td>
                                                        <td class="amt1"
                                                            style="font-size:16px;text-align:right;display:none;">
                                                            {{ phpformatnumber($ci['value']) }} </td>
                                                        <td class="cur1"
                                                            style="font-size:16px;text-align:right;display:none;">
                                                            {{ $ci['cur'] }}</td>
                                                        <td class="action1" style="display:none;"></td>
                                                        <td style="padding:0px;border:1px solid black;">
                                                            <input type="text" class="form-control exmulti_receive_amt tdcanenter"
                                                                style="width:100%;text-align:right;font-size:16px;font-weight:bold;border-style:none;padding-right:5px;">
                                                        </td>
                                                        <td style="border:1px solid black;padding:0px;">
                                                            <input type="text" class="form-control exmulti_return_amt tdcanenter"
                                                                style="width:100%;text-align:right;font-size:16px;font-weight:bold;border-style:none;"
                                                                readonly>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table class="table" id="tbl_out">
                                            <thead class="kh16" style="text-align:center;">
                                                <th style="display:none;">No</th>
                                                <th>ប្រាក់ប្រគល់</th>
                                                <th style="display:none;">Amount</th>
                                                <th style="display:none;">Cur</th>
                                                <th style="display:none;">Action</th>
                                            </thead>
                                            <tbody>

                                                @php
                                                    $i2 = 0;
                                                @endphp
                                                @foreach ($cashout as $co)
                                                    @php
                                                        $i2 += 1;
                                                    @endphp
                                                    <tr style="color:red">
                                                        <td class="no2" style="display:none;">{{ $i2 }}</td>
                                                        <td style="font-size:16px;text-align:right;font-weight:bold;">
                                                            {{ phpformatnumber($co['value']) }} {{ $co['cur'] }}</td>
                                                        <td class="amt2"
                                                            style="font-size:16px;text-align:right;display:none;">
                                                            {{ phpformatnumber($co['value']) }} </td>
                                                        <td class="cur2"
                                                            style="font-size:16px;text-align:right;display:none;">
                                                            {{ $co['cur'] }}</td>
                                                        <td class="action2" style="display:none;"></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="btnclearlist" class="buttonstyle kh14-b">Clear List</button>
                            @if (config('helper.exchange_printtest') == 1)
                                <button id="btnprint_test2" class="buttonstyle kh14-b">Print Test</button>
                            @endif
                            <div style="float:right">
                                <button id="btnsavelist" class="buttonstyle kh14-b">រក្សាទុក</button>
                                <button id="btnsavelistprint" class="buttonstyle kh14-b">រក្សាទុកព្រីន</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <input type="hidden" id="notelist">
                <input type="hidden" id="partnersign" name="partnersign" value="0">
                <div id="divpartnerlist" style="display:none;">
                    <div class="row">
                        <table>
                            <tr style="background-color:silver;">

                                <td style="padding-left:20px;">
                                    <div class="form-check form-check-inline" style="">
                                        <input style="margin-top:5px;" type="radio" class="form-check-input"
                                            id="radio_in" name="optinout" value="-1">
                                        <label style="" class="form-check-label kh16-b"
                                            for="radio_in">បាញ់ចូល(គេខ្វះយើង)</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="">
                                        <input style="margin-top:5px;" type="radio" class="form-check-input"
                                            id="radio_out" name="optinout" value="1">
                                        <label style="color:red;" class="form-check-label kh16-b"
                                            for="radio_out">បាញ់ចេញ(យើងខ្វះគេ)</label>
                                    </div>
                                </td>

                                <td style="padding:0px;">
                                    <span style="float:right;font-size:12px;margin-left:20px;"><button
                                            id="btnclosedivpartnerlist" class="buttonstyle"
                                            style="color:red;">X</button></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <input type="hidden" id="txtsignlist" name="txtsignlist">
                    <input type="hidden" id="ex_no" name="ex_no">
                    <form action="" id="frmtolist">
                        <table id="tbl_pnl" class="table kh14-b">
                            <tr>
                                <td colspan=3 style="text-align:right;">
                                    <input class="form-check-input" style="margin-top:5px;font-size:16px;" type="radio"
                                        name="radcustype" id="radall" value="all">
                                    <label class="form-check-label kh16-b" for="radall">ទាំងអស់</label>
                                    <input class="form-check-input" style="margin-top:5px;font-size:16px;" type="radio"
                                        name="radcustype" id="radpartner" value="PARTNER">
                                    <label class="form-check-label kh16-b" for="radpartner">ដៃគូ</label>
                                    <input class="form-check-input" style="margin-top:5px;font-size:16px;" type="radio"
                                        name="radcustype" id="radbank" value="BANK" checked>
                                    <label class="form-check-label kh16-b" for="radbank">ធនាគា</label>
                                    <input class="form-check-input" style="margin-top:5px;font-size:16px;" type="radio"
                                        name="radcustype" id="radcustomer" value="CUSTOMER">
                                    <label class="form-check-label kh16-b" for="radcustomer">អតិថិជន</label>
                                    <input class="form-check-input" style="margin-top:5px;font-size:16px;" type="radio"
                                        name="radcustype" id="radagent" value="AGENT">
                                    <label class="form-check-label kh16-b" for="radagent">ភ្នាក់ងារ</label>
                                </td>
                            </tr>

                            <tr>
                                <td style="">ជ្រើសរើសដៃគូ</td>
                                <td colspan=2 style="">
                                    <select class=" select2-option kh14-b" name="selpartner" id="selpartner"
                                        style="width:100%;">
                                        <option value=""></option>

                                        @foreach ($partners->where('customertype', 'BANK') as $p)
                                            <option value="{{ $p->id }}" customertype="{{ $p->customertype }}"
                                                agenttype="{{ $p->agent_type_id }}" countrycode="{{ $p->tel }}"
                                                maxtransfer="{{ $p->agenttype->transfer_amount }}"
                                                maxcuscharge="{{ $p->agenttype->customer_fee }}"
                                                maxfee="{{ $p->agenttype->cashdraw_fee }}"
                                                maxtransferfee="{{ $p->agenttype->transfer_fee }}"
                                                userconnect="{{ $p->user_connect }}" thai_list="{{ $p->thai_list }}"
                                                @if (Auth::id() == $p->user_connect) selected @endif>{{ $p->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr style="background-color:bisque;">
                                <td class="kh16-b">សមតុល្យ</td>
                                <td style="padding:0px;" colspan=2>
                                    <input type="text" id="balance1" class="form-control kh16-b"
                                        style="border-style:none;background-color:bisque;;text-align:right;color:red;width:49%;display:inline;"
                                        readonly>
                                    <input type="text" id="balancenext1" class="form-control kh16-b"
                                        style="border-style:none;background-color:bisque;;text-align:right;color:blue;width:50%;display:inline;"
                                        readonly>
                                </td>

                            </tr>
                            <tr id="row_seltranname" style="display:none;">
                                <td style="">ប្រតិបត្តិការណ៏</td>
                                <td colspan=2>
                                    <select class="form-select select2-option kh14-b" name="seltranname" id="seltranname"
                                        style="width:100%;height:35px;">

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td id="tdamtlist">ចំនួនទឹកប្រាក់</td>
                                <td><input id="amtlist" name="amtlist" type="text"
                                        class="form-control kh16-b canenter numbertext" value="0"
                                        style="padding:2px;text-align:right;width:100%;"></td>
                                <td style="width:80px;">
                                    {{-- <input id="txtcur1" type="text" class="form-control kh22" readonly> --}}
                                    <select name="selcurlist" id="selcurlist" class="kh16-b"
                                        style="width:80px;height:30px;">
                                        <option value=""></option>
                                        @foreach ($allcur as $c)
                                            <option value="{{ $c->id }}"
                                                {{ $c->shortcut == 'USD' ? 'selected' : '' }}>
                                                {{ $c->shortcut }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>សេវ៉ា
                                    <span>
                                        <input class="form-check-input" type="checkbox" id="ckwater" name="ckwater"
                                            value="">
                                        <label for="ckwater" class="form-check-label kh14-b">ដកទឹក</label>
                                    </span>
                                </td>
                                <td><input id="cuschargelist" name="cuschargelist" type="text"
                                        class="form-control kh16-b canenter numbertext" value="0"
                                        style="padding:2px;text-align:right;width:100%;"></td>
                                <td style="width:80px;">

                                    <select name="cuschargelistcur" id="cuschargelistcur" class="kh16-b"
                                        style="width:80px;height:30px;">
                                        <option value=""></option>
                                        @foreach ($allcur as $c)
                                            <option value="{{ $c->id }}"
                                                {{ $c->shortcut == 'USD' ? 'selected' : '' }}>
                                                {{ $c->shortcut }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>អោយដៃគូ</td>
                                <td><input id="partnerfeelist" name="partnerfeelist" type="text"
                                        class="form-control kh16-b canenter numbertext" value="0"
                                        style="padding:2px;text-align:right;width:100%;"></td>
                                <td style="width:80px;">

                                    <select name="partnerfeelistcur" id="partnerfeelistcur" class="kh16-b"
                                        style="width:80px;height:30px;">
                                        <option value=""></option>
                                        @foreach ($allcur as $c)
                                            <option value="{{ $c->id }}"
                                                {{ $c->shortcut == 'USD' ? 'selected' : '' }}>
                                                {{ $c->shortcut }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>ទូទាត់សាច់ប្រាក់</td>
                                <td><input id="payincash" name="payincash" type="text" class="form-control kh16-b"
                                        style="padding:2px;text-align:right;" value="0" readonly></td>
                                <td style="width:80px;">
                                    <input id="txtcur2" type="text" class="form-control kh16-b"
                                        style="padding:2px;" readonly value="USD">
                                </td>
                            </tr>
                            <tr>
                                <td>លេខអ្នកទទួល</td>
                                <td colspan=2><input id="txtrecphonelist" name="txtrecphonelist"
                                        placeholder="លេខអ្នកទទួល" type="text" class="form-control kh16-b canenter"
                                        style="padding:2px;"></td>
                            </tr>
                            <tr>
                                <td>ឈ្មោះអ្នកទទួល</td>
                                <td colspan=2><input id="txtrecnamelist" name="txtrecnamelist"
                                        placeholder="ឈ្មោះអ្នកទទួល" type="text" class="form-control kh16-b canenter"
                                        style="padding:2px;"></td>
                            </tr>
                            <tr>
                                <td>លេខអ្នកផ្ញើ</td>
                                <td colspan=2><input id="txtsendphonelist" name="txtsendphonelist"
                                        placeholder="លេខអ្នកផ្ញើ" type="text" class="form-control kh16-b canenter"
                                        style="padding:2px;"></td>
                            </tr>
                            <tr>
                                <td>ឈ្មោះអ្នកផ្ញើ</td>
                                <td colspan=2><input id="txtsendnamelist" name="txtsendnamelist"
                                        placeholder="ឈ្មោះអ្នកផ្ញើ" type="text" class="form-control kh16-b canenter"
                                        style="padding:2px;"></td>
                            </tr>
                            <tr>
                                <td colspan=3 style="padding:20px 0px 0px 0px;">
                                    {{-- <button id="btnbankpayment" class="btn btn-info">Bank Payment</button> --}}
                                    <button id="btnaddtolist" class="buttonstyle kh14-b">ADD TO LIST</button>
                                    <button id="btncleartablelist" class="buttonstyle kh14-b" style="float:right;">CLEAR
                                        LIST</button>
                                </td>
                            </tr>
                        </table>
                    </form>


                </div>
                <div class="row">
                    <form action="" id="frmpartnerlist">
                        <div id="divfrmpartnerlist" style="display:none">
                            <div class="card">
                                <div class="card-header" style="">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h3 class="kh16-b" id="pnl">Partner List</h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <span style="float:right;font-size:12px;margin-right:-5px;"><button
                                                    id="btnclosefrmpartnerlist" class="buttonstyle"
                                                    style="color:red;font-weight:bold;">X</button></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tbl_partnerlist" class="table table-bordered">
                                            <thead style="text-align:center;">
                                                <th>No</th>
                                                <th style="display:none;">ID</th>
                                                <th>Act</th>
                                                <th>Partner Name</th>
                                                <th>Amount</th>
                                                <th>Cur</th>
                                                <th>Cuscharge</th>
                                                <th>Cur</th>
                                                <th>Fee</th>
                                                <th>Cur</th>
                                                <th>TotalCash</th>
                                                <th>Cur</th>
                                                <th>RecTel</th>
                                                <th>RecName</th>
                                                <th>SendTel</th>
                                                <th>SendName</th>
                                                <th>Transign</th>
                                                <th>Useraffect</th>
                                                <th>Exno</th>
                                                <th>ThaiList</th>

                                            </thead>
                                            <tbody id="body_partnerlist">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div style="float:right">
                                        <button id="btnsavepartnerlist" class="buttonstyle kh14-b">Save</button>
                                        <button id="btnsavepartnerlistprint" class="buttonstyle kh14-b">Save
                                            Print</button>
                                        <button id="btnsavepartnerlist2" class="buttonstyle kh14-b">រក្សាទុក</button>
                                        <button id="btnsavepartnerlistprint2"
                                            class="buttonstyle kh14-b">រក្សាទុកព្រីន</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <form action="" id="frmbankpayment">
                        <input type="hidden" id="hasbankpayment" name="hasbankpayment" value='0'>
                        <input type="hidden" id="banksign" name="banksign" value="1">
                        <input type="hidden" id="haspartnerlist" name="haspartnerlist" value='0'>
                        <div id="divbankpayment" style="display:none">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h3 class="kh22-b" id="bpm">Bank Payment</h3>
                                        </div>
                                        <div class="col-lg-6">
                                            <span style="float:right;font-size:22px;margin-left:20px;"><button
                                                    id="btnclosedivbankpayment"
                                                    class="btn btn-danger btn-md">X</button></span>
                                            <button id="btnaddrow" class="btn btn-info btn-md" style="float:right;">add
                                                row</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tbl_bankpayment" class="table table-bordered">
                                            <thead style="text-align:center;">
                                                <th style="display:none;">No</th>
                                                <th>Bank ID</th>
                                                <th style="display:none;">Bank Name</th>
                                                <th>Amount</th>
                                                <th>Cur</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody id="body_bankpayment">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="rowexchangelist" class="row">
                <table>
                    <tr>
                        <td style="">
                            <label class="form-check-label kh16-b">
                                <input class="form-check-input kh16-b" type="checkbox" name="ckinputdate"
                                    id="ckinputdate"> ថ្ងៃកត់ត្រា</label>
                            <select name="filteruser" id="filteruser" style="height:35px;" class="kh16-b">
                                <option value="" {{ Auth::user()->role->name != 'Admin' ? 'disabled' : '' }}>All
                                    Users
                                </option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}" {{ Auth::id() == $u->id ? 'selected' : '' }}
                                        @if (Auth::user()->role->name != 'Admin' && Auth::id() != $u->id) disabled @endif>{{ $u->name }}</option>
                                @endforeach
                            </select>
                            <button id="btnshow" class="buttonstyle kh16-b" style="padding:5px 10px;">Show</button>

                        </td>
                        <td style="padding:0px;border-style:none;">
                            <input type="text" class="form-control kh16" id="tableSearch" style="width:100%;"
                                placeholder="Search here ..." title="Type what you khnow">
                        </td>
                    </tr>
                </table>
                <div class="tableFixHead" style="padding:0px;margin:10px 0px;">
                    <table id="tblexchangelist" class="table table-bordered table-hover tblexchangelist kh16-b"
                        style="table-layout:fixed;margin:0px;">
                        <thead style="text-align:center;">
                            <th style="width:70px;">No</th>
                            <th style="width:120px;">Date</th>
                            <th style="width:100px;">Time</th>
                            <th style="width:120px;">Product</th>
                            <th style="width:150px;">Amount</th>
                            <th style="width:150px;">Rate</th>

                            <th style="width:150px;">Recordby</th>
                            <th style="width:120px;">Date</th>
                            <th style="width:150px;">Group</th>
                            <th style="width:300px;">Note</th>

                        </thead>
                        <tbody id="bodyexchangelist">
                            @php
                                $dd = '';
                                $created_at = '';
                            @endphp
                            @foreach ($exchangelists as $key => $e)
                                @php
                                    $dd = date('Y-m-d', strtotime($e->dd));
                                    $created_at = date('Y-m-d', strtotime($e->created_at));
                                @endphp
                                <tr id="tr_object_id_{{ $e->mapcode }}">
                                    <td style="text-align:center;padding:5px 0px 0px 0px;">
                                        <div class="dropdown">
                                            <button
                                                style="width:70px; border:none; outline:none; box-shadow:none; background:none; padding:0px;"
                                                type="button" class="dropdown-toggle kh16-b" data-bs-toggle="dropdown">
                                                {{ ++$key }}
                                            </button>

                                            <ul class="dropdown-menu" style="padding:0px;">
                                                @if ($e->status == 1)
                                                    @if ($e->isexchangelist == 0)
                                                        @if (str_contains($e->action, 'd'))
                                                            <li><a data-id="{{ $e->id }}"
                                                                    class="btndel dropdown-item kh16-b"
                                                                    href="">Delete</a></li>
                                                        @endif
                                                        <li><a data-id="{{ $e->id }}"
                                                                class="btnprint dropdown-item kh16-b"
                                                                href="">Print</a></li>
                                                    @endif
                                                @else
                                                    <li class="dropdown-item disabled">{{ $e->userdel }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                    <td
                                        style="@if ($dd != $created_at) background-color:brown;color:white; @endif">
                                        {{ date('d-m-Y', strtotime($e->dd)) }}</td>
                                    <td style="">{{ $e->tt }}</td>


                                    <td
                                        style="text-align:right;@if ($e->product > 0) color:blue; @else color:red; @endif">
                                        {{ phpformatnumber($e->product) . ' ' . $e->pcur }}</td>
                                    <td
                                        style="text-align:right;@if ($e->product > 0) color:red; @else color:blue; @endif">
                                        {{ phpformatnumber($e->amount) . ' ' . $e->maincur }}</td>
                                    <td
                                        style="text-align:right;{{ $e->rate != $e->drate ? 'background-color:yellow;' : '' }}">
                                        {{ $e->rate != $e->drate ? floatval($e->rate) . '(' . floatval($e->drate) . ')' : floatval($e->rate) }}
                                    </td>

                                    <td style="">{{ $e->user->name }}</td>
                                    <td
                                        style="@if ($dd != $created_at) background-color:brown;color:white; @endif">
                                        {{ date('d-m-Y', strtotime($e->created_at)) }}</td>
                                    <td style="text-align:center;">{{ $e->ref_group_id }}</td>
                                    <td style="text-align:center;">{{ $e->note }}</td>
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
    @include('exchanges.exchangegoldScript');
@endsection
