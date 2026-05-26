@extends('master')
@section('title') Set Gold Rate @endsection
@section('css')
    <style type="text/css">
           body.wait *{
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
        .kh22-b{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:22px;
            font-weight:bold;
            }
        .kh22{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:22px;

            }
            .kh20{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:20px;
            }
            .kh20-b{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:20px;
            font-weight:bold;
            }
        label{
            font-family:'Noto Sans Khmer', sans-serif;
            font-size:14px;
            color:blue;
        }

    .circular--landscape { display: inline-block; position: relative; width: 100px; height: 100px; overflow: hidden; border-radius: 50%;background-color:rgb(180, 199, 216);border-style:solid solid solid solid;}
    .circular--landscape-img { width: auto; height: 100%; margin-left: -50px; }
    td.input{
        padding:0px;
    }
    input.inp{
        border-style:none;

    }
    input{
        padding:0px;
    }
    .ratetable td{
        padding:0px;
        border:1px solid black;
    }
    .ratetable tr{
        border:1px solid black;
    }
    </style>
@endsection
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
@section('content')
<div class="row" style="margin-bottom:10px;">
    <div class="col-lg-12">
        <table class="">
            <tr>
                <td style="text-align:right;">
                    <label for="date" class="kh22">កាលបរិច្ឆេទ</label>
                </td>
                <td style="width:250px;">


                        <div class="form-group">

                            <div class="input-group" style="">
                                <input type="text" name="setdate" id="setdate" class="form-control" style="font-size:22px;">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                            </div>
                        </div>

                </td>
                <td style="padding-left:20px;">
                    <button type="button" id="btnsetrate" class="btn btn-primary">Save Rate</button>
                </td>


            </tr>
        </table>
    </div>
</div>

@php
    $index=0;
@endphp
<div class="row">
    <form action="" id="frmsetrate">
        <div id="maincol" class="row" style="">
            <div id="divcol1" class="col-lg-4" style="margin-left:0px;">

                    <div class="table-responsive">
                        <table id="curleft" class="table table-bordered kh22 ratetable">
                            <thead class="table-dark kh16" style="text-align:center;">
                                <tr>
                                    <th style="display:none;">index</th>
                                    <th scope="col">No</th>
                                    <th scope="col" style="display:none;">ID</th>
                                    <th scope="col">Currency</th>
                                    <th scope="col" style="display:none;">Short Cut</th>
                                    <th scope="col" style="display:none;">IsP&P</th>
                                    <th scope="col" style="display:none;">Sign</th>
                                    <th scope="col" style="display:none;">isGold</th>
                                    <th scope="col">Buy</th>
                                    <th scope="col">Sale</th>
                                    <th scope="col" style="display:none;">Ratio</th>
                                    <th scope="col" style="display:none;">RateBuy</th>
                                    <th scope="col" style="display:none;">RateSale</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($curgold as $key => $c1)
                                    @php
                                        $index+=1;
                                    @endphp
                                    <tr>
                                        <td style="display:none;">{{ $index }}</td>
                                        <td style="text-align:center;padding:8px 0px 0px 0px;width:50px;">{{ ++$key }}</td>

                                        <td class="input" style="display:none;">
                                            <input name="curid[]" type="text" class="form-control curid canenter kh22" style="width:80px;" value="{{ $c1->id }}" readonly>
                                        </td>
                                        <td style="text-align:center; @if($c1->shortcut=='KHR-THB' || $c1->shortcut=='THB-KHR' || $c1->shortcut=='KHR-VND' || $c1->shortcut=='VND-KHR') padding:10px 0px 0px 0px; @else padding:0px; @endif">
                                            {{ $c1->curname }} <br> {{ $c1->shortcut }}
                                        </td>
                                        <td class="input" style="display:none;">
                                            <input name="shortcut[]" type="text" style="width:60px;" class="form-control shortcut canenter kh22" value="{{ $c1->shortcut }}" readonly>
                                        </td>
                                        <td class="input" style="display:none;">
                                            <input name="ispandp[]" type="text" style="width:60px;" class="form-control ispandp canenter kh22" value="{{ $c1->ispandp }}" readonly>
                                        </td>
                                        <td class="input" style="display:none;">
                                            <input name="optsign[]" type="text" style="width:60px;" class="form-control optsign canenter kh22" value="{{ $c1->optsign }}" readonly>
                                        </td>
                                        <td class="input" style="display:none;">
                                            <input name="isgold[]" type="text" style="width:60px;" class="form-control isgold canenter kh22" value="{{ $c1->isgold }}" readonly>
                                        </td>

                                        <td class="input" style="text-align:center;padding:10px;">
                                             @if(config('helper.set_rate_pandp_mode') == '1')
                                                @if($c1->shortcut=='KHR-THB')
                                                    <span style="color:red;font-weight:bold;">THB-KHR</span>
                                                @elseif($c1->shortcut=='THB-KHR')
                                                    <span style="color:red;font-weight:bold;">KHR-THB</span>
                                                @elseif($c1->shortcut=='KHR-VND')
                                                    <span style="color:red;font-weight:bold;">VND-KHR</span>
                                                @elseif($c1->shortcut=='VND-KHR')
                                                    <span style="color:red;font-weight:bold;">KHR-VND</span>
                                                @else
                                                    @if(config('helper.isphnompenhrate') == '0')
                                                        <span style="color:red;font-weight:bold;">{{ $c1->shortcut }}-USD</span>
                                                     @endif
                                                @endif
                                             @else
                                                 @if($c1->shortcut=='KHR-THB')
                                                    <span style="color:blue;">KHR-THB</span>
                                                @elseif($c1->shortcut=='THB-KHR')
                                                    <span style="color:blue;">THB-KHR</span>
                                                @elseif($c1->shortcut=='KHR-VND')
                                                    <span style="color:blue;">KHR-VND</span>
                                                @elseif($c1->shortcut=='VND-KHR')
                                                    <span style="color:blue;">VND-KHR</span>
                                                @else
                                                    @if(config('helper.isphnompenhrate') == '0')
                                                        <span style="color:blue;font-weight:bold;">{{ $c1->shortcut }}-USD</span>
                                                     @endif
                                                @endif

                                             @endif
                                            @if($c1->ispandp)
                                                @if(config('helper.set_rate_pandp_mode') == '1')
                                                    <input name="sale[]" type="text" style="text-align:right;padding-left:0px;" class="form-control sale canenter kh22" title="{{ $c1->decpoint }}" value="{{ phpformatnumber($c1->sale) }}">
                                                @else
                                                    <input name="buy[]" type="text" style="text-align:right;padding-left:0px;" class="form-control buy canenter kh22" title="{{ $c1->decpoint }}" value="{{ phpformatnumber($c1->buy) }}">
                                                @endif
                                            @else
                                                <input name="buy[]" type="text" style="text-align:right;padding-left:0px;" class="form-control buy canenter kh22" title="{{ $c1->decpoint }}" value="{{ phpformatnumber($c1->buy) }}">
                                            @endif
                                        </td>
                                        <td class="input" style="text-align:center;padding:10px;">
                                            @if(config('helper.set_rate_pandp_mode') == '1')
                                                @if($c1->shortcut=='KHR-THB')
                                                    <span style="color:blue;font-weight:bold;">KHR-THB</span>
                                                @elseif($c1->shortcut=='THB-KHR')
                                                    <span style="color:blue;font-weight:bold;">THB-KHR</span>
                                                @elseif($c1->shortcut=='KHR-VND')
                                                    <span style="color:blue;font-weight:bold;">KHR-VND</span>
                                                @elseif($c1->shortcut=='VND-KHR')
                                                    <span style="color:blue;font-weight:bold;">VND-KHR</span>
                                                @else
                                                    @if(config('helper.isphnompenhrate') == '0')
                                                        <span style="color:blue;font-weight:bold;">USD-{{ $c1->shortcut }}</span>
                                                     @endif
                                                @endif
                                             @else
                                                @if($c1->shortcut=='KHR-THB')
                                                    <span style="color:red;">THB-KHR</span>
                                                @elseif($c1->shortcut=='THB-KHR')
                                                    <span style="color:red;">KHR-THB</span>
                                                @elseif($c1->shortcut=='KHR-VND')
                                                    <span style="color:red;">VND-KHR</span>
                                                @elseif($c1->shortcut=='VND-KHR')
                                                    <span style="color:red;">KHR-VND</span>
                                                @else
                                                    @if(config('helper.isphnompenhrate') == '0')
                                                        <span style="color:red;font-weight:bold;">USD-{{ $c1->shortcut }}</span>
                                                     @endif
                                                @endif

                                             @endif
                                            @if($c1->ispandp)
                                                @if(config('helper.set_rate_pandp_mode') == '1')
                                                    <input name="buy[]" type="text" style="text-align:right;padding-left:0px;" class="form-control buy canenter kh22" title="{{ $c1->decpoint }}" value="{{ phpformatnumber($c1->buy) }}">
                                                @else
                                                    <input name="sale[]" type="text" style="text-align:right;padding-left:0px;" class="form-control sale canenter kh22" title="{{ $c1->decpoint }}" value="{{ phpformatnumber($c1->sale) }}">
                                                @endif
                                            @else
                                                <input name="sale[]" type="text" style="text-align:right;padding-left:0px;" class="form-control sale canenter kh22" title="{{ $c1->decpoint }}" value="{{ phpformatnumber($c1->sale) }}">
                                            @endif
                                        </td>
                                        <td class="input" style="display:none;">
                                            <input name="ratio[]" style="width:120px;text-align:center;" type="text" class="form-control ratio canenter kh22" value="{{ $c1->ratio }}" readonly>
                                        </td>
                                        <td class="input" style="display:none;">
                                            <input name="ratebuy[]" type="text" style="text-align:right;" class="form-control ratebuy canenter kh22" value="{{ phpformatnumber($c1->ratebuy) }}" readonly>
                                        </td>
                                        <td class="input" style="display:none;">
                                            <input name="ratesale[]" type="text" style="text-align:right;" class="form-control ratesale canenter kh22" value="{{ phpformatnumber($c1->ratesale) }}" readonly>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

            </div>

        </div>
    </form>

</div>





@endsection
@section('script')

<script src="{{ config('helper.asset_path') }}/js/numberinput.js"></script>
<script type="text/javascript">
     $('#h1_title').text('កំណត់ហាងឆេងមាស');
//if other user is open exchange rate form also
     var ably = new Ably.Realtime('DF1ung.N3Jwqw:30ezVuIjqesSJZRbGMoD8NsqtIij6_uqR6soVWetP0Q'); //remember to pass your ably API key
            var channel = ably.channels.get('exchange_rates'); // here i create a channel or initialize the existing channel
            channel.subscribe('messageEvent', function(message) { // message this is message from channel
                // Handle incoming messages (create a message body div tag)
                console.log(message)
                const username = "{{ Auth::user()->name }}"; // Server renders this per user
                const sender   = message.data.sender; // 👈 this is what you want
                if (username !== sender) {
                    location.reload();
                } else {
                    console.log("Skip reload because sender is me");
                }
            });
    $(document).ready(function(){
        var today=new Date();
        $('#setdate').datetimepicker({
                timepicker:false,
                datepicker:true,
                value:today,
                format:'d-m-Y',
                autoclose:true,
                todayBtn:true,
                startDate:today,

            });

        $('.buy').toArray().forEach(function(field){
            new Cleave(field, {
                numeral: true,
                numeralDecimalScale: 6,
                numeralThousandsGroupStyle: 'thousand'
            });
        })
        $('.sale').toArray().forEach(function(field){
            new Cleave(field, {
                numeral: true,
                numeralDecimalScale: 6,
                numeralThousandsGroupStyle: 'thousand'
            });
        })

        $(document).keydown(function (event) {
           if(event.keyCode==13){
            setrate(sendMessage);
           }
        })

        $(document).on('keyup','.buy,.sale',function(e){
            e.preventDefault();

            var $row = $(this).closest('tr'); // Get the row where the event was triggered
            var $table = $row.closest('table'); // Identify the parent table
            var rowind = $(this).closest('tr').index();

            var operator=$table.find('.optsign').eq(rowind).val();
            var ratio=$table.find('.ratio').eq(rowind).val().replace(/,/g,'');
            var buy = $table.find('.buy').eq(rowind).val().replace(/,/g, '');
            var sale=$table.find('.sale').eq(rowind).val().replace(/,/g,'');
            var ratebuy=0;
            var ratesale=0;
            var shortcut=$table.find('.shortcut').eq(rowind).val();

            ratebuy=buy/ratio;
            ratesale=sale/ratio;
            var khrbuy=0;
            var khrsale=0;
            var thbbuy=0;
            var thbsale=0;
            var vndbuy=0;
            var vndsale=0;
            $table.find('.ratebuy').eq(rowind).val(ratebuy);
            $table.find('.ratesale').eq(rowind).val(ratesale);
        })


        function setrate(callably){
            $('body').addClass("wait");
            var formdata = new FormData(frmsetrate);
            var url="{{ route('currency.setrate') }}";
            $.ajax({
                    async: true,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    url: url,
                    data: formdata,
                    success: function (data) {
                       console.log(data)
                       if($.isEmptyObject(data.error)){

                         if(data.type==1){
                             toastr.success(data.message);
                         }else{
                             toastr.info(data.message);
                         }
                         callably();
                           $('body').removeClass("wait");

                       }else{
                            alert(data.error)
                       }


                    },
                    error: function () {
                        alert('Save Error')

                    }

                })
        }

		$(document).on('click','#btnsetrate',function(e){
            e.preventDefault();
            setrate(sendMessage);

        })
        async function sendMessage() {
            var ably = new Ably.Realtime('DF1ung.N3Jwqw:30ezVuIjqesSJZRbGMoD8NsqtIij6_uqR6soVWetP0Q'); //remember to pass your ably API key
            //var channel = ably.channels.get('chatting'); // here i create a channel or initialize the existing channel
            var channel = ably.channels.get('exchange_rates'); // here i create a channel or initialize the existing channel

            var message ='refresh rate'; //get the message from input
            var name = 'exchange'; //get the sender name from input
            var sender = "{{ Auth::user()->name }}";
            var customername="{{ config('helper.transfer_option') }}";
            if (message !== '') { //if input message is not empty publish a message
                // Publish the message to the chat channel
                channel.publish('messageEvent', { name: name, text: message, sender: sender,customername:customername });
            }
        }

    })
</script>
@endsection
