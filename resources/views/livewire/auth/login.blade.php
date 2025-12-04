<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    @if (session()->has('error'))
        <div class='alert alert-danger'></div>
    @endif



    <div class="card shadow-sm col-md-5 p-3">
        <form wire:submit.prevent="login">
            <div class='mb-3'>
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" wire:model="email" class="form-control"
                    placeholder="Ex.: test@gmail.com">
                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>


            <div class='mb-3'>
                <label for="email" class="form-label">Senha</label>
                <input type="password" id="password" wire:model="password" class="form-control"
                    placeholder="Informe sua senha...">
                @error('password')
                    {{-- error substitui o @if (session()->has('errror')) --}}
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</div>
