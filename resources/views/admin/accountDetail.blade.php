<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Akun') }}
        </h2>
    </x-slot>
    <!---------------- Card ------------------>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!---------------- Card ------------------>

            <div class="sm:rounded-lg m-3 bg-white p-6 shadow-md">
                <div class=" flex  items-center justify-start">
                    <x-link
                        class="mb-10 border-gray-500 hover:border-gray-700 focus:border-gray-700 active:border-gray-800  bg-transparent hover:bg-gray-300 focus:bg-transparent active:bg-transparent text-black"
                        title="Detail" href="{{ route('account') }}">
                        <x-back-icon></x-back-icon>
                    </x-link>
                    <h1 class="font-bold text-2xl  ml-5 mb-10">Account Information :</h1>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-gray-600 text-m font-bold">Name:</label>
                        <p class="text-gray-800">{{ $user->name }}</p>
                    </div>

                    <div>
                        <label class="text-gray-600 text-m font-bold">Email:</label>
                        <p class="text-gray-800">{{ $user->email }}</p>
                    </div>

                    <div>
                        <label class="text-gray-600 text-m font-bold">Account Type:</label>
                        <p class="text-gray-800">{{ $user->type }}</p>
                    </div>

                    <div>
                        <label class="text-gray-600 text-m font-bold">Account Role:</label>
                        <p class="text-gray-800">{{ $user->userDesc->roles }}</p>
                    </div>

                    <div>
                        <label class="text-gray-600 text-m font-bold">Phone Number:</label>
                        <p class="text-gray-800">{{ $user->userDesc->no_telp }}</p>
                    </div>

                    <div>
                        <label class="text-gray-600 text-m font-bold">Created At :</label>
                        <p class="text-gray-800">{{ $user->created_at }}</p>
                    </div>
                </div>


            </div>
        </div>



    </div>

</x-app-layout>
