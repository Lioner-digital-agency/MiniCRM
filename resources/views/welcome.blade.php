<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <style>
        body {
            background: #f3f4f6;
            color: #1f2937;
            overflow-x: hidden;
        }

        h1 {
            font-size: 8em;
        }

        @media only screen and (max-width: 768px) {
            h1 {
                font-size: 5em;
            }
        }
    </style>
</head>
<body>
<div style="height:100vh;" class="d-flex justify-content-center align-items-center">
    <div>
        <h1>{{ config('app.name') }}</h1>
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('login') }}" class="btn btn-primary"
               style="background:#1f2937;border:none;">{{ __('Login') }}</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3">
            <div class="bg-white p-3 rounded-md">
                @if($companies)
                    <div class="table-responsive">
                        <table class="table text-center">
                            <tr>
                                <th>{{ __('Company Name') }}</th>
                                <th>{{ __('Company Logo') }}</th>
                                <th>{{ __('Company Email') }}</th>
                                <th>{{ __('Number Of Employees') }}</th>
                            </tr>
                            @foreach($companies as $company)
                                <tr>
                                    <td class="align-middle">{{ $company->name }}</td>
                                    <td class="align-middle"><img src="{{ asset($company->logo_path) }}"
                                                                  alt="{{ $company->name }}" class="mx-auto"
                                                                  style="height:50px;width: auto;"></td>
                                    <td class="align-middle"><a
                                            href="mailto:{{ $company->email }}">{{ $company->email }}</a></td>
                                    <td class="align-middle">{{ $company->employees->count() }}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $companies->links('pagination.default') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</html>
