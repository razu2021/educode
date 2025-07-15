@extends('layouts.instructormaster')
@section('instructor_contents')

<div class="container card  py-4" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
         
  {{-- search end  --}}
  <div class="row flex-between-center mb-4">
      <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
      <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">All Course Batch Infomations </h5>
      </div>
      <div class="col-6 col-sm-auto ms-auto text-end ps-0">
      <div id="table-purchases-replace-element" class="d-flex align-items-center">
          <!-- New Button -->
          <a href="{{route('ins_course_batch.all')}}">
          <button class="btn btn-falcon-default btn-sm" type="button">
              <i class="bi bi-sliders"></i>
              <span class="d-none d-sm-inline-block ms-1">Manage All Batch</span>
          </button>
          </a>
          <!-- Export Button -->
      </div>
      </div>
  </div>
        <hr>
    <div class="row">
    @foreach ($all as $data )
 
         <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card shadow-sm border-0 h-100 text-center p-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-folder2-open display-4 text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">{{ $data->courseBatch->count() }}</h5>
                        <p class="text-muted small mb-3">
                          {{$data->course_name}}
                        </p>
                        <span class="badge bg-primary mb-2">
                          {{ $data->courseBatch->count() }} {{ Str::plural('Batch', $data->courseBatch->count()) }}
                        </span>
                        <a href="{{route('ins_course_batch.add',[$data->id,$data->slug])}}" class="btn btn-sm btn-outline-primary w-100 mt-2">
                            Create a New Batch
                        </a>
                        <a href="{{route('ins_course_batch.all_topics',[$data->id,$data->slug])}}" class="btn btn-sm btn-outline-primary w-100 mt-2">
                            View All Batch
                        </a>
                    </div>
                </div>
            </div>
    {{-- col end  --}}
    @endforeach
  </div>
</div>


@endsection