<html>
    
    <head>
        
        <title>Tela  de Login </title>        
        <link rel="stylesheet" href=" {{ asset('/css/stylesheet.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
        
        
    </head>
    
    <body>
        
        <div class="background"></div>
        <section id="conteudo-view" class="login">
    
        {!! Form::open(['route' =>'user.login', 'method' => 'post']) !!}
                <h1><p>Faça Login</p></h1><br>
        <p><h3>Digite suas credencias para acessar o sistema</h3></p>
        <label>
            {!! Form::text('username', null, ['class' => 'input', 'placeholder' => 'Usuário']) !!}<br>

        
        </label>
          <label>
              {!! Form::password('password', ['placeholder' => 'Senha']) !!}     <br>
            
            
        </label>
            {!! Form::submit('Entrar') !!}
            
        {!! Form::close() !!} 
        </section>
        
    </body>
</html>