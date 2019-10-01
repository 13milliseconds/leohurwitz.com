@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    @if($all_movies->have_posts())
    <section>
      <ul>
    @while($all_movies->have_posts()) @php($all_movies->the_post())
      <li><a href="{{ the_permalink() }}">{{ the_title() }}</a></li>
    @endwhile
    @php(wp_reset_postdata())
    @endif

  @endwhile
@endsection