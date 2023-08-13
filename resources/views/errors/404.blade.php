@include('layouts.errorpage', [
    'code' => 404,
    'message' => __('Page Not Found'),
    'message1' => __('We are sorry but the page you are looking for was not found'),
])
