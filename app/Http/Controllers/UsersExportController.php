<?php

namespace App\Http\Controllers;

use App\Exports\UserMultiSheetExport;
use Maatwebsite\Excel\Excel;

class UsersExportController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function export()
    {
        return $this->excel->download(new UserMultiSheetExport(2020), 'users.xlsx');
    }
}