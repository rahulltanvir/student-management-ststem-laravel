<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'std_name',
        'std_roll',
        'std_class_id',
        'std_section_id',
        'std_session_id',
        'std_phn',
        'std_status'
    ];

    // 🔗 Relationship

    public function studentClass()
    {
        return $this->belongsTo(SchoolClass::class, 'std_class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'std_section_id');
    }

    public function session()
    {
        return $this->belongsTo(SessionYear::class, 'std_session_id');
    }
}