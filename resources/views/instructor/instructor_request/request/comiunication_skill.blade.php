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
            <form action="{{route('instructor_request.comiunication_skil_update')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label for="can_reply_within_24h" class="form-label"><strong>Can you respond to student questions within 24 hours?</strong></label>
                <select name="can_reply_within_24h" id="can_reply_within_24h" class="form-control custom_input ">
                    <option value="{{$data->can_reply_within_24h}}">{{$data->can_reply_within_24h ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Timely response helps students feel supported. Please confirm if you can usually reply within a day.</i></label>
            </div>
            {{-- end  --}}
            <div class="mb-3">
                <label for="can_participate_community" class="form-label"><strong>Will you participate in the instructor community?</strong></label>
                <select name="can_participate_community" id="can_participate_community" class="form-control custom_input ">
                    <option value="{{$data->can_participate_community}}">{{$data->can_participate_community ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Engaging with other instructors helps everyone grow. Let us know if you're open to sharing and learning with peers.</i></label>
            </div>
            {{-- end  --}}
            <div class="mb-3">
                <label for="available_for_live_qa" class="form-label"><strong>Are you available to host or join live Q&A sessions?</strong></label>
                <select name="available_for_live_qa" id="available_for_live_qa" class="form-control custom_input ">
                    <option value="{{$data->available_for_live_qa}}">{{$data->available_for_live_qa ?? 'Select Preferable Answer' }} </option>
                   <option value="Yes">Yes </option>
                    <option value="No">No  </option>
                </select>
                <label for="has_teaching_experience" class="form-label"><i>Live Q&A helps build trust and clarity among students. Let us know if you can join or conduct these sessions.</i></label>
            </div>
            {{-- end  --}}
          

            <div class="text-end mt-4">

               <a href="#"  onclick="window.history.back()"><button type="button" class="btn btn-outline-dark"> Go Back </button></a>
               <a href="{{route('instructor_request.ethics')}}"><button type="button" class="btn btn-outline-warning"> Skip </button></a>
               <a href=""><button type="submit" class="btn btn-outline-success"> Save Information </button></a>
               <hr>
            </div>
        </form>
        {{-- form end  --}}

      

        </div>
    </div>
</div>


 
@endsection