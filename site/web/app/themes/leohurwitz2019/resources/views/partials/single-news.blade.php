<div class="single-news">
    @php $link = get_field('link') @endphp
    <h6>{{ get_the_date() }}</h6>
        <h3>
        @if($link) <a href="{{ $link }}" target="_blank"> @endif
            {{ the_title() }}
    @if($link) </a> @endif
    </h3>
    {{ the_content() }}
</div>