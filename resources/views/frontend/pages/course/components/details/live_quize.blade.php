<div class="card p-4">
    <h5>{{ $first->question }}</h5>
    <input type="hidden" id="question_id" value="{{ $first->id }}">
    <input type="hidden" id="quiz_id" value="{{ $first->quize_id }}">
   

    <div class="form-check">
        <input class="form-check-input" type="radio" name="option" value="{{ $first->option1 }}" id="optA">
        <label class="form-check-label" for="optA">{{ $first->option1 }}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="option" value="{{ $first->option2 }}" id="optB">
        <label class="form-check-label" for="optB">{{ $first->option2 }}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="option" value="{{ $first->option3 }}" id="optC">
        <label class="form-check-label" for="optC">{{ $first->option3 }}</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="option" value="{{ $first->option4 }}" id="optD">
        <label class="form-check-label" for="optD">{{ $first->option4 }}</label>
    </div>

    <button class="btn btn-primary mt-3" onclick="submitAnswer()">Next</button>
</div>
