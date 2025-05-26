@extends('dashboard')
@section('instructor_request_content')
<!-- Main Content Start -->
@php 
  use App\Models\InstructoreRequest;
  $auth_user_id = auth()->id();
  $data = InstructoreRequest::where('user_id',$auth_user_id)->first();

  $totalfields = 32;
  $progress = 0; // default value


  if($data){
    $fieldupcount = collect($data->toArray())->filter(function($value){
    return !is_null($value) && $value !== '';
  })->count();

  $progress = intval(($fieldupcount / $totalfields) * 100);
  }
@endphp
{{-- progress bar code end here  --}}

<div class="container py-5">
    <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-md-12">
            <div class="card shadow-sm h-100 d-flex flex-md-row align-items-center p-3">
                <div class="col-md-3 text-center">
                    <img src="{{asset('contents/backend/instructor/img/complete.jpg')}}" alt="Create Course" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <h5><strong>Welcome {{Auth::user()->name}}</strong></h5>
                    <p>Whether you've been teaching for years or are teaching for the first time, you can make an engaging course. We've compiled resources and best practices to help you get to the next level, no matter where you're starting.</p>
                    @if($progress  > 80 && $data->approval_status === 0)
                        <form action="{{route('instructor_request.aproval_status_update')}}" method="post">
                            @csrf
                            <Button class="btn btn-success " type="submit">Submit for approval</Button>
                        </form>
                    @elseif($data->approval_status === 1)
                        <p class="text-warning ">Your approval request is pending. Please wait for further updates.</p>
                    @elseif($data->approval_status === 3)
                        <p class="text-danger ">Your request has been rejected. It seems some information is missing. Please review and try again </p>
                    @else
                        <a href="{{route('instructor_request.find_us')}}" class="text-primary">Complete your profile now </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Card 2 & 3 -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100 p-3">
                <h5>Review Your Basic Profile</h5>
                <p>Ensure your profile has name, photo, bio, and essential details accurately filled out and up to date.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 p-3">
                <h5>Quick Eligibility Check</h5>
                <p>System checks if your email is verified and your profile is at least 80% complete for initial eligibility.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 p-3">
                <h5>Redirect Based on Eligibility</h5>
                <p>If eligible, you’ll be redirected to the instructor dashboard; otherwise, prompted to complete missing requirements.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 p-3">
                <h5>Identification Verification</h5>
                <p>Upload a valid ID like passport, national ID, or driver’s license to confirm your identity.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 p-3">
                <h5>Upload Supporting Documents</h5>
                <p>Provide certificates, experience proofs, or other documents to support your qualifications and background.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 p-3">
                <h5>Social Media Verification</h5>
                <p>Link your social profiles (e.g., Facebook, LinkedIn, YouTube) to validate your online presence and reach.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 p-3">
                <h5>Video Introduction Submission</h5>
                <p>Submit a short self-introduction video explaining who you are and your teaching goals.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 p-3">
                <h5>Terms & Conditions Agreement</h5>
                <p>Read and agree to the Instructor Terms by checking the consent box before proceeding.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100 p-3">
                <h5>Final Review for Eligibility</h5>
                <p>Admin team reviews all submissions and sends approval or rejection via email based on compliance.</p>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-12">
            <div class="card shadow-sm h-100 d-flex flex-md-row align-items-center p-3">
                <div class="col-md-3 text-center">
                    <img src="{{asset('contents/backend/instructor/img/complete.jpg')}}" alt="Instructor Challenge" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <h5>Join the New Instructor Challenge!</h5>
                    <p>Get exclusive tips and resources designed to help you launch your first course faster! Eligible instructors who publish their first course on time will receive a special bonus to celebrate. Start today!</p>
                    <a href="#" class="text-primary">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>





  <!-- Main Content End -->
@endsection