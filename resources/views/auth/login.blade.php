<x-layout title="ToDo | Login">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">Não tem conta? Faça o seu cadastro</a>
    </x-slot:btn>
    
    <section id="task_section">
        <h1>Login</h1>
        
        @if ($errors->any)
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{route('signin')}}" method="POST">
            @csrf
            <x-form.input name="email" label="Digite o seu e-mail" type="email" placeholder="seuemail@email.com.br" required="y"/>
            <x-form.input name="password" label="Digite sua senha" type="password" placeholder="Sua senha com no mínimo 6 caracteres" required="y"/>
            <x-form.form_button resetTxt="Limpar" submitTxt="Login" />
        </form>
    </section>
</x-layout>