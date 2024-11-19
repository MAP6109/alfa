<!-- resources/views/epi/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Completa de EPIs</title>
    <style>
        /* Estilos básicos aqui */
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #333232; color: #f5f2f2; }
        h1 { text-align: center; color: #efeeee; }
        /* Outros estilos aqui */
    </style>
</head>
<body>
    <h1>Gerenciamento de EPIs</h1>

    <!-- Formulário para Adicionar Novo EPI -->
    <div class="epi-form" id="addEpiForm">
        <form action="{{ route('epi.store') }}" method="POST">
            @csrf
            <div class="field">
                <label for="nomeEpi">Nome do EPI:</label>
                <input type="text" id="nomeEpi" name="nome" placeholder="Nome do EPI" required>
            </div>
            <div class="field">
                <label for="tipoEpi">Tipo de EPI:</label>
                <input type="text" id="tipoEpi" name="tipo" placeholder="Tipo do EPI" required>
            </div>
            <div class="field">
                <label for="validadeEpi">Data de Validade:</label>
                <input type="date" id="validadeEpi" name="validade" required>
            </div>
            <button type="submit">Adicionar EPI</button>
        </form>
    </div>

    <!-- Lista de EPIs -->
    <div class="epi-list" id="listaEpis">
        @foreach($epis as $epi)
            <div class="epi-item {{ $epi->habilitado ? '' : 'disabled' }}">
                <div>
                    <strong>Nome:</strong> {{ $epi->nome }} <br>
                    <strong>Tipo:</strong> {{ $epi->tipo }} <br>
                    <strong>Validade:</strong> {{ $epi->validade }} <br>
                    <strong>Status:</strong> {{ $epi->habilitado ? 'Habilitado' : 'Desabilitado' }}
                </div>
                <div class="buttons">
                    <form action="{{ route('epi.update', $epi->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="edit">Editar</button>
                    </form>
                    <form action="{{ route('epi.toggle', $epi->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="toggle">{{ $epi->habilitado ? 'Desabilitar' : 'Habilitar' }}</button>
                    </form>
                    <form action="{{ route('epi.destroy', $epi->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
