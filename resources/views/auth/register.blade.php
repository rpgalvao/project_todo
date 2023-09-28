<x-layout title="ToDo | Cadastro">
    <x-slot:btn>
        <a href="{{route('login')}}" class="btn btn-primary">Já tem conta? Faça o login</a>
    </x-slot:btn>
    
    <section id="task_section">
        <h1>Faça o seu cadastro</h1>
        
        @if ($errors->any)
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{route('saveUser')}}" method="POST">
            @csrf
            <x-form.input name="name" label="Digite o seu nome" placeholder="Seu nome" required="y"/>
            <x-form.input name="email" label="Digite o seu e-mail" type="email" placeholder="seuemail@email.com.br" required="y"/>
            <x-form.input name="password" label="Digite uma senha" type="password" placeholder="Sua senha com no mínimo 6 caracteres" required="y"/>
            <x-form.input name="password_confirmation" label="Confirme a sua senha" type="password" placeholder="Confirme a sua senha" required="y"/>
            <x-form.form_button resetTxt="Limpar" submitTxt="Criar Usuário" />
        </form>
    </section>
</x-layout>