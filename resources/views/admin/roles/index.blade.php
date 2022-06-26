<x-admin-layout>
    @section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    @endsection

    <div class="py-12 w-full">



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <label class="text-dark fs-1 mb-3">Roles</label>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.roles.create') }}"
                    class="btn btn-success m-3 float-end mr-3">Create Role</a>

                <table class="table m-1">
                    <thead>
                        <tr>

                            <th scope="col">Name</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role )


                            <tr>
                                <td scope="row" class="">{{ $role -> name }}</td>
                                <td scope="row" class="">
                                    <div class=" flex justify-end">
                                        <div class=" flex space-x-5">
                                            <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                class="btn btn-primary"> Edit</a>

                                            <form
                                                action="{{ route('admin.roles.destroy', $role->id) }}"
                                                onsubmit="return confirm('Are you sure ?');" method="POST"
                                                class="btn btn-danger">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"> Delete </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>



                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

</x-admin-layout>
@section('script')
@include('sweetalert::alert')
@endsection
