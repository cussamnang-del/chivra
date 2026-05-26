<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=0.55, maximum-scale=1, user-scalable=no">
    {{-- <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no"> --}}
    <title>Gold Rate Bar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@300;400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<style>
    body {
        margin: 0;
        /* background: #3f4147; */

        font-family: 'Noto Sans Khmer', sans-serif;
        color: #d4af37;
    }



    /* ===== HEADER ===== */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 3px solid #d4af37;
        padding-bottom: 15px;
    }

    .left-header {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .logo img {
        width: 80px;
    }

    .shop-info {
        display: flex;
        flex-direction: column;
    }

    .shop-name {
        font-size: 32px;
        font-weight: 700;
        font-family:"khmer os muol light";
    }

    .social {
        margin-top: 6px;
        font-size:20px;
        font-weight:bold;
    }

    .social i {
        margin-right: 6px;
    }

    .social a {
        color: #d4af37;
        text-decoration: none;
        margin-right: 15px;
    }

    .right-header {
        text-align: left;
        font-size: 16px;
        padding-top:50px;
    }

    .right-header i {
        margin-right: 6px;
    }

    .phone {
        margin-bottom: 0px;
        font-size:20px;
        font-weight:bold;
    }

    /* ===== TITLE ===== */
    .title {
        text-align: center;
        font-size: 32px;
        font-weight: 700;
        margin: 25px 0;
    }
      .container {
        margin:5px 10px;
        width: 780px;
        padding: 25px;
        background:#3f4147;
    }
    /* ===== TABLE ===== */
    .tb1 {
        width: 100%;
        border-collapse: collapse;
        /* background: #44464d; */
        background-color:#3f4147;
    }

    .tb1 th,.tb1 td {
        border: 2px solid #d4af37;
        padding: 18px 5px;
        /* font-size: 22px; */
        text-align: center;
    }

    th {
        font-size: 24px;
    }

    .left-col {
        text-align: left;
        padding-left: 25px;
        font-weight: 600;
    }

    .price {
        font-size: 28px;
        font-weight: bold;
    }
    /* .title-row {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 25px 0;
    } */

    /* .title {
        font-size: 32px;
        font-weight: 700;
        text-align: center;
    }

    .title-date {
        position: absolute;
        right: 0;
        font-size: 18px;
    } */


.title {
    text-align: center;
    font-size: 36px;
    font-weight: 700;
    font-family: "khmer os muol light";
}
.title-row {
    margin: 0px;
}
.title-date {
    position: relative;
    top:-25px;
    text-align: right;
    font-size: 22px;
    margin-top: 0px;
    font-family: Arial, Helvetica, sans-serif;
    font-weight:bold;
}
    .rate-arrow1 {
            font-size: 36px;   /* make it big */
            font-weight: bold;  /* super bold */
            line-height: 1;
            vertical-align: middle;
        }

    .card-3d {
        background:#3f4147;
        border-radius: 0px;
        transform-style: preserve-3d;
        box-shadow:
            0 6px 12px rgba(0,0,0,0.25),
            0 16px 32px rgba(0,0,0,0.2),
            inset 0 1px 0 rgba(255,255,255,0.6);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    /* .card-3d:hover {
        transform: translateY(-6px) rotateX(4deg) rotateY(-3deg);
        box-shadow:
            0 12px 24px rgba(0,0,0,0.35),
            0 28px 56px rgba(0,0,0,0.3);
    }

    .card-3d table {
        background: transparent;
    } */

    .three-d-text {
        text-shadow:
            1px 1px 0 #b8860b,
            2px 2px 0 #a97c05,
            3px 3px 0 #8b6508,
            4px 4px 6px rgba(0,0,0,0.4);
    }
     .three-d-text1 {
        text-shadow:
            1px 1px 0 black,
            2px 2px 0 black,
            3px 3px 0 black,
            4px 4px 6px gold;
    }
    .rate-arrow {
        font-size: 26px;
        font-weight: 900;
        margin-left: 6px;
        display: inline-block;
        transform: scale(2, 1); /* widen → looks thicker */
        line-height: 1;
        vertical-align: middle;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.35);
    }
     .fat-arrow {
        font-size: 36px;          /* BIG */
        font-weight: 900;         /* FAT */
        display: inline-block;
        transform: scale(1.3, 1); /* widen → looks thicker */
        line-height: 1;
        vertical-align: middle;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.35);
    }
    .ex_rate{
        font-family:Arial, Helvetica, sans-serif;
        font-size:36px;
        text-align:right;
        font-weight:bold;
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
    .kh36-b{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:36px;
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
        .kh28-b{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:28px;
        font-weight:bold;
        }
        .kh36{
        font-family:'Noto Sans Khmer', sans-serif;
        font-size:36px;

        }
        .rate-cell {
            position: relative;
            height: 90px;          /* control cell height */
            vertical-align: bottom;
            padding-bottom: 10px;  /* move number near bottom border */
        }

        .rate-value {
            font-size: 42px;       /* your big number */
            font-weight: bold;
        }

        .trendamount {
            position: absolute;
            top: 4px;
            right: 6px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>

<body>
    <div class="row">
        <div class="col-lg-5">
            <div class="container card-3d">
                <!-- HEADER -->
                <div class="header">

                    <div class="left-header">

                        <div class="logo">
                            <img src="{{ config('helper.asset_path'). '/logo/lpkgold.png'  }}" alt="Logo">
                        </div>

                        <div class="shop-info">
                            <div class="shop-name three-d-text">
                                {{ $company->name }} លក់មាស
                            </div>

                            <div class="social">
                                <a href="#"><i class="fab fa-facebook"></i> {{ $company->facebook??'Facebook' }}</a><br>
                                <a href="#"><i class="fab fa-telegram"></i> {{ $company->telegram??'Telegram' }}</a>
                            </div>
                        </div>

                    </div>

                    <div class="right-header">
                        <div class="phone">
                            @if($company->tel1)
                                <i class="fas fa-phone"></i> {{ $company->tel1??'' }}
                            @endif
                        </div>
                        <div class="phone">
                            @if($company->tel2)
                                <i class="fas fa-phone"></i> {{ $company->tel2??'' }}
                            @endif
                        </div>
                        <div class="phone">
                            @if($company->tel3)
                                <i class="fas fa-phone"></i> {{ $company->tel3??'' }}
                            @endif
                        </div>
                    </div>

                </div>
                    <!-- TITLE ROW -->
                <div class="title-row">
                    <div class="title">ហាងឆេងមាស</div>

                    <div class="title-date">
                        <span class="kh22-b">សំរាប់ថ្ងៃទី</span>
                        {{ date('d-m-Y', strtotime($latestUpdatedAt)) }}
                        <span class="kh22-b">ម៉ោង</span>
                        {{ date('H:i:s', strtotime($latestUpdatedAt)) }}
                    </div>
                </div>
                <!-- TABLE -->
                <table class="tb1">
                    <thead>
                        <tr style="font-family: khmer os muol light;">
                            <th>ប្រភេទមាស</th>
                            <th>ទិញចូល</th>
                            <th>លក់ចេញ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($summaryRates as $row)
                            <tr>
                                <td class="kh36-b" style="text-align:left;padding-left:20px;">

                                    <strong>{{ $row['curname'] }}</strong>

                                </td>

                                {{-- <td class="ex_rate" style="text-align:right;">
                                    {{ number_format($row['last_buy']) }} USD
                                </td>
                                <td class="ex_rate" style="text-align:right;">
                                    {{ number_format($row['last_sale']) }} USD
                                </td> --}}
                                   <td class="ex_rate rate-cell " style="color:gold;">

                                        <div class="rate-value three-d-text1">
                                            {{ number_format($row['last_buy']) }}
                                        </div>
                                        @if($row['buy_trend'] === 'up')
                                            {{-- <span class="rate-arrow" style="color:gold;">↑</span> --}}
                                            <span class="trendamount badge bg-success" style="color:white;">+{{ number_format($row['last_buy']-$row['prev_buy']) }}</span>
                                        @elseif($row['buy_trend'] === 'down')
                                            {{-- <span class="rate-arrow" style="color:gold;">↓</span> --}}
                                            <span class="trendamount badge bg-danger" style="color:white;">{{ number_format($row['last_buy']-$row['prev_buy']) }}</span>
                                        @else
                                             <span class="trendamount badge bg-primary" style="color:white;">+0</span>
                                        @endif
                                    </td>

                                    <td class="ex_rate rate-cell " style="color:gold;">
                                        <div class="rate-value three-d-text1">
                                            {{ number_format($row['last_sale']) }}
                                        </div>

                                        @if($row['sale_trend'] === 'up')
                                            {{-- <span class="rate-arrow" style="color:gold;">↑</span> --}}
                                            <span class="trendamount badge bg-success" style="color:white;">+{{ number_format($row['last_sale']-$row['prev_sale']) }}</span>
                                        @elseif($row['sale_trend'] === 'down')
                                            {{-- <span class="rate-arrow " style="color:gold;">↓</span> --}}
                                            <span class="trendamount badge bg-danger" style="color:white;">{{ number_format($row['last_sale']-$row['prev_sale']) }}</span>
                                        @else
                                            <span class="trendamount badge bg-primary" style="color:white;">+0</span>
                                        @endif
                                    </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <br>
                <div class="footer" style="font-size:20px;">
                     <table class="table" style="margin-top:-30px;margin-left:-15px;">
                                    <tr style="color:gold;">
                                        <td style="padding-top:10px;padding-left:5px;border-style:none;">
                                            <i class="fas fa-home"></i>&nbsp; អាស័យដ្ឋាន:៖
                                            <span style="">{{ $company->address }}</span> <br>
                                            <span class="" style="display: flex;line-height:1.5;">
                                            <i class="fa-regular fa-clock" style="margin-top:5px;"></i>&nbsp; {{ $company->timework }}
                                            </span>
                                            <span class="" style="display: flex;line-height:1.5;">
                                                {{-- <i class="fa-duotone fa-solid fa-circle-info" style="margin-top:5px;"></i>&nbsp; {{ $company->note_text??' ចំណាំ៖អត្រាប្តូរប្រាក់ខាងលើនិងមានការផ្លាស់ប្តូរដោយពុំចាំបាច់ផ្តល់ដំណឹងជូនមុន។' }} --}}
                                                <i class="fa-duotone fa-solid fa-circle-info" style="margin-top:5px;"></i>&nbsp; {{ 'ចំណាំ៖' . $company->inv_gold_note }}

                                            </span>

                                        </td>
                                        <td rowspan=2 style="text-align:right;border-style:none;padding-top:10px;">
                                            <img style=" width:100px;margin-right:-25px;" src="{{ config('helper.asset_path').'/logo/' . $company->qrlogo  }}" />
                                        </td>
                                    </tr>

                            </table>


                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <table style="margin-top:5px;margin-right:10px;" class="">
                <tr>
                    <td class="kh22-b" style="color:blue;">
                        📈 Gold Rate on

                        {{-- {{date('d-M-Y',strtotime($displayDate))}} --}}
                    </td>
                    <td>
                        <input type="text" style="width:120px;" name="setdate" id="setdate" class="form-control" style="font-size:22px;">
                    </td>
                    <td>
                        <select class="form-control" name="filter" id="filter">
                            <option value="day">day</option>
                            <option value="week">week</option>
                            <option value="month">month</option>

                        </select>
                    </td>
                    <td>
                        <button class="btn btn-info btnshow">Show</button>
                    </td>
                    <td style="padding-left:5px;">
                        <select id="currencySelect" class="form-select kh16-b" style="max-width:300px;background-color:gold;">
                        </select>
                    </td>
                    <td style="padding-left:5px;padding-top:20px;">
                        <div class="mb-3" id="latestRate" style="display:none;">
                            <span class="badge bg-primary" style="font-size:20px;">BUY</span>
                            <strong id="latestBuy" style="font-size:22px;color:blue;"></strong>
                            <span id="buyArrow" class="ms-1 fat-arrow" ></span>

                            <span class="ms-3 badge bg-danger" style="font-size:20px;">SALE</span>
                            <strong id="latestSale" style="font-size:22px;color:red;"></strong>
                            <span id="saleArrow" class="ms-1 fat-arrow" ></span>
                        </div>
                    </td>
                </tr>
            </table>
            <canvas id="goldChart" height="120" style="margin-right:10px;"></canvas>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.ably.io/lib/ably.min-1.js"></script>

<script>
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
        $(document).on('click','.btnshow',function(e){
            e.preventDefault();
            $('#filter').trigger('change');
        })
         $(document).on('change','#filter',function(e){
            e.preventDefault();
            $('body').addClass("wait");
            var dd=$('#setdate').val();
            var filter=$('#filter').val();
            var url="{{ route('currency.goldchartdata') }}"
              $.ajax({
                  async: true,
                  type: 'GET',
                  url: url,
                  data: {dd:dd,filter:filter},
                 success: function (data) {
                    console.log(data)
                    $('body').removeClass("wait");

                    if (!data || data.length === 0) {
                        alert("No data found");
                        return;
                    }
                    // 1️⃣ Replace allRates with new data
                    if (Array.isArray(data)) {
                        allRates = data;
                    } else if (Array.isArray(data.rates)) {
                        allRates = data.rates;
                    } else {
                        alert("Invalid data format");
                        return;
                    }



                    // 2️⃣ Rebuild currency select
                    const currencyMap = {};
                    allRates.forEach(r => {
                        if (!currencyMap[r.currency_id]) {
                            currencyMap[r.currency_id] = r.curname;
                        }
                    });

                    const select = document.getElementById('currencySelect');
                    select.innerHTML = ''; // clear old options

                    Object.entries(currencyMap).forEach(([id, name]) => {
                        const opt = document.createElement('option');
                        opt.value = id;
                        opt.textContent = name;
                        select.appendChild(opt);
                    });

                    // 3️⃣ Render first currency again
                    const firstCurrencyId = Object.keys(currencyMap)[0];
                    renderChart(firstCurrencyId);
                },

                  error: function () {

                      $('body').removeClass("wait");
                      alert('Save Error.')
                  }

              })
        })
     })
    /* ===============================
    DATA FROM LARAVEL
    ================================ */
    //const allRates = @json($rates);
    let allRates = @json($rates);
    /* ===============================
    BUILD CURRENCY SELECT
    ================================ */
    const currencyMap = {};
    allRates.forEach(r => {
        if (!currencyMap[r.currency_id]) {
            currencyMap[r.currency_id] = r.curname;
        }
    });

    const select = document.getElementById('currencySelect');
    Object.entries(currencyMap).forEach(([id, name]) => {
        const opt = document.createElement('option');
        opt.value = id;
        opt.textContent = name;
        select.appendChild(opt);
    });

    /* ===============================
    LATEST RATE UPDATE
    ================================ */

    function updateLatestRate(filtered) {
        if (filtered.length === 0) return;

        const last = filtered[filtered.length - 1];
        const prev = filtered.length > 1 ? filtered[filtered.length - 2] : null;

        // BUY
        document.getElementById('latestBuy').textContent =
            Number(last.buy).toLocaleString(undefined, {
                maximumFractionDigits: 2
            });

        const buyArrow = document.getElementById('buyArrow');
        buyArrow.textContent = '';
        buyArrow.className = 'ms-1 fat-arrow';

        if (prev) {
            if (last.buy > prev.buy) {
                buyArrow.textContent = '↑';

                buyArrow.classList.add('fat-arrow');
            } else if (last.buy < prev.buy) {
                buyArrow.textContent = '↓';
                buyArrow.classList.add('fat-arrow');
            }
        }

        // SALE
        document.getElementById('latestSale').textContent =
            Number(last.sale).toLocaleString(undefined, {
                maximumFractionDigits: 2
            });

        const saleArrow = document.getElementById('saleArrow');
        saleArrow.textContent = '';
        saleArrow.className = 'ms-1 fat-arrow';

        if (prev) {
            if (last.sale > prev.sale) {
                saleArrow.textContent = '↑';

                saleArrow.classList.add('fat-arrow');
            } else if (last.sale < prev.sale) {
                saleArrow.textContent = '↓';
                saleArrow.classList.add('fat-arrow');
            }
        }

        document.getElementById('latestRate').style.display = 'block';
    }
    /* ===============================
    CHART
    ================================ */
    let chart = null;

    function renderChart(currencyId) {
        const filtered = allRates.filter(r => r.currency_id == currencyId);
        updateLatestRate(filtered);
        // const labels = filtered.map(r =>
        //     new Date(r.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
        // );

        // const labels = filtered.map(r =>
        //     new Date(r.created_at).toLocaleTimeString('en-GB', {
        //         hour: '2-digit',
        //         minute: '2-digit',
        //         timeZone: 'Asia/Phnom_Penh'
        //     })
        // );
        //this use for hosting server
        // const labels = filtered.map(r => {

        //     // 1. Remove the 'Z' and 'T' to treat it as a "local" string
        //     // This stops JavaScript from adding +7 hours
        //     const rawString = r.created_at.replace('Z', '').replace('T', ' ');
        //     const d = new Date(rawString);
        //     return d.toLocaleTimeString('en-GB', {
        //         // We don't specify a timezone here so it doesn't shift the hours
        //         hour: '2-digit',
        //         minute: '2-digit',
        //         hour12: false
        //     });
        // });

        // const labels = filtered.map(r => {

        //     const rawString = r.created_at.replace('Z', '').replace('T', ' ');
        //     const d = new Date(rawString);

        //   🔹 If viewing ONE DAY → show time
        //      if ($('#filter').val() === 'day') {
        //         return d.toLocaleTimeString('en-GB', {
        //             hour: '2-digit',
        //             minute: '2-digit',
        //             hour12: false,
                // timeZone: 'Asia/Phnom_Penh' // Important!
        //         });
        //     }

        //     // 🔹 If viewing WEEK or MONTH → show day number
        //     return d.toLocaleDateString('en-GB', {
        //         day: '2-digit',
                    // timeZone: 'Asia/Phnom_Penh' // Important!
        //     });
        // });


        //this use for test local
        // const labels = filtered.map(r => {
        //     const d = new Date(r.created_at); // keep Z

        //     return d.toLocaleTimeString('en-GB', {
        //         timeZone: 'Asia/Phnom_Penh',
        //         hour: '2-digit',
        //         minute: '2-digit',
        //         hour12: false
        //     });
        // });
        //debugger;
        const labels = filtered.map(r => {
            //debugger;
            const d = new Date(r.created_at); // keep Z
            if ($('#filter').val() === 'day') {
                return d.toLocaleTimeString('en-GB', {
                    timeZone: 'Asia/Phnom_Penh',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false,
                    timeZone: 'Asia/Phnom_Penh' // Important!
                });
            }
            // 🔹 If viewing WEEK or MONTH → show day number
            return d.toLocaleDateString('en-GB', {
                day: '2-digit',
                timeZone: 'Asia/Phnom_Penh' // Important!
            });
        });


        // const labels = filtered.map(r => {
        //     debugger;
        //     const [date, time] = r.created_at.split(' ');
        //     const [h, m] = time.split(':');
        //     return `${h}:${m}`;
        // });

        const buyPrices  = filtered.map(r => parseFloat(r.buy));
        const salePrices = filtered.map(r => parseFloat(r.sale));

        if (chart) chart.destroy();

        const ctx = document.getElementById('goldChart').getContext('2d');

        chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'BUY',
                        data: buyPrices,
                        borderColor: '#1976d2',   // 🔵 always BLUE
                        backgroundColor: '#1976d2',
                        borderWidth: 2,
                        pointRadius: 3,
                        tension: 0.3
                    },
                    {
                        label: 'SALE',
                        data: salePrices,
                        borderColor: '#d32f2f',   // 🔴 always RED
                        backgroundColor: '#d32f2f',
                        borderWidth: 2,
                        pointRadius: 3,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: ctx => `${ctx.dataset.label}: ${ctx.parsed.y}`
                        }
                    }
                },
                scales: {
                    x: {
                        title: { display: true,
                             text: $('#filter').val()=='day'?'Time':'Day',
                             color:'#000',
                             font:{size:12,wieght:'bold'}
                        },
                         ticks: {
                            color: '#000',
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        },
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        title: { display: true,
                             text: 'Gold Rate',
                             color:'#000',
                             font:{size:12,wieght:'bold'}
                             },
                        ticks: {
                            color: '#000',
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        },

                        beginAtZero: false
                    }
                }
            }
        });
    }


    /* ===============================
    INITIAL LOAD
    ================================ */
    const firstCurrencyId = Object.keys(currencyMap)[0];
    select.value = firstCurrencyId;
    renderChart(firstCurrencyId);

    /* ===============================
    ON CHANGE
    ================================ */
    select.addEventListener('change', e => {
        renderChart(e.target.value);
    });

    var ably = new Ably.Realtime('DF1ung.N3Jwqw:30ezVuIjqesSJZRbGMoD8NsqtIij6_uqR6soVWetP0Q'); //remember to pass your ably API key
    var channel = ably.channels.get('exchange_rates'); // here i create a channel or initialize the existing channel
        channel.subscribe('messageEvent', function(message) { // message this is message from channel
            // Handle incoming messages (create a message body div tag)
            console.log(message)
            const currentUser = "{{ Auth::user()->name }}"; // Server renders this per user
            const domainnameis="{{ config('helper.transfer_option') }}";
                if(message.data.customername==domainnameis){
                    console.log('reload page')
                    location.reload();
                }
        });



</script>

</body>
</html>
