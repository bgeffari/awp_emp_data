<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAwpEmpDataRequest;
use App\Http\Requests\StoreAwpEmpDataRequest;
use App\Http\Requests\UpdateAwpEmpDataRequest;
use App\Models\AcademicFacility;
use App\Models\AwpEmpData;
use App\Models\MainCertificateType;
use App\Models\Major;
use App\Models\SubCertificateType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AwpEmpDataController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('awp_emp_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awpEmpDatas = AwpEmpData::with(['main_certificate_type', 'sub_certificate_type', 'major', 'academic_facility', 'media'])->get();

        return view('admin.awpEmpDatas.index', compact('awpEmpDatas'));
    }

    public function create()
    {
        abort_if(Gate::denies('awp_emp_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_certificate_types = MainCertificateType::pluck('certificate_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_certificate_types = SubCertificateType::pluck('sub_certificate_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $majors = Major::pluck('major', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_facilities = AcademicFacility::pluck('academic_facility', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.awpEmpDatas.create', compact('main_certificate_types', 'sub_certificate_types', 'majors', 'academic_facilities'));
    }

    public function store(StoreAwpEmpDataRequest $request)
    {
        $awpEmpData = AwpEmpData::create($request->all());

        foreach ($request->input('last_certificate_file', []) as $file) {
            $awpEmpData->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('last_certificate_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $awpEmpData->id]);
        }

        return redirect()->route('admin.awp-emp-datas.index');
    }

    public function edit(AwpEmpData $awpEmpData)
    {
        abort_if(Gate::denies('awp_emp_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $main_certificate_types = MainCertificateType::pluck('certificate_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_certificate_types = SubCertificateType::pluck('sub_certificate_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $majors = Major::pluck('major', 'id')->prepend(trans('global.pleaseSelect'), '');

        $academic_facilities = AcademicFacility::pluck('academic_facility', 'id')->prepend(trans('global.pleaseSelect'), '');

        $awpEmpData->load('main_certificate_type', 'sub_certificate_type', 'major', 'academic_facility');

        return view('admin.awpEmpDatas.edit', compact('main_certificate_types', 'sub_certificate_types', 'majors', 'academic_facilities', 'awpEmpData'));
    }

    public function update(UpdateAwpEmpDataRequest $request, AwpEmpData $awpEmpData)
    {
        $awpEmpData->update($request->all());

        if (count($awpEmpData->last_certificate_file) > 0) {
            foreach ($awpEmpData->last_certificate_file as $media) {
                if (!in_array($media->file_name, $request->input('last_certificate_file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $awpEmpData->last_certificate_file->pluck('file_name')->toArray();
        foreach ($request->input('last_certificate_file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $awpEmpData->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('last_certificate_file');
            }
        }

        return redirect()->route('admin.awp-emp-datas.index');
    }

    public function show(AwpEmpData $awpEmpData)
    {
        abort_if(Gate::denies('awp_emp_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awpEmpData->load('main_certificate_type', 'sub_certificate_type', 'major', 'academic_facility');

        return view('admin.awpEmpDatas.show', compact('awpEmpData'));
    }

    public function destroy(AwpEmpData $awpEmpData)
    {
        abort_if(Gate::denies('awp_emp_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awpEmpData->delete();

        return back();
    }

    public function massDestroy(MassDestroyAwpEmpDataRequest $request)
    {
        AwpEmpData::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('awp_emp_data_create') && Gate::denies('awp_emp_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AwpEmpData();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
