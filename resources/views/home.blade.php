<x-layout title="ToDo | Início">
    <x-slot:btn>
        <a href="{{route('task.create')}}" class="btn btn-primary">Criar Tarefa</a>
        <a href="{{route('logout')}}" class="btn btn-primary">Sair</a>
    </x-slot:btn>
    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do Dia</h2>
            <div class="line_header"></div>
            <div class="graph_header-date">
                <a href="{{route('home', ['date' => $date_prev_button])}}">
                    <img src="/assets/images/icon-prev.png" alt="">
                </a>
                    {{$date_string}}
                <a href="{{route('home', ['date' => $date_next_button])}}">
                    <img src="/assets/images/icon-next.png" alt="">
                </a>
            </div>
        </div>
        <div class="graph_header-subtitle">Tarefas: <b>{{$tasks_undone}}/{{$tasks_count}}</b></div>
        <div class="graph_placeholder"></div>
        <div class="graph_text">
            <img src="/assets/images/icon-info.png" alt="">
            Restam {{$tasks_undone}} tarefas para serem realizadas
        </div>
    </section>
    <section class="list">
        <div class="list_header">
            <select class="list_header-select" onchange="selectTaskFilter(this)">
                <option value="all_tasks">Todas as tarefas</option>
                <option value="task_pending">Tarefas pendentes</option>
                <option value="task_done">Tarefas realizadas</option>
            </select>
        </div>
        <div class="task_list">
            @foreach ($tasks as $task)
                <x-task :task=$task/>
            @endforeach
        </div>
    </section>
    <script>
        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{route('task.isDone')}}'
            let req = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({status, taskId, _token: '{{csrf_token()}}'})
            });
            let result = await req.json();
            if (result.success) {
                alert("Tarefa atualizada com sucesso!");
            } else {
                element.checked = !status;
            }
        }

        function selectTaskFilter(e) {
            if (e.value == 'task_pending') {
                showAllTasks();
                document.querySelectorAll('.task_done').forEach(element => {
                    element.style.display = 'none';
                });
            } else if (e.value == 'task_done') {
                showAllTasks();
                document.querySelectorAll('.task_pending').forEach(element => {
                    element.style.display = 'none';
                });
            } else {
                showAllTasks();
            }
        }

        function showAllTasks() {
            document.querySelectorAll('.task').forEach(element => {
                    element.style.display = 'flex';
                });
        }
    </script>
</x-layout>