<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Dashboard') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Statistique groupes
                        </h3>
                    </div>
                    <div class="card-body flex flex-col gap-5">
                        <!-- Students and Teachers -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="p-4 bg-gray-800 rounded-xl shadow">
                                <h2 class="text-xl text-white font-semibold">Étudiants</h2>
                                <p class="text-3xl text-white mt-2">{{ $totalStudents }}</p>
                            </div>
                            <div class="p-4 bg-gray-800 rounded-xl shadow">
                                <h2 class="text-xl text-white font-semibold">Enseignants</h2>
                                <p class="text-3xl text-white mt-2">{{ $totalTeachers }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="card card-grid h-full min-w-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Statistique personnes
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    <!-- Cohorts and Groupes -->
                    <div class="p-4 bg-gray-800 rounded-xl shadow">
                        <h2 class="text-xl text-white font-semibold">Promotions</h2>
                        <p class="text-3xl text-white mt-2">{{ $totalCohorts }}</p>
                    </div>
                    <div class="p-4 bg-gray-800 rounded-xl shadow">
                        <h2 class="text-xl text-white font-semibold">Groupes</h2>
                        <p class="text-3xl text-white mt-2">{{ $totalGroupes }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
