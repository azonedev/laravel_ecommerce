@extends('layouts.adminmaster')

@section('maincontent')
@section('maincontent')
@if(Session::has('product-del-msg'))
 <div class="alert alert-danger"><b>Well Done!</b> Product Delete successfully</div>
            </div>
@endif
@if(Session::has('product-update-msg'))
<div class="alert alert-success"><b>Well done!</b> Product update successfully.</div>
@endif
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> All product</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>Serial No</th>
                    <th>Product Name</th>
                    <th>Buy Price</th>
                    <th class="hidden-phone">Info</th>
                    <th class="hidden-phone">Discount</th>
                    <th class="hidden-phone">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0 ?>
                  @foreach($allproduct as $proValue)
                  <tr class="gradeX">
                    <?php $i = $i + 1 ?>
                    <td>{{$i}}</td>
                    <td>{{$proValue->title}}</td>
                    <td>{{$proValue->buy_price}}</td>
                    <td class="hidden-phone">{{$proValue->product_info}}</td>
                    <td>{{$proValue->flate_price}} %</td>

                     <td>
                            <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->
                            <a href="{{url('editproduct')}}/{{$proValue->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                            <a href="{{url('deleteproduct')}}/{{$proValue->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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