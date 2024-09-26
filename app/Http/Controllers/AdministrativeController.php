<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Customer;

class AdministrativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session()->get('user') == null || session()->get('user')->role->uid != 0) {
            return redirect()->route('login.index');
        }
        $type = '';
        $list = [];
        return view('adminView', compact('list', 'type'));
    }

    public function showStores()
    {
        $stores = Store::hydrate(DB::table('stores_schema.stores')->get()->toArray());
        return view('adminView', ['list' => $stores, 'type' => 'Tiendas']);
    }

    public function showProducts()
    {
        $products = Product::hydrate(DB::table('stores_schema.products')->get()->toArray());;
        return view('adminView', ['list' => $products, 'type' => 'Productos']);
    }

    public function showEmployers()
    {
        $employers = Employee::hydrate(DB::table('sales_schema.employees')->get()->toArray());
        return view('adminView', ['list' => $employers, 'type' => 'Empleados']);
    }

    public function showCustomers()
    {
        $customers = Customer::hydrate(DB::table('customers_schema.customers')->get()->toArray());
        return view('adminView', ['list' => $customers, 'type' => 'Asociados']);
    }


    public function search(Request $request)
    {
        if (session()->get('user') == null || session()->get('user')->role->uid != 0) {
            return redirect()->route('login.index');
        }

        $searchTerm = $request->input('search');
        $type = $request->input('type');

        $list = [];

        switch ($type) {
            case 'Tiendas':
                $list = Store::hydrate(
                    DB::table('stores_schema.stores')
                        ->where('name', 'LIKE', "%$searchTerm%")
                        ->get()->toArray()
                );
                break;

            case 'Productos':
                $list = Product::hydrate(
                    DB::table('stores_schema.products')
                        ->where('name', 'LIKE', "%$searchTerm%")
                        ->orWhere('description', 'LIKE', "%$searchTerm%")
                        ->get()->toArray()
                );
                break;

            case 'Empleados':
                $list = Employee::hydrate(
                    DB::table('sales_schema.employees')
                        ->where('name', 'LIKE', "%$searchTerm%")
                        ->orWhere('forename', 'LIKE', "%$searchTerm%")
                        ->get()->toArray()
                );
                break;

            case 'Asociados':
                $list = Customer::hydrate(
                    DB::table('customers_schema.customers')
                        ->where('name', 'LIKE', "%$searchTerm%")
                        ->get()->toArray()
                );
                break;

            default:
                $type = ''; 
                break;
        }

        // Retorna la vista con los resultados filtrados
        return view('adminView', compact('list', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
