<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $primaryKey = 'task_id';
    protected $fillable = [
        'task_id',
        'content',
        'timesheet_id',
    ];

    public function timesheet()
    {
        return $this->belongsTo(Timesheet::class);
    }
}
