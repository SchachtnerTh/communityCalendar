<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Group') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 items-center flex flex-col">
                <h1>
                    Anzeigegruppe ändern
                </h1>
            </div>
            <div class="text-gray-800 m-16">
                <form method="POST" action="{{ route('groups.update', $group) }}">
                    @method('PATCH')
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for='groupName'
                        >
                            Name der Gruppe
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                            type="text"
                            placeholder="Gruppe 1"
                            name='groupName'
                            width='500rem'
                            height="200"
                            id='groupName'
                            value='{{ $group->name }}'
                            required
                        />

                        @error('groupName')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for='clistMemberships'
                        >
                            Anzuzeigende Listen in dieser Gruppe
                        </label>

                        <select multiple class="border border-gray-400 p-2 w-full"
                            name='clistMemberships[]'
                            id='clistMemberships'
                        >
                            @foreach ($fulllist as $item)
                                @if ($clists->contains($item))
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}"         >{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('clistMemberships')
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
