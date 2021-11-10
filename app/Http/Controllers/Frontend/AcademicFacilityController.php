<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAcademicFacilityRequest;
use App\Http\Requests\StoreAcademicFacilityRequest;
use App\Http\Requests\UpdateAcademicFacilityRequest;
use App\Models\AcademicFacility;
use App\Models\MainCertificateType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcademicFacilityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('academic_facility_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicFacilities = AcademicFacility::with(['main_certificate_types'])->get();

        return view('frontend.academicFacilities.index', compact('academicFacilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('academic_facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_certificate_types = MainCertificateType::pluck('certificate_type', 'id');

        return view('frontend.academicFacilities.create', compact('main_certificate_types'));
    }

    public function store(StoreAcademicFacilityRequest $request)
    {
        $academicFacility = AcademicFacility::create($request->all());
        $academicFacility->main_certificate_types()->sync($request->input('main_certificate_types', []));

        return redirect()->route('frontend.academic-facilities.index');
    }

    public function edit(AcademicFacility $academicFacility)
    {
        abort_if(Gate::denies('academic_facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_certificate_types = MainCertificateType::pluck('certificate_type', 'id');

        $academicFacility->load('main_certificate_types');

        return view('frontend.academicFacilities.edit', compact('main_certificate_types', 'academicFacility'));
    }

    public function update(UpdateAcademicFacilityRequest $request, AcademicFacility $academicFacility)
    {
        $academicFacility->update($request->all());
        $academicFacility->main_certificate_types()->sync($request->input('main_certificate_types', []));

        return redirect()->route('frontend.academic-facilities.index');
    }

    public function show(AcademicFacility $academicFacility)
    {
        abort_if(Gate::denies('academic_facility_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicFacility->load('main_certificate_types', 'academicFacilityAwpEmpDatas');

        return view('frontend.academicFacilities.show', compact('academicFacility'));
    }

    public function destroy(AcademicFacility $academicFacility)
    {
        abort_if(Gate::denies('academic_facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $academicFacility->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcademicFacilityRequest $request)
    {
        AcademicFacility::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
