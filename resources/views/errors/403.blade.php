{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}

@include('layouts.errorpage', [
    'code' => 403,
    'message' => __($exception->getMessage() ?: 'Forbidden'),
])
