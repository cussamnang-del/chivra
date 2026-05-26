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
