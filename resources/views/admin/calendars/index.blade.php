<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 items-center flex flex-col">
                    <div class="w-1/2 text-justify">
                        Ein Kalender beinhaltet Termine von Vereinen, Organisationen oder Räumen. Kalender können zu Listen zusammengefasst werden und Listen können in Gruppen organisiert werden. Auf dieser Seite können Kalender erstellt, sowie zu Listen zugeordnet werden. Es können nur Kalender dieses Kalendersystems angezeigt werden. Der URL für diese Kalender lautet <br /> {{ env('CALENDAR_URL') }}.
                    </div>
                    <!-- table -->
                    <div class="flex flex-col mt-8">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                        <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            {{ __('ID') }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            {{ __('Name') }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            {{ __('Code') }}
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-right">
                                            {{ __('Action') }}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($calendars as $calendar)
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $calendar->id }}</td>

                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $calendar->calname }}
                                                </td>

                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $calendar->calcode }}
                                                </td>

                                                <td class="text-sm text-gray-900 font-light px-6 mx-2 whitespace-nowrap w-full flex items-center">

                                                    <a
                                                        class="px-4 py-2 my-2 bg-blue-400 rounded-2xl"
                                                        href="{{ route('calendars.edit', $calendar) }}"
                                                    >
                                                        {{ __('Edit') }}
                                                    </a>

                                                    <form action="{{ route('calendars.destroy', $calendar) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button
                                                                class="px-4 py-2 my-2 mx-2 bg-red-400 rounded-2xl"
                                                            >
                                                                {{ __('Delete') }}
                                                            </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                <div class="w-full flex flex-col mt-8 items-center">
                                    <a
                                        class="px-4 py-2 mx-2 my-2 bg-blue-400 rounded-2xl"
                                        href="{{ route('calendars.create') }}"
                                    >
                                        {{ __('New') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- end table -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
