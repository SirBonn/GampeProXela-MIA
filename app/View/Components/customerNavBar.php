<?php

namespace App\View\Components;

use App\Models\Store;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class customerNavBar extends Component
{
    /**
     * Create a new component instance.
     */

     public $stores;
    public function __construct()
    {

        $this->stores = Store::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customerNavBar');
    }
}
