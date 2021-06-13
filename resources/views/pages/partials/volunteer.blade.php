<section class="team-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">@lang(setting('section', 'team_name_'.app()->getLocale()))</span>
            <h2>@lang(setting('section', 'team_title_'.app()->getLocale()))</h2>
            <div>{{ setting('section', 'team_description_'.app()->getLocale()) }}</div>
        </div>
        <div class="row">
            @each('pages.partials.person', random_volunteers(), 'person')
        </div>
    </div>
</section>
