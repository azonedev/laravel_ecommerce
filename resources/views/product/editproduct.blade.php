@extends('layouts.adminmaster')

@section('maincontent')

<div class="col-lg-9 main-chart">

            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h2>Add New Product </h2>
            </div>
            
            <!--custom chart end-->
            <div class="row mt">
          <div class="col-lg-12">
@if(Session::has('cat-save-msg'))
<div class="alert alert-success"><b>Well done!</b> New product added successfully.</div>
@endif
            <div class=" form">
               @foreach($editproduct as $product)
                <form action="{{url('/updateproduct')}}/{{$product->id}}" method="post" class="cmxform form-horizontal style-form" id="commentForm" enctype="multipart/form-data">
                  @csrf
          
          <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Select Category</label>
                   
           <div class="col-lg-10">
           
                      <select name="category_id" id="cat_id" class=" form-control browser-default custom-select">
            @foreach($categories as $category)
            
            <option value="{{$category->id}}">{{$category->cat_name}}</option>
            @endforeach
           
        </select>
           </div>
         </div>
                       <div class="form-group ">
                        <label for="cemail" class="control-label col-lg-2">Select Post Section</label>
                       
                 <div class="col-lg-10">
                 
                  <select name="section_id" id="cat_id" class=" form-control browser-default custom-select">

                    <option value="1">DEALS OF THE DAY</option>
                    <option value="2">TOP OF THE DAY</option>
                    <option value="3">NEW COLLECTION</option>
                    <option value="4">PICKED FOR YOU</option>

                 
                  </select>
                  </div>
                     
                </div>
         
          
         <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Product Name/title (required)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="title" minlength="2" type="text" value="{{$product->title}}" required>
                    </div>
                  </div>
          
          <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">Buy price (required)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="buy_price" minlength="2" type="number" value="{{$product->buy_price}}" required="">
                    </div>
                  </div>
          
          <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">regular price (required)</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="cname" name="regular_price" minlength="2" type="number" value="{{$product->regular_price}}" required="">
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Discount %</label>
                   
           <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="number" name="flate_price" value="{{$product->flate_price}}" >
                    </div>
                  </div>
          
           <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Tag</label>
                   
           <div class="col-lg-10">
                      <input class="form-control " id="cemail" type="text" name="tag" value="{{$product->tag}}" required="">
                    </div>
                  </div>
          
          <div class="form-group">
          <label for="cemail" class="control-label col-lg-2"> Product Short Description</label>
                   
                  <div class="col-lg-10">
           <textarea style="margin: 0px; height: 158px; width: 680px;padding:20px" id="mytextarea" name="shortdes" >{{$product->shortdes}}</textarea>
         </div>
         </div>
          
            
            <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2"> Product Info  </label>
                   
            <div class="col-lg-10">
           <textarea style="margin: 0px; height: 158px; width: 680px;padding:20px" name="product_info" >{{$product->shortdes}}</textarea>
         </div>
                  </div>
          
         <div class="form-group ">
                        
                         <label for="cemail" class="control-label col-lg-2"> Product Photo  (required)</label>
                   
                            <div id="input_fields" class="col-lg-10">
                              
                                
                                    <input type="file" class="form-control" name="images[]" value="{{$product->feature_image}}" >
                               
                            </div>                                                  
                    <button type="button" onclick="add()" id="addNew" class="mt-md-4 mt-0 mb-2 mb-md-0 btn btn-success">Add More Photo</button>
                      
            
                  </div>
                
                   
                
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Save</button>
                      <button class="btn btn-theme04" type="button">Cancel</button>
                    </div>
                  </div>
                </form>
                @endforeach
              </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
            <!-- /row -->
            
            <!-- /row -->
            
            <!-- /row -->
      
       <script>
  
  function add(){
    
  
      
            let field = `
                <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    
                                    <input type="file" class="form-control" name="images[]" required>
                                </div>
                            </div>
                           
                            <div class="col-md-1 col pt-md-2 pt-0">
                                 <button type="button" class="remove mt-md-4 mt-0 mb-2 mb-md-0 btn btn-danger"><i class="fa fa-times-circle"></i></button>
                            </div>
                        </div>
            `;
            $("#input_fields").append(field);
        

        $(document).on('click', '.remove', function(){
            $(this).parent('.col').parent('.row').remove();
        });
    
    }
    tinymce.init({
        selector: '#mytextarea'
      });
    </script>

      
      
      
          </div>

@endsection