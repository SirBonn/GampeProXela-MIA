<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class CheckerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session()->get('user');
        if ($user == null || $user->role->uid != 2) {
            return redirect()->route('login.index');
        }
        $employee = $user->employee;
        $store = $employee->store;
        $url = $_SERVER['REQUEST_URI'];
        $table = isset($_GET["page"]) ? $_GET["page"] : 1;


        $inventary = $this->paginateStoreProducts($employee->store->uid, $table);
        $numtabs = ceil($inventary->count() / 24);
        $cart = session()->get('cart', []);
        return view('employers.checkerView', compact('employee', 'inventary', 'store', 'numtabs', 'table', 'url', 'cart'));
    }

    public function paginateStoreProducts($store, $table)
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

    public function buyCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $user = session()->get('user');

        $employee = $user->employee;
        $store = $employee->store;
        $total = 0;

        if(count($cart) == 0) {
            return redirect()->back()->with('error', 'El carro esta vacio');
        }

        foreach ($cart as $c) {
            $total += $c['price'] * $c['quantity'];
        }
        DB::beginTransaction();

        try {

            $customer = DB::TABLE('customers_schema.customers')->where('nit', $request->nit)->first();

            if($customer == null) {
                return redirect()->back()->with('error', 'Primero debes registrar a este usuario');
            }

            DB::table('sales_schema.sales')->insert([
                'store_uid' => $store->uid,
                'employee_dpi' => $employee->user_dpi,
                'total' => $total,
                'sale_date' => now(),
                'customer_nit' => $customer->nit
            ]);

            $sale = DB::getPdo()->lastInsertId();

            foreach ($cart as $c) {
                DB::table('sales_schema.product_list')->insert([
                    'sale_uid' => $sale,
                    'product_uid' => $c['product_uid'],
                    'quantity' => $c['quantity'],
                    'subtotal' => $c['price'] * $c['quantity']
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred' . $e->getMessage());
        }

        session()->forget('cart');
        return redirect()->route('checkers.index')->with('success', 'La venta se ha completado con exito');;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

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
