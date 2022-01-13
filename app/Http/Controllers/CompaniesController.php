<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(15);

        return view('companies.index', [
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $validatedData = $request->validated();

        if (isset($validatedData['logo'])) {
            $logoPath = $validatedData['logo']->hashName();

            $validatedData['logo']->move(public_path('images'), $logoPath);

            $validatedData['logo_path'] = 'images/' . $logoPath;

            unset($validatedData['logo']);
        }

        $company = Company::create($validatedData);

        if ($company) {
            return Redirect::route('companies.index')->with('success', __('Company created successfully!'));
        }

        return Redirect::back()->with('error', __('Company creation failed!'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        if (!$company) {
            abort(404);
        }

        return view('companies.create', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request, $id)
    {
        $company = Company::find($id);
        if ($company) {
            $validatedData = $request->validated();

            if (isset($validatedData['logo'])) {
                $logoPath = $validatedData['logo']->hashName();

                $validatedData['logo']->move(public_path('images'), $logoPath);
                $validatedData['logo_path'] = 'images/' . $logoPath;

                if (File::exists($company->logo_path)) {
                    File::delete($company->logo_path);
                }
            }

            unset($validatedData['logo']);
            $company->update($validatedData);

            return Redirect::route('companies.index')->with('success', __('Company modification saved successfully!'));
        }

        return Redirect::back()->with('error', __('Company modification failed!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if ($company) {
            if (File::exists($company->logo_path)) {
                File::delete($company->logo_path);
            }
        }

        if (Company::destroy($id)) {
            return Redirect::route('companies.index')->with('success', __('Company deleted successfully!'));
        }

        return Redirect::back()->with('error', __('Company delete failed!'));
    }
}
