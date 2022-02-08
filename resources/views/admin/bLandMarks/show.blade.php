@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bLandMark.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.b-land-marks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bLandMark.fields.id') }}
                        </th>
                        <td>
                            {{ $bLandMark->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bLandMark.fields.name') }}
                        </th>
                        <td>
                            {{ $bLandMark->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bLandMark.fields.address') }}
                        </th>
                        <td>
                            {{ $bLandMark->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bLandMark.fields.lat') }}
                        </th>
                        <td>
                            {{ $bLandMark->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bLandMark.fields.lng') }}
                        </th>
                        <td>
                            {{ $bLandMark->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bLandMark.fields.image') }}
                        </th>
                        <td>
                            @if($bLandMark->image)
                                <a href="{{ $bLandMark->image->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bLandMark.fields.key') }}
                        </th>
                        <td>
                            {{ $bLandMark->key }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.b-land-marks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#landmark_blandmark_contents" role="tab" data-toggle="tab">
                {{ trans('cruds.blandmarkContent.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="landmark_blandmark_contents">
            @includeIf('admin.bLandMarks.relationships.landmarkBlandmarkContents', ['blandmarkContents' => $bLandMark->landmarkBlandmarkContents])
        </div>
    </div>
</div>

@endsection