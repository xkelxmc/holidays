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
            {{ trans('profile.update_account_info') }}
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

        <form class="form" action="{{ route('profile.account.info') }}" method="post">

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
                            $label = trans('profile.name');
                            $field = 'name';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input required class="form-control" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user[$field] }} ">
                    </div>

                    <div class="form-group">
                        @php
                            $label = trans('profile.email_address');
                            $field = 'email';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input required class="form-control" type="email" name="{{ $field }}" value="{{ old($field) ? old($field) : $user[$field] }} ">
                    </div>

                </div>

                <div class="box-footer">

                    <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('profile.save') }}</span></button>
                    <a href="{{ url('profile') }}" class="btn btn-default"><span class="ladda-label">{{ trans('profile.cancel') }}</span></a>

                </div>
            </div>

        </form>

    </div>
</div>
@endsection
