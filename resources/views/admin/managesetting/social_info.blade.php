@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Setting</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Social Info
                </h5>
                <a href="{{ route('manage.basic.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> Basic Setting
                </a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                <script>
                    swal({
                        title: 'success!',
                        text: "{{ Session::get('success')}}",
                        icon = 'success',
                        timer: 5000
                    });

                </script>
                @endif

                @if (Session::has('error'))
                <script>
                    swal({
                        title: 'error!'
                        text: "{{ Session::get('error')}}",
                        icon = 'error',
                        timer: 5000
                    });

                </script>
                @endif
                <form method="POST" action="{{ route('manage.social.upate') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" value="{{ $data->sm_id }}" name="sm_id" class="form-control">
                            <div class="form-group pb-2 {{$errors->has('sm_facebook') ? ' has-error':''}}">
                                <label><strong>Facebook </strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fab fa-facebook" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="https/facebook.com/mehejabul"
                                        aria-label="https/facebook.com/mehejabul" aria-describedby="basic-addon1"
                                        name="sm_facebook" value="">
                                    @if ($errors->has('sm_facebook'))
                                    <span class="error">{{ $errors->first('sm_facebook') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group pb-2 {{$errors->has('sm_linkedin') ? ' has-error':''}}">
                                <label><strong>Linkedin</strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-linkedin"
                                            aria-hidden="true"></i></span>
                                    <input type="email" class="form-control" placeholder="#" aria-label="#"
                                        aria-describedby="basic-addon1" name="sm_linkedin" value="">
                                    @if ($errors->has('sm_linkedin'))
                                    <span class="error">{{ $errors->first('sm_linkedin') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group pb-2 {{$errors->has('sm_youtube') ? ' has-error':''}}">
                                <label><strong>Youtube </strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fab fa-youtube"" aria-hidden=" true"></i></span>
                                    <input type="text" class="form-control" placeholder="#" aria-label="#"
                                        aria-describedby="basic-addon1" name="sm_youtube" value="">
                                    @if ($errors->has('sm_youtube'))
                                    <span class="error">{{ $errors->first('sm_youtube') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group pb-2 {{$errors->has('sm_instagram') ? ' has-error':''}}">
                                <label><strong>Instagram </strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fab fa-instagram"" aria-hidden=" true"></i></span>
                                    <input type="text" class="form-control" placeholder="#" aria-label="#"
                                        aria-describedby="basic-addon1" name="sm_instagram" value="">
                                    @if ($errors->has('sm_instagram'))
                                    <span class="error">{{ $errors->first('sm_instagram') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group pb-2 {{$errors->has('sm_slack') ? ' has-error':''}}">
                                <label><strong> Slack </strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fab fa-slack"" aria-hidden=" true"></i></span>
                                    <input type="text" class="form-control" placeholder="#" aria-label="#"
                                        aria-describedby="basic-addon1" name="sm_slack" value="">
                                    @if ($errors->has('sm_slack'))
                                    <span class="error">{{ $errors->first('sm_slack') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group pb-2 {{$errors->has('sm_twitter') ? ' has-error':''}}">
                                <label><strong> Twitter </strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fab fa-twitter"" aria-hidden=" true"></i></span>
                                    <input type="text" class="form-control" placeholder="#" aria-label="#"
                                        aria-describedby="basic-addon1" name="sm_twitter" value="">
                                    @if ($errors->has('sm_twitter'))
                                    <span class="error">{{ $errors->first('sm_twitter') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group pb-2 {{$errors->has('sm_dribble') ? ' has-error':''}}">
                                <label><strong> dribble </strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fab fa-dribbble"" aria-hidden=" true"></i></span>
                                    <input type="text" class="form-control" placeholder="#" aria-label="#"
                                        aria-describedby="basic-addon1" name="sm_dribble" value="">
                                    @if ($errors->has('sm_dribble'))
                                    <span class="error">{{ $errors->first('sm_dribble') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group pb-2 {{$errors->has('sm_google') ? ' has-error':''}}">
                                <label><strong> Google </strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fab fa-google"" aria-hidden=" true"></i></span>
                                    <input type="text" class="form-control" placeholder="#" aria-label="#"
                                        aria-describedby="basic-addon1" name="sm_google" value="">
                                    @if ($errors->has('sm_google'))
                                    <span class="error">{{ $errors->first('sm_google') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group pb-2 {{$errors->has('sm_raddit') ? ' has-error':''}}">
                                <label><strong> reddit </strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fab fa-reddit"" aria-hidden=" true"></i></span>
                                    <input type="text" class="form-control" placeholder="#" aria-label="#"
                                        aria-describedby="basic-addon1" name="sm_raddit" value="">
                                    @if ($errors->has('sm_raddit'))
                                    <span class="error">{{ $errors->first('sm_raddit') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group pb-2 {{$errors->has('sm_behance') ? ' has-error':''}}">
                                <label><strong> behance </strong> </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i
                                            class="fab fa-reddit"" aria-hidden=" true"></i></span>
                                    <input type="text" class="form-control" placeholder="#" aria-label="#"
                                        aria-describedby="basic-addon1" name="sm_behance" value="">
                                    @if ($errors->has('sm_behance'))
                                    <span class="error">{{ $errors->first('sm_behance') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>




                        <div class="card-footer  border-primary mt-4">
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-primary w-md">Update</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!-- end cardaa -->
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
