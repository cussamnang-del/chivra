<!-- Modal -->

  <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="create_user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:10000;">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title" id="h4modal">Add User</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="alert alert-danger print-error-msg" style="display:none">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <ul></ul>
                </div>
                <form action="" method="POST" id="frm_add_user" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}
                    <input type="hidden" id="userid" name="userid">
                    <table id="add_modal_table" class="table">
                        <tr>
                            <td style="width:150px;">Work For</td>
                            <td>
                                <select name="company" id="company" class="form-select kh16-b">
                                    <option value="">All Company</option>
                                    @foreach ($companies as $comp)
                                        <option value="{{ $comp->id }}" {{$comp->id==$selcomid?'selected':''}}>{{ $comp->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </td>

                        </tr>
                        <tr>
                            <td>Login Name</td>
                            <td>
                                <input type="text" name="username" id="username" class="form-control"  required>
                            </td>

                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                 <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </td>

                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>
                                <select name="role" id="role" class="form-select">
                                    <option value=""></option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </td>

                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" id="password" class="form-control" required="" name="password">
                            </td>

                        </tr>
                         <tr>
                            <td>Confirm Password</td>
                            <td>
                                <input type="password" id="password-confirm" class="form-control" required="" name="password_confirmation">
                            </td>

                        </tr>
                        <tr>
                            <td>Active</td>
                            <td>
                                 <select name="active" id="active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Disactive</option>
                                </select>
                            </td>
                        </tr>

                        <tr style="border:1px solid green">
                            <td colspan=2 style="padding:5px 10px;">
                                <table class="table">
                                    <tr>
                                        <td style="text-align:right;font-weight:bold;font-size:16px;padding-top:10px;">Connect List With</td>
                                        <td style="padding:5px;">
                                            <select class="form-select kh16 sellistwith" name="sellistwith" id="sellistwith" style="width:100%;">
                                                @foreach ($customers->where('customertype','CUSTOMER') as $c)
                                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Device ID</td>
                                        <td>Phone Model</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;">
                                            <input type="text" class="form-control" id="device_id" name="device_id">
                                        </td>
                                        <td style="padding:5px;">
                                            <input type="text" class="form-control" id="phone_model" name="phone_model">
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>New Device ID</td>
                                        <td>New Phone Model</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;">
                                            <input type="text" class="form-control" id="login_device" name="login_device" readonly>
                                        </td>
                                        <td style="padding:5px;">
                                            <input type="text" class="form-control" id="login_phonemodel" name="login_phonemodel" readonly>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                Connect to Bank Account
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <select multiple="multiple" class="kh16 selcustomerconnect" name="selcustomerconnect[]" id="selcustomerconnect" style="width:100%;">
                                    @foreach ($customers->whereIn('customertype',['BANK','AGENT']) as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                Connect to Property Group
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <select multiple="multiple" class="kh16 selpropertygroup" name="selpropertygroup[]" id="selpropertygroup" style="width:100%;">
                                    @foreach ($pgroups as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>

                </form>
              </div>
            </div>

        </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-default" data-bs-dismiss="modal" id="closemodalsave">Close</button>
              <button class="btn btn-primary" id="btnsubmit">Save</button>
          </div>
      </div>

    </div>
  </div>
