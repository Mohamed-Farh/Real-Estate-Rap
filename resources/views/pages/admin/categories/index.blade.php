@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ trans('category_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('category_trans.title_page') }}
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
                    {{ trans('category_trans.add_category') }}
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
                                <th>{{ trans('category_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($categories as $category)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $category->name_ar }}</td>
                                    <td>{{ $category->name_en }}</td>
                                    <td>{{ $category->Notes }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $category->id }}"
                                            title="{{ trans('category_trans.Edit') }}"><i class="fa fa-edit"></i></button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $category->id }}"
                                            title="{{ trans('category_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_category -->
                                <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('category_trans.edit_category') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('categories.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12 small_space">
                                                            <label for="name-ar" class="mr-sm-2">{{ trans('category_trans.name_ar') }} :</label>
                                                            <input id="name-ar" type="text" name="name_ar" class="form-control" value="{{ $category->name_ar }}" required>

                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $category->id }}">
                                                        </div>
                                                        <div class="col-12 small_space">
                                                            <label for="name_en" class="mr-sm-2">{{ trans('category_trans.name_en') }} :</label>
                                                            <input type="text" class="form-control" name="name_en" value="{{ $category->name_en }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group small_space">
                                                        <label for="exampleFormControlTextarea1">{{ trans('category_trans.Notes') }}:</label>
                                                        <textarea class="summernote" name="Notes" id="exampleFormControlTextarea1"
                                                        rows="3">{{ $category->Notes }}</textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('category_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('category_trans.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete_modal_category -->
                                <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('category_trans.delete_category') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('categories.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('category_trans.Warning_category') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $category->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('category_trans.Close') }}</button>
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


    <!-- add_modal_category -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('category_trans.add_category') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        @if (App::getLocale() == 'en')
                            <div class="form-group">
                                <div class="col">
                                    <label for="name_en" class="mr-sm-2">{{ trans('category_trans.name_en') }} :</label>
                                    <input type="text" class="form-control" name="name_en">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label for="name-ar" class="mr-sm-2">{{ trans('category_trans.name_ar') }} :</label>
                                    <input id="name-ar" type="text" name="name_ar" class="form-control">
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <div class="col">
                                    <label for="name-ar" class="mr-sm-2">{{ trans('category_trans.name_ar') }} :</label>
                                    <input id="name-ar" type="text" name="name_ar" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col">
                                    <label for="name_en" class="mr-sm-2">{{ trans('category_trans.name_en') }} :</label>
                                    <input type="text" class="form-control" name="name_en">
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ trans('category_trans.Notes') }}
                                :</label>
                            <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('category_trans.Close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('category_trans.submit') }}</button>
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
