<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\My_Parent;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my__parents')->delete();
            $my_parents = new My_Parent();
            $my_parents->email = 'abdelkrimsalem@gmail.com';
            $my_parents->password = Hash::make('12345678');
            $my_parents->Name_Father = ['en' => 'abdelkrim', 'ar' => ' عبد الكريم'];
            $my_parents->National_ID_Father = '1234567810';
            $my_parents->Passport_ID_Father = '1234567810';
            $my_parents->Phone_Father = '1234567810';
            $my_parents->Job_Father = ['en' => 'Prof', 'ar' => 'أستاذ'];
           
            $my_parents->Blood_Type_Father_id =Type_Blood::all()->unique()->random()->id;
           
            $my_parents->Address_Father ='وذرف';
            $my_parents->Name_Mother = ['en' => 'Amel', 'ar' => 'امال'];
            $my_parents->National_ID_Mother = '1234567810';
            $my_parents->Passport_ID_Mother = '1234567810';
            $my_parents->Phone_Mother = '1234567810';
            $my_parents->Job_Mother = ['en' => 'Non', 'ar' => 'لا'];
            
            $my_parents->Blood_Type_Mother_id =Type_Blood::all()->unique()->random()->id;
            
            $my_parents->Address_Mother ='وذرف';
            $my_parents->save();
    }
}
