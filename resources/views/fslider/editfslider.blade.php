@extends('layouts.adminmaster')

@section('maincontent')
@if(Session::has('slider-save-msg'))
<div class="alert alert-success"><b>Well done!</b> New product added successfully.</div>
@endif
<div class="col-lg-9 main-chart">
	<div class="border-head">
              <h2>Add New Slider </h2>
    </div>
 	<div class="row mt">
    	<div class="col-lg-12">
  			<div class=" form">
          @foreach($editfslider as $slidervalue)
 			<form method="post" action="{{url('updatefslider')}}/{{$slidervalue->id}}" class="cmxform form-horizontal style-form" id="commentForm" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Title</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="title" minlength="2" type="text" value="{{$slidervalue->title}}" required>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Feature Image</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="feature_image" minlength="2" type="file" value="{{$slidervalue->feature_slider}}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Save</button>
                    </div>
                  </div>
			 </form>
       @endforeach
			</div>
		</div>
	</div>
</div>
@endsection