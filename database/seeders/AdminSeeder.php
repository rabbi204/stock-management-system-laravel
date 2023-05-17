<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::where('email', 'superadmin@example.com')->first();

        //check superadmin have data or null
        if(is_null($admin)){
            $admin = new Admin();
            $admin->full_name = "Md. Rabbi";
            $admin->email = "superadmin@example.com";
            $admin->phone = "01729673492";
            $admin->password = Hash::make('superadmin123');
            $admin->save();
        }
        
    }
}
