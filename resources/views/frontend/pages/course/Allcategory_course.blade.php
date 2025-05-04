@extends('layouts.webmaster')
@section('website_contents')

<h1>All Course categor paage </h1>


<section>
    <div class="container">
        <div class="row">
          @foreach ($allcategorycourse as $all)
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{$all->course_category_name}}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
    
          @endforeach
              
           

        </div>
    </div>
</section>





@endsection
