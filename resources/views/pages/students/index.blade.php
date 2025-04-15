<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Etudiants') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-start">

        <!-- List of students -->
        <div class="lg:col-span-2">
            <div class="card h-full min-w-full">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-4">Liste des étudiants</h2>
                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr class="border-b">
                            <th class="py-2">Promotion</th>
                            <th class="py-2">Nom</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Date de naissance</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr class="border-b">
                                <td class="py-2">
                                    {{ $student->student }}<br>
                                </td>
                                <td class="py-2">
                                    {{ $student->first_name }} {{ $student->last_name  }}
                                </td>
                                <td class="py-2">
                                    {{ $student->email }}
                                </td>
                                <td class="py-2">
                                    {{ $student->birthday }}
                                </td>
                                <td class="py-2 flex gap-2">
                                    <a href="{{ route('student.edit', $student->id) }}"
                                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        Modifier
                                    </a>
                                    <form action="{{ route('student.delete', $student->id) }}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer cet étudiants ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="lg:col-span-1">
            <div class="card h-full flex flex-col justify-between">
                <div>
                    <div class="card-header p-4">
                        <h3 class="card-title text-lg font-semibold">Ajouter une promotion</h3>
                    </div>
                    <div class="card-body p-4 flex flex-col gap-4">
                        <form action="{{ route('student.store') }}" method="post" class="flex flex-col gap-4">
                            @csrf

                            <x-forms.input name="school_id" :label="__('School id')" />
                            <span class="text-gray-500 text-sm">(Cergy : 1 - Paris : 2)</span>

                            <x-forms.input name="cohort" :label="__('Promotion')" />
                            <span class="text-gray-500 text-sm">(Ex : Cergy B1)</span>

                            <x-forms.input name="first_name" :label="__('Prenom')" />
                            <x-forms.input name="last_name" :label="__('Nom')" />
                            <x-forms.input name="email" :label="__('Email')" />

                            <x-forms.input type="date" name="birthday" :label="__('Date de naissance')" />

                            <x-forms.primary-button>
                                {{ __('Valider') }}
                            </x-forms.primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>

@include('pages.students.student-modal')
