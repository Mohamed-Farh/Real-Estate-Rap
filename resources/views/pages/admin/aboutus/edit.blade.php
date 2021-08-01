@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('front_trans.aboutus') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('front_trans.aboutus') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')

<!-- row -->
<div class="row">
    @if ($errors->any())
        <div class="error">{{ $errors->first('Name') }}</div>
    @endif

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="button" class="button x-small back_property">
                    <a href="{{ route('aboutus.index') }}">{{ trans('front_trans.return') }}</a>
                </button>
                <br><br>

                <div class="card-body">

                    {!! Form::open(['route' => ['aboutus.update', $aboutus->id], 'method' => 'patch']) !!}
                    {{--------- About Us -----------}}
                    {!! Form::hidden('id', old('id', $aboutus->id ) ) !!}

                    <div class="row beauty_top">
                        <h2 class="help">{{ trans('front_trans.aboutus') }}</h2>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('aboutus_ar', trans('front_trans.aboutus_ar') ) !!}
                                {!! Form::textarea('aboutus_ar', old('aboutus_ar', $aboutus->aboutus_ar ), ['class' => 'form-control summernote']) !!}
                                @error('aboutus_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('aboutus_en', trans('front_trans.aboutus_en') ) !!}
                                {!! Form::textarea('aboutus_en', old('aboutus_en', $aboutus->aboutus_en ), ['class' => 'form-control summernote']) !!}
                                @error('aboutus_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br><br><br><br>
                    </div>
                    {{--------- Counting -----------}}
                    <div class="row beauty">
                        <h2 class="help">{{ trans('front_trans.numbers') }}</h2>
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('experience_year', trans('front_trans.experience_year') ) !!}
                                    {!! Form::text('experience_year', old('experience_year', $aboutus->experience_year ), ['class' => 'form-control']) !!}
                                    @error('experience_year')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('previous_project', trans('front_trans.previous_project') ) !!}
                                    {!! Form::text('previous_project', old('previous_project', $aboutus->previous_project ), ['class' => 'form-control']) !!}
                                    @error('previous_project')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('under_construction', trans('front_trans.under_construction') ) !!}
                                    {!! Form::text('under_construction', old('under_construction', $aboutus->under_construction ), ['class' => 'form-control']) !!}
                                    @error('under_construction')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('client', trans('front_trans.client') ) !!}
                                    {!! Form::text('client', old('client', $aboutus->client ), ['class' => 'form-control']) !!}
                                    @error('client')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                    </div>

                    {{--------- Location  -----------}}
                    <div class="row beauty">
                        <h2 class="help">{{ trans('front_trans.message') }}</h2>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('message_ar', trans('front_trans.message_ar') ) !!}
                                {!! Form::textarea('message_ar', old('message_ar', $aboutus->message_ar ), ['class' => 'form-control summernote']) !!}
                                @error('message_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('message_en', trans('front_trans.message_en') ) !!}
                                {!! Form::textarea('message_en', old('message_en', $aboutus->message_en ), ['class' => 'form-control summernote']) !!}
                                @error('message_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    {{--------- Location  -----------}}
                    <div class="row beauty">
                        <h2 class="help">{{ trans('front_trans.vision') }}</h2>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('vision_ar', trans('front_trans.vision_ar') ) !!}
                                {!! Form::textarea('vision_ar', old('vision_ar', $aboutus->vision_ar ), ['class' => 'form-control summernote']) !!}
                                @error('vision_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('vision_en', trans('front_trans.vision_en') ) !!}
                                {!! Form::textarea('vision_en', old('vision_en', $aboutus->vision_en ), ['class' => 'form-control summernote']) !!}
                                @error('vision_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    {{--------- Location  -----------}}
                    <div class="row beauty">
                        <h2 class="help">{{ trans('front_trans.whyus') }}</h2>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('whyus_ar', trans('front_trans.whyus_ar') ) !!}
                                {!! Form::textarea('whyus_ar', old('whyus_ar', $aboutus->whyus_ar ), ['class' => 'form-control summernote']) !!}
                                @error('whyus_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('whyus_en', trans('front_trans.whyus_en') ) !!}
                                {!! Form::textarea('whyus_en', old('whyus_en', $aboutus->whyus_en ), ['class' => 'form-control summernote']) !!}
                                @error('whyus_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-4">
                        {!! Form::submit( trans('front_trans.submit') , ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
    <script>
        $(function () {
            // $('.summernote').summernote({
            //     tabSize: 2,
            //     height: 200,
            //     toolbar: [
            //         ['style', ['style']],
            //         ['font', ['bold', 'underline', 'clear']],
            //         ['color', ['color']],
            //         ['para', ['ul', 'ol', 'paragraph']],
            //         ['table', ['table']],
            //         ['insert', ['link', 'picture', 'video']],
            //         ['view', ['fullscreen', 'codeview', 'help']]
            //     ]
            // });
            $('#post-images').fileinput({
                theme: "fas",
                maxFileCount: 10,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,

            });

        });
    </script>
     <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote({
                tabSize: 2,
                height: 200,
            });
        });
    </script>
@endsection


