<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        $comments = Comment::orderby('id','desc')->get();
        $replys = Reply::all();
        // $total_order = Order::all()->count();
        $orders = Order::all();
        $carts = Cart::all();
        $products = product::all();


       // Calculate the total quantity of products in orders
      $ordered_products_quantity = Order::sum('quantity');

    // Calculate the total available products
       $total_available_products = [];

foreach ($products as $product) {
    $available_quantity =  $ordered_products_quantity - $product->quantity ;
    $total_available_products[$product->id] =  $available_quantity ;

}




          $cart_count = 0;

          foreach($carts as $cart){
            $cart_count = $cart_count + $cart->quantity;
        }

          $total_order = 0;

          foreach($orders as $order){
            $total_order = $total_order + $order->quantity;
        }


        // $cart_count = Cart::all()->count();
        $products = Product::paginate(3);
        return view('home.userpage', compact('products','comments','replys','total_order','cart_count','total_available_products'));
    }





    public function redirect(){

        $usertype = Auth::user()->usertype;

        if($usertype== '1'){

            $total_product = product::all()->count();

            $total_order = Order::all()->count();

            $total_user = User::all()->count();

            $orders = Order::all();

             // Calculate the total quantity of products in orders
            //  $ordered_products_quantity = Order::sum('quantity');

             // Calculate the total available products
            //  $total_available_products = $total_product - $ordered_products_quantity;

            $total_revenue=0;

            foreach($orders as $order){
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delivery_status', '=','delivered')->get()->count();

            $total_processing = Order::where('delivery_status', '=','processing')->get()->count();

            return view('admin.home', compact( 'total_product', 'total_order','total_user','total_revenue','total_delivered','total_processing'));
        }

        else{
            $products = Product::paginate(3);
            $comments = Comment::orderby('id','desc')->get();
            $replys = Reply::all();
            return view('home.userpage', compact('products','comments','replys'));
        }


    }

    public function productdetail($id){

        $products = Product::find($id);

        return view('home.productdetail', compact('products'));
    }

    public function addcart(Request $request,$id){

        if(Auth::id()){

            $user = Auth::user();

            $products = Product::find($id);

            // start to increase the number of products in carts e.g if you add the same product to cart the number should increase

            $userid=$user->id;

            $product_exist_id = Cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id){

              $carts=Cart::find($product_exist_id)->first();

              $quantity=$carts->quantity;

              $carts->quantity= $quantity + $request->quantity;

              if($products->discount_price!=null){

                $carts->price = $products->discount_price *$carts->quantity;
               }

               else{
                   $carts->price = $products->price * $carts->quantity;
               }

              $carts->save();

              return redirect()->back()->with('message','product added successfully');


            }
            else{


                $carts = new Cart;

                $carts->name = $user->name;
                $carts->email = $user->email;
                $carts->phone = $user->phone;
                $carts->address = $user->address;
                $carts->user_id = $user->id;


                $carts->product_title = $products->title;

                if($products->discount_price!=null){

                 $carts->price = $products->discount_price * $request->quantity;
                }

                else{
                    $carts->price = $products->price * $request->quantity;
                }

                $carts->image = $products->image;
                $carts->product_id = $products->id;
                $carts->quantity = $request->quantity;

                $carts->save();

                return redirect()->back()->with('message','product added successfully');

            }

            // End to increase the number of products in carts e.g if you add the same product to cart the number should increase




            // $carts = new Cart;

            // $carts->name = $user->name;
            // $carts->email = $user->email;
            // $carts->phone = $user->phone;
            // $carts->address = $user->address;
            // $carts->user_id = $user->id;


            // $carts->product_title = $products->title;

            // if($products->discount_price!=null){

            //  $carts->price = $products->discount_price * $request->quantity;
            // }

            // else{
            //     $carts->price = $products->price * $request->quantity;
            // }

            // $carts->image = $products->image;
            // $carts->product_id = $products->id;
            // $carts->quantity = $request->quantity;

            // $carts->save();

            // return redirect()->back();


        }

        else{
            return redirect('login');
        }
    }

    public function showcart(){

        if(Auth::id()){

            $id = Auth::user()->id;

            $carts = Cart::where('user_id', '=', $id)->get();

           return view('home.showcart', compact('carts'));
        }

        else{
            return redirect('login');
        }


    }

    public function removecart($id){
        // Find the cart item
        $cart = Cart::find($id);

        // Decrease the quantity of the product in the products table
        $product = Product::find($cart->product_id);
        $product->quantity -= $cart->quantity;
        $product->save();

        // Delete the cart item
        $cart->delete();

        return redirect()->back()->with('message', 'Cart Deleted Successfully');
    }





    // public function removecart($id){
    //   $carts = Cart::find($id);
    //   $carts->delete();

    //   return redirect()->back()->with('message', 'Cart Deleted Successfully');
    // }


    public function cashorder(){

        $user = Auth::user();

        $userid = $user->id;

        $datas = Cart::where('user_id', '=', $userid)->get();

        foreach($datas as $data){

            $orders = new Order;

            $orders->name = $data->name;
            $orders->email = $data->email;
            $orders->phone = $data->phone;
            $orders->address= $data->address;
            $orders->user_id = $data->user_id;
            $orders->product_title = $data->product_title;
            $orders->price = $data->price;
            $orders->quantity = $data->quantity;
            $orders->image = $data->image;
            $orders->product_id = $data->product_id;
            $orders->payment_status = 'cash on delivery';
            $orders->delivery_status= 'processing';

            $orders->save();


            $cart_id = $data->id;

            $cart = Cart::find($cart_id);

            $cart->delete();


        }

        return redirect()->back()->with('message', 'We Recieved Your Order. Well will Connect With You Soon ');


    }

    public function stripe($totalprice){

        return view('home.stripe', compact('totalprice'));
    }


    public function stripePost(Request $request,$totalprice)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment"
        ]);


        $user = Auth::user();

        $userid = $user->id;

        $datas = Cart::where('user_id', '=', $userid)->get();

        foreach($datas as $data){

            $orders = new Order;

            $orders->name = $data->name;
            $orders->email = $data->email;
            $orders->phone = $data->phone;
            $orders->address= $data->address;
            $orders->user_id = $data->user_id;
            $orders->product_title = $data->product_title;
            $orders->price = $data->price;
            $orders->quantity = $data->quantity;
            $orders->image = $data->image;
            $orders->product_id = $data->product_id;
            $orders->payment_status = 'paid';
            $orders->delivery_status= 'processing';

            $orders->save();


            $cart_id = $data->id;

            $cart = Cart::find($cart_id);

            $cart->delete();


        }




        session()->flash('success', 'Payment successful!');

        return back();
    }


    public function showorder(){

        if(Auth::id()){

            $user = Auth::user();

            $userid = $user->id;

            $orders = Order::where('user_id', '=', $userid)->get();

            return view('home.order', compact('orders'));
        }

        return redirect('login');
    }

    public function cancelorder($id){
        $orders = Order::find($id);
        $orders->delivery_status = 'You Cancelled the Order';

        $orders->save();

        return redirect()->back();
    }

    public function addcomment(Request $request){
      if(Auth::id()){

        $comments = new comment;

        $comments->name=Auth::user()->name;
        $comments->user_id=Auth::user()->id;
        $comments->comment = $request->comment;

        $comments->save();


        return redirect()->back();
    }

      else{
        return redirect('login');
      }
    }

    public function addreply(Request $request){

        if(Auth::id()){

            $replys = new Reply;
            $replys->name = Auth::user()->name;
            $replys->user_id = Auth::user()->id;
            $replys->comment_id = $request->commentId;
            $replys->reply = $request->reply;

            $replys->save();

            return redirect()->back();

        }

        else{
            return redirect('login');
        }
    }

    public function productsearch(Request $request){
        $comments = Comment::orderby('id','desc')->get();
        $replys = Reply::all();
        $search_text = $request->search;
        $products = product::where('title','LIKE','%'.$search_text.'%')->orWhere('category','LIKE', '%'.$search_text.'%')->paginate(10);

        return view('home.userpage', compact('products','comments','replys'));
    }

    public function showproduct(){

        $comments = Comment::orderby('id','desc')->get();
        $replys = Reply::all();
        $products = Product::paginate(3);

        return view('home.allproduct', compact('comments','replys','products'));
    }


    public function viewproductsearch(Request $request){
        $comments = Comment::orderby('id','desc')->get();
        $replys = Reply::all();
        $search_text = $request->search;
        $products = product::where('title','LIKE','%'.$search_text.'%')->orWhere('category','LIKE', '%'.$search_text.'%')->paginate(10);

        return view('home.allproduct', compact('products','comments','replys'));
    }



// ....starts here..

    // public function redirect(){

    //     $usertype = Auth::user()->usertype;

    //     if($usertype == '1'){

    //         $total_product = Product::all()->count();
    //         $total_order = Order::all()->count();

    //         // Calculate the total quantity of products in orders
    //         $ordered_products_quantity = Order::sum('quantity');

    //         // Calculate the total available products
    //         $total_available_products = $total_product - $ordered_products_quantity;

    //         $total_user = User::all()->count();
    //         $orders = Order::all();

    //         $total_revenue = 0;

    //         foreach($orders as $order){
    //             $total_revenue = $total_revenue + $order->price;
    //         }

    //         $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
    //         $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();

    //         return view('admin.home', compact('total_available_products', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
    //     }

    //     // ... (rest of the method remains unchanged)
    // }

    public function showabout(){
        return view('home.about');
    }

    public function showcontact(){
        return view('home.contact');
    }





}
