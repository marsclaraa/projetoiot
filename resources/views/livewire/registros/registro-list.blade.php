<div>
    <div class=" py-4" style= "min-height: 100vh;">
        <div class="container">


        <div class="row mb-3 align-items-center">
            <div class="col-md-6 mt-2">
                <h2 class="fw-bold" style="color: #2c2c2c;">Lista de Registros</h2>
            </div>
           
        </div>

        <!-- Filtro e Paginação -->
        <div class="card border-0 shadow-sm rounded-4";>
            <div class="card-body">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <input type="text" wire:model.debounce.300ms="search" class="form-control rounded-pill"
                          id="search"  placeholder="Buscar registros..." wire:model.live="search">
                    </div>
                    <div class="col-md-3">
                        <select wire:model.live="perPage" class="form-select rounded-pill">
                            <option value="10">10 por página</option>
                            <option value="25">25 por página</option>
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
                                <th>SENSOR ID</th>
                                <th>VALOR</th>
                                <th>UNIDADE</th>
                                <th>DATA HORA</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($registro as $r)
                                <tr style="background-color: #fff5e9;">
        
                                    <td>{{ $r->sensor_id }}</td>
                                    <td>{{ $r->valor}}</td>
                                    <td>{{ $r->unidade}}</td>
                                    <td>{{ $r->data_hora}}</td>
                                    
                                    <td>
                                        {{-- <a href="{{ route('registro.edit', ['id' => $r->id]) }}"
                                            class="btn btn-sm btn-primary rounded-pill text-white fw-bold px-3 py-1">Editar</a>
 --}}


                                        <button wire:click="delete({{ $r->id }})"
                                            onclick="return confirm('Tem certeza que deseja deletar?')"
                                            class="btn btn-sm btn-secondary rounded-pill text-white fw-bold px-3 py-1">Deletar</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nenhum registro encontrado.</td>
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