<?php

use App\Course;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create([
            'key' => 'admin',
            'name' => 'Admin'
        ]);

        $lecturer_role = Role::create([
            'key' => 'lecturer',
            'name' => 'Lecturer'
        ]);

        $student_role = Role::create([
            'key' => 'student',
            'name' => 'Student'
        ]);

        $admin = factory(User::class)->create([
            'role_id' => $admin_role->id,
            'name' => 'Admin E-Learning',
            'email' => 'admin@elearning.dev',
            'is_admin' => 1
        ]);

        $admin_courses = factory(Course::class, 10)->create([
            'user_id' => $admin->id
        ]);
    }
}
