<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanySetting;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    public function show(CompanySetting $companySetting)
    {
        if (!auth()->user()->can('ShowCompanySetting')) {
            abort(403, 'Unauthorized action');
        }
        return view('company.setting.show', compact('companySetting'));
    }

    public function edit(CompanySetting $companySetting)
    {
        if (!auth()->user()->can('EditCompanySetting')) {
            abort(403, 'Unauthorized action');
        }
        return view('company.setting.edit', compact('companySetting'));
    }

    public function update(CompanySetting $companySetting, UpdateCompanySetting $request)
    {
        if (!auth()->user()->can('EditCompanySetting')) {
            abort(403, 'Unauthorized action');
        }
        $data = $request->validated();

        $companySetting->update($data);

        return redirect()->route('company-setting.show', 1)->with('updated', 'Company Setting is updated successfully.');
    }
}
