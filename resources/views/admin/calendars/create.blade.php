<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Calendar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 items-center flex flex-col">
                <h1>
                    Neuen Kalender eintragen
                </h1>
            </div>
            <div class="text-gray-800 m-16">
                <form method="POST" action="{{ route('calendars.store') }}">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for='calendarName'
                        >
                            Name des Kalenders
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                            type="text"
                            placeholder="Vereinskalender"
                            name='calendarName'
                            width='500rem'
                            height="200"
                            id='calendarName'
                            required
                        />

                        @error('calendarName')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for='calendarUrl'
                        >
                            Öffentlicher URL des Kalenders (nur öffentliche Kalender können eingetragen werden)
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                            type="text"
                            placeholder="{{ env('CALENDAR_URL') . "XXXXXXXXXXXXXXXX" }}"
                            name='calendarUrl'
                            width='500rem'
                            height="200"
                            id='calendarUrl'
                            required
                        />

                        @error('calendarUrl')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for='clistMemberships'
                        >
                            Listen, in denen dieser Kalender angezeigt werden soll
                        </label>

                        <select multiple class="border border-gray-400 p-2 w-full"
                            name='clistMemberships[]'
                            id='clistMemberships'
                        >
                            @foreach ($clists as $clist)
                                <option value="{{ $clist->id }}">{{ $clist->name }}</option>
                            @endforeach
                        </select>

                        @error('clistMemberships')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6 items-center justify-center flex">
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
