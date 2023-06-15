<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\TrooperReques;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class TrooperController extends Controller
{
    //
    public function __construct(Role $role)
    {
        view()->share([
            'trooper_active' => 'active',
            'genders' => User::GENDER,
            'roles' => $role->all(),
            'status' => User::STATUS_USER
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $users = User::with([
            'userRole' => function($userRole)
            {
                $userRole->select('*');
            },
            'families'
        ])->where('type', User::TROOPER);

        if ($request->ten_hien_tai) {
            $users->where('ten_hien_tai', 'like', '%'. $request->ten_hien_tai . '%');
        }

        if ($request->phone) {
            $users->where('phone', $request->phone);
        }

        if ($request->ma_cu_dan) {

            $users->where('ma_cu_dan', $request->ma_cu_dan);

        }
        $admin = Auth::user();

        if (!$admin->hasRole(['administrator'])) {
            $users->where('admin_id', $admin->id);
        }

        $users = $users->orderByDesc('id')->paginate(10);
        return view('admin.trooper.index', compact('users', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $admin = Auth::user();
        return view('admin.trooper.create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrooperReques $request)
    {
        //
        $data = $request->except('_token', 'images', 'role', 'start_working_process',
            'end_working_process', 'chuc_vu_don_vi', 'chuc_vu_dang', 'submit', 'status',
            'thoi_gian', 'cap_bac_he_so', 'so_quyet_dinh', 'chu_ky', 'ngay_bat_dau',
            'ngay_ket_thuc', 'ten_truong', 'hinh_thuc_dao_tao', 'phan_loai',
            'reward_time', 'hinh_thuc', 'ly_do', 'cap_quyet_dinh',
            'discipline_time', 'discipline_hinh_thuc', 'discipline_ly_do', 'discipline_cap_quyet_dinh',
            'join_wars_time', 'ten_chien_dich', 'chien_truong', 'don_vi_cuong_vi', 'doi_tuong_tac_chien'
        );
        \DB::beginTransaction();
        try {
            $data['password'] = bcrypt($request->password);
            $data['type'] = User::TROOPER;
            $admin = Auth::user();
            $data['admin_id'] = $admin->id;

            if (isset($request->images) && !empty($request->images)) {
                $image = upload_image('images');
                if ($image['code'] == 1)
                    $data['anh_the'] = $image['name'];
            }

            $id = User::insertGetId($data);

            if ($id) {
                \DB::table('role_user')->insert(['role_id'=> $request->role, 'user_id'=> $id]);

            }
            \DB::commit();
            return redirect()->back()->with('success','Thêm mới thành công');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);

        $listRoleUser = \DB::table('role_user')->where('user_id', $id)->first();
        $admin = Auth::user();
        if(!$user) {
            return redirect()->back()->with('danger', 'Dữ liệu không tồn tại');
        }

        $viewData = [
            'user' => $user,
            'listRoleUser' => $listRoleUser,
            'admin' => $admin,
        ];

        return view('admin.trooper.edit', $viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrooperReques $request, $id)
    {
        //

        $user = User::find($id);
        $data = $request->except('_token', 'images', 'role', 'start_working_process',
            'end_working_process', 'chuc_vu_don_vi', 'chuc_vu_dang', 'submit', 'status',
            'thoi_gian', 'cap_bac_he_so', 'so_quyet_dinh', 'chu_ky', 'ngay_bat_dau',
            'ngay_ket_thuc', 'ten_truong', 'hinh_thuc_dao_tao', 'phan_loai',
            'reward_time', 'hinh_thuc', 'ly_do', 'cap_quyet_dinh',
            'discipline_time', 'discipline_hinh_thuc', 'discipline_ly_do', 'discipline_cap_quyet_dinh',
            'join_wars_time', 'ten_chien_dich', 'chien_truong', 'don_vi_cuong_vi', 'doi_tuong_tac_chien', 'password'
        );

        \DB::beginTransaction();
        try {
            $admin = Auth::user();
            $data['admin_id'] = $admin->id;

            if ($request->password) {
                $data['password'] = bcrypt($request->password);
            }

            if (isset($request->images) && !empty($request->images)) {
                $image = upload_image('images');
                if ($image['code'] == 1)
                    $data['anh_the'] = $image['name'];
            }
            if ($request->status) {
                $data['trang_thai'] = $request->status;
            }

            $user = $user->fill($data)->save();

            if ($user) {
                \DB::table('role_user')->where('user_id', $id)->delete();
                \DB::table('role_user')->insert(['role_id'=> $request->role, 'user_id'=> $id]);
            }

            \DB::commit();
            return redirect()->back()->with('success','Thêm mới thành công');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        \DB::beginTransaction();
        try {
            $user->delete();
            \DB::commit();
            return redirect()->back()->with('success','Đã xóa thành công');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    public function previewTrooper(Request $request, $id)
    {

        $userInfo = User::find($id);
        $admin = Auth::user();
        $search = !empty($request->search) ? $request->search : '';
        if (!$userInfo) {
            return response([
                'code' => 200,
                'html' => 'Không tồn tại thông tin cư dân'
            ]);
        }

        $html =  view('admin.common.preview-trooper', compact('userInfo', 'admin', 'search'))->render();

        return response([
            'code' => 200,
            'html' => $html
        ]);
    }

    public function userInForPrint()
    {
        $userId = Auth::id();
        $userInfo = User::find($userId);
        $print = true;
        //
        return view('admin.trooper.print', compact('userInfo', 'print'));
    }
}
