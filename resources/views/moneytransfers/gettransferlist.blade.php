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
@foreach ($transfers as $k => $tr)
    <tr>
        <td style="text-align:center;padding:0px;" class="kh12">
            <div class="dropdown">
                <button style="width:70px;@if(str_contains($tr->action,'u')) background-color:yellow; @endif" type="button" class="mybtn dropdown-toggle kh12" data-bs-toggle="dropdown">
                {{ ++$k }}
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#" class="dropdown-item kh16-b btnprint" data-id="{{ $tr->id }}" data-cashdraw_id="{{ $tr->cashdraw_id }}">Print</a></li>
                    {{-- @if(str_contains($tr->action,'u'))
                        <li><a href="{{ route('usercapital.updatetransactiongroup',['id'=>$tr->id,'ref_group_id'=>$tr->ref_group_id,'user_id'=>$tr->user_id]) }}" class="dropdown-item kh16-b btnupdate" target="_blank">Edit</a></li>
                    @endif --}}
                    @if(str_contains($tr->action,'u'))
                        <li><a href="{{ route('usercapital.updatetransactiongroup',['id'=>$tr->id,'ref_group_id'=>$tr->ref_group_id,'user_id'=>$tr->user_id,'edit_info'=>0]) }}" class="dropdown-item kh16-b btnupdate" target="_blank">Edit</a></li>
                    @else
                        <li><a href="{{ route('usercapital.updatetransactiongroup',['id'=>$tr->id,'ref_group_id'=>$tr->ref_group_id,'user_id'=>$tr->user_id,'edit_info'=>1]) }}" class="dropdown-item kh16-b btnupdate" target="_blank">Edit Info</a></li>
                    @endif
                    @if(!$tr->ref_group_id)
                        @if(str_contains($tr->action,'d'))
                            <li id="li_delbyid"><a class="dropdown-item kh16-b btndeltransfer" href="#" data-id="{{ $tr->id }}" data-ref_number="{{ $tr->ref_number }}" data-refgroupid="{{ $tr->ref_group_id }}">Delete by ID</a></li>
                        @endif
                    @endif
                    @if($tr->ref_group_id)
                        <li id="li_delbygroup"><a href="{{ route('usercapital.showrefgroupid',['group_id'=>$tr->ref_group_id]) }}" class="dropdown-item kh16-b" target="_blank" style="">Delete by Group</a></li>
                    @endif
                </ul>
            </div>
        </td>
        <td class="kh16" style="padding:0px;">
        <input type="text" style="border-style:none;width:100px;text-align:center;background-color:inherit;" readonly value="{{ $tr->tt }}">
        </td>

        <td class="kh16">{{ $tr->tranname  . ' ' . $tr->partner->name }}</td>
        <td class="kh16-b" style="text-align:right;@if($tr->amount>0) color:red; @else color:blue; @endif">{{ phpformatnumber($tr->amount) .$tr->currency->sk }}</td>
        <td class="kh16-b" style="text-align:right;">{{ phpformatnumber($tr->cuscharge) .$tr->cuschargecur->sk }}</td>
        <td class="kh16-b" style="text-align:right;">{{ phpformatnumber($tr->fee) .$tr->feecurrency->sk }}</td>
        <td class="kh16">{{ $tr->user->name }}</td>
        <td class="kh16" style="">{{ $tr->rectel }}</td>
        <td class="kh16">{{ $tr->recname }}</td>
        <td class="kh16" style="text-align:right;">{{ $tr->sendertel }}</td>
        <td class="kh16">{{ $tr->sendername }}</td>
        <td class="kh16">{{ $tr->ref_group_id }}</td>
        <td class="kh16">{{ $tr->note }}</td>
    </tr>
@endforeach
