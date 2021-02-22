<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

class CustomerController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $customer_result = User::select('id', 'first_name', 'last_name', 'email', 'contact_no', 'status')
                    ->orderBy("created_at", "ASC")
                    ->paginate(5);
        
        return view('admin.customer_list', ['customers' => $customer_result]);
    }
}
