{{-- @extends('errors::minimal')

@section('title', __('Page Not Found'))
@section('code', '404')
@section('message', __('Page Not Found')) --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .error-container {
            text-align: center;
            padding: 100px 0;
        }

        .error-code {
            font-size: 96px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn-home {
            padding: 10px 30px;
            font-size: 18px;
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 error-container">
                <div class="error-code">404</div>
                <div class="error-message">{{ __('Page Not Found') }}</div>
                {{-- <a href="/" class="btn btn-home">Kembali ke Beranda</a> --}}
            </div>
        </div>
    </div>
</body>

</html>
