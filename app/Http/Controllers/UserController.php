<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        // To add data for a new user
        $userData = [
            'name' => 'Alim',
            'email' => 'Alim@example.com',
            'password' => bcrypt('alim'),
            'matric_number' => '123456',
            'role' => 'student',

        ];

        // Create the user
        User::create($userData);

        return 'User created successfully.';
    }
}
