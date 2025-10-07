
<div>
 <div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow-sm" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h4 class="card-title mb-4 text-center">
                <i class="bi bi-plus-circle"></i> Atualizar Sensor
            </h4>

            <form wire:submit.prevent="edit">
                
                <div class="mb-3">
                    <label class="form-label"><strong> Codigo:<strong></label>
                    <input type="text" wire:model="codigo" class="form-control">
                    @error('codigo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                 <div class="mb-3">
                    <label class="form-label"> <strong> Tipo:<strong></label>
                    <input type="text" wire:model="tipo" class="form-control">
                    @error('tipo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong> Ambiente:<strong></label>
                   <select class="form-select" aria-label="ambiente_id" wire:model='ambiente_id'>
                    @foreach ($ambientes as $a)
                        <option value="{{$a->id}}">{{$a->nome}}</option>
                        @endforeach
                    </select>

                    @error('ambiente_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

               <div class="mb-3">
                    <label class="form-label"> <strong> Descrição:<strong></label>
                    <input type="text" wire:model="descricao" class="form-control">
                    @error('descricao')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            
                <div>
                    <label class="form-label"><strong> Status:</strong></label>
                    <select class="form-select" aria-label="status" wire:model='status'>
                        <option hidden></option>
                        <option value="1">Ativo </option>
                        <option value="0">Inativo</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </br>
                <div class="d-flex justify-content-between">
                    <button wire:click type="submit" class="btn btn-primary"
                        wire:confirm = "Tem certeza que deseja cadastrar?">
                        <i class="bi bi-check-circle"></i> Atualizar
                    </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</div>