<article {!! post_class() !!}>
  <header class="movie-header" style="background-image: url({{ get_the_post_thumbnail_url() }})">
    <div class="gradient"></div>
    <div class="container">
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
      @if($data['subtitle'])<h4>{{ $data['subtitle'] }}</h4>@endif
    </div>

    @if( $data['film'] )
    <div class="video-wrap">
      <div class="video-btn"><i class="fas fa-play"></i></div>
      <div class="video-player">
        <div class="embed-container">
            {!! $data['film'] !!}
        </div>
      </div>
    </div>
    @endif
  </header>
  
  <div class="entry-content">
      <div class="container">

      @if( have_rows('media') )
    <section id="media">
      <div class="slides"> 
      
      @while ( have_rows('media') ) @php the_row() @endphp
      <div class="slide media-item">

        @if( get_row_layout() == 'video' )
        <div class="video">
          <div class="embed-container">
              @php the_sub_field('video') @endphp
          </div>
        </div>
        
        @elseif( get_row_layout() == 'image' )

          @php $image = get_sub_field('image') @endphp
          @if( !empty($image) )
          <div class="image">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          </div>
          @endif

        @elseif( get_row_layout() == 'text' )
          <div class="text">
            {!! the_sub_field('text') !!}
          </div>

        @endif

      </div>
    @endwhile
    </div>
  </section>
  @endif

    <div class="row">
      <div class="col-md-4">
          <p>A film by @if($data['directed_by']){{ $data['directed_by'] }} @else Leo Hurwitz @endif</p>
          <h5>Year</h5>
          <p>@if($data['year_span']) {{ $data['year_span'] }} @else {{ $data['year'] }} @endif</p>
          <h5>Runtime</h5>
          <p>@if($data['length']) {{ $data['length'] }} minutes @else N/A @endif @if($data['surviving'])(surviving)@endif</p> 
          <h5>Format</h5>
          <p>{{ $data['format'] }}</p>
          @php $posts = $data['collaborators'] @endphp
          @if( $posts )
          <h5>Key People</h5>
          <ul>
            @foreach( $posts as $p )
              <li>
                <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
              </li>
	        @endforeach
	        </ul>
        @endif
      </div>

      <div id="content" class="col-md-8">
        <section class="synopsis">
          {!! $data['description'] !!}
        </section>
        
        <section class="credits">
          <div class="accordeon">
            <div class="accordeon-header">Credits <i class="fal fa-chevron-down down"></i><i class="fal fa-chevron-up up"></i></div>
            <div class="accordeon-content">
              {!! $data['credits'] !!}
            </div>
          </div>
        </section>

        @if($data['photos'])
          <section class="photo">
            <h2>Photos</h2>
            <div class="row">
              @foreach ($data['photos'] as $photo)
                <div class="col-md-4">
                  <img src="{{ $photo['url'] }}" />
                </div>
              @endforeach
            </div>
          </section>
        @endif

      </div>
    </div>
      </div>

  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
