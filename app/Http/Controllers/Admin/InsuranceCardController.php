<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\InsuranceCard;
use App\Models\User;
use App\Http\Requests\InsuranceCardRequest;

class InsuranceCardController extends Controller
{
    protected $insuranceCard;
    /**
     * HomeController constructor.
     */
    public function __construct(InsuranceCard $insuranceCard)
    {
        view()->share([
            'insurance_card_active' => 'active',
            'time_card' => InsuranceCard::TIME_CARD,
        ]);
        $this->insuranceCard = $insuranceCard;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $insuranceCards = InsuranceCard::with('user')->orderBy('id', 'DESC')->paginate(10);
        $admin = Auth::user();
        $viewData = [
            'insuranceCards' => $insuranceCards,
            'admin' => $admin,
        ];
        return view('admin.insurance-card.index', $viewData);
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

        return view('admin.insurance-card.create', compact('users', 'admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsuranceCardRequest $request)
    {
        //
        \DB::beginTransaction();
        try {
            $this->insuranceCard->createOrUpdate($request);
            \DB::commit();
            return redirect()->back()->with('success', 'Lưu dữ liệu thành công');
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
        $insuranceCard = InsuranceCard::find($id);

        if (!$insuranceCard) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        $users = User::select('id', 'ma_cu_dan', 'ten_hien_tai', 'ten_khai_sinh')->where('type', User::TROOPER);
        $admin = Auth::user();

        if (!$admin->hasRole(['administrator'])) {
            $users->where('admin_id', $admin->id);
        }

        $users = $users->orderByDesc('id')->get();

        return view('admin.insurance-card.edit', compact('insuranceCard', 'users', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InsuranceCardRequest $request, $id)
    {
        //
        \DB::beginTransaction();
        try {
            $this->insuranceCard->createOrUpdate($request, $id);
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
        $insuranceCard = InsuranceCard::find($id);
        if (!$insuranceCard) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $insuranceCard->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }
}
