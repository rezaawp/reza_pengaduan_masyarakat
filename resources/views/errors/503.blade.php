{{-- @extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable')) --}}

@include('layouts.errorpage', [
    'code' => 503,
    'message' => __('Service Unavailable'),
    'message1' => __('Kami mohon maaf atas ketidaknyamanan ini. Kami akan segera memperbarui layanan ini'),
])
