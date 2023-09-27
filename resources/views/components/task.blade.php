<div class="task">
    <div class="title">
        <input type="checkbox"
            @if (isset($task) && $task['is_done'] == true)
                checked
            @endif
        >
        <div class="task_title">{{$task['title'] ?? ''}}</div>
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div>{{$task['category']->title ?? ''}}</div>
    </div>
    <div class="actions">
        <a href="{{route('task.edit', ['id' => $task['id']])}}">
            <img src="/assets/images/icon-edit.png" alt="">    
        </a>
        <a href="{{route('task.delete', ['id' => $task['id']])}}" onclick="return confirm('Tem certeza que deseja deletar essa tarefa?')">
            <img src="/assets/images/icon-delete.png" alt="">
        </a>
    </div>
</div>