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
                        <!-- ... (unchanged) ... -->
                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach ($data as $item)
                                <tr class="bg-white">
                                    <!-- ... (unchanged) ... -->
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        <div class="flex items-center space-x-2">
                                            <!-- Detail Button -->
                                            <x-primary-button
                                                class="sm:inline-block hidden bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 "
                                                title="Detail Latihan" href="#">
                                                <x-detail-icon></x-detail-icon>Detail
                                            </x-primary-button>

                                            <!-- Delete Button -->
                                            <x-primary-button
                                                class="sm:inline-block hidden bg-red-500 hover:bg-red-700 focus:bg-red-700 active:bg-red-800 "
                                                title="Delete" href="#">
                                                <x-delete-icon></x-delete-icon>
                                            </x-primary-button>

                                            <!-- Export Button -->
                                            <x-primary-button
                                                class="sm:inline-block hidden bg-green-500 hover:bg-green-700 focus:bg-green-700 active:bg-green-800 "
                                                title="Export Data Excel" href="#">
                                                <x-data-excel-icon></x-data-excel-icon>
                                            </x-primary-button>

                                            <!-- Responsive Icons (visible on small screens) -->
                                            <div class="sm:hidden flex space-x-2">
                                                <a href="#" title="Detail Latihan">
                                                    <x-detail-icon class="text-blue-500"></x-detail-icon>
                                                </a>
                                                <a href="#" title="Delete">
                                                    <x-delete-icon class="text-red-500"></x-delete-icon>
                                                </a>
                                                <a href="#" title="Export Data Excel">
                                                    <x-data-excel-icon class="text-green-500"></x-data-excel-icon>
                                                </a>
                                            </div>
                                        </div>
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
