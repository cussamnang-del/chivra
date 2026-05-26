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
.kh22-b{
    font-family:'Noto Sans Khmer', sans-serif;
    font-size:22px;
    font-weight:bold;
    }
.kh22{
    font-family:'Noto Sans Khmer', sans-serif;
    font-size:22px;

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


<div class="container">
    <table>
        <tr>
            <td>
                <label class="form-label">Select Gold Type</label>
            </td>
            <td>
                  <select id="currencySelect" class="form-select kh16-b" style="max-width:300px;">
                </select>
            </td>
            <td class="kh22-b">
                📈 Gold Rate Today
            </td>
            <td style="padding-left:25px;">
                <div class="mb-3" id="latestRate" style="display:none;">
                    <span class="badge bg-primary">BUY</span>
                    <strong id="latestBuy"></strong>

                    <span class="ms-3 badge bg-danger">SALE</span>
                    <strong id="latestSale"></strong>
                </div>
            </td>
        </tr>
    </table>



    <canvas id="goldChart" height="120"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const allRates = @json($rates);

// currency map (same as before)
const currencyMap = {};
allRates.forEach(r => {
    if (!currencyMap[r.currency_id]) {
        currencyMap[r.currency_id] = r.curname;
    }
});

// populate select
const select = document.getElementById('currencySelect');
Object.entries(currencyMap).forEach(([id, name]) => {
    const opt = document.createElement('option');
    opt.value = id;
    opt.textContent = name;
    select.appendChild(opt);
});

let chart;

// 🔥 Update latest buy/sale
function updateLatestRate(filtered) {
    if (!filtered.length) return;

    const last = filtered[filtered.length - 1];

    document.getElementById('latestBuy').textContent =
        Number(last.ratebuy).toLocaleString(undefined, { minimumFractionDigits: 2 });

    document.getElementById('latestSale').textContent =
        Number(last.ratesale).toLocaleString(undefined, { minimumFractionDigits: 2 });

    document.getElementById('latestRate').style.display = 'block';
}

// 🔥 Render chart by currency
function renderChart(currencyId) {

    const filtered = allRates.filter(r => r.currency_id == currencyId);

    updateLatestRate(filtered); // 👈 important

    const labels = filtered.map(r =>
        new Date(r.created_at).toLocaleTimeString([], { hour:'2-digit', minute:'2-digit' })
    );

    const buyPrices  = filtered.map(r => parseFloat(r.ratebuy));
    const salePrices = filtered.map(r => parseFloat(r.ratesale));

    if (chart) chart.destroy();

    const ctx = document.getElementById('goldChart').getContext('2d');

    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels,
            datasets: [
                {
                    label: 'BUY',
                    data: buyPrices,
                    borderWidth: 2,
                    pointRadius: 3,
                    segment: {
                        borderColor: c => {
                            const i = c.p1DataIndex;
                            return buyPrices[i] >= buyPrices[i - 1] ? '#1976d2' : '#d32f2f';
                        }
                    }
                },
                {
                    label: 'SALE',
                    data: salePrices,
                    borderWidth: 2,
                    pointRadius: 3,
                    segment: {
                        borderColor: c => {
                            const i = c.p1DataIndex;
                            return salePrices[i] >= salePrices[i - 1] ? '#2e7d32' : '#c62828';
                        }
                    }
                }
            ]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                x: { title: { display: true, text: 'Time' } },
                y: { title: { display: true, text: 'Gold Rate' }, beginAtZero:false }
            }
        }
    });
}

// default load (first currency)
const firstCurrency = Object.keys(currencyMap)[0];
renderChart(firstCurrency);

// change event
select.addEventListener('change', e => {
    renderChart(e.target.value);
});
</script>











    </body>
</html>
