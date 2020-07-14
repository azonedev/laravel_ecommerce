@extends('layouts.adminmaster')

@section('maincontent')
@section('maincontent')
@if(Session::has('slider-del-msg'))
 <div class="alert alert-danger"><b>Well Done!</b> Slider Delete successfully</div>
            </div>
@endif
@if(Session::has('slider-update-msg'))
 <div class="alert alert-primary"><b>Well Done!</b> Slider updated successfully</div>
            </div>
@endif

      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i><a href="{{route('slider.add')}}"> Add New Slider</a></h3> <br>
        <h3><i class="fa fa-angle-right"></i> All slider</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th class="hidden-phone">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0 ?>
                  @foreach($allslider as $sliderValue)
                  <tr class="gradeX">
                    <?php $i = $i + 1 ?>
                    <td>{{$i}}</td>
                    <td>{{$sliderValue->title}}</td>
                    <td>{{$sliderValue->subtitle}}</td>
                     <td>
                            <a href="{{url('editslider')}}/{{$sliderValue->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a> || 
                            <a href="{{url('deleteslider')}}/{{$sliderValue->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
          </td>
                  </tr>
              @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>

@endsection