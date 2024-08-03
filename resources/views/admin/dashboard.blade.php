<x-layout>

    <h1 class="text-center w-full text-3xl font-bold">Admin Dashboard</h1>

    <ul class="p-5 flex flex-row items-center gap-10">

        {{-- to show a card for all companies invited --}}
        {{-- also contains a link to see regitered students by passing the company id --}}
        @foreach ($companies as $company)
        
            <li class=" bg-cyan-800 w-1/3 h-1/2 text-center">
                <div class="text-2xl">{{$company->name}}</div>
                <div>{{$company->position}}</div>
                <a href="{{ route('admin.showRegistered' , ['id' => $company->id]) }}"><button class=" bg-lime-600 p-1">See registered students</button></a>
                
            </li>
        @endforeach
    </ul>


    <a href="{{ route('admin.newcompany') }}"><button class=" bg-lime-600 p-2">Add new Company</button></a>

</x-layout>