@extends('layouts.webmaster')
@section('website_contents')

<style>
  html {
    font-size: 10px;
  }

  body {
    background-color: #f8f9fa;
    padding: 2rem;
  }

  .quiz-header,
  .question-box {
    background-color: #fff;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
    margin-bottom: 2rem;
  }

  .countdown {
    font-size: 2rem;
    font-weight: bold;
    color: #dc3545;
  }

  .option {
    padding: 1rem;
    border: 1px solid #dee2e6;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .option input[type="radio"] {
    margin-right: 1rem;
  }

  .option:hover {
    background-color: #f1f1f1;
  }
</style>


<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8" id="quiz-container">
                @if($data->quizeQustions->count() > 0)
                    @php $first =$data->quizeQustions->first();  @endphp 
                    @includeIf('frontend.pages.course.components.details.live_quize',compact('first'))
                @else
                    <h4>No questions found.</h4>
                @endif
            </div>

        </div>
    </div>
</section>






<script>
function submitAnswer() {
    let selectedOption = $('input[name="option"]:checked').val();
    let questionId = $('#question_id').val();
    let quizId = $('#quiz_id').val();
    let slug = $data->slug;

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
            slug : slug
        },
       success: function (response) {
            if (response.status === 'next') {
                $('#quiz-container').html(response.view);
            } else if (response.status === 'completed') {
                window.location.href = response.redirectUrl;
            } else {
                $('#quiz-container').html('<h3>✅ Quiz Ended!</h3>');
            }
        }

    });
}
</script>








@endsection
