<section class="team-area pb-70">
    <div class="container">
        <div class="section-title">
            <span class="sub-title">Volunteer</span>
            <h2>Meet our excellent volunteers</h2>
            <p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and
                individual citizens that are making.</p>
        </div>
        <div class="row">
            @each('pages.partials.person', random_volunteers(), 'person')
        </div>
    </div>
</section>
