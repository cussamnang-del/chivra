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
</head>

<style>
    /* img {
  border-radius: 50%;
} */

.circular--landscape { display: inline-block; position: relative; width: 100px; height: 100px; overflow: hidden; border-radius: 50%; }
.circular--landscape img { width: auto; height: 100%; margin-left: -50px; }

.circular--logo { display: inline-block; position: relative; width: 60px; height: 60px; overflow: hidden; border-radius: 50%; }
.circular--logo img { width: auto; height: 100%; margin-left: 0px; }

.circular--landscape200 { display: inline-block; position: relative; width: 200px; height: 200px; overflow: hidden; border-radius: 50%; }
.circular--landscape200 img { width: auto; height: 100%; margin-left: -100px; }

.circular--landscapekhr { display: inline-block; position: relative; width: 100px; height: 100px; overflow: hidden; border-radius: 50%; }
.circular--landscapekhr img {
    width: auto;
    height: 100%;
    margin-left: -28px;

    }

.circular_image {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  overflow: hidden;
  background-color: blue;
  /* commented for demo
  float: left;
  margin-left: 125px;
  margin-top: 20px;
  */

  /*for demo*/
  display:inline-block;
  vertical-align:middle;
}
.circular_image img{
  width:100%;
}
div.relative_phone {
  position: relative;
  float: right;
  top:15px;
  text-align:right;

  /* border: 3px solid #73AD21; */
}
.relative_title {
  position: relative;
  left: 100px;
  top:10px;
  font-family:'Khmer Os Muol light', sans-serif;
  padding:20px;
  overflow:hidden;
  /* border: 3px solid #73AD21; */
}
.mainshortcut{
    position:relative;
}
.khshortcut{
    position:absolute;
    top:0px;
    left:110px;
    font-family:'Noto Sans Khmer', sans-serif;
    font-weight:bold;
    font-size:40px;

}
.enshortcut{
    position:absolute;
    top:50px;
    left:110px;
    font-weight:bold;
    font-size:30px;
}
div.relative {
  position: relative;
  left: 0px;
  top:30px;
  padding:0px;
  font-size:60px;
  /* border: 3px solid #73AD21; */
}
div.relative1 {
  position: relative;
  left: 0px;
  top:-20px;
  padding:0px;
  font-size:40px;
  /* border: 3px solid #73AD21; */
}
div.relativeamt {
  position: relative;
  left: 0px;
  top:0px;
  font-size:66px;
  display:inline;
  /* border: 3px solid #73AD21; */
}
.qrfooter{
    padding:10px;0px 0px 0px;
    text-align:right;
    border-style:none;
    color:white;
    position:relative;
    right:0px;
}
.falgcounter{
    display:block;

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
td.thaibank{
    font-family:'Noto Sans Khmer', sans-serif;
    font-size:56px;
    padding:15px 0px 15px 0px;
    text-align:center;
    color:black;
    }
.kh36{
    font-family:'Noto Sans Khmer', sans-serif;
    font-size:36px;

    }
    .ex_rate{
    font-family:Arial, Helvetica, sans-serif;
    font-size:42px;
        text-align:right;
        font-weight:bold;
    }
.fontfooter{
    font-family:'Noto Sans Khmer', sans-serif;
    font-size:36px;
}
th.thd{
    font-family:'Noto Sans Khmer', sans-serif;
    font-size:46px;
    font-weight:bold;
    padding:23px 0px 23px 0px;
    text-align:center;
    color:rgb(7, 7, 148);
    background-color:silver;
}
td.thd{
    font-family:'Noto Sans Khmer', sans-serif;
    font-size:46px;
    font-weight:bold;
    padding:23px 0px 23px 0px;
    text-align:center;
    color:rgb(7, 7, 148);
    background-color:silver;
    border-style:none;
}
td.thd1{
    font-family:'Noto Sans Khmer', sans-serif;
    font-size:36px;
    font-weight:bold;
    padding:15px 0px 15px 0px;
    text-align:center;
    color:black;
    background-color:white;
}

.table-striped>tbody>tr:nth-child(odd)>td.zipbra,
.table-striped>tbody>tr:nth-child(odd)>th {
 background-color: rgb(215, 243, 225);
}

.table-striped>tbody>tr:nth-child(even)>td.zipbra,
.table-striped>tbody>tr:nth-child(even)>th {
 background-color: rgb(239, 240, 221);
}
.table-striped1>tbody>tr:nth-child(odd)>td,
.table-striped1>tbody>tr:nth-child(odd)>th {
 background-color: white;
}

.table-striped1>tbody>tr:nth-child(even)>td,
.table-striped1>tbody>tr:nth-child(even)>th {
 background-color: whitesmoke;
}
.table-striped2>tbody>tr:nth-child(odd)>td,
.table-striped2>tbody>tr:nth-child(odd)>th {
 background-color: white;
}

.table-striped2>tbody>tr:nth-child(even)>td,
.table-striped2>tbody>tr:nth-child(even)>th {
 background-color: whitesmoke;
}

#divfooter{

    color:white;
    margin: auto;
    margin-left:0px;
    margin-right:0px;
    padding-bottom:0px;
    position: fixed;
    bottom: 0;
    width: 100%;
    min-height: 350px;
    max-height: 350px;
    background-color: rgb(4, 44, 79);
    color: white;
    height : 350px;
    overflow:auto;

    clear: both;
}
#displayrate {
  -moz-box-shadow: 1px 1px 2px 0 #d0d0d0;
  -webkit-box-shadow: 1px 1px 2px 0 #d0d0d0;
  box-shadow: 1px 1px 2px 0 #d0d0d0;
  background: #fff;
  border: 1px solid #ccc;
  border-color: #e4e4e4 #bebebd #bebebd #e4e4e4;
  padding: 0px;

  margin-bottom: 10px;
  clear: both;
}

