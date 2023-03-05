@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::open(array('route' => array('save-page-settings'), 'files' => true)) }}
                        <div class="card mt-3">
                            <div class="card-header">Home Section</div>
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('slider', 'Main Heading') }}
                                            {{ Form::text('slider', (isset($page)?$page->slider:old('slider')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('count', 'Total Count') }}
                                            {{ Form::number('count', (isset($page)?$page->count:old('count')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::label('count_title', 'Count Title') }}
                                            {{ Form::text('count_title', (isset($page)?$page->count_title:old('count_title')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">About Section</div>
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('about_title', 'Page Title') }}
                                            {{ Form::text('about_title', (isset($page)?$page->about_title:old('about_title')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('about_body', 'Page Description') }}
                                            {{ Form::textarea('about_body', (isset($page)?$page->about_body:old('about_body')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        @if(!is_null($page) && isset($page->about_signature))
                                            <img src="{{ url('storage/'.$page->about_signature) }}" alt="" width="40">
                                        @endif
                                        <div class="form-group">
                                            {{ Form::label('about_signature', 'Signature') }}
                                            {{ Form::file('about_signature', ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">Hero Section</div>
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('hero_title', 'Page Title') }}
                                            {{ Form::text('hero_title', (isset($page)?$page->hero_title:old('hero_title')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('hero_body', 'Page Description') }}
                                            {{ Form::textarea('hero_body', (isset($page)?$page->hero_body:old('hero_body')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">Company Section</div>
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('company_title', 'Page Title') }}
                                            {{ Form::text('company_title', (isset($page)?$page->company_title:old('company_title')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('company_description', 'Page Description') }}
                                            {{ Form::textarea('company_description', (isset($page)?$page->company_description:old('company_description')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('company_video', 'Company Video URL') }}
                                            {{ Form::url('company_video',(isset($page)?$page->company_video:old('company_video')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        @if(!is_null($page) && isset($page->company_video_image))
                                            <img src="{{ url('storage/'.$page->company_video_image) }}" alt="" width="40">
                                        @endif
                                        <div class="form-group">
                                            {{ Form::label('company_video_image', 'Company Video Placeholder Image') }}
                                            {{ Form::file('company_video_image', ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">{{ __('Intro Section') }}</div>
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('intro_title', 'Page Title') }}
                                            {{ Form::text('intro_title', (isset($page)?$page->intro_title:old('intro_title')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('intro_description', 'Page Description') }}
                                            {{ Form::textarea('intro_description', (isset($page)?$page->intro_description:old('intro_description')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{ Form::label('intro_video', 'Company Video URL') }}
                                            {{ Form::url('intro_video',(isset($page)?$page->intro_video:old('intro_video')), ["class" => "form-control"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        @if(!is_null($page) && isset($page->intro_video_image))
                                            <img src="{{ url('storage/'.$page->intro_video_image) }}" alt="" width="40">
                                        @endif
                                        <div class="form-group">
                                            {{ Form::label('intro_video_image', 'Company Video Placeholder Image') }}
                                            {{ Form::file('intro_video_image', ["class" => "form-control"]) }}
                                        </div>
                                    </div>
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
        </div>
    </div>
</div>
@endsection
