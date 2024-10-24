@extends('dashboard.layouts.layout')

@section('main')
<div class="container-fluid">
    <!-- Form starts here, wrapping both cards -->
    <form method="POST" action="{{ route('dashboard.settings.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- First Card: Logo, Favicon, Facebook, Instagram, Email, Phone -->
            <div class="col-md-12">
                <div class="card p-6 mb-4">
                    <div class="card-header">
                        {{__('words.translation')}}
                    </div>
 
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            @if(isset($settings->logo)) 

                            <img src="{{ asset('storage/images/' . $settings->logo) }}" alt="Current Logo" class="img-thumbnail mt-2" style="width: 100px; height: auto;">
                            @endif
                                <label for="logo">{{__("words.logo")}}</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                              
                            </div>
                            <div class="form-group col-md-6">
                            @if(isset($settings->favicon)) 
                                    <img src="{{ asset('storage/images/' . $settings->favicon) }}" alt="Current favicon" class="img-thumbnail mt-2" style="width: 100px; height: auto;">
                                @endif
                                <label for="favicon">{{__("words.favicon")}}</label>
                                <input type="file" class="form-control" id="favicon" name="favicon">

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="facebook">{{__("words.facebook")}}</label>
                                <input type="url" class="form-control" id="facebook" name="facebook" placeholder="{{__("words.facebook")}}" value="{{$settings->facebook}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="instagram">{{__("words.instagram")}}</label>
                                <input type="url" class="form-control" id="instagram" name="instagram" placeholder="{{__("words.instagram")}}" value="{{$settings->instagram}}">
                            </div>
                        </div>

                        <div class="form-row"> 
                            <div class="form-group col-md-6">
                                <label for="email">{{__("words.email")}}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{__("words.email")}}" value="{{$settings->email}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">{{__("words.phone")}}</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="{{__("words.phone")}}" value="{{$settings->phone }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Card: Translations -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{__('words.translations')}}
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="mytap" role="tablist">
                            @foreach (config('app.languages') as $key => $lang)
                            <div class="nav-item">
                                <a href="#{{$key}}" class="nav-link @if ($loop->index==0) active @endif "
                                    id="tab-home" role="tab"
                                    aria-controls="home"
                                    aria-selected="true"
                                    data-toggle="tab">
                                    {{$lang}}
                                </a>
                            </div>
                            @endforeach
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            @foreach (config('app.languages') as $key => $lang)
                            <div class="tab-pane fade @if ($loop->index == 0) show active in @endif" id="{{$key}}" role="tabpanel" aria-labelledby="tab-{{$key}}">
                                <div class="form-group col-md-12">
                                    <label for="title{{$key}}">{{__("words.title")}}</label>
                                    <input type="text" class="form-control" name="{{$key}}[title]" placeholder="{{__("words.title")}}" value="{{$settings->translate($key)->title}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="content{{$key}}">{{__("words.content")}}</label>
                                    <textarea class="form-control" cols="20" rows="7" name="{{$key}}[content]" value="{{$settings->content}}"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="address{{$key}}">{{__("words.address")}}</label>
                                    <input type="text" class="form-control" name="{{$key}}[address]" placeholder="{{__("words.address")}}" value="{{$settings->address}}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button: Positioned under both cards -->
            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-primary">{{__("words.submit")}}</button>
            </div>
        </div>
    </form>
    <!-- Form ends here -->
</div>
@endsection