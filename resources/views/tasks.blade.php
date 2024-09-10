    @include('partials.header')

    <main id="tasks" role="page-tasks">
        @forelse ($tasks as $task)
            <h2>{{ $task->title }}</h2>
        @empty
        <h2>vazio teste</h2>
        @endforelse

    </main>

    @include('partials.footer')
