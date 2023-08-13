{{-- @extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error')) --}}

@include('layouts.errorpage', [
    'code' => 500,
    'message' => __('Server Error'),
    'message1' => __("Kami mohon maaf atas ketidaknyamanan ini. Kami akan segera memperbaiki"),
])
