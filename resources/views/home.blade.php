<x-layout title="ToDo | Início">
    <x-slot:btn>
        <a href="#" class="btn btn-primary">Criar Tarefa</a>
    </x-slot:btn>
    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do Dia</h2>
            <div class="line_header"></div>
            <div class="graph_header-date">
                <img src="/assets/images/icon-prev.png" alt="">
                    26 de Set
                <img src="/assets/images/icon-next.png" alt="">
            </div>
        </div>
        <div class="graph_header-subtitle">Tarefas: <b>3/6</b></div>
        <div class="graph_placeholder"></div>
        <div class="graph_text">
            <img src="/assets/images/icon-info.png" alt="">
            Restam 3 tarefas para serem realizadas
        </div>
    </section>
    <section class="list">
        <div class="list_header">
            <select class="list_header-select">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task_list">
            @php
                $tasks = [
                    [
                        'id' => 1,
                        'done' => false,
                        'title' => 'Minha primeira tarefa',
                        'priority' => 'Prioridade 1',
                        'edit_url' => 'https://www.globo.com',
                        'delete_url' => 'https://www.google.com'
                    ],
                    [
                        'id' => 2,
                        'done' => true,
                        'title' => 'Minha segunda tarefa',
                        'priority' => 'Prioridade 2',
                        'edit_url' => 'https://www.globo.com',
                        'delete_url' => 'https://www.google.com'
                    ],
                    [
                        'id' => 3,
                        'done' => false,
                        'title' => 'Minha terceira tarefa',
                        'priority' => 'Prioridade 1',
                        'edit_url' => 'https://www.globo.com',
                        'delete_url' => 'https://www.google.com'
                    ]
                ];
            @endphp
            <x-task :task=$tasks[0]/>
            <x-task :task=$tasks[1]/>
            <x-task :task=$tasks[2]/>
        </div>
    </section>
</x-layout>