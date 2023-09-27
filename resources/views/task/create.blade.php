<x-layout title="ToDo | Nova Tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>
    
    <section id="task_section">
        <h1>Criar nova tarefa</h1>
        <form action="{{route('task.save')}}" method="POST">
            @csrf
            <x-form.input name="title" label="Título da tarefa" placeholder="Digite o título da tarefa" required="y"/>
            <x-form.input name="due_date" label="Data de Execução" type="datetime-local" placeholder="Digite a data da execução da tarefa" required="y"/>
            <x-form.select name="category_id" label="Categoria da tarefa" required="y">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </x-form.select>
            <x-form.textarea name="description" label="Descrição da tarefa" placeholder="Digite a descrição da tarefa" required="y" />
            <x-form.form_button resetTxt="Limpar" submitTxt="Criar Tarefa" />
        </form>
    </section>
</x-layout>