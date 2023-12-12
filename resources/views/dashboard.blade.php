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
                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 flex justify-start items-center">


                                            <x-link
                                                class="bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 mr-4"
                                                title="Detail Latihan"
                                                href="{{ route('course.detail', ['id' => $item->id]) }}">
                                                <x-detail-icon></x-detail-icon> Detail
                                            </x-link>


                                            @if (auth()->user()->userDesc->roles !== 'pasien')
                                                <x-danger-button x-data=""
                                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                                                    <x-delete-icon></x-delete-icon>
                                                </x-danger-button>

                                                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                                    <form method="post"
                                                        action="{{ route('course.delete', ['id' => $item->id]) }}"
                                                        class="p-6">
                                                        @csrf
                                                        @method('delete')

                                                        <h2 class="text-lg font-medium text-gray-900">
                                                            {{ __('Are you sure you want to delete this course?') }}
                                                        </h2>

                                                        <p class="mt-1 text-sm text-gray-600">
                                                            {{ __('Once course is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete course.') }}
                                                        </p>

                                                        <div class="mt-6">
                                                            <x-input-label for="password" value="{{ __('Password') }}"
                                                                class="sr-only" />

                                                            <x-text-input id="password" name="password" type="password"
                                                                class="mt-1 block w-3/4"
                                                                placeholder="{{ __('Password') }}" />

                                                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                                        </div>

                                                        <div class="mt-6 flex justify-end">
                                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                                {{ __('Cancel') }}
                                                            </x-secondary-button>

                                                            <x-danger-button class="ms-3">
                                                                {{ __('Delete Course') }}
                                                            </x-danger-button>
                                                        </div>
                                                    </form>
                                                </x-modal>
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
