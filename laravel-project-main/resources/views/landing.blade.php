@extends('layouts.app')

@section('content')
<section class="bg-light py-5 mb-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Produtos Artesanais</h1>
        <p class="lead text-muted">Catálogo de peças feitas à mão, com história e cuidado.</p>
        @guest
            <a href="{{ route('login') }}" class="btn btn-outline-primary mt-2">Área administrativa</a>
        @endguest
    </div>
</section>

<div class="container">
    @if ($categorias->isNotEmpty())
        <div class="mb-4 d-flex flex-wrap gap-2 align-items-center" id="filtro">
            <span class="text-muted me-2">Filtrar:</span>
            <button type="button" class="btn btn-sm btn-dark filtro-btn active" data-categoria="todas">Todas</button>
            @foreach ($categorias as $categoria)
                <button type="button" class="btn btn-sm btn-outline-dark filtro-btn" data-categoria="{{ $categoria->id }}">{{ $categoria->nome }}</button>
            @endforeach
        </div>
    @endif

    @if ($produtos->isEmpty())
        <p class="text-muted text-center py-5">Nenhum produto disponível no momento.</p>
    @else
        <div class="row g-4" id="produtos-grid">
            @foreach ($produtos as $produto)
                <div class="col-sm-6 col-md-4 col-lg-3 produto-card" data-categoria="{{ $produto->categoria_id }}">
                    <div class="card h-100 shadow-sm">
                        @if ($produto->imagem_url)
                            <img src="{{ Storage::url($produto->imagem_url) }}" alt="{{ $produto->nome }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-secondary-subtle d-flex align-items-center justify-content-center text-muted" style="height: 200px;">sem imagem</div>
                        @endif
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2">{{ $produto->categoria->nome }}</span>
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <p class="card-text text-muted small">{{ \Illuminate\Support\Str::limit($produto->descricao, 80) }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center bg-white">
                            <strong>R$ {{ number_format($produto->preco, 2, ',', '.') }}</strong>
                            @if ($produto->catalogo_pdf_url)
                                <a href="{{ Storage::url($produto->catalogo_pdf_url) }}" target="_blank" class="btn btn-sm btn-outline-danger">Catálogo PDF</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="text-muted text-center mt-4" id="vazio" hidden>Nenhum produto nessa categoria.</p>
    @endif
</div>

<script>
    (function () {
        const botoes = document.querySelectorAll('.filtro-btn');
        const cards = document.querySelectorAll('.produto-card');
        const vazio = document.getElementById('vazio');

        botoes.forEach(function (btn) {
            btn.addEventListener('click', function () {
                botoes.forEach(function (b) {
                    b.classList.remove('active', 'btn-dark');
                    b.classList.add('btn-outline-dark');
                });
                btn.classList.add('active', 'btn-dark');
                btn.classList.remove('btn-outline-dark');

                const alvo = btn.dataset.categoria;
                let visiveis = 0;

                cards.forEach(function (card) {
                    const mostrar = alvo === 'todas' || card.dataset.categoria === alvo;
                    card.hidden = !mostrar;
                    if (mostrar) visiveis++;
                });

                if (vazio) vazio.hidden = visiveis > 0;
            });
        });
    })();
</script>
@endsection
