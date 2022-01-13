<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="row" action="{{ (isset($company) ? route('companies.update', ['company' => $company->id]) : route('companies.store')) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($company))
                            @method('PUT')
                        @endif
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" placeholder="Lioner Digitális Ügynökség Bt." class="form-control" id="name" name="name" value="{{ (isset($company) ? $company->name : old('name')) }}">
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">{{ __('Email address') }}</label>
                            <input type="email" placeholder="info@lioner.hu" class="form-control" id="email" name="email" value="{{ (isset($company) ? $company->email : old('email')) }}">
                            @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="website" class="form-label">{{ __('Website') }}</label>
                            <input type="text" placeholder="https://lioner.hu/" class="form-control" id="website" name="website" value="{{ (isset($company) ? $company->website : old('website')) }}">
                            @error('website')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="logo" class="form-label">{{ __('Logo') }}</label>
                            <input type="file" class="form-control" id="logo" name="logo" value="{{ old('logo') }}">
                            @error('logo')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12 d-flex justify-end">
                            <button type="submit" class="btn btn-primary">{{ (isset($company) ? __('Save') : __('Create')) }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
