
<div>
 <div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow-sm" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h4 class="card-title mb-4 text-center">
                <i class="bi bi-plus-circle"></i> Novo Ambiente
            </h4>

            <form wire:submit.prevent="store">
                
                <div class="mb-3">
                    <label class="form-label"><strong> Nome:<strong></label>
                    <input type="text" wire:model="nome" class="form-control">
                    @error('nome')
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
                        <i class="bi bi-check-circle"></i> Cadastrar 
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

