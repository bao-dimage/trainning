<?php

namespace App\Services;

use App\Http\Requests\TimesheetFormRequest;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use App\Repositories\TimesheetRepository;
use App\Repositories\Interfaces\TimesheetRepositoryInterface;


class TimesheetService
{
    protected $timesheetRepository;
    public function __construct(TimesheetRepositoryInterface $timesheetRepository)
    {
        $this->timesheetRepository = $timesheetRepository;
    }

    public function storeTimesheetData(TimesheetFormRequest $request)
    {
        $validatedData = $request->validated();
        $timesheet = $this->timesheetRepository->storeTimesheet($validatedData);
        return $timesheet;
    }

    public function showTimesheetData(Timesheet $timesheet)
    {
        $tasks = $this->timesheetRepository->findTasks($timesheet);
        return $tasks;
    }

    public function editTimesheetData(Timesheet $timesheet)
    {
        $tasks = $this->timesheetRepository->findTasks($timesheet);
        return $tasks;
    }

    public function updateTimesheetData(TimesheetFormRequest $request,$timesheet)
    {
        $validatedData = $request->validated();
        $timesheet = $this->timesheetRepository->updateTimesheet($validatedData,$timesheet);
        return $timesheet;
    }
}

