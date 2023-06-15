<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SearchController extends Controller
{
    //
    public function __construct()
    {
        view()->share([
            'search_active' => 'active',
        ]);
    }

    public function search(Request $request)
    {
        $users = null;

        if ($request->ten_hien_tai || $request->ma_cu_dan) {
            $users = User::with([
                'userRole' => function($userRole)
                {
                    $userRole->select('*');
                }
            ])->where('type', User::TROOPER);;

            if ($request->ten_hien_tai) {
                $users->where('ten_hien_tai', 'like', '%'. $request->ten_hien_tai . '%');
            }

            if ($request->ma_cu_dan) {

                $users->where('ma_cu_dan', $request->ma_cu_dan);

            }

            $users = $users->orderByDesc('id')->paginate(10);
        }

        $admin = Auth::user();
        return view('admin.trooper.search', compact('users', 'admin'));
    }
}
