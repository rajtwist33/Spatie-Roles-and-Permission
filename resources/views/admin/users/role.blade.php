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
                <a href="{{ route('admin.users.index') }}" class="btn btn-success m-3  "> user Index
                    Page</a>

                <div class="ml-3"> <label for="user name" class="fs-5">User Name : </label>
                    {{ $user -> name }}</div>
                <div class="ml-3 mb-2"><label for="user email" class="fs-5">User Email : </label>
                    {{ $user -> email }}</div>

                <!-- Dispalys User Has Role -->

                <div class="mt-6 p-2">
                    <h2 class="text-2xl font-semibold"> User has Roles </h2>
                </div>
                <div class="m-2 p-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if($user->roles)
                        @foreach($user->roles as $permission_role )

                            <form
                                action="{{ route('admin.users.roles.remove', [$user->id, $permission_role->id]) }}"
                                onsubmit="return confirm('Are you sure?');" method="POST" class="btn btn-danger">
                                @csrf
                                @method('DELETE')
                                <button type="submit"> {{ $permission_role->name }} </button>
                            </form>

                        @endforeach

                    @endif
                </div>
                <!-- Users has Role  -->

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form class="p-2" action="{{route('admin.users.roles', $user->id)}}"
                        method="POST">
                        @csrf
                        @method('POST')

                        <div class=" col-md-5">
                            <label for="user" class="fs-5"> Roles </label>
                            <select class="form-select" name="roll" aria-label="Default select example">
                                @foreach($roles as $role )
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach

                            </select>

                        </div>
                        <button type="login" class="btn btn-success mt-3">Assign</button>
                    </form>
                </div>

                <!-- Users Permissions -->

                <!-- Dispalys Users has Permissions -->

                <!-- <div class="mt-6 p-2">
                    <h2 class="text-2xl font-semibold"> User has Permissons </h2>
                </div>
                <div class="m-2 p-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if($user->permissions)
                        @foreach($user->permissions as $user_permission )

                            <form
                                action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                onsubmit="return confirm('Are you sure?');" method="POST" class="btn btn-danger">
                                @csrf
                                @method('DELETE')
                                <button type="submit"> {{ $user_permission->name }} </button>
                            </form>

                        @endforeach

                    @endif
                </div> -->

                <!-- User Permissions -->

            

                <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <form class="p-2"
                        action="{{ route('admin.users.permissions', $user->id) }}"
                        method="POST">
                        @csrf

                        <div class=" col-md-5">
                            <label for="permission" class="fs-5"> Permissions</label>
                            <select class="form-select" name="permission" aria-label="Default select example">
                                @foreach($permissions as $permission )
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach

                            </select>

                        </div>
                        <button type="login" class="btn btn-success mt-3">Assign</button>
                    </form>
                </div> -->




            </div>

        </div>


    </div>

</x-admin-layout>
