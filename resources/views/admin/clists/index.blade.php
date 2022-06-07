<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendar Lists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 items-center flex flex-col">
                    <div class="w-1/2 text-justify">
                        Kalender werden zu Listen zusammengefasst, um mehrere Kalender vergleichen oder Termine leichter festlegen zu können. Eine Liste kann aus beliebig vielen Kalendern bestehen. Außerdem kann auch ein Kalender in beliebig vielen Listen angezeigt werden. Das Erstellen dieser Listen, die Zuordnung von Kalendern zu den Listen und die Gruppierung thematisch ähnlicher Listen kann auf dieser Seite erfolgen.
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
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-right">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clists as $clist)
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $clist->id }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $clist->name }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 mx-2 whitespace-nowrap w-full flex items-center">

                                                    <a
                                                        class="px-4 py-2 my-2 bg-blue-400 rounded-2xl"
                                                        href="{{ route('clists.edit', $clist) }}"
                                                    >
                                                        {{ __('Edit') }}
                                                    </a>

                                                    <form action="{{ route('clists.destroy', $clist) }}" method="POST">
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
                                        href="{{ route('clists.create') }}"
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
