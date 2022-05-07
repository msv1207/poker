@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Create Post
                </button>

                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Create Post</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form class="form" action="/home" method="POST">
                                    @csrf

                                    <div>
                                        <input placeholder="Title" class="form-control"  name="name" id="name" required>
                                    </div>
                                    <br>
                                    <div>
                                        <input placeholder="description" class="form-control" name="description" id="description" required>
                                    </div>
                                    <br>
                                    <div>
                                        <button class="btn btn-success" type="submit">Send</button>
                                    </div>
                                </form>                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <h6 class="border-bottom pb-2 mb-0">Post Activity</h6>
                    @foreach($post as $p)
                        <div class="d-flex text-muted pt-3">

                            <p class="pb-3 mb-0 small lh-sm border-bottom">
                                <strong class="d-block text-gray-dark">{{$p->name}}                                <a class="btn-danger" data-confirm="Are you sure?" data-method="DELETE" href="/home/{{$p->id}}" rel="nofollow">Delete</a>

                                </strong>

                                {{( $p->description)}}                            </p>
                        </div>
                    @endforeach



            </div>
        </div>
    </div>
</div>
@endsection
