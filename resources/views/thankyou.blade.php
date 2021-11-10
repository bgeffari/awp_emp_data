@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('global.thankyou_title') }}</div>

                <div class="card-body">
                {{ trans('global.thankyou_msg') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection