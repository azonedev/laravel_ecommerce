@extends('layouts.adminmaster')

@section('maincontent')
@section('maincontent')
@if(Session::has('cat-del-msg'))
 <div class="alert alert-danger"><b>Well Done!</b> Category Delete successfully</div>
            </div>
@endif
@if(Session::has('cat-update-msg'))
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
                    <th>Category Name</th>
                    <th>Category Code</th>
                    <th class="hidden-phone">User ID</th>
                    <th class="hidden-phone">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($allCat as $catValue)
                  <tr class="gradeX">
                    <td>{{$catValue->id}}</td>
                    <td>{{$catValue->cat_name}}</td>
                    <td>{{$catValue->cat_code}}</td>
                    <td class="hidden-phone">{{$catValue->user_id}}</td>
                     <td>
                            <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->
                            <a href="{{url('editcat')}}/{{$catValue->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                            <a href="{{url('deletecat')}}/{{$catValue->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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