<div>
    <div class=" py-4" style= "min-height: 100vh;">
        <div class="container">


        <div class="row mb-3 align-items-center">
            <div class="col-md-6 mt-2">
                <h2 class="fw-bold" style="color: #2c2c2c;">Lista de Sensores</h2>
            </div>
            <div class="col-md-6 text-end mt-2">
                <a class="btn text-white btn-primary rounded-pill shadow"
                    href="{{ route('sensor.create') }}">
                    <i class="bi bi-plus-circle"></i> <strong>Novo Sensor</strong>
                </a>
            </div>
        </div>

        <!-- Filtro e Paginação -->
        <div class="card border-0 shadow-sm rounded-4";>
            <div class="card-body">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <input type="text" wire:model.debounce.300ms="search" class="form-control rounded-pill"
                          id="search"  placeholder="Buscar Sensores..." wire:model.live="search">
                    </div>
                    <div class="col-md-3">
                        <select wire:model.live="perPage" class="form-select rounded-pill">
                            <option value="10">15 por página</option>
                            <option value="25">30 por página</option>
                            <option value="50">50 por página</option>
                            <option value="100">100 por página</option>
                        </select>
                    </div>
                </div>

                <!-- Mensagem de sucesso -->
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <!-- Tabela -->
                <div class="table-responsive">
                    <table class="table text-center align-middle" style="background-color: #5e5e5e;">
                        <thead class= "background-color: #f0b923; color: black;">
                            <tr>
                                <th>CÓDIGO</th>
                                <th>TIPO</th>
                                <th>DESCRIÇÃO</th>
                                <th>STATUS</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sensor as $s)
                                <tr style="background-color: #fff5e9;">
        
                                    <td>{{ $s->codigo }}</td>
                                    <td>{{ $s->tipo }}</td>
                                    <td>{{ $s->descricao}}</td>
                                    <td>{{ $s->status == 1 ? "Ativo" : "Inativo" }}</td>
                                    <td>
                                        <a href="{{ route('sensor.edit', ['id' => $s->id]) }}"
                                            class="btn btn-sm btn-primary rounded-pill text-white fw-bold px-3 py-1">Editar</a>



                                        <button wire:click="delete({{ $s->id }})"
                                            onclick="return confirm('Tem certeza que deseja deletar?')"
                                            class="btn btn-sm btn-secondary rounded-pill text-white fw-bold px-3 py-1">Deletar</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nenhum sensor encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>