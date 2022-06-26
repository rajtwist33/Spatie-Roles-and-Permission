<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    @endsection
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="p-6 bg-white border-b border-gray-200 mb-2">


                    <h2 class="text-primary">View page</h2>

                    @can('View')
                        <h1>My name is Rajkumar Sadar</h1>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum aperiam culpa quod, officiis porro
                        ea quisquam neque accusantium magni libero tempora tenetur cupiditate, soluta consequuntur modi
                        magnam. Atque quisquam debitis officia distinctio iste, cupiditate id asperiores ad eum,
                        deleniti saepe! Obcaecati iure illum est necessitatibus laudantium omnis voluptates quo quidem.
                        Excepturi facilis in sunt quia quis cumque a aut quibusdam fugit hic ipsa quasi laudantium,
                        quisquam rerum eveniet officia provident fuga sint eligendi nisi quas. Veniam fuga enim, ratione
                        quisquam commodi vero sed harum voluptate. Delectus maxime ex soluta aliquam ipsam! Quod animi
                        aliquam esse eos tenetur et optio alias.
                    @endcan
                </div>
            </div>

            <!-- Create Page -->
            @can('Create')

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">

                    <div class="p-6 bg-white border-b border-gray-200 m-2">
                        <h2 class="text-success"> Create Page</h2>
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            @endcan



            <!-- Delete Page -->
            @can('Delete')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">

                    <div class="p-6 bg-white border-b border-gray-200">

                        <h2 class="text-danger"> Delete Page</h2>
                        <button type="button" class="btn btn-danger">Danger</button>
                        <button type="button" class="btn btn-success">Success</button>
                        <button type="button" class="btn btn-info">info</button>
                        <button type="button" class="btn btn-primary">primary</button>
                    </div>
                </div>
            @endcan

            <!-- Edit page -->
            @can('Edit')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">

                    <div class="p-6 bg-white border-b border-gray-200">

                        <h2 class="text-warning"> Edit Page </h2>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam nulla, optio quos quam cumque
                        fuga
                        quidem eius doloremque error aliquid officiis autem distinctio possimus animi officia! Neque
                        nemo
                        nobis nam eius modi, beatae quibusdam minima porro nihil mollitia natus aperiam, nesciunt
                        obcaecati
                        voluptatibus dolore ipsam facilis iure non id voluptate?
                    </div>
                </div>
            @endcan

            @can('Update')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h1 class="text-info"> Update </h1>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut hic doloribus provident illo quod
                        culpa, pariatur fuga nesciunt! Velit qui incidunt porro consequatur quidem explicabo doloremque
                        voluptate id voluptatum, voluptatem nulla recusandae consectetur voluptates, optio veritatis
                        illum
                        molestiae suscipit exercitationem vitae! Vero nemo, amet dolores cum odit sit debitis cumque
                        sapiente possimus voluptates quia, est provident sequi. Mollitia excepturi nostrum libero at
                        ullam
                        id, reiciendis alias suscipit sit maxime tenetur laboriosam odio sequi ab vero numquam iusto
                        ratione, commodi voluptas.
                    </div>
            @endcan
            <div class="p-6 bg-white border-b border-gray-200">

            </div>
        </div>
</x-app-layout>
