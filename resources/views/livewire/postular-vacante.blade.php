<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>
    
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{ session('mensaje') }}
        </div>
    @else
        <form wire:submit.prevent='postularme' class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida (PDF)')"/>
                <x-text-input
                    id="cv" 
                    type="file" 
                    accept=".pdf"
                    wire:model="cv" 
                    class="block mt-1 w-full"
                />
            </div>
            
            @error('cv')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror
            @if (session()->has('error'))
                <livewire:mostrar-alerta :message="session('error')"/>
            @endif
            
            <div class="flex justify-center">
                <x-primary-button 
                    class="my-5 justify-center"
                    wire:loading.attr="disabled"
                    >
                    {{__('Postularme')}}
                    <div
                        wire:loading wire:target="postularme"
                        class="inline-block h-4 w-4 mr-1 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] text-white motion-reduce:animate-[spin_1.5s_linear_infinite]" 
                        role="status"
                    ></div>
                </x-primary-button>
            </div>
        </form>
    @endif
</div>
