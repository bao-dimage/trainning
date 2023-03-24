<?php
namespace App\Repositories\Interfaces;

Interface TimesheetRepositoryInterface{
    
    
    public function storeTimesheet($data);

    public function findTasks($timesheet);
    public function findTimesheet($id);
    public function updateTimesheet($data, $timesheet); 
    public function destroyTimesheet($id);

    public function searchTimesheet($data);
}