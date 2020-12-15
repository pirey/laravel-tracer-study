<div class="container mt-3">
    @if ($tracer_study)
        <div class="card">
            <div class="card-header">
                <h2>{{ __('Tracer Study Submission by: ') . $tracer_study->name }}</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">{{ __('Program Study: ' . $tracer_study->program_study) }}</div>
                <div class="mb-3">{{ __('Graduation Year: ' . $tracer_study->graduation_year) }}</div>
                @if ($tracer_study->currently_working)
                    <div class="mb-3">{{ __('Occupation: Not working') }}</div>
                @else
                    <div class="mb-3">{{ __('Occupation: ' . $tracer_study->occupation) }}</div>
                @endif
                <div class="mb-3">
                    <a href="/admin/tracer-studies">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    @else
        <div>Loading...</div>
    @endif
</div>
