 <table class="table table-bordered"  style="width:100%;margin-top:0px;">
                <tbody>
                    @php
                        $k=0;
                        $cbk='';
                    @endphp
                    <tr style="background-color:blue;">

                        <td class="" style="text-align:center;padding:4px 0px;border:2px solid yellow;">
                            <div class="mainshortcut">

                                <div class="three-d-text" style="font-family:khmer os system;font-size:82px;color:white;margin-left:10px;">
                                    រូបិយប័ណ្ណ
                                </div>
                                <div class="three-d-text" style="font-family:Arial, Helvetica, sans-serif;font-size:56px;font-weight:bold;margin-top:-20px;color:white;">
                                    Currency
                                </div>
                            </div>
                        </td>
                        <td class="" style="text-align:center;padding:0px;border:2px solid yellow;">
                            <div class="mainshortcut">

                                <div class="three-d-text" style="font-family:khmer os system;font-size:82px;color:white;">
                                    ទិញ
                                </div>
                                <div class="three-d-text" style="font-family:Arial, Helvetica, sans-serif;font-size:56px;font-weight:bold;margin-top:-20px;color:white">
                                    Bid
                                </div>
                            </div>
                        </td>
                        <td class="" style="text-align:center;padding:0px;border:2px solid yellow;">
                            <div class="mainshortcut">

                                <div class="three-d-text" style="font-family:khmer os system;font-size:82px;color:white">
                                    លក់
                                </div>
                                <div class="three-d-text" style="font-family:Arial, Helvetica, sans-serif;font-size:56px;font-weight:bold;margin-top:-20px;color:white">
                                    Ask
                                </div>
                            </div>
                        </td>

                    </tr>
                    @foreach ($cur1 as $c1)


                        <tr style="background-color:rgb(68, 7, 4);">
                            <td class="bc12" style="color:black;padding:0px;">
                                <div class="mainshortcut">

                                    @if($c1->ispandp==1)

                                        <div class="khshortcut three-d-text1">
                                            {{ $c1->curname }}
                                        </div>
                                            <div class="enshortcut three-d-text1">
                                            {{$c1->shortcut}}
                                        </div>

                                    @else
                                        <div class="khshortcut three-d-text1">
                                            {{ 'ដុល្លា-' .$c1->curname }}
                                        </div>
                                        <div class="enshortcut three-d-text1">
                                            {{ 'USD-' . $c1->shortcut }}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            @if($c1->ispandp==1)
                                <td class="bc4 three-d-text" style="color:white;text-align:center;padding:0px;">
                                    <div class="relativeamt" style="padding:0px;">
                                        {{ number_format($c1->buy,$c1->decpoint,'.','') }}
                                    </div>

                                </td>
                                <td class="bc3 three-d-text" style="color:white;text-align:center;padding:0px;">
                                    <div class="relativeamt" style="padding:0px;">
                                        {{ number_format($c1->sale,$c1->decpoint,'.','') }}
                                    </div>

                                </td>
                            @else
                                <td class="bc4 three-d-text" style="color:white;text-align:center;padding:0px;">
                                    <div class="relativeamt" style="padding:0px;">
                                        {{ number_format($c1->sale,$c1->decpoint,'.','') }}
                                    </div>
                                </td>
                                <td class="bc3 three-d-text" style="color:white;text-align:center;padding:0px;">
                                    <div class="relativeamt" style="padding:0px;">
                                        {{ number_format($c1->buy,$c1->decpoint,'.','') }}
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
