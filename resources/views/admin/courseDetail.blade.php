<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Course') }}
        </h2>

    </x-slot>

    <div class="py-6 max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-wrap gap-2 bg-white p-6 rounded-lg mt-1  justify-evenly">

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


    <div class="py-3">
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

        </div>
    </div>

    <script>
        var voutData = @json($courseDetails->pluck('vout'));
        var pvalue = @json($courseDetails->pluck('position'));
    </script>


</x-app-layout>
