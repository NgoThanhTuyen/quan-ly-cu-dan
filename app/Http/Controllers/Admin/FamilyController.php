<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\FamilyRequest;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller
{
    protected $family;
    /**
     * HomeController constructor.
     */
    public function __construct(Family $family)
    {
        view()->share([
            'family_active' => 'active',
            'categories' => Category::all(),
            'types' => Family::TYPES
        ]);
        $this->family = $family;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $families = Family::with('category');

        if ($request->name) {
            $families->where('name', 'like', '%'.$request->name.'%');
        }

        if ($request->category_id) {
            $families->where('category_id', $request->category_id);
        }
        if ($request->culture) {
            $families->where('culture', $request->culture);
        }

        if ($request->policy) {
            $families->where('policy', $request->policy);
        }
        if ($request->business) {
            $families->where('business', $request->business);
        }

        if ($request->export) {
            $families->where('export', $request->export);
        }

        $families =  $families->orderBy('id', 'DESC')->paginate(10);
        $admin = Auth::user();
        $viewData = [
            'families' => $families,
            'admin' => $admin
        ];
        return view('admin.family.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::select('id', 'ma_cu_dan', 'ten_hien_tai', 'ten_khai_sinh')->where('type', User::TROOPER);
        $admin = Auth::user();

        if (!$admin->hasRole(['administrator'])) {
            $users->where('admin_id', $admin->id);
        }

        $users = $users->orderByDesc('id')->get();

        return view('admin.family.create', compact('users', 'admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyRequest $request)
    {
        //
        \DB::beginTransaction();
        try {
            $this->family->createOrUpdate($request);
            \DB::commit();
            return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    public function show($id)
    {
        $family = Family::with('users', 'category')->find($id);

        if(!$family) {
            return redirect()->back()->with('danger', 'Dữ liệu không tồn tại');
        }
        return view('admin.family.preview', compact('family'));
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
        $family = Family::find($id);

        if(!$family) {
            return redirect()->back()->with('danger', 'Dữ liệu không tồn tại');
        }

        $users = User::select('id', 'ma_cu_dan', 'ten_hien_tai', 'ten_khai_sinh')->where('type', User::TROOPER);
        $admin = Auth::user();

        if (!$admin->hasRole(['administrator'])) {
            $users->where('admin_id', $admin->id);
        }

        $users = $users->orderByDesc('id')->get();

        $familyUsers = \DB::table('family_users')->where('family_id', $id)->pluck('user_id')->toArray();

        return view('admin.family.edit', compact('users', 'family', 'familyUsers', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamilyRequest $request, $id)
    {
        //
        \DB::beginTransaction();
        try {
            $this->family->createOrUpdate($request, $id);
            \DB::commit();
            return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
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
    public function destroy($id)
    {
        //
        $family = Family::find($id);
        if (!$family) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $family->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }
}
