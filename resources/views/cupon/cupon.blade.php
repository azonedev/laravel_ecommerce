@extends('layouts.adminmaster')

@section('maincontent')
@section('maincontent')
@if(Session::has('cupon-del-msg'))
 <div class="alert alert-danger"><b>Well Done!</b> Category Delete successfully</div>
            </div>
@endif
@if(Session::has('cupon-update-msg'))
<div class="alert alert-success"><b>Well done!</b> category update successfully.</div>
@endif
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> All Categories</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Cupon Name</th>
                    <th>Discount</th>
                    <th class="hidden-phone">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($allCupon as $cuponValue)
                  <tr class="gradeX">
                    <td>{{$cuponValue->id}}</td>
                    <td>{{$cuponValue->name}}</td>
                    <td>{{$cuponValue->discount}}</td>
                     <td>
                            <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->
                            <a href="{{url('editcupon')}}/{{$cuponValue->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                            <a href="{{url('deletecupon')}}/{{$cuponValue->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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