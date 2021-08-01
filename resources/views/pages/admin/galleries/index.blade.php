@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ trans('gallery_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('gallery_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

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

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('gallery_trans.add_gallery') }}
            </button>
            <br><br>


                <div class="row">
                    @foreach($galleries as $gallery)
                        @if ($gallery->type == '0')
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="card" style="width:100%; margin-bottom: 25px;">
                                    <img class="card-img-top" src="{{ Url($gallery->path) }}" alt="Card image cap" style="width:100%; height:252px;">
                                    <div class="card-body"  style="text-align: -webkit-center;">

                                        @if  ($gallery->status == '0')
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit{{ $gallery->id }}"
                                            title="{{ trans('gallery_trans.Delete') }}"><i class="fa fa-eye-slash"></i> Un Visible </button>
                                        @elseif ($gallery->status == '1')
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit{{ $gallery->id }}"
                                            title="{{ trans('gallery_trans.Delete') }}"><i class="fa fa-eye"></i> Visible </button>
                                        @endif

                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete{{ $gallery->id }}"
                                                title="{{ trans('gallery_trans.Delete') }}"><i class="fa fa-trash"></i> Delete </button>
                                    </div>
                                </div>
                            </div>



                            <!-- Make_Image_Visible -->
                            <div class="modal fade" id="edit{{ $gallery->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('gallery_trans.edit_gallery') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('galleries.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                    @if  ($gallery->status == '1')
                                                        {{ trans('gallery_trans.unvisible_gallery') }}
                                                    @elseif ($gallery->status == '0')
                                                        {{ trans('gallery_trans.visible_gallery') }}
                                                    @endif
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $gallery->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">{{ trans('gallery_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-info">{{ trans('gallery_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_gallery -->
                            <div class="modal fade" id="delete{{ $gallery->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('gallery_trans.delete_gallery') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('galleries.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('gallery_trans.Warning_gallery') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $gallery->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('gallery_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('front_trans.Delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            <div class="m-t-30 m-b-60 center">
                {{ $galleries->links() }}
            </div>
        </div>
    </div>
</div>


<!-- add_modal_gallery -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content gallery">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('gallery_trans.add_gallery') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="0" id="type">
                    <div class="form-group">
                        <input type="file" name="files[]" id="post-images" multiple class="file-input-overview"
                            accept="image/*">
                        @if ($errors->has('files'))
                            @foreach ($errors->get('files') as $error)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $error }}</strong>
                                </span>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render


<script type="text/javascript">
    $(document).ready(function() {
                $('.summernote').summernote({
                    tabSize: 2,
                    height: 200,
                });
                $("#summernote").code()
                    .replace(/<\/p>/gi, "\n")
                    .replace(/<br\// ** end_phptag ** //gi, "\n")
                        .replace(/<\/?[^>]+(>|$)/g, "");
                    });

</script>

<script>
    $(function() {
        $('.summernote').summernote({
            tabSize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
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
@endsection
