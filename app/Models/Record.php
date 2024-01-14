<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Record extends Model
{
    protected $fillable = ['book_name', 'matric_number', 'issue_date', 'due_date', 'return_date', 'fine_amount'];

    public function student()
    {
        return $this->belongsTo(User::class, 'matric_number', 'matric_number');
    }
}
