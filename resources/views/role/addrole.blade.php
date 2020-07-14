@extends('layouts.adminmaster')

@section('maincontent')
@if(Session::has('role-save-msg'))
<div class="alert alert-success"><b>Well done!</b> New role created successfully.</div>
@endif
<div class="row mt container">
    <div class="col-lg-12">
        <div clsessionass="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Add new role</h4>
                <form class="form-inline" method="post" action="{{route('role.save')}}" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Role</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Role Type" name='role' required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Code</label>
                        <input type="number" class="form-control" id="exampleInputPassword2" placeholder="code" name='status_code' required>
                    </div>
                    <button type="submit" class="btn btn-theme">Save</button>
                </form>
        </div>
        <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
</div>
@endsection