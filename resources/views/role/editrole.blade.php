@extends('layouts.adminmaster')

@section('maincontent')

<div class="row mt container">
    <div class="col-lg-12">
        <div clsessionass="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit new role</h4>
            @foreach($editRole as $editvalue)
                <form class="form-inline" method="post" action="{{url('updaterole')}}/{{$editvalue->id}}" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Role</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Role Type" name='role' required value="{{$editvalue->role}}">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Code</label>
                        <input type="number" class="form-control" id="exampleInputPassword2" placeholder="code" name='status_code' required value="{{$editvalue->status_code}}">
                    </div>
                    <button type="submit" class="btn btn-theme">update</button>
                </form>
                @endforeach
        </div>
        <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
</div>
@endsection