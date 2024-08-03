<x-layout>

    <h1>Registered Students</h1>


    @if (!$registered->isEmpty())
        
        <ul>
            @foreach ($registered as $student)
                <li>{{ $student->studentid }}</li>
            @endforeach
        </ul>

    @else

        <h2>No registrations received</h2>

    @endif
   
        

</x-layout>