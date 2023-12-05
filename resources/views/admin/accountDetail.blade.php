<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Akun') }}
        </h2>
    </x-slot>
    <!---------------- Card ------------------>
    <div class="py-12">
        <div class="max-w-10xl mx-auto py-6 px-4 sm:px-10 lg:px-10">

            <!---------------- Card ------------------>

            <div class="sm:rounded-lg m-3 bg-white p-6 shadow-md">
                <div class="flex items-center justify-start py-7">
                    <x-link
                        class=" mr-5
                    border-gray-500 hover:border-gray-700 focus:border-gray-700 active:border-gray-800 bg-gray-500
                    hover:bg-gray-300 focus:bg-transparent active:bg-transparent text-black"
                        title="Detail" href="{{ route('account') }}">
                        <x-back-icon></x-back-icon>
                    </x-link>
                    <h1 class="font-bold text-4xl  ">Account Information :</h1>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="text-gray-600 text-2xl font-bold my-4">Name:</label>
                        <p class="text-gray-800 text-xl">{{ $user->name }}</p>
                    </div>

                    <div>
                        <label class="text-gray-600 text-2xl font-bold my-4">Email:</label>
                        <p class="text-gray-800 text-xl">{{ $user->email }}</p>
                    </div>

                    <div>
                        <label class="text-gray-600 text-2xl font-bold my-4">Account Type:</label>
                        <p class="text-gray-800 text-xl">{{ $user->type }}</p>
                    </div>

                    @if (!empty($user->userDesc->roles))
                        <div>
                            <label class="text-gray-600 text-2xl font-bold my-4">Account Role:</label>
                            <p class="text-gray-800 text-xl">{{ $user->userDesc->roles }}</p>
                        </div>
                    @else
                        <div> <label class="text-gray-600 text-2xl font-bold my-4">Account Role:</label>
                            <p class="text-red-500 text-xl">Doesn't have a Role Yet</p>
                        </div>
                    @endif

                    @if (!empty($user->userDesc->no_telp))
                        <div>
                            <label class="text-gray-600 text-2xl font-bold my-4">Phone Number:</label>
                            <p class="text-gray-800 text-xl">{{ $user->userDesc->no_telp }}</p>
                        </div>
                    @else
                        <div>
                            <label class="text-gray-600 text-2xl font-bold my-4">Phone Number::</label>
                            <p class="text-red-500 text-xl">Doesn't have Phone Number</p>
                        </div>
                    @endif

                    @if (!empty($user->userDesc->created_at))
                        <div>
                            <label class="text-gray-600 text-2xl font-bold my-4">Created At:</label>
                            <p class="text-gray-800 text-xl">{{ $user->userDesc->created_at }}</p>
                        </div>
                    @else
                        <div>
                            <label class="text-gray-600 text-2xl font-bold my-4">Created At:</label>
                            <p class="text-red-500 text-xl">Date created unknown</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>



    </div>

</x-app-layout>
