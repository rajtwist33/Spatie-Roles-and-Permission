<x-admin-layout>
    @section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    @endsection

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 m-2">
        @if(Session::has('success'))
                <div class="row juctify-content-center">

                    <span class="alert alert-success">{{ Session::get('success') }}</span>

                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.permissions.create') }}"
                    class="btn btn-success m-3 float-end mr-3">Create Permission</a>
                <table class="table m-1">
                    <thead>
                        <tr>

                            <th scope="col">Name</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission )


                            <tr>
                                <td scope="row" class="">{{ $permission ->  name }}</td>
                                <td scope="row" class="">
                                    <div class=" flex justify-end">
                                        <div class="space-x-2">
                                            <a href="{{route('admin.permissions.edit',$permission->id)}}" class="btn btn-primary"> Edit</a>
                                            <a href="http://" class="btn btn-danger"> Delete</a>
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
