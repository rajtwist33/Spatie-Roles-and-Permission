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

                <a href="{{ route('admin.roles.index') }}" class="btn btn-success m-3  ">Role Index
                    Page</a>

                <form class="p-4" action="{{ route('admin.roles.update', $role->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class=" col-md-5">
                        <label for="name" class="form-label"> Edit Roles Name </label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                            value="{{ $role->name }}">

                    </div>
                    @error('name')
                        <div class="">
                            <span class=" text-danger ">{{ $message }}</span>
                        </div>
                    @enderror


                    <button type="login" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>

            <!-- Dispalys Roles has Permissions -->

            <div class="mt-6 p-2">
                <h2 class="text-2xl font-semibold"> Role has Permissons </h2>
            </div>
            <div class="m-2 p-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($role->permissions)
                    @foreach($role->permissions as $role_permission )

                        <form
                            action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                            onsubmit="return confirm('Are you sure?');" method="POST" class="btn btn-danger">
                            @csrf
                            @method('DELETE')
                            <button type="submit"> {{ $role_permission->name }} </button>
                        </form>

                    @endforeach

                @endif
            </div>
            <!-- Role Permissions -->

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="p-2" action="{{ route('admin.roles.permissions', $role->id) }}"
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
            </div>
        </div>

</x-admin-layout>
