<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\AdminUser;

class AdminUserController extends AdminController
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
        $admin_user_result = AdminUser::select('id', 'name', 'email', 'status')
                    ->orderBy("created_at", "ASC")
                    ->paginate(5);
        
        return view('admin.admin_user_list', ['admin_users' => $admin_user_result]);
    }
}
