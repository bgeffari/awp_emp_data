<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubCertificateTypeRequest;
use App\Http\Requests\StoreSubCertificateTypeRequest;
use App\Http\Requests\UpdateSubCertificateTypeRequest;
use App\Models\MainCertificateType;
use App\Models\SubCertificateType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCertificateTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sub_certificate_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCertificateTypes = SubCertificateType::with(['main_certificate_types'])->get();

        return view('frontend.subCertificateTypes.index', compact('subCertificateTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_certificate_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_certificate_types = MainCertificateType::pluck('certificate_type', 'id');

        return view('frontend.subCertificateTypes.create', compact('main_certificate_types'));
    }

    public function store(StoreSubCertificateTypeRequest $request)
    {
        $subCertificateType = SubCertificateType::create($request->all());
        $subCertificateType->main_certificate_types()->sync($request->input('main_certificate_types', []));

        return redirect()->route('frontend.sub-certificate-types.index');
    }

    public function edit(SubCertificateType $subCertificateType)
    {
        abort_if(Gate::denies('sub_certificate_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_certificate_types = MainCertificateType::pluck('certificate_type', 'id');

        $subCertificateType->load('main_certificate_types');

        return view('frontend.subCertificateTypes.edit', compact('main_certificate_types', 'subCertificateType'));
    }

    public function update(UpdateSubCertificateTypeRequest $request, SubCertificateType $subCertificateType)
    {
        $subCertificateType->update($request->all());
        $subCertificateType->main_certificate_types()->sync($request->input('main_certificate_types', []));

        return redirect()->route('frontend.sub-certificate-types.index');
    }

    public function show(SubCertificateType $subCertificateType)
    {
        abort_if(Gate::denies('sub_certificate_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCertificateType->load('main_certificate_types', 'subCertificateTypeAwpEmpDatas', 'subCertificateTypeMajors');

        return view('frontend.subCertificateTypes.show', compact('subCertificateType'));
    }

    public function destroy(SubCertificateType $subCertificateType)
    {
        abort_if(Gate::denies('sub_certificate_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCertificateType->delete();

        return back();
    }

    public function massDestroy(MassDestroySubCertificateTypeRequest $request)
    {
        SubCertificateType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function get_by_main_certificate_type(Request $request)
{
    

    if (!$request->main_certificate_type_id) {
        $html = '<option value="">'.trans('global.pleaseSelect').'</option>';
    } else {
        $html = '';
        $SubCertificateTypes = SubCertificateType::where('id', $request->main_certificate_type_id)->get();
        foreach ($SubCertificateTypes as $SubCertificateType) {
            $html .= '<option value="'.$SubCertificateType->id.'">'.$SubCertificateType->sub_certificate_types.'</option>';
        }
    }

    return response()->json(['html' => $html]);
}
}
