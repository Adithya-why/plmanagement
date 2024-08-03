<x-layout>

    <h1 class="text-3xl font-bold">Registered Students</h1>
    {{-- if registered students exist, then show their details --}}

    @if (!$registeredStudents->isEmpty())
        
        <ul class="flex gap-4 p-4">
            @foreach ($registeredStudents as $student)
                <li>{{ $student->studentid }}</li>
                <li>{{ $student->deptno }}</li>
                <li>{{ $student->department }}</li>
                <li>{{ $student->cgpa }}</li>
            @endforeach
        </ul>

    @else

        <h2>No registrations received</h2>

    @endif
   
        

</x-layout>