<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Course') }}
        </h2>

    </x-slot>

    @if ($course->courseDetail->isNotEmpty())
        <div class="pt-6 pb-3 max-w-10xl mx-auto sm:px-6 lg:px-10">
            <div class="flex flex-wrap gap-2 bg-white p-6 px-8 rounded-lg mt-1  justify-between">

                <div>
                    <label class=" font-medium text-lg  leading-relaxed  text-blue-800" for="code">
                        Robot's Code :
                    </label>
                    <p id="code" name='code' class=" font-normal text-lg text-gray-700 leading-relaxed ">
                        {{ $course->code }}
                    </p>
                </div>

                <div>
                    <label class=" font-medium text-lg text-green-800 leading-relaxed" for="patient">
                        Patient :
                    </label>
                    <p id="patienr" name='patient' class=" font-normal text-lg text-gray-700 leading-relaxed ">
                        {{ $course->user->name }}
                    </p>
                </div>

                <div>
                    <label class=" font-medium text-lg text-green-800 leading-relaxed" for="patient">
                        Course Time :
                    </label>
                    <p id="patienr" name='patient' class=" font-normal text-lg text-gray-700 leading-relaxed ">
                        {{ $course->start_time }} to {{ $course->end_time }}
                    </p>
                </div>
            </div>
        </div>


        <div class="pb-3">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 mb-4">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 ">

                    <div class="p-6 bg-white mt-3 rounded-lg">
                        <label class="block font-medium text-2xl text-green-800">
                            Exercises Duration:
                        </label>
                        <p class="text-xl text-gray-700">
                            {{ $course->courseDetail->last()->duration }} minutes
                        </p>
                    </div>

                    <div class="p-6 bg-white mt-3 rounded-lg">
                        <label class="block font-medium text-2xl text-green-800">
                            Number of Steps:
                        </label>
                        <p class="text-xl text-gray-700">
                            {{ $courseDetails->last()->step_amount }} steps
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-5">

                    <div class="bg-white p-6">
                        <label class="block font-medium text-2xl text-green-800">
                            Ankle Angular Velocity :
                        </label>
                        <canvas id="vout" width="300" height="100"></canvas>
                    </div>


                    <div class="bg-white p-6">
                        <label class="block font-medium text-2xl text-green-800">
                            Ankle Position :
                        </label>
                        <canvas id="position" width="300" height="100"></canvas>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 ">

                    <div class="p-6 bg-white mt-3 rounded-lg">
                        <label class="block font-medium text-2xl text-green-800">
                            Range Of Motion:
                        </label>
                        <p class="text-xl text-gray-700">
                            {{ $courseDetails->last()->rom }}° degrees
                        </p>
                    </div>

                    <div class="p-6 bg-white mt-3 rounded-lg">
                        <label class="block font-medium text-2xl text-green-800">
                            Steps per Seconds:
                        </label>
                        <p class="text-xl text-gray-700">
                            {{ $courseDetails->last()->step_per_second }} steps
                        </p>
                    </div>

                    <div class="p-6 bg-white mt-3 rounded-lg">
                        <label class="block font-medium text-2xl text-green-800">
                            Correct Gait Sequence Presentage:
                        </label>
                        <p class="text-xl text-gray-700">
                            {{ $courseDetails->last()->percentage }}%
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 ">

                    <div class="p-6 bg-white mt-3 rounded-lg">
                        <label class="block font-medium text-2xl text-green-800">
                            Correct Step Duration:
                        </label>
                        <p class="text-xl text-gray-700">
                            {{ $courseDetails->last()->step_duration }} Second
                        </p>
                    </div>

                    <div class="p-6 bg-white mt-3 rounded-lg">
                        <label class="block font-medium text-2xl text-green-800">
                            Maximum Plantarflexion:
                        </label>
                        <p class="text-xl text-gray-700">
                            {{ $courseDetails->last()->plantarmax }}° degrees
                        </p>
                    </div>

                    <div class="p-6 bg-white mt-3 rounded-lg">
                        <label class="block font-medium text-2xl text-green-800">
                            Maximum Dorsiflexion:
                        </label>
                        <p class="text-xl text-gray-700">
                            {{ $courseDetails->last()->dorsimax }}° degress
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-3 ">
                    <div class="p-6 bg-white mt-3 rounded-lg">
                        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                            {{ __('Evaluasi Latihan :') }}
                        </h2>
                        @if (auth()->user()->userDesc->roles !== 'pasien')
                            <x-link class="mb-2 mt-5" href="{{ route('evaluation', ['id' => $course->id]) }}">
                                <x-plus-icon></x-plus-icon>
                                {{ __('Create Evaluation') }}
                            </x-link>
                        @endif

                        @if ($course->courseEvaluation->isNotEmpty())
                            <table class="min-w-full divide-y divide-gray-200 border mt-5">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nama
                                                Evaluator</span>
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Notes</span>
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Deskripsi
                                            </span>
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</span>
                                        </th>
                                        <th class="px-6 py-3 bg-gray-50 text-left">
                                            <span
                                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                    @foreach ($course->courseEvaluation()->paginate(2) as $evaluation)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                {{ $evaluation->user->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                {{ $evaluation->notes }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                {{ $evaluation->description }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                {{ $evaluation->status }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                @if (auth()->user()->userDesc->roles !== 'pasien')
                                                    <form
                                                        action="{{ route('evaluation.destroy', ['id' => $evaluation->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <x-primary-button
                                                            class="bg-red-500 hover:bg-red-700 focus:bg-red-700 active:bg-red-800 "
                                                            title="Delete">
                                                            <x-delete-icon></x-delete-icon>
                                                        </x-primary-button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="my-5">
                                {{ $course->courseEvaluation()->paginate(2)->onEachSide(2)->links() }}
                            </div>
                        @else
                            <div class="flex items-center justify-center ">
                                <div class="text-center bg-red-500 rounded-lg w-full">
                                    <h1 class="font-semibold text-2xl m-6 text-white">There is no evaluation for this
                                        Course</h1>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <script>
            var voutData = @json($courseDetails->pluck('vout'));
            var pvalue = @json($courseDetails->pluck('position'));
        </script>
    @else
        <div class="flex items-center justify-center h-full">
            <div class="text-center">
                <x-no-data></x-no-data>
                <h1 class=" font-semibold  text-2xl mt-3 ">Data Not Found</h1>
            </div>
        </div>
    @endif


</x-app-layout>
