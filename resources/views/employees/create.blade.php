<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="row" action="{{ (isset($employee) ? route('employees.update', ['employee' => $employee->id]) : route('employees.store')) }}" method="post">
                        @csrf
                        @if(isset($employee))
                            @method('PUT')
                        @endif
                        <div class="mb-3 col-md-6">
                            <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                            <input type="text" placeholder="Teszt" class="form-control" id="first_name" name="first_name" value="{{ (isset($employee) ? $employee->first_name : old('first_name')) }}">
                            @error('first_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                            <input type="text" placeholder="Jakab" class="form-control" id="last_name" name="last_name" value="{{ (isset($employee) ? $employee->last_name : old('last_name')) }}">
                            @error('last_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">{{ __('Email address') }}</label>
                            <input type="email" placeholder="jakab.teszt@lioner.hu" class="form-control" id="email" name="email" value="{{ (isset($employee) ? $employee->email : old('email')) }}">
                            @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="phone" class="form-label">{{ __('Phone') }}</label>
                            <input type="text" placeholder="36308888888" class="form-control" id="phone" name="phone" value="{{ (isset($employee) ? $employee->phone : old('phone')) }}">
                            @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="company_id" class="form-label">{{ __('Company') }}</label>
                            <select name="company_id" id="company_id" class="form-control">
                                <option value="">{{ __('Select your option') }}</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" @if(isset($employee) && $company->id == $employee->company_id) selected @endif>{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12 d-flex justify-end">
                            <button type="submit" class="btn btn-primary">{{ (isset($employee) ? __('Save') : __('Create')) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
