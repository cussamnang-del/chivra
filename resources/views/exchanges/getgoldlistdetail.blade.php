
@php
    function phpformatnumber($num)
    {
        if (!is_numeric($num)) {
            return $num;
        }

        $num = (string)$num;
        $dc = 0;

        if (strpos($num, '.') !== false) {
            $decimals = explode('.', $num)[1];
            // Count actual meaningful decimals (but max 4)
            $dc = min(strlen(rtrim($decimals, '0')), 4);
        }

        return number_format((float)$num, $dc, '.', ',');
    }
    $totalall=0;

@endphp
@foreach ($transfers as $key => $item)
    @php
        $totalall+=floatval($item->amount);
    @endphp
    <tr style="@if($item->amount>0) color:red;@else color:blue;@endif">
        <td style="text-align:center;">{{ ++$key }}</td>
        <td style="text-align:center;">{{ $item->id }}</td>
        <td>{{ date('d-M-y',strtotime($item->dd)) }}</td>
        <td>{{ $item->tt }}</td>
        <td>{{ $item->tranname }}</td>
        <td style="text-align:right;">{{ phpformatnumber($item->amount) . ' ' . $item->currency->shortcut }}</td>
        <td style="text-align:center;">
            @if(str_contains($item->action,'d'))
                <a href="" class="btn-delete" data-id="{{ $item->id }}" data-groupid="{{ $item->ref_group_id }}" style="color:brown;">Delete</a>
            @endif
        </td>
        <td>{{ $item->user->name }}</td>
        <td>

             @if($item->ref_group_id)
                <a href="{{ route('usercapital.showrefgroupid',['group_id'=>$item->ref_group_id,'showdelbuton'=>false]) }}" class="mybtn" target="_blank" style="margin:0px;padding:2px;">{{ $item->ref_group_id??'' }}</a>
            @endif
        </td>

    </tr>

@endforeach
    <tr style="background-color:rgb(241, 238, 22);">
        <td colspan=5 style="font-size:16px;border:1px solid black;">
            សរុប/Total:
        </td>
        <td style="text-align:right;font-size:16px;font-weight:bold;border:1px solid black;">
            {{ phpformatnumber($totalall) . ' USD' }}
        </td>
    </tr>
