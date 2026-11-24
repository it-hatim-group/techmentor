<section class="section" id="about">
    <div class="container">
        <div class="section-head">
            <div class="kicker">How TechMentor works</div>
            <h2>From the Right Connection to Real Growth</h2>
            <p>Our approach is built around understanding your goals, connecting the right expertise and
                supporting meaningful progress.</p>
        </div>
        <div class="process-grid">
            @foreach ($processSteps as $step)
                <article class="process">
                    <div class="num">
                        {{ $step->step_number }}
                    </div>
                    <h3>{{ $step->title }}</h3>
                    <p>{{ $step->description }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
