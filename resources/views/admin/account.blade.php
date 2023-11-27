<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Akun') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <x-link class="mb-5" href="{{ route('daftar') }}">
                        <x-plus-icon></x-plus-icon>
                        {{ __('Create Account') }}
                    </x-link>

                    @if (count($data) > 0)
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Account
                                            Type</span>
                                    </th>

                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Account
                                            Roles</span>
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
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->type }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                            {{ $item->userDesc->roles }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 flex justify-evenly items-center">

                                            <x-link
                                                class="bg-green-500 hover:bg-green-700 focus:bg-green-700 active:bg-green-800 "
                                                title="Detail" href="{{ route('account.show', ['id' => $item->id]) }}">
                                                <x-detail-icon></x-detail-icon>
                                            </x-link>

                                            <form action="{{ route('account.delete', ['id' => $item->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')

                                                <x-primary-button
                                                    class="bg-red-500 hover:bg-red-700 focus:bg-red-700 active:bg-red-800">
                                                    <x-delete-icon></x-delete-icon>
                                                </x-primary-button>
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="my-5">
                            {{ $data->onEachSide(5)->links() }}
                        </div>
                    @else
                        <div class="flex items-center justify-center h-full">
                            <div class="text-center">
                                <x-no-data></x-no-data>
                                <h1 class=" font-semibold  text-2xl mt-3 ">Data Not Found</h1>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
