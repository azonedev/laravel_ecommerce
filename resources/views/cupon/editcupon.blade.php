@extends('layouts.adminmaster')

@section('maincontent')

<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            @foreach($editCupon as $editvalue)
            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit cupon</h4>
                <form class="form-inline" method="post" action="{{url('updatecupon')}}/{{$editvalue->id}}" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        
                        <label class="sr-only" for="exampleInputEmail2">name</label>
                        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Name" name='cat_name' value="{{$editvalue->cat_name}}">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Discount Taka (৳)</label>
                        <input type="number" class="form-control" id="exampleInputPassword2" placeholder="code" name='cat_code' value="{{$editvalue->Discount}}">
                        
                    </div>
                    <button type="submit" class="btn btn-theme">Update</button>
                </form>
                @endforeach
        </div>
        <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
</div>
@endsection