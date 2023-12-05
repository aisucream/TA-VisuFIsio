<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Latihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto py-6 px-4 sm:px-10 lg:px-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg lg:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    @if (count($data) > 0)
                        <table class="min-w-full divide-y divide-gray-200 border table-responsive">
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
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900  grid grid-cols-2 gap-3">


                                            <x-link
                                                class="bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 "
                                                title="Detail Latihan"
                                                href="{{ route('course.detail', ['id' => $item->id]) }}">
                                                <x-detail-icon></x-detail-icon> Detail
                                            </x-link>


                                            @if (auth()->user()->userDesc->roles !== 'pasien')
                                                <form action="{{ route('course.delete', ['id' => $item->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <x-primary-button
                                                        class="bg-red-500 hover:bg-red-700 focus:bg-red-700 active:bg-red-800 sm:mr-2 lg:mr-5 "
                                                        title="Delete">
                                                        <x-delete-icon></x-delete-icon>
                                                    </x-primary-button>
                                                </form>
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <div class="flex items-center justify-center h-full">
                                <div class="text-center">
                                    <x-no-data></x-no-data>
                                    <h1 class=" font-semibold  text-2xl mt-3 ">Data Not Found</h1>
                                </div>
                            </div>
                        </table>
                    @endif

                    <div class="my-5">
                        {{ $data->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
