<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InsuranceCard extends Model
{
    use HasFactory;

    protected $table = 'insurance_cards';

    protected $fillable = [
        'user_id', 'code_card', 'register_place', 'start_date', 'end_date', 'time_card', 'created_at','updated_at'
    ];

    public function createOrUpdate($request , $id ='')
    {
        $params = $request->except(['_token', 'submit']);

        if ($id) {

            $insurance_card = $this->find($id);

            $end_date = Carbon::createFromFormat('Y-m-d', $insurance_card->start_date)->addYear($request->time_card)->format('Y-m-d');
            $params['end_date'] = $end_date;
            return $insurance_card->fill($params)->save();
        } else {

            $start_date = Carbon::now()->addDays('2')->format('Y-m-d');
            $params['start_date'] = $start_date;
            $params['end_date']   = Carbon::now()->addDays('2')->addYear($request->time_card)->format('Y-m-d');

            return $this->fill($params)->save();
        }
    }

    const TIME_CARD = [
        1 => 'Một năm',
        2 => 'Hai năm',
        3 => 'Ba năm',
        4 => 'Bốn năm',
        5 => 'Năm năm',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->select('id', 'ten_hien_tai', 'ma_cu_dan');
    }
}
