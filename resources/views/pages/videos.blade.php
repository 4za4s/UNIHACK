@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Videos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::open(array('route' => array('save-video-settings'), 'files' => true)) }}
                        <div class="row mt-2">
                            <!-- <div class="col-md-12">
                                <div class="alert alert-warning">
                                    Only use video file or video url like vimo, youtube etc
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('image', 'Video Placeholder') }}
                                    {{ Form::file('image', ["class" => "form-control"]) }}
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('video', 'Video File') }}
                                    {{ Form::file('video', ["class" => "form-control"]) }}
                                </div>
                            </div> -->
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('url', 'Video URL') }}
                                    {{ Form::text('url', old('url'), ["class" => "form-control"]) }}
                                </div>
                            </div>

                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                {{ Form::submit('Save Settings', ["class" => "btn btn-success"]) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>

            <div class="card">
                <div class="card-header">All Videos</div>
                <div class="card-body">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>Video URL</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($videos as $video)
                            <tr>
                                <td>{{ $video->url }}</td>
                                <td><img src="{{ url('storage/'.$video->image) }}" alt="" width="150"></td>
                                <td>{{ $video->created_at }}</td>
                                <td><a href="{{ route('delete-video', ['id' => $video->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
