<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMainCertificateTypeRequest;
use App\Http\Requests\StoreMainCertificateTypeRequest;
use App\Http\Requests\UpdateMainCertificateTypeRequest;
use App\Models\MainCertificateType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MainCertificateTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('main_certificate_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainCertificateTypes = MainCertificateType::all();

        return view('admin.mainCertificateTypes.index', compact('mainCertificateTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('main_certificate_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mainCertificateTypes.create');
    }

    public function store(StoreMainCertificateTypeRequest $request)
    {
        $mainCertificateType = MainCertificateType::create($request->all());

        return redirect()->route('admin.main-certificate-types.index');
    }

    public function edit(MainCertificateType $mainCertificateType)
    {
        abort_if(Gate::denies('main_certificate_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mainCertificateTypes.edit', compact('mainCertificateType'));
    }

    public function update(UpdateMainCertificateTypeRequest $request, MainCertificateType $mainCertificateType)
    {
        $mainCertificateType->update($request->all());

        return redirect()->route('admin.main-certificate-types.index');
    }

    public function show(MainCertificateType $mainCertificateType)
    {
        abort_if(Gate::denies('main_certificate_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainCertificateType->load('mainCertificateTypeAwpEmpDatas', 'mainCertificateTypeSubCertificateTypes', 'mainCertificateTypeAcademicFacilities');

        return view('admin.mainCertificateTypes.show', compact('mainCertificateType'));
    }

    public function destroy(MainCertificateType $mainCertificateType)
    {
        abort_if(Gate::denies('main_certificate_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainCertificateType->delete();

        return back();
    }

    public function massDestroy(MassDestroyMainCertificateTypeRequest $request)
    {
        MainCertificateType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
