@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contactText.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contact-texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contactText.fields.id') }}
                        </th>
                        <td>
                            {{ $contactText->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactText.fields.contact_title') }}
                        </th>
                        <td>
                            {{ $contactText->contact_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactText.fields.contact_subtitle') }}
                        </th>
                        <td>
                            {{ $contactText->contact_subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactText.fields.language') }}
                        </th>
                        <td>
                            {{ $contactText->language->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contact-texts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection