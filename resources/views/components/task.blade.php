<div class="task">
    <div class="title">
        <input type="checkbox"
            @if (isset($task) && $task['done'] == true)
                checked
            @endif
        >
        <div class="task_title">{{$task['title'] ?? ''}}</div>
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div>{{$task['priority'] ?? ''}}</div>
    </div>
    <div class="actions">
        <a href="http://meusite.com.br/task/edit/{{$task['id']}}">
            <img src="/assets/images/icon-edit.png" alt="">    
        </a>
        <a href="http://meusite.com.br/task/delete/{{$task['id']}}">
            <img src="/assets/images/icon-delete.png" alt="">    
        </a>
    </div>
</div>