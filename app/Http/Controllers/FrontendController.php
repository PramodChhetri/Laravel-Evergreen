<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        /*
        $products = Product::orderBy('totalsells')->paginate(8);
        return view('user.index', compact('products'));
        */


        // Get all products from the database
        $topproducts = Product::all();

        // Perform Bubble Sort based on the 'totalsells' column in descending order
        $n = count($topproducts);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($topproducts[$j]->totalsells < $topproducts[$j + 1]->totalsells) {
                    // Swap the products if they are in the wrong order
                    $temp = $topproducts[$j];
                    $topproducts[$j] = $topproducts[$j + 1];
                    $topproducts[$j + 1] = $temp;
                }
            }
        }

        // Paginate the sorted products and pass them to the view
        $perPage = 6;
        $currentPage = request()->input('page', 1);
        $topproducts = collect($topproducts)->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $topproducts = new \Illuminate\Pagination\LengthAwarePaginator($topproducts, count($topproducts), $perPage, $currentPage);


        // Get the top four categories ordered by 'totalsells' in ascending order
        $topFourCategories = Category::orderBy('totalsells', 'desc')->take(6)->get();

        // Create an array to store the top three products for each category
        $topThreeProductsByCategory = [];

        foreach ($topFourCategories as $category) {
            $topThreeProducts = Product::where('category_id', $category->id)
                ->orderBy('totalsells', 'desc')
                ->take(3)
                ->get();

            $topThreeProductsByCategory[$category->name] = $topThreeProducts;
        }

        return view('user.index', compact('topproducts', 'topFourCategories', 'topThreeProductsByCategory'));
    }


    public function products()
    {
        $products = Product::all();
        return view('user.products', compact('products'));
    }

    public function productdetail($id)
    {
        $productid = $id;
        $product = Product::find($id);
        $feedbacks = Feedback::where('product_id', '=', $id)->latest()->get();
        $relatedproducts = Product::where('category_id', '=', $product->category_id)->where('id', '!=', $product->id)->orderBy('totalsells', 'desc')->paginate(4);

        return view('user.productdetail', compact('product', 'relatedproducts', 'feedbacks', 'productid'));
    }


    public function updatepan(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'panimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pannumber' => 'required',
        ]);

        if ($request->hasFile('panimage')) {
            $panimage = $request->file('panimage');
            $name = time() . '.' . $panimage->getClientOriginalExtension();
            $destinationPath = public_path('/images/pan');
            $panimage->move($destinationPath, $name);
            $data['panimage'] = $name;
        }

        $user->update($data);
        return redirect(route('user.buyersell'))->with('success', 'User Updated Successfully');
    }



    public function checkout()
    {
        if (!auth()->user()) {
            $itemsincart = 0;
        } else {
            $itemsincart = Cart::where('user_id', auth()->user()->id)->count();
        }
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('user.checkout', compact('carts', 'itemsincart'));
    }


    public function verifykhalti(Request $request)
    {
        $args = http_build_query(array(
            'token' => $request->token,
            'amount'  => 1000 //db fetch data needed
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key test_secret_key_265d677c5f154f68b117681ee775137f'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status_code == 200) {




            //order store ko code 

            return response()->json([
                'success' => 1
            ]);
        } else {
            return response()->json(['error' => 1, 'message' => 'Payment Failed!']);
        }
    }

    public function notificationspage()
    {
        $notifications = Notification::where('user_id', Auth::id())->latest()->paginate(10);
        return view('user.notifications', compact('notifications'));
    }

    public function notificationredireact($id)
    {
        $notification = Notification::find($id);

        $notification->update([
            'status' => 'Read',
        ]);

        if ($notification->title == 'SellRequestDeclined' || $notification->title == 'SellRequestAccepted') {
            return redirect(route('user.sell.index'));
        } elseif ($notification->title == 'NewUser') {
            return redirect(route('allusers.index'));
        } elseif ($notification->title == 'NewOrder') {
            return redirect(route('user.sell.orders'));
        } elseif ($notification->title == 'SellRequest') {
            return redirect(route('approval.index'));
        } else {
            return redirect(route('user.orders.index'));
        }
    }

    public function markallasread()
    {
        $needednotifications = Notification::where('user_id', Auth::id())->get();

        foreach ($needednotifications as $ntf) {
            $ntf->update([
                'status' => 'Read'
            ]);
        }

        return back();
    }

    public function markallasunread()
    {
        $notifications = Notification::where('user_id', Auth::id())->where('status', 'Queue')->get();

        foreach ($notifications as $ntf) {
            $ntf->update([
                'status' => 'Unread'
            ]);
        }

        return back();
    }


    public function aboutuspage()
    {
        return view('user.aboutus');
    }

    public function teampage()
    {
        return view('user.team');
    }

    public function pricingpage()
    {
        return view('user.pricing');
    }

    public function contactuspage()
    {
        return view('user.contactus');
    }
}
