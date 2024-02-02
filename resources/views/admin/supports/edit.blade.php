<h1>Detalhes da dúvida: {{ $support->id }}</h1>

<x-alert />

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
    @include('admin.supports.partials.form', [
        'support' => $support,
    ])
</form>

<form action="{{ route('supports.destroy', $support->id) }}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>

<a href="{{ route('supports.index') }}">Voltar</a>
