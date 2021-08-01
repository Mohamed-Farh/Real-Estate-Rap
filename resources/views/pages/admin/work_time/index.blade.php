@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ trans('front_trans.work_time') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('front_trans.work_time') }}
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

            <?php
                $work_times = \App\Models\Work_Time::all();
            ?>


            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('front_trans.add') }}
            </button>
            <br><br>

            <!--start about us section-->
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('front_trans.start_day') }}</th>
                            <th>{{ trans('front_trans.end_day') }}</th>
                            <th>{{ trans('front_trans.start_time') }}</th>
                            <th>{{ trans('front_trans.end_time') }}</th>
                            <th>{{ trans('feature_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                            <tr>
                            @foreach ($work_times as $work)
                                <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ trans('front_trans.'.$work->start_day )}}</td>
                                    <td>{{ trans('front_trans.'.$work->end_day )}}</td>
                                    <td>{{date('H:i a', strtotime($work->start_time)) }}</td>

                                    <td>{{date('H:i a', strtotime($work->end_time)) }}</td>

                                    <td>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $work->id }}"
                                        title="{{ trans('social_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>

                                    </td>
                            </tr>

                            <!-- delete_modal_feature -->
                            <div class="modal fade" id="delete{{ $work->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('front_trans.Delete') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('work_time.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('social_trans.Warning_social') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $work->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('front_trans.Close') }}</button>
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
        <div class="modal-content" style="width: 120% !important; ">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('front_trans.add') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('work_time.store') }}" method="POST">
                    @csrf

                    <div class="row"  style="padding: 25px 0px 5px 0px;">
                        <div class="col">
                            <label for="start_day" class="mr-sm-2">{{ trans('front_trans.start_day') }}
                                :</label>
                                <select name="start_day" required class="form-control">
                                    <option value="0">              {{ trans('social_trans.0') }}          </option>
                                    <option value="Sunday">         {{ trans('front_trans.Sunday') }}      </option>
                                    <option value="Monday">         {{ trans('front_trans.Monday') }}      </option>
                                    <option value="Tuesday">        {{ trans('front_trans.Tuesday') }}     </option>
                                    <option value="Wednesday">      {{ trans('front_trans.Wednesday') }}   </option>
                                    <option value="Thursday">       {{ trans('front_trans.Thursday') }}    </option>
                                    <option value="Friday">         {{ trans('front_trans.Friday') }}      </option>
                                    <option value="Saturday">       {{ trans('front_trans.Saturday') }}    </option>
                                </select>
                        </div>
                        <div class="col">
                            <label for="end_day" class="mr-sm-2">{{ trans('front_trans.end_day') }}
                                :</label>
                                <select name="end_day" required class="form-control">
                                    <option value="0">              {{ trans('social_trans.0') }}          </option>
                                    <option value="Sunday">         {{ trans('front_trans.Sunday') }}      </option>
                                    <option value="Monday">         {{ trans('front_trans.Monday') }}      </option>
                                    <option value="Tuesday">        {{ trans('front_trans.Tuesday') }}     </option>
                                    <option value="Wednesday">      {{ trans('front_trans.Wednesday') }}   </option>
                                    <option value="Thursday">       {{ trans('front_trans.Thursday') }}    </option>
                                    <option value="Friday">         {{ trans('front_trans.Friday') }}      </option>
                                    <option value="Saturday">       {{ trans('front_trans.Saturday') }}    </option>
                                </select>
                        </div>
                    </div>

                    <div class="row"  style="padding: 25px 0px 5px 0px;">
                        <div class="col">
                            <label for="start_time" class="mr-sm-2">{{ trans('front_trans.start_time') }}
                                :</label>
                            <input type="time" class="form-control" name="start_time">
                        </div>
                        <div class="col">
                            <label for="end_time" class="mr-sm-2">{{ trans('front_trans.end_time') }}
                                :</label>
                            <input type="time" name="end_time" class="form-control">
                        </div>
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
