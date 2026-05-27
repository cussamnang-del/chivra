<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function multiautocomplete(){
        return view('employees.multiautocompleteinputtable');
    }
    public function getCountries(Request $request)
    {
        $name = strtolower(trim((string) $request->get('name')));
        $fieldName = $request->get('fieldName');

        $allowedFields = ['name', 'username', 'email'];
        if (empty($fieldName) || !in_array($fieldName, $allowedFields, true)) {
            $fieldName = 'name';
        }

        $countries = DB::table('users')
            ->select('users.*')
            ->whereRaw('LOWER('.$fieldName.') LIKE ?', [$name.'%'])
            ->limit(25)
            ->get();

        return $countries;
    }
}
