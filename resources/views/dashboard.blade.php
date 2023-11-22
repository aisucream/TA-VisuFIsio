<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Latihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span
                                        class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span
                                        class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Start</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span
                                        class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">End</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span
                                        class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Patient</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span
                                        class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach ($data as $item)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $item->code }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $item->start_time }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $item->end_time }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $item->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        <x-primary-button
                                            class="bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 "
                                            title="Detail Latihan" href="#">
                                            <x-detail-icon></x-detail-icon>Detail
                                        </x-primary-button>

                                        <x-primary-button
                                            class="bg-red-500 hover:bg-red-700 focus:bg-red-700 active:bg-red-800 "
                                            title="Delete" href="#">
                                            <x-delete-icon></x-delete-icon>
                                        </x-primary-button>

                                        <x-primary-button
                                            class="bg-green-500 hover:bg-green-700 focus:bg-green-700 active:bg-green-800 "
                                            title="Export Data Excel" href="#">
                                            <x-data-excel-icon></x-data-excel-icon>
                                        </x-primary-button>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="my-5 ">
                        {{ $data->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
