<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User details
        </h2>
    </x-slot>

    <div class="mt-5 container">
        <div class="row">
            <div class="offset-4 col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">ID:</h5>
                        <h6 class="card-title border-bottom mb-3">{{$user->id}}</h6>

                        <h5 class="card-title fw-bold">Name:</h5>
                        <h6 class="card-title border-bottom mb-3">{{$user->name}}</h6>

                        <h5 class="card-title fw-bold">Email:</h5>
                        <h6 class="card-title border-bottom mb-3">{{$user->email}}</h6>

                        <h5 class="card-title fw-bold">Password:</h5>
                        <h6 class="card-subtitle border-bottom mb-3">{{$user->password}}</h6>

                        <a href="{{route('users.index')}}" class="btn btn-dark mt-3">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
