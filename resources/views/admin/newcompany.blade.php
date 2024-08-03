<x-layout>

    <h1>Add new company</h1>


    <form method="POST" action="{{ route('admin.newcompanyStore') }}">
        @csrf

        <label for="name">Company Name</label>
        <input type="text" name="name" value="{{ old('name') }}" id="name">

        <label for="position">Position</label>
        <input type="text" name="position" value="{{ old('position') }}" id="position">


        <button class="submit">Add</button>




    </form>

</x-layout>