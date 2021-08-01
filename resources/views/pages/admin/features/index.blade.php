@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ trans('feature_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('feature_trans.title_page') }}
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
                {{ trans('feature_trans.add_feature') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('main_trans.name-ar') }}</th>
                            <th>{{ trans('main_trans.name-en') }}</th>
                            <th>{{ trans('feature_trans.Notes') }}</th>
                            <th>{{ trans('feature_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($features as $feature)
                            <tr>
                                <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $feature->name_ar }}</td>
                                    <td>{{ $feature->name_en }}</td>
                                    <td>{{ $feature->Notes }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $feature->id }}"
                                            title="{{ trans('feature_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $feature->id }}"
                                            title="{{ trans('feature_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

                            <!-- edit_modal_feature -->
                            <div class="modal fade" id="edit{{ $feature->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('feature_trans.edit_feature') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('features.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 small_space">
                                                        <label for="name-ar"
                                                            class="mr-sm-2">{{ trans('feature_trans.name_ar') }}
                                                            :</label>
                                                        <input id="name-ar" type="text" name="name_ar"
                                                            class="form-control" value="{{ $feature->name_ar }}"
                                                            required>

                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $feature->id }}">
                                                    </div>
                                                    <div class="col-12 small_space">
                                                        <label for="name_en"
                                                            class="mr-sm-2">{{ trans('feature_trans.name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="name_en"
                                                            value="{{ $feature->name_en }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group small_space">
                                                    <label for="exampleFormControlTextarea1">{{ trans('category_trans.Notes') }}:</label>
                                                    <textarea class="summernote" name="Notes" id="exampleFormControlTextarea1"
                                                    rows="3">{{ $feature->Notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('feature_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('feature_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_feature -->
                            <div class="modal fade" id="delete{{ $feature->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('feature_trans.delete_feature') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('features.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('feature_trans.Warning_feature') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $feature->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('feature_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('front_trans.Delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_feature -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('feature_trans.add_feature') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('features.store') }}" method="POST">
                    @csrf

                    @if (App::getLocale() == 'en')
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name_en" class="mr-sm-2">{{ trans('feature_trans.name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="name_en">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name-ar" class="mr-sm-2">{{ trans('feature_trans.name_ar') }}
                                    :</label>
                                <input id="name-ar" type="text" name="name_ar" class="form-control">
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name-ar" class="mr-sm-2">{{ trans('feature_trans.name_ar') }}
                                    :</label>
                                <input id="name-ar" type="text" name="name_ar" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name_en" class="mr-sm-2">{{ trans('feature_trans.name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="name_en">
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('feature_trans.Notes') }}
                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('feature_trans.Close') }}</button>
                        <button type="submit"
                            class="btn btn-success">{{ trans('feature_trans.submit') }}</button>
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
            height: 100,
        });
        $("#summernote").code()
                .replace(/<\/p>/gi, "\n")
                .replace(/<br\/?>/gi, "\n")
                .replace(/<\/?[^>]+(>|$)/g, "");
    });
</script>
@endsection
