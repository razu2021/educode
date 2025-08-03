{{-- <div class="card p-4">
   
    <h5>{{ $first->question }}</h5>
    <input type="text" id="question_id" value="{{ $first->id }}">

    <div class="form-check">
        <input class="form-check-input custom_radio" type="radio" name="option" value="A" id="optA">
        <label class="form-check-label custom_lable" for="optA">{{ $first->option1 }}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input custom_radio" type="radio" name="option" value="B" id="optB">
        <label class="form-check-label custom_lable" for="optB">{{ $first->option2 }}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input custom_radio" type="radio" name="option" value="C" id="optC">
        <label class="form-check-label custom_lable" for="optC">{{ $first->option3 }}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input custom_radio" type="radio" name="option" value="D" id="optD">
        <label class="form-check-label custom_lable" for="optD">{{ $first->option4 }}</label>
    </div>

    <button class="btn btn-primary mt-3" onclick="submitAnswer()">Next</button>
</div> --}}


<!-- Quiz Body Section -->



<div class="quiz-question card p-4 mb-4">
  <h4 class="question-text mb-4">{{ $first->question }}</h4>
  <input type="hidden" id="question_id" value="{{ $first->id }}">

  <div class="form-check-wrapper">
    <div class="form-check mb-3">
      <input class="form-check-input custom_radio" type="radio" name="option" value="A" id="optA">
      <label class="form-check-label custom_label" for="optA">
        A. {{ $first->option1 }}
      </label>
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input custom_radio" type="radio" name="option" value="B" id="optB">
      <label class="form-check-label custom_label" for="optB">
        B. {{ $first->option2 }}
      </label>
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input custom_radio" type="radio" name="option" value="C" id="optC">
      <label class="form-check-label custom_label" for="optC">
        C. {{ $first->option3 }}
      </label>
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input custom_radio" type="radio" name="option" value="D" id="optD">
      <label class="form-check-label custom_label" for="optD">
        D. {{ $first->option4 }}
      </label>
    </div>
  </div>

  <div class="text-end">
    <button class="btn btn-primary next-btn mt-3 px-4 py-2" onclick="submitAnswer()">Next</button>
  </div>
</div>
