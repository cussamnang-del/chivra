@php
    $nbuy = '';
    $nsale = '';
    $ratebuy = '';
    $ratesale = '';
@endphp
@foreach ($curleft as $c1)
    @php
        if ($c1->ispandp == 1) {
            $ssh = explode('-', $c1->shortcut);
            // $nbuy=$ssh[0].'-'.$ssh[1];
            // $nsale=$ssh[1].'-'.$ssh[0];
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
        <td class="kh22-b" style="padding:5px;">
            <span>
                <img src="{{ config('helper.asset_path') . '/myimages/' . $c1->imgpath }}" class=""
                    style="width:60px;" alt="">
            </span>
            <span>
                {{ $c1->curname }} ( {{ $c1->shortcut }} )
            </span>


        </td>
        <td style="text-align:right;color:blue;padding:0px;width:100px;">
            <button class="btnshowrate" title="{{ $nbuy }}" style="width:100%;height:60px;">
                <span class="kh16-b badge bg-secondary" style="position: relative;top:-5px;color:white;">
                    {{ $nbuy }}
                </span>
                <br>
                <span style="position: relative;top:-12px;font-weight:bold;font-size:32px;color:blue;">
                    {{ $ratebuy }}
                </span>
            </button>
        </td>
        <td style="text-align:right;color:red;padding:0px;">
            <button class="btnshowrate" title="{{ $nsale }}" style="width:100%;height:60px;">
                <span class="kh16-b badge bg-secondary" style="position: relative;top:-5px;color:white;">
                    {{ $nsale }}
                </span>
                <br>
                <span style="position: relative;top:-12px;font-weight:bold;font-size:32px;color:red;">
                    {{ $ratesale }}
                </span>
            </button>
        </td>
    </tr>
@endforeach
