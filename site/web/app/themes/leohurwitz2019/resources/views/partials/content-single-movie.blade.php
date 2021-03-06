<article {!! post_class() !!}>
  
  @include('partials.movie-header')
  
  <div class="entry-content">

    <section id="content">
      <div class="container">
    <div class="row">
      <div class="col-md-12 entry-title">
        <h1>{!! get_the_title() !!}</h1>
        @if($data['subtitle'])<h4>{{ $data['subtitle'] }}</h4>@endif
      </div>
      <div class="col-md-6">
        {!! the_content() !!}
      </div>
      <div class="col-md-4 offset-md-2 details">
          <p>
            @if($data['directed_by']){{ $data['directed_by'] }} @else Leo Hurwitz @endif
          </p>
          <h5>Year</h5>
          <p>@if($data['year_span']) {{ $data['year_span'] }} @else {{ $data['year'] }} @endif</p>
          <h5>Runtime</h5>
          <p>@if($data['length']) {{ $data['length'] }} minutes @else N/A @endif @if($data['surviving'])(surviving)@endif</p> 
          <h5>Format</h5>
          <p>{{ $data['format'] }}</p>
          @php $posts = $data['collaborators'] @endphp
          @if( $posts )
          <h5>Collaborators</h5>
          <ul class="collaborators">
            @foreach( $posts as $p )
              <li>
                <a href="{{ get_permalink( $p ) }}">{{ get_the_title( $p ) }}</a>
              </li>
	        @endforeach
	        </ul>
        @endif

        @if($data['credits'])
        <div class="accordeon">
          <div class="accordeon-header"><span class="up">See</span><span class="down">Hide</span> Full Credits</div>
          <div class="accordeon-content">
            {!! $data['credits'] !!}
          </div>
        </div>
      </div>
      @endif

      </div>
    </section>

        @include('partials.single-movie-media')

        @if($data['photos'])
          <section class="photo lightgallery">
            <div class="container">
            <h2>Photos</h2>
            <div class="row gallery">
              @foreach ($data['photos'] as $photo)
                <a href="{{ $photo['url'] }}" class="col-md-4 photo" data-sub-html=".caption">
                  <img src="{{ $photo['sizes']['medium'] }}" data-sub-html="{{ $photo['title'] }}" alt="{{ $photo['alt'] }}" />
                  <div class="caption">
                  <figcaption>
                    <strong>{{ $photo['title'] }}</strong><br />{{ $photo['caption'] }}
                  </figcaption>
                  </div>
                </a>
              @endforeach
            </div>
            </div>
          </section>
        @endif
      </div>
  <footer class="prev-next-footer">
    <div class="container">
    <div class="row">
      <div class="col-2 col-md-4 prev">
        @php next_post_link( '%link', '<i class="far fa-arrow-left"></i> <span class="title">%title</span>' ) @endphp
      </div>
      <div class="col-8 col-md-4 back">
        <a href="/films">Back to All Films</a>
      </div>
      <div class="col-2 col-md-4 next">
        @php previous_post_link( '%link', '<span class="title">%title</span> <i class="far fa-arrow-right"></i>' ) @endphp
      </div>
    </div>
    </div>
  </footer>
</article>
