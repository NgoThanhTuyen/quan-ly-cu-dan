<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name', 'created_at','updated_at'
    ];

    public function createOrUpdate($request , $id ='')
    {
        $params = $request->except(['_token', 'image', 'submit']);
        if ($request->image) {
            $image = upload_image('image');
            if ($image['code'] == 1) {
                $params['logo'] = $image['name'];
            }
        }

        if ($id) {
            $category = $this->find($id);
            return $category->fill($params)->save();
        } else {
            return $this->fill($params)->save();
        }
    }
}
