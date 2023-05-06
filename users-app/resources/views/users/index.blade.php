<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show users
        </h2>
    </x-slot>

        <div class="offset-2 col-8 mt-5">
                @if(auth()->user()->isAdmin)
                    <a href="{{route('users.create')}}" class="btn btn-success float-end mb-3">Add user</a>
                @endif

                @if(count($users) == 0)
                        <div class="mt-5 container">
                            <div class="row">
                                <div class="offset-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-title fs-3 fw-bold text-center">Users list is empty</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <table class="table table-secondary table-striped text-center align-middle table-bordered">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                            </thead>
                            <tbody class="table-group-divider">
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="col-5">
                                        @if(auth()->user()->isAdmin)
                                            <div class="row offset-2">
                                                <a href="{{route('users.show', $user->id)}}" class="btn btn-primary col-3">Show</a>
                                                <form class="col-3 mb-0" action="{{route('users.destroy', $user->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger w-100">Delete</button>
                                                </form>
                                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning col-3">Edit</a>
                                            </div>
                                        @else
                                            <div class="d-flex justify-content-center align-items-center">
                                                @if(in_array($user->id, $requests))
                                                    <form class="mb-0" action="{{route('delete.request', $user)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-warning">Delete request</button>
                                                    </form>

                                                @elseif(in_array($user->id, $requestsToAccept))
                                                    <form class="mb-0" action="{{route('reject.request', $user)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger mr-2">Reject friend</button>
                                                    </form>
                                                    <form class="mb-0" action="{{route('accept.request', $user)}}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-success">Accept friend</button>
                                                    </form>
                                                @elseif(in_array($user->id, $myFriends))
                                                    <form class="mb-0" action="{{route('delete.friend', $user)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">Remove friend</button>
                                                    </form>
                                                @else
                                                    <form class="mb-0" action="{{route('send.request', $user)}}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-primary">Send friend request</button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                @endif

        </div>
</x-app-layout>
