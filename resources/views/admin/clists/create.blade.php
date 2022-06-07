<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Calendar List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 items-center flex flex-col">
                <h1>
                    Neue Kalenderliste anlegen
                </h1>
            </div>
            <div class="text-gray-800 m-16">
                <form method="POST" action="{{ route('clists.store') }}">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for='clistName'
                        >
                            Name der Kalenderliste
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                            type="text"
                            placeholder="Sportvereine"
                            name='clistName'
                            width='500rem'
                            height="200"
                            id='clistName'
                            required
                        />

                        @error('clistName')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for='groupMemberships'
                        >
                            Gruppen, in denen diese Liste angezeigt werden soll
                        </label>

                        <select multiple class="border border-gray-400 p-2 w-full"
                            name='groupMemberships[]'
                            id='groupMemberships'
                        >
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>

                        @error('groupMemberships')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for='calendarMemberships'
                        >
                            Kalender in dieser Liste
                        </label>

                        <select multiple class="border border-gray-400 p-2 w-full"
                            name='calendarMemberships[]'
                            id='calendarMemberships'
                        >
                            @foreach ($calendars as $calendar)
                                <option value="{{ $calendar->id }}">{{ $calendar->calname }}</option>
                            @endforeach
                        </select>

                        @error('calendarMemberships')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6roupMembershipsupMembershipsroupMembershipsoupMembershipss="mb-6 items-center justify-center flex">
                        <input class="bg-red-800 rounded px-4 py-2 text-gray-200"
                            type="submit"
                            value="Anlegen"
                        />
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
