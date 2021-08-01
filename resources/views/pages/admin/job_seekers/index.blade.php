@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('contactus_trans.messages') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('contactus_trans.messages') }}
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



            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('contactus_trans.Name') }}</th>
                            <th>{{ trans('contactus_trans.email') }}</th>
                            <th>{{ trans('contactus_trans.phone') }}</th>
                            <th>{{ trans('contactus_trans.subject') }}</th>
                            <th>{{ trans('front_trans.cv') }}</th>
                            <th>{{ trans('contactus_trans.created_at') }}</th>
                            <th>{{ trans('contactus_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($job_messages as $message)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->mobile }}</td>
                                <td>{{ $message->job_title }}</td>
                                <?php $cv  = $message->file; ?>
                                <td><a href='/files/uploads/{{  $cv }}' target="_blank">Open PDF</a></td>
                                <td>{{ $message->created_at->format('d-m-Y h:i a') }}</td>
                                <td>

                                    {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#show{{ $message->id }}"
                                    title="{{ trans('contactus_trans.show') }}"><i
                                        class="fa fa-eye"></i></button> --}}

                                    @if  ($message->status == '0')
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#read{{ $message->id }}"
                                        title="{{ trans('contactus_trans.edit_contactus') }}"><i class="fa fa-check"></i> Read</button>
                                    @endif

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $message->id }}"
                                        title="{{ trans('contactus_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>


                            <!-- Make Message Read -->
                            <div class="modal fade" id="read{{ $message->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('contactus_trans.edit_contactus') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('jobs/messages_read', 'test') }}" method="post">
                                                {{ method_field('post') }}
                                                @csrf
                                                <input type="hidden" name="status" value="1" id="status">

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $message->id }}">
                                                    {{ trans('contactus_trans.read') }}
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('contactus_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('contactus_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- show_modal_message-->
                            <div class="modal fade" id="show{{ $message->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ $message->name }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <h4>
                                                {{ $message->message }}
                                            </h4>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- delete_modal_contactus -->
                            <div class="modal fade" id="delete{{ $message->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('contactus_trans.delete_contactus') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('jobs/messages_delete', 'test') }}" method="post">
                                                {{ method_field('Post') }}
                                                @csrf
                                                {{ trans('contactus_trans.Warning_contactus') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $message->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('contactus_trans.Close') }}</button>
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
@endsection
