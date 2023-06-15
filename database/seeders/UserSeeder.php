<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert([
            array(
                'ma_cu_dan' => randString(8),
                'ten_tai_khoan' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'phone' => '0928817228',
                'anh_the' => '',
                'trang_thai' => 1,
                'remember_token' => 'mj3uTuIm9frFWZagAAt27eVc7pXI0b2Yox3UgnSdXJzlHO1iJ6rxhMDaDkBD',
                'created_at' => now(),
                'updated_at' => now(),
            ),
        ]);
    }
}
