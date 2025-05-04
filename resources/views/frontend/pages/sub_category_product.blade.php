@extends('layouts.webmaster')
@section('website_contents')
<main>
    {{-- dynamic breadcrub all banner 1 category page  --}}
    <div id="breadcrub" class="breadcrub">
        @includeif('frontend/my_component/breadcrub/banner1',
        [
            'title'=>"title ",
            'caption'=>"Discover the Best Deals, Trending Products & Exclusive Offers Just for You!"
        ])
    </div>
    {{-- end breadcrub  --}}
    <!-- hot sell product  -->
    <div id="hot_sell_product">
        @includeif('frontend/my_component/product/hotsel')
    </div>
    <!-- sub category  -->
    <div id="sub_category_list">
        @includeif('frontend/my_component/product/childcategory_list')
    </div>
    <!-- category product list   -->

    @foreach ($data->subcategorys as $subcategory)
    <h4>{{ $subcategory->name }}</h4>

        @foreach ($subcategory->childcategories as $child)
            <a href="{{route('child_category_product',[$data->url,$subcategory->sub_category_url,$child->child_category_url,$data->slug,$subcategory->slug,$child->slug])}}">{{ $child->child_category_name }}</a><br>
            <p>{{$data->url}} .. {{$subcategory->sub_category_url}} .. {{$child->child_category_url}}</p>
            <p>{{$data->slug}} || {{$subcategory->slug}} || {{$subcategory->slug}}</p>
        @endforeach
      

    @endforeach


    <div id="sub_category_list">
        @includeif('frontend/my_component/product/product_card1')
    </div>


   

























</main>
@endsection
