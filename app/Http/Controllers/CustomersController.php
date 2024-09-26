<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use App\Models\Inventory;
use App\Models\Sale;
use App\Models\ProductList;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $store;
    public $inventary;
    public $numtabs;
    public $table;
    public $url;


    public function index()
    {

        if (session()->get('user') == null || session()->get('user')->role->uid != 1) {
            return redirect()->route('login.index');
        }

        $store = null;
        $url = $_SERVER['REQUEST_URI'];
        $table = isset($_GET["page"]) ? $_GET["page"] : 1;
        $numtabs = ceil(Product::All()->count() / 24);
        $inventary = $this->paginate($table, $numtabs);
        $cart = session()->get('cart', []);
        return view('customers.mainView', compact('inventary', 'store', 'numtabs', 'table', 'url', 'cart'));
    }

    public function stores(Request $request)
    {

        $storeId = $request->get('store_id');

        if ($storeId != 0) {
            $store = Store::where('uid', $storeId)->first();
            $numtabs = 0;
            $numtabs = ceil($store->getProducts($storeId)->count() / 24);
            $table = isset($_GET["page"]) ? $_GET["page"] : 1;
            $inventary = $this->paginateStoreProducts($storeId, $table, $numtabs);
            $cart = session()->get('cart', []);
            return view('customers.mainView', compact('inventary', 'store', 'numtabs', 'table', 'cart'));
        } else {
            $store = null;
            $url = $_SERVER['REQUEST_URI'];
            $table = isset($_GET["page"]) ? $_GET["page"] : 1;
            $numtabs = ceil(Product::All()->count() / 24);
            $inventary = $this->paginate($table, $numtabs);
            $cart = session()->get('cart', []);
            return view('customers.mainView', compact('inventary', 'store', 'numtabs', 'table', 'cart'));
        }
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $inventary = Product::where('name', 'like', '%' . $search . '%')->get();
        $store = null;
        return view('customers.mainView', compact('inventary', 'store'));
    }

    public function paginateStoreProducts($store, $table, $numtabs)
    {

        $inventary = DB::table('stores_schema.inventory')
            ->join('stores_schema.products', 'stores_schema.inventory.product_uid', '=', 'stores_schema.products.uid')
            ->where('stores_schema.inventory.store_uid', $store)
            ->select('stores_schema.products.*', 'stores_schema.inventory.quantity')->offset(($table - 1) * 24)->limit(24)->get();

        return $inventary;
    }

    public function paginate($table, $numtabs)
    {

        if ($table != null) {
            if ($numtabs > 10) {
                $numtabs = $numtabs / 24;
                $numtabs = ceil($numtabs);
            }
        }

        $inventary = DB::table('stores_schema.products')->offset(($table - 1) * 24)->limit(24)->get();

        return $inventary;
    }

    public function addToCart($id)
    {
        // Buscar el producto por su id
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "product_uid" => $product->uid,
                "quantity" => 1,
                "price" => $product->public_price
            ];
        }

        // Actualizar el carrito en la sesión
        session()->put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'Producto agregado al carrito.');
    }

    public function buyCart()
    {
        $cart = session()->get('cart', []);

        if(empty($cart)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        $usr = session()->get('user');
        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        DB::beginTransaction();
        try {

            $customer = DB::table('customers_schema.customers')->where('uid', $usr->uid)->get()->first();


            $sale = new Sale();
            $sale->customer_uid = $usr->uid;
            $sale->store_uid = $usr->store_uid;
            $sale->total = $total;
            $sale->save();

            foreach ($cart as $id => $details) {


                $productList = new ProductList();
                $productList->sale_uid = $sale->uid;
                $productList->product_uid = $id;
                $productList->quantity = $details['quantity'];
                $productList->price = $details['price'];
                $productList->save();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al realizar la compra.');
        }

        $cart = [];
        session()->put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'Compra realizada con éxito. Total: $' . $total);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //My code is for create a porn site, so I can't show it whit my experience in porn sites
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
