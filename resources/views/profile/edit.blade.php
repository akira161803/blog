@extends('parts.common')

@section('content')
    <div class="mt-20 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 mx-2 bg-[#1A2433] sm:rounded-lg shadow-lg shadow-sky-300 hover:shadow-2xl hover:shadow-sky-300 transition duration-500">
                <div class="max-w-xl ">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 mx-2 bg-[#1A2433] sm:rounded-lg shadow-lg shadow-sky-300 hover:shadow-2xl hover:shadow-sky-300 transition duration-500">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 mx-2 bg-[#1A2433] sm:rounded-lg shadow-lg shadow-sky-300 hover:shadow-2xl hover:shadow-sky-300 transition duration-500">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
