<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use DB;
class productController extends Controller
{

// add new product
       public function addproduct(){
        if(Session::has('email')){
            $categories = DB::SELECT('SELECT * FROM category');
            return view('product.addproduct',["categories"=>$categories]);
        }else{
            return redirect('login');
        }    
        } 

// save a product
        public function saveproduct(Request $request){
            $section_id = $request->input('section_id') ;    
            $title = $request->input('title');
            $regular_price = $request->input('regular_price');
            $flate_price = $request->input('flate_price');
            $shortdes = $request->input('shortdes');
            $product_info = $request->input('product_info');
            $cat_id = $request->input('category_id');
            $buy_price = $request->input('buy_price');
            $tag = $request->input('tag');
            
            DB::insert('insert into product(title,regular_price,flate_price,shortdes,product_info,cat_id,buy_price,tag,section) value (?,?,?,?,?,?,?,?,?)',[$title,$regular_price,$flate_price,$shortdes,$product_info,$cat_id,$buy_price,$tag,$section_id]);

            $count =  count($request->images);
            $product_last_id = DB::getPdo()->lastInsertId();

         
             for ($i = 0; $i < count($request->images); $i++)
                {
                    $images = $request->images;
                    $image = $images[$i];
                    $name = time() . $i . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('product-image');
                    $image->move($destinationPath, $name);
                    $image_url = 'product-image/' . $name;
                    DB::insert('insert into product_image(product_id,image_url)value(?,?)',[$product_last_id,$image_url]);
                }
            
            DB::table('product')
                  ->where('id', $product_last_id)
                  ->update(['feature_image' => $image_url]);
        
            Session::flash('message',' added successfully!');       
            return redirect()->action('productController@addproduct'); 
          
    }

// show all product
        public function allproduct(){
        if(Session::has('email')){
            $allproduct = DB::SELECT("SELECT * FROM product");

            return view('product.product',["allproduct"=>$allproduct]);
        }else{
            return redirect('login');
        } 
        }

// edit a product
        public function editproduct($id){
           $product = DB::SELECT("SELECT * FROM product where id=?",[$id]);
            $categories = DB::SELECT('SELECT * FROM category');
            // $product_image_count = DB::SELECT("SELECT image_url FROM product_image WHERE product_id = $id");

            // echo count($product_image_count);
            
            return view('product.editproduct',["editproduct"=>$product],["categories"=>$categories]);



        }

// update product
        public function updateproduct(Request $request,$id)
        {
            $section_id = $request->input('section_id') ;  
            $title = $request->input('title');
            $regular_price = $request->input('regular_price');
            $flate_price = $request->input('flate_price');
            $shortdes = $request->input('shortdes');
            $product_info = $request->input('product_info');
            $cat_id = $request->input('category_id');
            $buy_price = $request->input('buy_price');
            $tag = $request->input('tag');
            
            DB::update("update product set title =?,regular_price = ?,flate_price = ?,shortdes = ?,product_info = ?,cat_id = ?,buy_price = ?,tag = ?,section = ? where id = $id",[$title,$regular_price,$flate_price,$shortdes,$product_info,$cat_id,$buy_price,$tag,$section_id]);

            SESSION::flash("product-update-msg","update success");
            return redirect()->action('productController@allproduct');

        }
// delete product
        public function deleteproduct($id){
            DB::delete("DELETE FROM product where id=?",[$id]);

            Session::flash('product-del-msg','product delete success');
            return redirect()->action('productController@allproduct');
        }


// add a product into cart
    public function addToCart($id)
        {
            $product =DB::table("product")->where('id',$id)->first();
                
               // var_dump($product);
            if(!$product) {
     
                abort(404);
     
            }
     
            $cart = session()->get('cart');
     
            // if cart is empty then this the first product
            if(!$cart) {
     
                $cart = [
                        $id => [
                            "name" => $product->title,
                            "quantity" => 1,
                            "price" => $product->buy_price,
                            "discount_per" => $product->flate_price,
                            "photo" => $product->feature_image
                        ]
                ];
     
                session()->put('cart', $cart);
     
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
     
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {
     
                $cart[$id]['quantity']++;
     
                session()->put('cart', $cart);
     
                return redirect()->back()->with('success', 'Product added to cart successfully!');
     
            }
     
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                            "name" => $product->title,
                            "quantity" => 1,
                            "price" => $product->buy_price,
                            "discount_per" => $product->flate_price,
                            "photo" => $product->feature_image
            ];
     
            session()->put('cart', $cart);
     
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }



// show cart product
    public function viewCart(){
        $catData = DB::SELECT('SELECT * From category');

        return view('frontend.view-cart',['catData'=>  $catData]);
    }

//remove a product from cart 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }

        return redirect('/');
    }
}

