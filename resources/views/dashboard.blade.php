<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


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

</x-app-layout>
