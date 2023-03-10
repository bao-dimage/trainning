<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use  HasFactory;
    protected $table = 'timesheets';
    protected $primaryKey = 'timesheet_id'; 
    public $timestamps = false;
    protected $fillable = [
        'timesheet_id',
        'title',
        'diff_work',
        'plan_work'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'timesheet_id', 'timesheet_id');
    }


    

}
