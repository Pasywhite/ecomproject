<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

use App\Notifications\sendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    public function viewcategory(){



        return view('admin.category');
    }

    public function addcategory(Request $request){
        if(Auth::id()){

            $categories = new Category;

            $categories->category_name = $request->category;

            $categories->save();

            return redirect()->back()->with('message','category Added successfully');
        }
        else{
            return redirect('login');
        }
    }

    public function viewallcategory(){
        if(Auth::id()){

            $categories = Category::all();
            return view('admin.allcategory', compact('categories'));
        }
        else{
            return redirect('login');
        }
    }

    public function deleteallcategory($id){

        $categories = Category::find($id);

        $categories->delete();

        return redirect()->back()->with('message','category Deleted successfully');


    }

    public function viewproduct(){
        if(Auth::id()){

            $categories = Category::all();
            return view('admin.product', compact('categories'));
        }
        else{
            return redirect('login');
        }
    }

    public function addproduct(request $request){

        if(Auth::id()){

            $products = new Product;

            $products->title = $request->title;

            $products->description = $request->description;

            $products->price = $request->price;

            $products->quantity = $request->quantity;

            $products->discount_price = $request->dis_price;

            $products->category = $request->category;


            $image = $request->image;

            $imagename = time().'.'. $image ->getClientOriginalExtension();

            $request->image->move('products', $imagename);

            $products ->image = $imagename;

            $products ->save();

            return redirect()->back()->with('message','Product Added successfully');
        }
        else{
            return redirect('login');
        }


    }

    public function showallproduct(){
        if(Auth::id()){

            $products = Product::all();

           return view('admin.showproduct', compact('products'));
        }
        else{
            return redirect('login');
        }
    }

    public function deleteproduct($id){
        $products = Product::find($id);
        $products->delete();
        return redirect()->back()->with('message','Product Deleted successfully');
    }

    public function viewupdateproduct($id){
        if(Auth::id()){

            $products = Product::find($id);
            $categories = Category::all();
            return view('admin.updateproduct', compact('products', 'categories'));
        }
        else{
            return redirect('login');
        }
    }

    public function confirmviewupdateproduct(Request $request, $id){

        if(Auth::id()){

            $products = Product::find($id);


            $products->title = $request->title;

            $products->description = $request->description;

            $products->price = $request->price;

            $products->quantity = $request->quantity;

            $products->discount_price = $request->dis_price;

            $products->category = $request->category;

            $image = $request->image;


            if($image){

                $imagename = time().'.'. $image ->getClientOriginalExtension();

                $request->image->move('products', $imagename);

                $products ->image = $imagename;


            }

            $products ->save();

            return redirect()->back()->with('message','Product Updated successfully');


        }

        else{
            return redirect('login');
        }



    }

    public function vieworder(){
        if(Auth::id()){

            $orders = Order::all();
            return view('admin.order', compact('orders'));
        }
        else{
            return redirect('login');
        }
    }


    public function delivered($id){
        if(Auth::id()){

            $orders = Order::find($id);
            $orders ->delivery_status = 'delivered';
            $orders ->payment_status = 'paid';

            $orders->save();

            return redirect()->back();
        }
        else{
            return redirect('login');
        }


    }

    public function printpdf($id){
        if(Auth::id()){

            $orders = Order::find($id);

            $pdf = app(PDF::class)->loadView('admin.pdf', compact('orders'));

            return $pdf->download('order_details.pdf');
        }
        return redirect('login');


    }


    public function sendemail($id){
        if(Auth::id()){

            $orders = Order::find($id);
            return view('admin.emailinfo',compact('orders'));
        }
        else{
            return redirect('login');
        }
    }



    public function senduseremail(Request $request,$id){

        if(Auth::id()){

            $orders=order::find($id);


            $details = [
              'greeting'=>$request->greeting,
              'firstline'=>$request->firstline,
              'body'=>$request->body,
              'button'=>$request->button,
              'url'=>$request->url,
              'lastline'=>$request->lastline,
            ];

            Notification::send($orders,new sendEmailNotification($details));

            return redirect()->back();
        }
        else{
            return redirect('login');
        }


    }



    public function search(Request $request){
        if(Auth::id()){

            $searchText = $request->search;

            $orders = Order::where('name','LIKE','%'.$searchText.'%')->orWhere('phone','LIKE','%'.$searchText.'%',)->orWhere('product_title','LIKE','%'.$searchText.'%',)->orWhere('address','LIKE','%'.$searchText.'%',)->get();

            return view('admin.order', compact('orders'));
        }
        else{
            return redirect('login');
        }
    }

}
