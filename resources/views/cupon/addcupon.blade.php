@extends('layouts.adminmaster')

@section('maincontent')
@if(Session::has('cupon-save-msg'))
<div class="alert alert-success"><b>Well done!</b> New cupon created successfully.</div>
@endif
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Add new cupon</h4>
                <form class="form-inline" method="post" action="{{route('cupon.save')}}" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">name</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Name" name='cupon_name' required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Discount Taka (৳)</label>
                        <input type="number" class="form-control" id="exampleInputPassword2" placeholder="Discount Taka (৳)" name='discount' required>
                    </div>
                    <button type="submit" class="btn btn-theme">Save</button>
                </form>
        </div>
        <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
</div>
@endsection