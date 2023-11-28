<x-guest-layout>
    <form action="{{ route('evaluation.store', ['id' => $course->id]) }}" method="POST">
        @csrf
        <div>
            <div>
                <x-input-label for="user" :value="__('Name')" />
                <x-text-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user')"
                    required autofocus autocomplete="user" value='{{ $user->name }}' readonly />
                <x-input-error :messages="$errors->get('user')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="code" :value="__('Course Code')" />
                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')"
                    required autofocus autocomplete="code" value='{{ $course->code }}' readonly />
                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="notes" :value="__('Course Patient')" />
                <x-text-input id="notes" class="block mt-1 w-full" type="text" name="notes" :value="old('notes')"
                    required autofocus autocomplete="notes" value='{{ $course->user->name }}' readonly />
                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
            </div>
        </div>

        <!------- Notes ---------->
        <div>
            <div class="mt-4">
                <x-input-label for="status" :value="__('Status')" />
                <select id="status" name="status" class="block mt-1 w-full p-2 border rounded-md">
                    <option value="Sangat Baik" class="text-green-800">Sangat Baik</option>
                    <option value="Baik" class="text-yellow-800">Baik</option>
                    <option value="Cukup" class="text-yellow-600">Cukup</option>
                    <option value="Buruk" class="text-red-800">Buruk</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="notes" :value="__('Evaluation')" />
                <x-text-input id="notes" class="block mt-1 w-full" type="text" name="notes" :value="old('notes')"
                    required autofocus autocomplete="notes" />
                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="notes" :value="__('Description')" />
                <textarea name="description" id="description" cols="10" rows="10"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"></textarea>
            </div>


        </div>

        <x-primary-button class="mt-4 ">
            {{ __('Simpan') }}
        </x-primary-button>

    </form>
</x-guest-layout>
