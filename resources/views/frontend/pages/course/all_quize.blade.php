@extends('layouts.webmaster')
@section('website_contents')


{{-- 🟩 Quiz Header: Static --}}
<section class="quiz_box ">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class=" mb-4 p-3 rounded shadow-sm quiz_header">
            <h2>{{ $data->title }}</h2>
            <p><strong>Total Question:</strong> {{ $data->quizeQustions->count() }}</p>
            <p><strong>Total Mark:</strong> 40</p>
            <p><strong>Pass Mark:</strong> {{$data->pass_mark ?? '25'}}</p>
            <h4><strong>Total Time:</strong>{{$data->quize_time ?? '40 minute'}} Minutes</h4>
     <div id="quiz-timer" class="text-danger fs-1 fw-bold">  <span><h5 class="text-white">Timer :</h5></span> 40:00</div> {{-- Countdown will come here --}}
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <input type="hidden" id="quiz_id" value="{{ $data->id }}">  
            <input type="hidden" id="quiz_slug" value="{{ $data->slug }}">
            
            <div class="col-md-8 quiz_box" id="quiz-container">



                {{-- 🟦 Quiz Body: Loaded Dynamically --}}
                <div id="quiz-question-body">
                    @if($data->quizeQustions->count() > 0)
                        @php $first = $data->quizeQustions->first();  @endphp 
                        @includeIf('frontend.pages.course.components.details.live_quize', compact('first', 'data'))
                    @else
                        <h4>No questions found.</h4>
                    @endif
                </div>

                {{-- Optional Footer --}}
                <div class="quiz_footer mt-4 text-muted small text-center">
                    <p class="text-white">Note: Once submitted, answers cannot be changed.</p>
                </div>

            </div>
        </div>
    </div>
</section>





<script>
    let duration = 40 * 60; // 40 minutes in seconds
    const timerDisplay = document.getElementById('quiz-timer');

    function startTimer() {
        const timer = setInterval(() => {
            let minutes = Math.floor(duration / 60);
            let seconds = duration % 60;

            timerDisplay.innerText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

            if (--duration < 0) {
                clearInterval(timer);
                alert("Time is up!");
                // Optionally submit the quiz here
            }
        }, 1000);
    }

    startTimer();
</script>



<script>
function submitAnswer() {
    let selectedOption = $('input[name="option"]:checked').val();
    let questionId = $('#question_id').val();
    let quizId = $('#quiz_id').val();
    let quizslug = $('#quiz_slug').val();
   

    if (!selectedOption) {
        alert("select Your Answer ");
        return;
    }

    $.ajax({
        url: "{{ route('save_quiz_answer') }}", // নিচে route টি দেখানো হবে
        type: 'POST',
        data: {
            _token: "{{ csrf_token() }}",
            question_id: questionId,
            selected_option: selectedOption,
            quiz_id: quizId,
            quiz_slug : quizslug
        },
       success: function (response) {
            if (response.status === 'next') {
                $('#quiz-container').html(response.view);
            } else if (response.status === 'completed') {
                window.location.href = response.redirectUrl;
            }else if(response.status === 'exist'){
              window.location.href = response.existurl;
            }else {
                $('#quiz-container').html('<h3>✅ Quiz Ended!</h3>');
            }
        }

    });
}
</script>








@endsection
