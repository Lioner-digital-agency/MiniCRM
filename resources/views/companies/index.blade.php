<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            @if(Session::has('success'))
                <div class="col-md-12 mt-5">
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            @if(Session::has('error'))
                <div class="col-md-12 mt-5">
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('error') }}
                    </div>
                </div>
            @endif
            <div class="col-md-12 my-3">
                <div class="bg-white p-3 rounded-md">
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">{{ __('New Company') }}</a>
                    </div>
                    @if($companies)
                        <div class="table-responsive">
                            <table class="table text-center">
                                <tr>
                                    <th>{{ __('Company Name') }}</th>
                                    <th>{{ __('Company E-mail') }}</th>
                                    <th>{{ __('Company Logo') }}</th>
                                    <th>{{ __('Company Website') }}</th>
                                    <th></th>
                                </tr>
                                @foreach($companies as $company)
                                    <tr>
                                        <td class="align-middle">{{ $company->name }}</td>
                                        <td class="align-middle"><a
                                                href="mailto:{{ $company->email }}">{{ $company->email }}</a></td>
                                        <td class="align-middle"><img src="{{ asset($company->logo_path) }}"
                                                                      alt="{{ $company->name }}" class="mx-auto"
                                                                      style="height:50px;width: auto;"></td>
                                        <td class="align-middle"><a href="{{ $company->website }}"
                                                                    target="_blank">{{ $company->website }}</a></td>
                                        <td class="align-middle">
                                            <a href="{{ route('companies.edit', ['company' => $company->id]) }}"
                                               class="btn d-inline-block btn-primary">{{ __('Edit') }}</a>
                                            <form class="d-inline-block"
                                                  action="{{ route('companies.destroy', ['company' => $company->id]) }}"
                                                  method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    class="btn d-inline-block btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
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

</x-app-layout>
