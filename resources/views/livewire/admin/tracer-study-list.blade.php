<div class="container mt-3">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>{{ __('Tracer Study Submissions') }}</h2>
            <a class="btn btn-success" href="/admin/tracer-studies/download">{{ __('Export') }}</a>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Year') }}</th>
                        <th>{{ __('Program Study') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tracer_studies as $tracer_study)
                        <tr>
                            <td>{{ $tracer_study->name }}</td>
                            <td>{{ $tracer_study->graduation_year }}</td>
                            <td>{{ $tracer_study->program_study }}</td>
                            <td><a href="/admin/tracer-studies/{{ $tracer_study->id }}">{{ __('Detail') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer pb-0">
            {{ $tracer_studies->links() }}
        </div>
    </div>
</div>
