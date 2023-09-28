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
            @foreach ($tasks as $task)
                <x-task :task=$task/>
            @endforeach
        </div>
    </section>
</x-layout>