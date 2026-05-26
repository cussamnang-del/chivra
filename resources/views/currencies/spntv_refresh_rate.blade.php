  <div class="logo">សុផានិចប្តូរប្រាក់</div>
    <table class="table" style="">
        <tr>
            <td rowspan=2 class="title1" style="border-style:none;">
                អត្រាប្តូរប្រាក់ខ្មែរ
            </td>
            <td class="threedtime" style="border-style:none;">
                {{ date('d-m-Y',strtotime($maxdate)) }}
            </td>
        </tr>
        <tr>
            <td class="threedtime" style="border-style:none;">
                <span id="clock" style="font-size:50px;">{{ date('H:i:s') }}</span>
            </td>

        </tr>
    </table>


    <table>
        <thead class="three-d-text">
            <tr>
                <th>រូបិយប័ណ្ណ</th>
                <th>ទិញចូល</th>
                <th>លក់ចេញ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cur1->whereIn('shortcut',['KHR','THB','THB-KHR']) as $c1)
                <tr>
                    <td class="text three-d-text">
                        @if($c1->ispandp==1)
                            {{ $c1->curname }}
                        @else
                          ដុល្លា-{{ $c1->curname }}
                        @endif
                    </td>
                    @if($c1->ispandp==1)
                        <td class="three-d-text number" style="text-align:left;padding-left:5px;">{{ number_format($c1->ratebuy,$c1->decpoint,'.','') }}</td>
                        <td class="three-d-text number" style="text-align:right;">{{ number_format($c1->ratesale,$c1->decpoint,'.','') }}</td>
                    @else
                        <td class="three-d-text number" style="text-align:left;padding-left:5px;">{{ number_format($c1->ratesale,$c1->decpoint,'.','') }}</td>
                        <td class="three-d-text number" style="text-align:right;">{{ number_format($c1->ratebuy,$c1->decpoint,'.','') }}</td>
                    @endif
                </tr>

            @endforeach
                <tr style="">
                    <td colspan=3 class="title1">អត្រាលុយបាតកុងថៃ</td>
                </tr>
                <tr>
                    <td class="text three-d-text">បាត-រៀល</td>
                    <td class="three-d-text number" style="text-align:left;">{{ floatval($thai_khr->sale) }}</td>
                    <td class="three-d-text number" style="text-align:right;">{{ floatval($thai_khr->buy) }}</td>

                </tr>
                <tr>
                    <td class="text three-d-text">ដុល្លា-បាត</td>
                    <td class="three-d-text number" style="text-align:left;">{{ floatval($thai_usd->buy) }}</td>
                    <td class="three-d-text number" style="text-align:right;">{{ floatval($thai_usd->sale) }}</td>

                </tr>
                <tr>
                    <td class="text1" colspan=3 style="border-style:none;text-align:center;">
                        <span>មានទទួលបង់ ទឹក ភ្លើង ផ្ទេរប្រាក់ ខ្មែរ ថៃ</span>
                    </td>
                </tr>
        </tbody>
    </table>
