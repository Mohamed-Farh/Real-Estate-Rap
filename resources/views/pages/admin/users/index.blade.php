@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('users_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.Users') }}
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

            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('users_trans.add_user') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('users_trans.Name') }}</th>
                            <th>{{ trans('users_trans.email') }}</th>
                            <th>{{ trans('users_trans.created_at') }}</th>
                            <th>{{ trans('users_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($users as $user)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>

                                @if (App::getLocale() == 'en')
                                    @if ($user->name !='')
                                        <td>{{ $user->name }}</td>
                                    @else
                                        <td>{{ $user->name_ar }}</td>
                                    @endif
                                @else
                                    @if ($user->name_ar !='')
                                        <td>{{ $user->name_ar }}</td>
                                    @else
                                        <td>{{ $user->name }}</td>
                                    @endif
                                @endif

                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td class="#">
                                    <button type="button" class="btn btn-info btn-sm given" data-toggle="modal"
                                        data-target="#edit{{ $user->id }}"
                                        title="{{ trans('users_trans.Edit') }}"><i class="fa fa-edit"></i></button>

                                        @if ($user->id != auth()->id())
                                            <form action="{{ route('users.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $user->id }}">
                                                <button type="button" class="btn btn-danger btn-sm given"
                                                    onclick="confirm('{{ __("Are You Sure You Want To Delete This User ?") }}') ? this.parentElement.submit() : ''" style="position:absolute; margin-right: 20px; margin-top:-26px;"><i class="fa fa-trash"></i></button>
                                            </form>
                                        @endif
                                </td>
                            </tr>

                            <!-- edit_modal_user -->
                            <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('users_trans.edit_user') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('users.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="col-md-12">
                                                            <label for="name" class="mr-sm-2 space_top">{{ trans('users_trans.name') }} :</label>
                                                            <input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $user->id }}">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="name_ar" class="mr-sm-2 space_top">{{ trans('users_trans.name_ar') }} :</label>
                                                            <input id="name_ar" type="text" name="name_ar" class="form-control" value="{{ $user->name_ar }}">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="email" class="mr-sm-2 space_top">{{ trans('users_trans.email') }} :</label>
                                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="password" class="mr-sm-2 space_top">{{ trans('users_trans.password') }} :</label>
                                                            <input type="password" class="form-control" name="password" value="">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label class="mr-sm-2 space_top" for="input-password-confirmation">{{ trans('users_trans.confirm_password') }} :</label>
                                                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" value="">
                                                        </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('users_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('users_trans.submit') }}</button>
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


<!-- add_modal_user -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('users_trans.add_user') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="mr-sm-2 space_top">{{ trans('users_trans.name') }} :</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>

                        <div class="col-md-12">
                            <label for="name_ar" class="mr-sm-2 space_top">{{ trans('users_trans.name_ar') }} :</label>
                            <input id="name_ar" type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}" required autocomplete="name_ar" autofocus>
                        </div>

                        <div class="col-md-12">
                            <label for="email" class="mr-sm-2 space_top">{{ trans('users_trans.email') }} :</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>

                        <div class="col-md-12">
                            <label for="password" class="mr-sm-2 space_top">{{ trans('users_trans.password') }} :</label>
                            <input type="password" class="form-control" name="password" required autocomplete="new-password">
                        </div>

                        <div class="col-md-12">
                            <label class="mr-sm-2 space_top" for="input-password-confirmation">{{ trans('users_trans.confirm_password') }} :</label>
                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" required>
                        </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('users_trans.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('users_trans.submit') }}</button>
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
@endsection
