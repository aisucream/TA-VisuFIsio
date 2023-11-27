<x-guest-layout>

    {{-- <form action="{{ route('back') }}" method="POST">
        @csrf
        @method('DELETE')
        <x-primary-button type="submit"
            class="bg-transparent border-gray-500 hover:border-transparent hover:bg-gray-300 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>

            <input type="hidden" name="user_id" value="{{ $user_id }}">
        </x-primary-button>
    </form> --}}

    <form action="{{ route('daftar.peran.edit', ['id' => $id]) }}" method="POST">
        @csrf

        <!------ Role ----->
        <div>
            <div class="mt-4">
                <x-input-label for="role" :value="__('Role')" />
                <select id="role" name="role" class="block mt-1 w-full p-2 border rounded-md">
                    <option value="admin">Admin</option>
                    <option value="fisioterapis">Fisioterapis</option>
                    <option value="dokter">Dokter</option>
                    <option value="pasien">Pasien</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>
        </div>

        <!-- No Telp -->
        <div class="mt-4">
            <x-input-label for="no_telp" :value="__('Nomor Telepon')" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')"
                required />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 ">

            <x-primary-button class="ms-4 ">
                {{ __('Register') }}
            </x-primary-button>
        </div>

    </form>


</x-guest-layout>
