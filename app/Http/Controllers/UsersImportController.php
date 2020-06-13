<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;

class UsersImportController extends Controller
{
    public function show()
    {
        return view('users.import');
    }

    public function store(Request $request)
    {
        $file = $request->file('file')->store('import');

        $import = new UsersImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }


        return back()->withStatus('Import in queue, we will send notification after import finished.');
    }
}