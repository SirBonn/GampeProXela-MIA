<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Role;
use App\Models\Membership;

class AdministrativeModals extends Component
{
    /**
     * Create a new component instance.
     */

    public $stores;
    public $products;
    public $employers;
    public $customers;
    public $topSales;
    public $topstores;
    public $topProducts;
    public $topCustomers;
    public $roles;
    public $memberships;


    public function __construct()
    {
        $stores = Store::hydrate(DB::table('stores_schema.stores')->get()->toArray());
        $products = Product::hydrate(DB::table('stores_schema.products')->get()->toArray());
        $employers = Employee::hydrate(DB::table('sales_schema.employees')->get()->toArray());
        $customers = Customer::hydrate(DB::table('customers_schema.customers')->get()->toArray());
        $roles = Role::hydrate(DB::table('sales_schema.roles')->get()->toArray());
        $memberships = Membership::hydrate(DB::table('customers_schema.memberships')->get()->toArray());
        $topSales = Sale::with(['customer', 'store'])
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        $topstores = Sale::with(['store'])
            ->select('store_uid', DB::raw('SUM(total) as total_sales'))
            ->groupBy('store_uid')
            ->orderBy('total_sales', 'desc')
            ->limit(3)
            ->get();

        $topProducts = Product::topSellingProducts(10);
        $topCustomers = Customer::topSpendingCustomers(10);

        $this->memberships = $memberships;
        $this->roles = $roles;
        $this->stores = $stores;
        $this->products = $products;
        $this->employers = $employers;
        $this->customers = $customers;
        $this->topSales = $topSales;
        $this->topstores = $topstores;
        $this->topProducts = $topProducts;
        $this->topCustomers = $topCustomers;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.administrative-modals');
    }
}
