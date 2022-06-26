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

            <label class="text-dark fs-1 mb-3"> Create New User </label>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">

                <form class="col-md-6 float-center m-5" action="{{ route('admin.add.user') }}"
                    method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Conform Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="exampleInputPassword1 " required>
                    </div>

                    <button type="login" class="btn btn-primary"> Sign Up </button>
                </form>
            </div>
        </div>

</x-admin-layout>
