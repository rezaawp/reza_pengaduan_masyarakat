{{-- @extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests')) --}}

@include('layouts.errorpage', [
    'code' => 429,
    'message' => __('Too Many Requests'),
    'message1' => __('Mohon maaf, terlalu banyak permintaan. Silahkan coba lagi nanti')
])
