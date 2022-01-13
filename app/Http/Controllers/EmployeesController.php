<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(15);

        return view('employees.index', [
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view('employees.create', [
            'companies' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validated();

        $employee = Employee::create($validatedData);

        if ($employee) {
            return Redirect::route('employees.index')->with('success', __('Employee created successfully!'));
        }

        return Redirect::back()->with('error', __('Employee creation failed!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();

        if (!$employee) {
            abort(404);
        }

        return view('employees.create', [
            'employee' => $employee,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeRequest $request, $id)
    {
        $validatedData = $request->validated();

        $employee = Employee::where('id', $id)->update($validatedData);

        if ($employee) {
            return Redirect::route('employees.index')->with('success', __('Employee modification saved successfully!'));
        }

        return Redirect::back()->with('error', __('Employee modification failed!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::destroy($id);

        if ($employee) {
            return Redirect::route('employees.index')->with('success', __('Employee deleted successfully!'));
        }

        return Redirect::back()->with('error', __('Employee delete failed!'));
    }
}
