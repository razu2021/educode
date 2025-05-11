@extends('dashboard')
@section('instructor_request_content')
<!-- Main Content Start -->
@php 
    use App\Models\InstructoreRequest;
    $auth_id = auth()->id();
    $data = InstructoreRequest::where('user_id',$auth_id)->first();
@endphp 

<div class="section">
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <h1>Welcome to Your Instructor Dashboard</h1>
            <p>Start creating your first course and share your knowledge with the world.</p>
        {{-- form start  --}}
            <form action="{{route('instructor_request.self_motivation_update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="why_become_instructor" class="form-label"><strong>Why do you want to become an instructor?</strong></label>
                <textarea name="why_become_instructor" id="why_become_instructor" class="form-control custom_input" oninput="checkWordLimit('why_become_instructor')">{{ $data->why_become_instructor ?? '' }}</textarea>
                <label class="form-label"><i>Share your motivation for teaching and what drives you to educate others.</i></label>
                <small id="count_why_become_instructor" class="form-text text-success">Words: 0 / 500</small>
                <small id="warn_why_become_instructor" class="text-danger d-none">⚠️ You've exceeded the 500-word limit!</small>
                <span class="text-danger">@error('why_become_instructor') {{$message}} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="future_contribution_plan" class="form-label"><strong>What are your future plans for contributing to our platform?</strong></label>
                <textarea name="future_contribution_plan" id="future_contribution_plan" class="form-control custom_input" oninput="checkWordLimit('future_contribution_plan')">{{ $data->future_contribution_plan ?? '' }}</textarea>
                <label class="form-label"><i>Tell us how you see yourself growing with us and helping learners worldwide.</i></label>
                <small id="count_future_contribution_plan" class="form-text text-success">Words: 0 / 500</small>
                <small id="warn_future_contribution_plan" class="text-danger d-none">⚠️ You've exceeded the 500-word limit!</small>
                <span class="text-danger">@error('future_contribution_plan') {{$message}} @enderror</span>
            </div>

            <div class="mb-3">
                <label for="what_makes_you_unique" class="form-label"><strong>What makes you unique as an instructor?</strong></label>
                <textarea name="what_makes_you_unique" id="what_makes_you_unique" class="form-control custom_input" oninput="checkWordLimit('what_makes_you_unique')">{{ $data->what_makes_you_unique ?? '' }}</textarea>
                <label class="form-label"><i>Highlight any special skills, experience, or perspective that sets you apart.</i></label>
                <small id="count_what_makes_you_unique" class="form-text  text-success">Words: 0 / 500</small>
                <small id="warn_what_makes_you_unique" class="text-danger d-none">⚠️ You've exceeded the 500-word limit!</small>
                 <span class="text-danger">@error('what_makes_you_unique') {{$message}} @enderror</span>
            </div>

          

            <div class="text-end mt-4">
               <a href="#"  onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('dashboard')}}"><button  type="button"class="btn btn-outline-warning"> Back to Home </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>

<script>
function checkWordLimit(fieldId) {
    const textarea = document.getElementById(fieldId);
    const countDisplay = document.getElementById(`count_${fieldId}`);
    const warnDisplay = document.getElementById(`warn_${fieldId}`);

    const text = textarea.value.trim();
    const words = text.split(/\s+/).filter(word => word.length > 0);
    const wordCount = words.length;

    countDisplay.textContent = `Words: ${wordCount} / 500`;

    if (wordCount > 500) {
        countDisplay.classList.remove('text-muted');
        countDisplay.classList.add('text-danger');
        warnDisplay.classList.remove('d-none');
    } else {
        countDisplay.classList.remove('text-danger');
        countDisplay.classList.add('text-muted');
        warnDisplay.classList.add('d-none');
    }
}
</script>

 
@endsection