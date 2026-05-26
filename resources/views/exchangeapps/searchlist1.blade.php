  @php
      function phpformatnumber($num)
      {
          if (!is_numeric($num)) {
              return $num;
          }

          $num = (string) $num;
          $dc = 0;

          if (strpos($num, '.') !== false) {
              $decimals = explode('.', $num)[1];
              // Count actual meaningful decimals (but max 4)
              $dc = min(strlen(rtrim($decimals, '0')), 4);
          }

          return number_format((float) $num, $dc, '.', ',');
      }

  @endphp

    <div id="div_detail" class="tableFixHead" style="padding:0px;margin:0px;">
        <table id="tblexchangelist" class="table table-bordered table-hover tblexchangelist kh14-b"
            style="table-layout: fixed;">
            <thead style="text-align:center;">
                <th style="width:65px;">លរ</th>
                <th style="width:150px;">អតិថិជន</th>
                <th style="width:100px;">រូបិយប័ណ្ណ</th>
                <th style="width:80px;">ចំនួន</th>

                <th style="width:80px;">អត្រា</th>
                <th style="width:130px;">ទឹកប្រាក់</th>
                <th style="width:80px;">អត្រាចុង</th>
                <th style="width:80px;">P/L</th>
                <th style="width:100px;">ប្រាក់កក់</th>

                <th style="width:100px;">ថ្ងៃទី</th>
                <th style="width:80px;">ម៉ោង</th>
                <th style="width:100px;">អ្នកកត់ត្រា</th>
                <th style="width:60px;">Close</th>
                <th style="width:80px;">Gold Req</th>

            </thead>
            <tbody id="bodyexchangelist">
                @php
                    $dd = '';
                    $created_at = '';
                    $total_qty = 0;
                    $total_amt = 0;
                @endphp
                @foreach ($exchanges as $key => $e)
                    @php
                        $dd = date('Y-m-d', strtotime($e->dd));
                        $created_at = date('Y-m-d', strtotime($e->created_at));

                    @endphp
                    <tr data-currency="{{ $e->currency->sk }}"
                        style="@if ($e->qty > 0) color:blue; @else color:red; @endif">
                        <td class="kh14"
                            style="text-align:center;@if ($dd != $created_at) background-color:brown;color:white; @endif">
                            {{ ++$key }}</td>
                        <td style="">{{ $e->customer->name }}</td>
                        <td style="@if ($e->qty > 0) color:blue; @else color:red; @endif">
                            @if ($e->qty > 0)
                                +{{ $e->currency->curname }}
                            @else
                                -{{ $e->currency->curname }}
                            @endif
                        </td>
                        <td style="text-align:right;">
                            {{ phpformatnumber($e->qty) . ' ' . $e->currency->sk }}</td>
                        <td style="text-align:right;">{{ phpformatnumber($e->rate) }}</td>
                        <td style="text-align:right;">
                            {{ phpformatnumber($e->amount) . ' $' }}</td>
                        <td style="text-align:right;">{{ phpformatnumber($e->price_last) }}</td>
                        <td style="text-align:right;">{{ phpformatnumber($e->pl) . ' $' }}</td>
                        <td style="text-align:right;">{{ phpformatnumber($e->deposit) . ' $' }}</td>

                        <td style="">{{ date('d-m-Y', strtotime($e->dd)) }}</td>
                        <td style="">{{ $e->tt }}</td>
                        <td style="">{{ $e->user->name }}</td>
                        <td style="">{{ $e->is_close == 1 ? 'បិទ' : '' }}</td>
                        <td style="">{{ $e->gold_req == 1 ? 'ស្នើមាស' : '' }}</td>

                    </tr>
                @endforeach
                @foreach ($sumByCurrency as $sum)
                    <tr class="total-row" data-currency="{{ $sum->currency->sk }}"
                        style="background:#f2f2f2;font-weight:bold;border:1px solid black;">
                        <td colspan="3" class="kh16-b">Total {{ $sum->currency->curname }}</td>

                        <td style="text-align:right;" class="kh16-b">
                            {{ phpformatnumber($sum->total_qty) }} {{ $sum->currency->sk }}
                        </td>

                        <td></td>

                        <td style="text-align:right;" class="kh16-b">
                            {{ phpformatnumber($sum->total_amount) }} $
                        </td>

                        <td colspan="9"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

