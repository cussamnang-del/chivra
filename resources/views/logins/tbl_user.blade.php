@foreach ($users as $key => $user)
    <tr  class={{ $user->active == 0 ? 'cred' : '' }}>
        <td>{{ ++$key }}</td>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }} <br>
                {{ $user->username }}
        </td>
        <td>{{ $user->role->name??'' }} <br>
            {{ $user->listwith->name }}
        </td>
        <td style="color:black;">{{$user->company->name}}</td>
        <td style="color:black;">
            <div class="form-check-danger form-check form-switch" style="text-align:center;">
                <input class="form-check-input s_webcam" type="checkbox" data-id="{{ $user->id }}" value="{{ $user->use_camra }}" {{ $user->use_camra==1?'checked':'' }}>
            </div>
        </td>
        <td style="text-align:center;">
            <div class="form-check-danger form-check form-switch" style="text-align:center;">
                <input class="form-check-input s_active" type="checkbox" data-id="{{ $user->id }}" value="{{ $user->active }}" {{ $user->active==1?'checked':'' }}>
            </div>
            <div class="form-check-danger form-check form-switch" style="text-align:center;">
                <input class="form-check-input s_activate" type="checkbox" data-id="{{ $user->id }}" value="{{ $user->is_activated }}" {{ $user->is_activated==1?'checked':'' }}>
            </div>

        </td>
        <td style="text-align:center;">
            <div class="form-check-danger form-check form-switch" style="text-align:center;">
                <input class="form-check-input s_block" type="checkbox" data-id="{{ $user->id }}" value="{{ $user->attempt }}" {{ $user->attempt>5?'checked':'' }}>
            </div>

        </td>


        @php
            $customerconnectData = App\User::separate_customerconnect($user->customer_connect, 2, true);
        @endphp

        <td class="td_customerconnect">
            <span class="short-text">{!! $customerconnectData['html'] !!}</span>
            <span class="full-text d-none">{!! App\User::separate_customerconnect($user->customer_connect) !!}</span>

            @if($customerconnectData['has_more'])
                <a href="javascript:void(0)" class="toggle-text kh14" style="color:blue;">more</a>
            @endif
        </td>


        @php
            $groupData = App\User::separate_property_group_connect($user->property_group_connect, 2, true);
        @endphp

        <td class="td_propertygroupconnect">
            <span class="short-text">{!! $groupData['html'] !!}</span>
            <span class="full-text d-none">
                {!! App\User::separate_property_group_connect($user->property_group_connect) !!}
            </span>

            @if($groupData['has_more'])
                <a href="javascript:void(0)" class="toggle-text kh14" style="color:blue;">more</a>
            @endif
        </td>


        <td>
            <a href="" class="btn btn-info btn-sm changepwd" data-id="{{ $user->id }}" style="font-weight:bold;width:120px;">Change PWD</a>
            <a href="" class="btn btn-info btn-sm add_user_right" data-id="{{ $user->id }}" data-username="{{ $user->username }}" style="font-weight:bold;width:120px;">User Right</a> <br>
            <a href="" class="btn btn-warning btn-sm user-edit" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-company="{{ $user->company_id }}"
                data-username="{{ $user->username }}" data-email="{{ $user->email }}" data-role="{{ $user->role_id }}" data-active="{{ $user->active }}"
                data-customerconnect="{{ $user->customer_connect }}" data-groupconnect="{{ $user->property_group_connect }}" data-listwith="{{ $user->connect_customer_id }}"
                data-device_id="{{ $user->device_id }}" data-login_device="{{ $user->login_device }}" data-phone_model="{{ $user->phone_model }}" data-login_phonemodel="{{ $user->login_phonemodel }}"
                style="font-weight:bold;color:blue;margin-top:5px;width:120px;">Edit</a>
            <a href="" class="btn btn-danger btn-sm user-delete" data-id="{{ $user->id }}" style="font-weight:bold;margin-top:5px;width:120px;">Remove</a>
        </td>
    </tr>
@endforeach
