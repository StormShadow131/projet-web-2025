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
        <!-- Cohorts current year -->
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Promotions (Année en cours)
                        </h3>
                    </div>
                    <div class="card-body flex flex-col gap-5">
                        @forelse($cohorts as $cohort)
                            <div class="p-4 bg-gray-800 rounded-xl shadow">
                                <h2 class="text-xl text-white font-semibold">{{ $cohort->nom }}</h2>
                                <p class="text-white">Année : {{ $cohort->year }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500">Aucune promotion</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- All cohorts -->
        <div class="lg:col-span-1">
            <div class="card card-grid h-full min-w-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Toutes mes promotions
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    @forelse($cohorts as $cohort)
                        <div class="p-3 bg-gray-700 rounded-lg shadow">
                            <h4 class="text-white text-base font-semibold">{{ $cohort->nom }}</h4>
                            <p class="text-gray-300 text-sm">Année : {{ $cohort->year }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">Aucune promotion</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