#divheader{
   /* position:sticky;
   top:0;
   z-index:1000; */
    background-color:rgb(4, 44, 79);
    padding:20px 0px 50px 0px;color:white;
    margin:0px;
    width:100%;

}
#divheader1{
   /* position:sticky;
   top:150px; */
   z-index:1;
    background-color:white;
    padding:0px;
    color:white;
    margin:0px;
    width:100%;
    height:115px;
}

td.bc1{
    border-style:solid solid solid solid;
    text-align:right;
    /* padding:0px 0px 0px 20px; */
    width:10%;
}
td.bc12{
    text-align:left;
    border-style:solid none solid none;
    padding:18px 0px 18px 0px;
    width:33.33%;

}
td.bc3{

    padding:18px 0px 18px 0px;
    font-size:40px;
    font-weight:bold;
    text-align:right;
    border:1px solid silver;
    width:33.33%;
    color:red;
}
td.bc4{
    padding:18px 0px 18px 0px;
    font-size:40px;
    font-weight:bold;
    text-align:right;
    border:1px solid silver;
    width:33.33%;
    color:blue;
}

/* ::-webkit-scrollbar {
    display: none;
} */
html {
    overflow: scroll;
    overflow-x: hidden;
}

::-webkit-scrollbar {
    width: 0px;  /* remove scrollbar space */
    background: transparent;  /* optional: just make scrollbar invisible */
}
/* optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #e8efee;
}

.qrcode{
    margin-Right:0px;
    display:inline;
}
.rate-arrow1 {
        font-size: 36px;   /* make it big */
        font-weight: bold;  /* super bold */
        line-height: 1;
        vertical-align: middle;
    }

    .card-3d {
        background:red;
        border-radius: 16px;
        transform-style: preserve-3d;
        box-shadow:
            0 6px 12px rgba(0,0,0,0.25),
            0 16px 32px rgba(0,0,0,0.2),
            inset 0 1px 0 rgba(255,255,255,0.6);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .card-3d:hover {
        transform: translateY(-6px) rotateX(4deg) rotateY(-3deg);
        box-shadow:
            0 12px 24px rgba(0,0,0,0.35),
            0 28px 56px rgba(0,0,0,0.3);
    }

    .card-3d table {
        background: transparent;
    }

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
    <body id="myrate">
        <div class="row">
            <div class="col-lg-6">
                <div class="card-body card-3d" style="padding:0px;margin:10px;">
                    <table class="table" style="margin:0px;">
                        <tr>
                            <td style="text-align:center;border-style:none;color:gold;font-family:khmer os muol light;font-size:36px;">
                                ហាងឆេងមាស <span class="three-d-text" style="font-family:khmer os muol light;font-size:36px;font-weight:bold;color:gold"> {{$company->name}}</span>
                            </td>
                        </tr>
                        <tr>

                            <td class="three-d-text" style="border-style:none;font-family:Arial, Helvetica, sans-serif;font-size:32px;font-weight:bold;text-align:right;padding-right:10px;color:gold;">
                               <span class="kh28-b" style="color:gold;">សំរាប់ថ្ងៃទី</span> {{ date('d-m-Y', strtotime($latestUpdatedAt)) }}
                               <span class="kh28-b" style="color:gold;">ម៉ោង</span> {{ date('H:i:s', strtotime($latestUpdatedAt)) }}
                            </td>
                        </tr>
                    </table>

                    <table id="tblgoldrate" class="table table-bordered">
                            <tr style="text-align:center; font-family:khmer os muol light;font-size:22px;color:gold;">
                                <td>រូបិយប័ណ្ណ</td>
                                <td>ទិញ</td>
                                <td>លក់</td>

                            </tr>
                            @foreach($summaryRates as $row)
                                <tr>
                                    <td class="kh36-b three-d-text" style="color:rgb(250, 186, 24)"><strong>{{ $row['curname'] }}</strong></td>

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

                    </table>

                </div>
            </div>
            <div class="col-lg-6">
                <table>
                    <tr>
                        <td class="kh22-b">
                            📈 Gold Rate on {{date('d-M-Y',strtotime($displayDate))}}
                        </td>
                         <td style="padding-left:20px;">
                            <select id="currencySelect" class="form-select kh16-b" style="max-width:300px;background-color:gold;">
                            </select>
                        </td>
                        <td style="padding-left:25px;padding-top:20px;">
                            <div class="mb-3" id="latestRate" style="display:none;">
                                <span class="badge bg-primary" style="font-size:20px;">BUY</span>
                                <strong id="latestBuy" style="font-size:22px;"></strong>
                                <span id="buyArrow" class="ms-1 fat-arrow" ></span>

                                <span class="ms-3 badge bg-danger" style="font-size:20px;">SALE</span>
                                <strong id="latestSale" style="font-size:22px;"></strong>
                                <span id="saleArrow" class="ms-1 fat-arrow" ></span>
                            </div>
                        </td>
                    </tr>
                </table>
                <canvas id="goldChart" height="120"></canvas>

            </div>

        </div>

{{-- <div class="container" style="margin-top:20px;">
</div> --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.ably.io/lib/ably.min-1.js"></script>
<script>
    /* ===============================
    DATA FROM LARAVEL
    ================================ */
    const allRates = @json($rates);
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

                buyArrow.classList.add('rate-arrow');
            } else if (last.buy < prev.buy) {
                buyArrow.textContent = '↓';
                buyArrow.classList.add('rate-arrow');
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

                saleArrow.classList.add('rate-arrow', 'text-primary');
            } else if (last.sale < prev.sale) {
                saleArrow.textContent = '↓';
                saleArrow.classList.add('text-danger','rate-arrow');
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

        //this use for test local
        const labels = filtered.map(r => {
            const d = new Date(r.created_at); // keep Z

            return d.toLocaleTimeString('en-GB', {
                timeZone: 'Asia/Phnom_Penh',
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
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
                             text: 'Time',
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
