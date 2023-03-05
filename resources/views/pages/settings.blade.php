@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Settings') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::open(array('route' => array('save-settings', isset($setting)?$setting->id:''), 'files' => true)) }}
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h4>Map Center</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('lat', 'Latitude') }}
                                    {{ Form::text('lat', (isset($setting)?$setting->lat:old('lat')), ["class" => "form-control", "id" => "lat"]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('lng', 'Longitude') }}
                                    {{ Form::text('lng', (isset($setting)?$setting->lng:old('lng')), ["class" => "form-control", "id" => "lng"]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                            @if(!is_null($setting) && isset($setting->logo))
                                    <img src="{{ url('storage/'.$setting->logo) }}" alt="" width="40">
                                @endif
                                <div class="form-group">
                                    {{ Form::label('logo', 'Website Logo') }}
                                    {{ Form::file('logo', ["class" => "form-control"]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if(!is_null($setting) && isset($setting->favicon))
                                    <img src="{{ url('storage/'.$setting->favicon) }}" alt="" width="40">
                                @endif
                                <div class="form-group">
                                    {{ Form::label('favicon', 'Favicon') }}
                                    {{ Form::file('favicon', ["class" => "form-control"]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                @if(!is_null($setting) && isset($setting->slider_logo))
                                    <img src="{{ url('storage/'.$setting->slider_logo) }}" alt="" width="40">
                                @endif
                                <div class="form-group">
                                    {{ Form::label('slider_logo', 'Slider Logo') }}
                                    {{ Form::file('slider_logo', ["class" => "form-control"]) }}
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('email', 'E-Mail Address') }}
                                    {{ Form::text('email', (isset($setting)?$setting->email:old('email')), ["class" => "form-control"]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('phone', 'Phone Number') }}
                                    {{ Form::text('phone', (isset($setting)?$setting->phone:old('phone')), ["class" => "form-control"]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('fax', 'Fax Number') }}
                                    {{ Form::text('fax', (isset($setting)?$setting->fax:old('fax')), ["class" => "form-control"]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('facebook_link', 'Facebook Link') }}
                                    {{ Form::text('facebook_link', (isset($setting)?$setting->facebook_link:old('facebook_link')), ["class" => "form-control"]) }}
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('twitter_link', 'Twitter Link') }}
                                    {{ Form::text('twitter_link', (isset($setting)?$setting->twitter_link:old('twitter_link')), ["class" => "form-control"]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('linkedin_link', 'Linkedin Link') }}
                                    {{ Form::text('linkedin_link', (isset($setting)?$setting->linkedin_link:old('linkedin_link')), ["class" => "form-control"]) }}
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('youtube_link', 'Youtube Link') }}
                                    {{ Form::text('youtube_link', (isset($setting)?$setting->youtube_link:old('youtube_link')), ["class" => "form-control"]) }}
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    {{ Form::label('copyright_text', 'Copyright Text') }}
                                    {{ Form::textarea('copyright_text', (isset($setting)?$setting->copyright_text:old('copyright_text')), ["class" => "form-control", "rows"=> 3]) }}
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('meta_title', 'Meta Title') }}
                                    {{ Form::text('meta_title', (isset($setting)?$setting->meta_title:old('meta_title')), ["class" => "form-control"]) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('meta_keywords', 'Meta Keywords') }}
                                    {{ Form::text('meta_keywords', (isset($setting)?$setting->meta_keywords:old('meta_keywords')), ["class" => "form-control"]) }}
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ Form::label('meta_description', 'Meta Description') }}
                                    {{ Form::textarea('meta_description', (isset($setting)?$setting->meta_description:old('meta_description')), ["class" => "form-control", "rows"=> 3]) }}
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
