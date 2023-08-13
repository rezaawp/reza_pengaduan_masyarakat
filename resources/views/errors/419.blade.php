{{-- @extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired')) --}}

@include('layouts.errorpage', [
    'code' => 419,
    'message' => __('Page Expired'),
])
