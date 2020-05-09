<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['Produce', 'Dairy', 'Meat', 'Frozen', 'Home'];

        $count = count($departments);

        foreach ($departments as $departmentData) {
            $department = new Department();

            $department->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $department->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $department->name = $departmentData;

            $department->save();

            $count--;
        }
    }
}
