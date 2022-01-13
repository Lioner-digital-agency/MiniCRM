<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
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
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">{{ __('New Employee') }}</a>
                    </div>
                    @if($employees)
                        <div class="table-responsive">
                            <table class="table text-center">
                                <tr>
                                    <th>{{ __('Employee Name') }}</th>
                                    <th>{{ __('Employee E-mail') }}</th>
                                    <th>{{ __('Employee Phone') }}</th>
                                    <th>{{ __('Company Name') }}</th>
                                    <th></th>
                                </tr>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td class="align-middle">{{ $employee->full_name }}</td>
                                        <td class="align-middle"><a
                                                href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></td>
                                        <td class="align-middle"><a
                                                href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></td>
                                        <td class="align-middle">{{ $employee->company->name }}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                                               class="btn d-inline-block btn-primary">{{ __('Edit') }}</a>
                                            <form class="d-inline-block"
                                                  action="{{ route('employees.destroy', ['employee' => $employee->id]) }}"
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
                            {{ $employees->links('pagination.default') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
