<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMajorRequest;
use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Models\Major;
use App\Models\SubCertificateType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MajorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('major_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $majors = Major::with(['sub_certificate_types'])->get();

        return view('frontend.majors.index', compact('majors'));
    }

    public function create()
    {
        abort_if(Gate::denies('major_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_certificate_types = SubCertificateType::pluck('sub_certificate_type', 'id');

        return view('frontend.majors.create', compact('sub_certificate_types'));
    }

    public function store(StoreMajorRequest $request)
    {
        $major = Major::create($request->all());
        $major->sub_certificate_types()->sync($request->input('sub_certificate_types', []));

        return redirect()->route('frontend.majors.index');
    }

    public function edit(Major $major)
    {
        abort_if(Gate::denies('major_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_certificate_types = SubCertificateType::pluck('sub_certificate_type', 'id');

        $major->load('sub_certificate_types');

        return view('frontend.majors.edit', compact('sub_certificate_types', 'major'));
    }

    public function update(UpdateMajorRequest $request, Major $major)
    {
        $major->update($request->all());
        $major->sub_certificate_types()->sync($request->input('sub_certificate_types', []));

        return redirect()->route('frontend.majors.index');
    }

    public function show(Major $major)
    {
        abort_if(Gate::denies('major_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $major->load('sub_certificate_types', 'majorAwpEmpDatas');

        return view('frontend.majors.show', compact('major'));
    }

    public function destroy(Major $major)
    {
        abort_if(Gate::denies('major_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $major->delete();

        return back();
    }

    public function massDestroy(MassDestroyMajorRequest $request)
    {
        Major::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
