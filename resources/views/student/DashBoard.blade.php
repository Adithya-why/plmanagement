<x-layout>


    {{-- view to render student dashboard with all companies --}}

    <h1 class="text-3xl font-bold">Student DashBoard</h1>
    
    <div>

        <h1>All companies drives</h1>

        <ul class="p-5 flex flex-row items-center gap-10">

            {{-- to show a card for all companies invited --}}
            
            @foreach ($companies as $company)
            
                <li class=" bg-cyan-800 w-1/3 h-1/2 text-center">
                    <div class="text-2xl">{{$company->name}}</div>
                    <div>{{$company->position}}</div>


                    {{-- To register for a given company --}}


                    <form action="{{ route('student.register') }}" method="POST">
                        @csrf
                        <input type="hidden" name="studentid" value="{{ $student->id }}"/>
                        <input type="hidden" name="companyid" value="{{ $company->id }}"/>
                        <button type="submit" class=" bg-lime-600 p-1">Register</button>
                    </form>
                    
                </li>


            @endforeach


        </ul>

    </div>


    {{-- to view all registrations by the student --}}







    

   


</x-layout>