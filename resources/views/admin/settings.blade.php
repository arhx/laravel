@extends('layouts.admin')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('Admin Panel')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('Settings')</li>
        </ol>
    </nav>

    <form action="{{ route('admin-settings-save') }}" method="post">
        @csrf

        <div class="row">
            @foreach($settings as $setting)
                <div class="col-md-4 mb-2">
                    <label for="{{ $setting->key }}">@lang("settings.{$setting->key}")</label>
                    <input type="text" class="form-control" name="{{ $setting->key }}" value="{{ $setting->value }}">
                </div>
            @endforeach
        </div>
        <div class="text-center form-group mb-3">
            <button class="btn btn-primary px-sm-5">@lang('Save')</button>
        </div>
    </form>
@endsection
