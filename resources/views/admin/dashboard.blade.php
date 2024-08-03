<x-layout>

    <h1>Admin Dashboard</h1>

    <ul>
        @foreach ($companies as $company)
        
            <li>
                <div>{{$company->name}}</div>
                <div>{{$company->position}}</div>
            </li>
        @endforeach
    </ul>

</x-layout>