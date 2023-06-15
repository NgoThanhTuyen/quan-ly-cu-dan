<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $table = 'families';

    protected $fillable = [
        'name', 'category_id', 'culture', 'policy', 'business', 'export', 'status', 'note', 'created_at','updated_at'
    ];

    const TYPES = [
        0 => 'Không',
        1 => 'Có',
    ];

    public function createOrUpdate($request , $id ='')
    {
        $params = $request->except(['_token', 'image', 'family_users']);

        $family_users = $request->family_users;

        if ($id) {
            $family = $this->find($id);
            $family->fill($params)->save();
            \DB::table('family_users')->where('family_id', $id)->delete();
        } else {
            $family = new Family();
            $family->fill($params)->save();
        }

        if ($family) {

            if (!empty($family_users)){

                    foreach ($family_users as $user) {
                        $data = [
                            'family_id' => $family->id,
                            'user_id' => $user,
                        ];

                        FamilyUser::insert($data);
                    }
            }
        }
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'family_users')->select('users.id', 'users.ten_hien_tai', 'users.ma_cu_dan');
    }
}
