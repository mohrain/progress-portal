<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationOfficer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopePositioned($query, $ascending = true)
    {
        return $query->orderBy('position', $ascending ? 'asc' : 'desc');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employeeDesignation()
    {
        return $this->belongsTo(EmployeeDesignation::class);
    }
}
