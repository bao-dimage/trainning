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
        'timsheet_id',
        'title',
        'diff_work',
        'plan_work'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    

}
