@extends('admin.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Beranda - Master Data - Course Module Quiz - </span>&nbsp;Tambah Data Course Module Quiz</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{url('/back-admin/course-module-quiz/list-course-module-quiz')}}" class="btn btn-sm btn-primary">Lihat Data</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Tambah Data Course Module Quiz</h3>
                </div>
            </div>
            <div id="kt_account_settings_profile_details" class="collapse show">
                <form id="kt_account_profile_details_form" class="form" method="POST" action="{{url('/back-admin/course-module-quiz/store-course-module-quiz')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Module - Course</label>
                            <div class="col-lg-8 fv-row">
                                <select name="course_module" aria-label="Select a Timezone" data-control="select2" class="form-select form-select-solid form-select-lg">
                                    @foreach ($getCourseModule as $item)
                                    <option value="{{$item->id}}">{{$item->module_name}} - {{$item->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Pertanyaan</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="question" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('question') is-invalid @enderror" value="{{old('question')}}" placeholder="Pertanyaan" />
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Pembahasan</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="discussion_result" class="form-control form-control-lg form-control-solid @error('discussion_result') is-invalid @enderror" value="{{old('discussion_result')}}" placeholder="Pembahasan"/>
                                @error('discussion_result')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Nilai</label>
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="score" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('score') is-invalid @enderror" value="{{old('score')}}" placeholder="100" />
                                @error('score')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-quiz-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extraJS')
<script src="{{asset('vendor/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script src="{{asset('vendor/js/custom/apps/projects/settings/settings.js')}}"></script>
<script src="{{asset('vendor/js/widgets.bundle.js')}}"></script>
<script src="{{asset('vendor/js/custom/widgets.js')}}"></script>
<script src="{{asset('vendor/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/users-search.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/new-target.js')}}"></script>
@endsection