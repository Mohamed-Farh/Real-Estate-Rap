@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ trans('front_trans.company_jobs') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('front_trans.company_jobs') }}
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
                {{ trans('front_trans.add') }}
            </button>
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('feature_trans.name_ar') }}</th>
                            <th>{{ trans('feature_trans.name_en') }}</th>
                            <th>{{ trans('main_trans.type') }}</th>
                            <th>{{ trans('main_trans.visible') }}</th>
                            <th>{{ trans('social_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($company_jobs as $company_job)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $company_job->title_ar }}</td>
                                <td>{{ $company_job->title_en }}</td>
                                <td>{{ $company_job->type }}</td>
                                <td>
                                    @if  ($company_job->status == '1')
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#vis{{ $company_job->id }}"
                                        title="{{ trans('social_trans.Delete') }}"><i class="fa fa-eye-slash"></i> Un Visible </button>
                                    @elseif ($company_job->status == '0')
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#vis{{ $company_job->id }}"
                                        title="{{ trans('social_trans.Delete') }}"><i class="fa fa-eye"></i> Visible </button>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $company_job->id }}"
                                        title="{{ trans('social_trans.Edit') }}"><i
                                            class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $company_job->id }}"
                                        title="{{ trans('social_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_social -->
                            <div class="modal fade" id="edit{{ $company_job->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('front_trans.edit') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('company_jobs.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $company_job->id }}">
                                                    <div class="form-group  small_space">
                                                        <div class="col">
                                                            <label for="title_ar" class="mr-sm-2">{{ trans('feature_trans.name_ar') }} :</label>
                                                            <input type="text" class="form-control" name="title_ar" value="{{ $company_job->title_ar }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group  small_space">
                                                        <div class="col">
                                                            <label for="title_en" class="mr-sm-2">{{ trans('feature_trans.name_en') }} :</label>
                                                            <input type="text" class="form-control" name="title_en" value="{{ $company_job->title_en }}">
                                                        </div>
                                                    </div>
                                                <div class="form-group">
                                                    <div class="col">
                                                        <label class="mr-sm-2" for="type">{{ trans('main_trans.type') }}</label>
                                                        <select name="type" required class="form-control">
                                                            <option value="0"               <?php if($company_job->type == "0")            echo "selected"; ?> >  --Please Select--   </option>
                                                            <option value="Annoncement"     <?php if($company_job->type == "Annoncement")  echo "selected"; ?> >       Annoncement    </option>
                                                            <option value="Job Title"       <?php if($company_job->type == "Job Title")    echo "selected"; ?> >       Job Title      </option>
                                                            <option value="Job E-Mail"      <?php if($company_job->type == "Job E-Mail")   echo "selected"; ?> >       Job E-Mail     </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('front_trans.close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('front_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Make_Visible -->
                            <div class="modal fade" id="vis{{ $company_job->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('social_trans.edit_social') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('visible', 'test') }}" method="post">
                                                {{ method_field('post') }}
                                                @csrf
                                                    @if  ($company_job->status == '1')
                                                        {{ trans('social_trans.unvisible_social') }}
                                                    @elseif ($company_job->status == '0')
                                                        {{ trans('social_trans.visible_social') }}
                                                    @endif
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $company_job->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">{{ trans('social_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-info">{{ trans('social_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- delete_modal_social -->
                            <div class="modal fade" id="delete{{ $company_job->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('front_trans.delete') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('company_jobs.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('social_trans.Warning_social') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $company_job->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('social_trans.Close') }}</button>
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


<!-- add_modal_social -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
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
                <form action="{{ route('company_jobs.store') }}" method="POST">
                    @csrf
                    <div class="form-group  small_space">
                        <div class="col">
                            <label for="title_ar" class="mr-sm-2">{{ trans('feature_trans.name_ar') }} :</label>
                            <input type="text" class="form-control" name="title_ar">
                        </div>
                    </div>
                    <div class="form-group  small_space">
                        <div class="col">
                            <label for="title_en" class="mr-sm-2">{{ trans('feature_trans.name_en') }} :</label>
                            <input type="text" class="form-control" name="title_en">
                        </div>
                    </div>
                    <div class="form-group small_space  small_space_select">
                        <div class="col">
                            <label class="mr-sm-2" for="type">{{ trans('main_trans.type') }} : </label>
                            <select name="type" required class="form-control">
                                <option value="0">            {{ trans('social_trans.0') }}             </option>
                                <option value="Annoncement">  {{ trans('front_trans.annoce') }}         </option>
                                <option value="Job Title">    {{ trans('front_trans.job_title') }}      </option>
                                <option value="Job E-Mail">   {{ trans('front_trans.job_email') }}      </option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('social_trans.Close') }}</button>
                        <button type="submit"
                            class="btn btn-success">{{ trans('social_trans.submit') }}</button>
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
@endsection
