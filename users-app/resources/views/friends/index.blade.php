<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show friends
        </h2>
    </x-slot>

    <div class="offset-3 col-6 mt-5">
        @if(count($friends) == 0)
            <div class="mt-5 container">
                <div class="row">
                    <div class="offset-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title fs-3 fw-bold text-center">Your friend list is empty</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <table class="table table-secondary table-striped text-center align-middle table-bordered">
            <thead >
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
            </thead>
            <tbody class="table-group-divider">

                @foreach($friends as $friend)
                    <tr>
                        <td>{{$friend->id}}</td>
                        <td>{{$friend->name}}</td>
                        <td>{{$friend->email}}</td>
                        <td>
                            <a class="btn btn-success w-50" href="{{route('messages.chat', [$friend])}}">Send message</a>
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>
</x-app-layout>
