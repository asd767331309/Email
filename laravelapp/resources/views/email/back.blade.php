@extends('layout.layouts')

@section('title', 'BackStage')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="panel-heading">
                    <div class="col-md-8">
                        BackStage Form
                    </div>
                    <div class="col-md-4">
                        <a href="logoutEmailAdmin">Logout</a>
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->email }}</td>
                                <td>{{ $post->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $posts->links() !!}
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
@endsection

