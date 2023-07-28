<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\order;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new category;
        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Products;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product added successfully');
    }

    public function show_product()
    {
        $product = products::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $product = Products::find($id);
        $category = Category::all();
        return view('admin.update_product', compact('product', 'category'));
    }
    public function update_product_confirm($id, Request $request)
    {
        $product = products::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product Updated Succedsfully');
    }

    public function order()
    {
        $order = order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id)
    {

        $order = order::find($id);
        $product = products::where('id', '=', $order->product_id)->get()->first();
        $quantity = $product->quantity;
        $product->quantity = $quantity - $order->quantity;
        $order->delivery_status = "Delivered";
        $order->payment_status = "Paid";
        $order->save();
        $product->save();

        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order = order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order = order::find($id);
        return view('admin.email_info', compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order = order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        Notification::send($order, new SendEmailNotification($details));
        return redirect()->back();
    }

    public function search_data(Request $request)
    {
        $searchText = $request->search;
        $order = order::where('name', 'LIKE', "%$searchText%")->orWhere('address', 'LIKE', "%$searchText%")->orWhere('product_title', 'LIKE', "%$searchText%")->orWhere('payment_status', 'LIKE', "%$searchText%")->orWhere('delivery_status', 'LIKE', "%$searchText%")->get();

        return view('admin.order', compact('order'));
    }
    // public function cancel_order($id)
    // {
    //     $order = order::find($id);
    //     $order->delivery_status = "Pemesanan Dibatalkan";
    //     $order->save();

    //     return redirect()->back();
    // }
}