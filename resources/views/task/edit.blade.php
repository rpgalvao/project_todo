<x-layout title="ToDo | Nova Tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>
    
    <section id="task_section">
        <h1>Editar tarefa</h1>
        <form action="{{route('task.update')}}" method="POST">
            <input type="hidden" name="id" value="{{$task->id}}">
            @csrf
            <x-form.input name="title" label="Título da tarefa" value="{{$task->title}}" placeholder="Digite o título da tarefa" required="y"/>
            <x-form.input name="due_date" label="Data de Execução" value="{{$task->due_date}}" type="datetime-local" placeholder="Digite a data da execução da tarefa" required="y"/>
            <x-form.select name="category_id" label="Categoria da tarefa" required="y">
                @foreach ($categories as $category)
                    <option 
                        value="{{$category->id}}" 
                        @if ($task->category_id == $category->id)
                            selected                           
                        @endif >
                        {{$category->title}} 
                    </option>
                @endforeach
            </x-form.select>
            <x-form.textarea name="description" label="Descrição da tarefa" value="{{$task->description}}" placeholder="Digite a descrição da tarefa" required="y" />
            <x-form.checkbox name="is_done" label="Tarefa concluída?" checked="{{$task->is_done}}" />
            <x-form.form_button resetTxt="Limpar" submitTxt="Atualizar Tarefa" />
        </form>
    </section>
</x-layout>