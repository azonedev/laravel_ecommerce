@extends('layouts.adminmaster')

@section('maincontent')
@if(Session::has('cat-save-msg'))
<div class="alert alert-success"><b>Well done!</b> New category created successfully.</div>
@endif
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Add new category</h4>
                <form class="form-inline" method="post" action="{{route('cat.save')}}" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">name</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Name" name='cat_name' required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Code</label>
                        <input type="number" class="form-control" id="exampleInputPassword2" placeholder="code" name='cat_code' required>
                    </div>
                    <button type="submit" class="btn btn-theme">Save</button>
                </form>
        </div>
        <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
</div>
@endsection