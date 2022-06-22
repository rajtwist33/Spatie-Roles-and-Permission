<x-admin-layout>
    @section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    @endsection

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-success m-3  ">Permission Index
                    Page</a>

                <form class="p-4" action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf
                    <div class=" col-md-5">
                        <label for="name" class="form-label"> Create Permission  Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">

                    </div>
                    @error('name')
                        <div class="">
                            <span class=" text-danger ">{{ $message }}</span>
                        </div>
                    @enderror
           

            <button type="login" class="btn btn-primary mt-3">Create</button>
            </form>


        </div>
    </div>

</x-admin-layout>
