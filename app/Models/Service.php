<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'department',
        'eqptName',
        'serial',
        'model',
        'reportedBy',
        'telephone',
        'designation',
        'user',
        'fault',
        'description'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
