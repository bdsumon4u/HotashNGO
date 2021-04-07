<section class="team-area pb-70">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">@lang(setting('section', 'team_name'))</span>
            <h2>@lang(setting('section', 'team_title'))</h2>
            <div>{{ setting('section', 'team_description') }}</div>
        </div>
        <div class="row">
            @each('pages.partials.person', random_volunteers(), 'person')
        </div>
    </div>
</section>
