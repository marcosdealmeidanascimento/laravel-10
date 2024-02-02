<h1>Detalhes da dúvida: {{ $support->id }}</h1>

<ul>
    <li>
        <strong>Assunto: </strong> {{ $support->subject }}
    </li>
    <li>
        <strong>Status: </strong> {{ $support->status }}
    </li>
    <li>
        <strong>Descrição: </strong> {{ $support->body }}
    </li>
</ul>

<a href="{{ route('supports.index') }}">Voltar</a>