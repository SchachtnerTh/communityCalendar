<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Calendar List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 items-center flex flex-col">
                <h1>
                    Kalenderliste ändern
                </h1>
            </div>
            <div class="text-gray-800 m-16">
                <form method="POST" action="{{ route('clists.update', $clist) }}">
                    @method('PATCH')
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for='clistName'
                        >
                            Name der Kalenderliste
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                            type="text"
                            placeholder="Gruppe 1"
                            name='clistName'
                            width='500rem'
                            height="200"
                            id='clistName'
                            value='{{ $clist->name }}'
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
                            Gruppen, in denen diese Liste enthalten sein soll
                        </label>

                        <select multiple class="border border-gray-400 p-2 w-full"
                            name='groupMemberships[]'
                            id='groupMemberships'
                        >
                            @foreach ($groups_list as $group_item)
                                @if ($clist->groups->contains($group_item))
                                    <option value="{{ $group_item->id }}" selected>{{ $group_item->name }}</option>
                                @else
                                    <option value="{{ $group_item->id }}"         >{{ $group_item->name }}</option>
                                @endif
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
                            Kalender in dieser Gruppe
                        </label>

                        <select multiple class="border border-gray-400 p-2 w-full"
                            name='calendarMemberships[]'
                            id='calendarMemberships'
                        >
                            @foreach ($calendars_list as $calendar_item)
                                @if ($clist->calendars->contains($calendar_item))
                                    <option value="{{ $calendar_item->id }}" selected>{{ $calendar_item->calname }}</option>
                                @else
                                    <option value="{{ $calendar_item->id }}"         >{{ $calendar_item->calname }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('calendarMemberships')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6 items-center justify-center flex">
                        <input class="bg-red-800 rounded px-4 py-2 text-gray-200"
                            type="submit"
                            value="{{ __("Update") }}"
                        />
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
