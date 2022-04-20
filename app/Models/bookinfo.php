<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookinfo extends Model
{
    protected $table = 'bookinfo';
    protected $primaryKey = 'id';
    protected $fillable = ['book_name', 'image_file', 'borrow_date','return_date','student_name','member_type','description','academic_class'];
}