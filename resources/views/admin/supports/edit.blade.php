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

<h1>Editar Dúvida</h1>

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf()
    @method('Put')
    <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Editar</button>
</form>

<form action="{{ route('supports.destroy', $support->id) }}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>

<a href="{{ route('supports.index') }}">Voltar</a>