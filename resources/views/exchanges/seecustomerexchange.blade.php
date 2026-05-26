


<div class="container">
    {{-- <div id="imagePreview"
        style="position: fixed; top: 100px; right: 0px; width: auto; height: auto;
                border: 2px solid #ccc; padding: 5px; background: white; display: none;
                z-index: 9999;">
        <img id="previewImg" src="" style="width:100%; height:auto;">
    </div> --}}

    <div id="imagePreview"
        style="position: fixed; display: none; border: 1px solid #ccc; background: white; padding: 5px; z-index:9999;">
        <img id="previewImg" src="" style="max-width:300px; max-height:300px;">
    </div>


    <table class="table" style="margin:0px;">
        <tr style="">
            <td class="kh22-b" style="border-style:none;padding:0px;">Customer Exchange Captures</td>
            <td style="padding-left:10px;text-align:right;border-style:none;padding:0px;"><button id="btn_del_all" class="btn-3d btn-3d-danger kh12-b">លុបពីតារាង</button></td>
        </tr>
    </table>
    <table id="tblexchangelist" class="table table-bordered table-striped table-hover tblexchangelist">
        <thead style="text-align:center;">
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Time</th>
                <th>Wait</th>
                <th>Photo</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $capture)
                <tr>
                    <td style="text-align:center;" class="kh14-b">{{ ++$key }}</td>
                    <td class="kh14-b" style="text-align:center;">{{ $capture->id }}</td>
                    <td class="kh14-b" style="text-align:center;">{{ $capture->customer_exchange_id }}</td>
                    <td class="kh14-b" style="text-align:center;">{{ date('d-m-Y',strtotime($capture->created_at)) }}</td>
                    <td class="kh14-b" style="text-align:center;">{{ date('H:i:s',strtotime($capture->created_at)) }}</td>

                    <td class="kh14-b" style="text-align:center;">{{ gmdate('H:i:s', $capture->stand_time) }}</td>
                    <td style="padding:0px;">
                        @if($capture->photo)
                            {{-- <img src="{{ config('helper.asset_path')}}/storage/{{ $capture->photo }}"
                                 alt="capture"
                                 style="width: 60px; height: auto; cursor: pointer;"
                                 onclick="showImage(this,event)" onmouseover="previewImage(this,event)" onmouseout="hidePreview()"> --}}
                            <img src="{{ config('helper.asset_path')}}/storage/{{ $capture->photo }}"
                                style="width: 60px; cursor: pointer;"
                                onmouseover="startPreview(this)"
                                onmousemove="movePreview(event)"
                                onmouseout="hidePreview()" onclick="showImage(this,event)">

                        @else
                            No Photo
                        @endif
                    </td>
                    <td>
                        <a data-id="{{ $capture->id }}" class="btn-3d btn-3d-danger btndel" href="">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for big photo -->
<div id="imgModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
        background:rgba(0,0,0,0.7); justify-content:center; align-items:center;">
    <span onclick="closeModal()" style="position:absolute;top:20px;right:30px;color:white;font-size:30px;cursor:pointer;">&times;</span>
    <img id="modalImg" style="max-width:90%; max-height:90%; border:3px solid #fff; border-radius:8px;">
</div>



