<!DOCTYPE html>
<html>
<head>
    <title>Exchange Rate Board</title>

    <style>
        body {
            margin: 0;
            background: white;
            font-family: Arial, sans-serif;
        }

       .rate-container_old {
            height: 100vh;           /* full screen height */
            column-width: 220px;     /* width of each column */
            column-gap: 25px;
            padding: 10px;
            overflow: hidden;        /* no scroll */
            column-fill: auto;   /* 🔥 THIS IS THE FIX */
        }
        .rate-container {
            height: 100vh;
            column-width: 220px;   /* minimum width */
            column-gap: 25px;
            padding: 10px;
            overflow: hidden;
            column-fill: auto;
        }
        .rate-card_old {
            break-inside: avoid;
            background: #eceef1;
            margin-bottom: 5px;
            padding: 5px 10px;
            border-radius: 0px;
            color: black;
            display: flex;
            align-items: center;
            /* justify-content: space-between; */
        }
        .rate-card {
            break-inside: avoid;
            background:white;
            margin-bottom: 5px;
            padding: 0px 10px;
            border-radius: 0px;
            color: black;
            display: flex;
            align-items: center;
            white-space: nowrap;   /* prevent line break */
        }
        .rate-card:hover {
            background: #edf038;
            transform: scale(1.02);
        }

        .left-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .left-section img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .shortcut {
            font-size: 20px;
            font-weight: bold;
        }

        .price_old {
            text-align: left;
            margin-left:15px;
            font-weight:bold;
        }
        .price {
            margin-left: auto;
            font-weight: bold;
            white-space: nowrap;
        }
        .buy {
            color: blue;
            font-size: 18px;
        }

        .sale {
            color: red;
            font-size: 18px;
        }
    </style>
</head>
<body>
@php
    function phpformatnumber($num)
{
    // Convert to string to preserve decimals
    $num = (string) $num;

    // Check if decimal exists
    if (strpos($num, '.') !== false) {

        // Remove trailing zeros
        $num = rtrim($num, '0');

        // Remove dot if no decimals left
        $num = rtrim($num, '.');
    }

    // Split integer & decimal
    $parts = explode('.', $num);

    // Format integer part with comma
    $integer = number_format($parts[0]);

    // If has decimal part
    if (isset($parts[1])) {
        return $integer . '.' . $parts[1];
    }

    return $integer;
}
@endphp
<div class="rate-container">
    @foreach($currencies as $currency)
        <div class="rate-card">
            <div class="left-section">
                <img src="{{ config('helper.asset_path').'/myimages/' . $currency->imgpath }}" alt="">
                <div class="shortcut">
                    {{ $currency->shortcut }}
                </div>
            </div>

            <div class="price">
                <span class="buy">
                    {{ phpformatnumber($currency->buy) }}
                </span> -
                <span class="sale">
                    {{ phpformatnumber($currency->sale) }}
                </span>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>
