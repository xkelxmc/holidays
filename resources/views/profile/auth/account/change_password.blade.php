@extends('profile.layout')

@section('after_styles')
<style media="screen">
    .backpack-profile-form .required::after {
        content: ' *';
        color: red;
    }
</style>
@endsection

@section('header')
<section class="content-header">

    <h1>
        {{ trans('profile.my_account') }}
    </h1>

    <ol class="breadcrumb">

        <li>
            <a href="{{ url('profile') }}">{{ config('backpack.base.project_name') }}</a>
        </li>

        <li>
            <a href="{{ route('profile.account.info') }}">{{ trans('profile.my_account') }}</a>
        </li>

        <li class="active">
            {{ trans('profile.change_password') }}
        </li>

    </ol>

</section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('profile.auth.account.sidemenu')
    </div>
    <div class="col-md-8">

        <form class="form" action="{{ route('profile.account.password') }}" method="post">

            {!! csrf_field() !!}

            <div class="box">

                <div class="box-body backpack-profile-form">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->count())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        @php
                            $label = trans('profile.old_password');
                            $field = 'old_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                    <div class="form-group">
                        @php
                            $label = trans('profile.new_password');
                            $field = 'new_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                    <div class="form-group">
                        @php
                            $label = trans('profile.confirm_password');
                            $field = 'confirm_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                </div>

                <div class="box-footer">

                    <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('profile.change_password') }}</span></button>
                    <a href="{{ url('profile') }}" class="btn btn-default"><span class="ladda-label">{{ trans('profile.cancel') }}</span></a>

                </div>
            </div>

        </form>

    </div>
</div>
@endsection
