<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        $products = Product::all();
        $totalorders = Order::all();
        
        $data = Order::select('id', 'created_at')->where('status','=','Completed')->get()->groupBy(function ($order) {
            return Carbon::parse($order->created_at)->format('M');
        });

        $months = [];
        $monthCount = [];

        foreach ($data as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }

        return view('dashboard', compact('users','categories','totalorders','products', 'months', 'monthCount'));
    }
}
