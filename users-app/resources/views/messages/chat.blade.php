<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>


<x-app-layout>
    <x-slot name="header">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Send messages to <span class="font-extrabold text-2xl text-sky-600">{{strtoupper($friend->name)}}</span>
            </h2>

    </x-slot>

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card" id="chat1" style="border-radius: 15px;">
                        <div
                            class="card-header d-flex justify-content-between align-items-center p-2 bg-sky-600 text-white border-bottom-0"
                            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <i class="fas fa-angle-left"></i>
                            <p class="mb-0 fw-bold fs-5">Chat</p>
                            <a href="{{route('friends.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </a>
                        </div>

                        <div class="card-body">
                            @if(count($messages) == 0)
                                <h1 class="text-center mb-3 text-danger">No messages</h1>
                            @else
                                @foreach($messages as $message)
                                    @if(auth()->user()->id == $message->from_user)
                                        <div class="d-flex flex-row justify-content-start mb-4">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                 alt="avatar 1" style="width: 45px; height: 100%;">
                                            <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                                <p class="small mb-0">
                                                <div class="bg-primary">
                                                    <div class="float-start">{{$message->message}}</div>
                                                </div>
                                            </div>

                                            <span class="input-group-text border-0">
                                                <form class="col-3 mb-0" action="{{route('delete.messages', [$friend, $message])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="red" class="bi bi-trash" viewBox="0 0 16 16">--}}
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </span>
                                        </div>

                                    @else

                                        <div class="d-flex flex-row justify-content-end mb-4">
                                            <span class="input-group-text border-0">
                                                @if(auth()->user()->id !== $message->to_user)
                                                    <form class="col-3 mb-0" action="{{route('delete.messages', [$friend, $message])}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="red" class="bi bi-trash" viewBox="0 0 16 16">--}}
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </span>
                                            <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                                <p class="small mb-0">
                                                <div class="bg-primary">
                                                    <div class="float-end">{{$message->message}}</div>
                                                </div>
                                            </div>
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                                 alt="avatar 1" style="width: 45px; height: 100%;">
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            <div class="form-outline">
                                <form method="POST" action="{{route('sendMessage.messages', [$friend])}}">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="message" placeholder="Type your message">
                                        <span class="input-group-text bg-primary border-top-0 border-bottom-0 " >
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-send" viewBox="0 0 16 16">
                                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
