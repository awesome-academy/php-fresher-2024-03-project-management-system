<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('user.create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{__("user.create")}}
                </div>
            </div>

            <form action="{{ route('users.store') }}" method="POST" class="overflow-x-auto w-full border p-3">
                @csrf
                <div class="form-group">
                    <x-label for="user_name" value="Username"></x-label>
                    <x-input id="user_name" name="user_name" class="w-full"></x-input>
                </div>
                <div class="form-group">
                    <x-label for="first_name" value="First name"></x-label>
                    <x-input id="first_name" name="first_name" class="w-full"></x-input>
                </div>
                <div class="form-group">
                    <x-label for="last_name" value="Last name"></x-label>
                    <x-input id="last_name" name="last_name" class="w-full"></x-input>
                </div>
                <div class="form-group">
                    <x-label for="email" value="Email"></x-label>
                    <x-input id="email" name="email" class="w-full"></x-input>
                </div>
                <div class="form-group">
                    <x-label for="password" value="Password"></x-label>
                    <x-input id="password" name="password" class="w-full"></x-input>
                </div>
                <div class="form-group">
                    <x-label for="password_confirmation" value="Password confirmation"></x-label>
                    <x-input id="password_confirmation" name="password_confirmation" class="w-full"></x-input>
                </div>

                <div class="mt-4 mb-4">
                    <x-button>
                        {{__('Create')}}
                    </x-button>
                    <a class="underline" href="{{route('users.index')}}">{{ __('Go Back') }}</a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>