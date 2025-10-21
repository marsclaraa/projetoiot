<?php

namespace App\Livewire\Sensores;

use App\Models\Sensor;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

class SensorList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 15;

    public $esp32Ip = 'http://10.137.11.217'; // Altere para o IP do seu ESP32

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 15],
    ];

    public function render()
    {
        $sensor = Sensor::where('codigo', 'like', "%{$this->search}%")
          ->orwhere('tipo', 'like', "%{$this->search}%")
          ->orwhere('ambiente_id', 'like', "%{$this->search}%")
          ->orwhere('descricao', 'like', "%{$this->search}%")
          ->orwhere('status', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

 $this->resetPage(); // para resetar a paginação (opcional)
            return view('livewire.sensores.sensor-list',compact('sensor'));

    }

    public function toggleLed($id)
{
    $sensor = Sensor::find($id);

    if (!$sensor) {
        session()->flash('led_error', 'Sensor não encontrado.');
        return;
    }

    // Define a rota correta
    $route = $sensor->status == 1 ? '/off' : '/on';
    $url = $this->esp32Ip . $route;

    try {
        // Faz a requisição HTTP GET ao ESP32
        $response = Http::timeout(5)->get($url);

        if ($response->successful()) {
            // Atualiza o status no banco
            $sensor->status = $sensor->status == 1 ? 0 : 1;
            $sensor->save();

            $message = $sensor->status ? 'LED Ligado com sucesso!' : 'LED Desligado com sucesso!';
            session()->flash('message', $message);
        } else {
            session()->flash('led_error', 'Falha ao comunicar com ESP32 (status HTTP: ' . $response->status() . ')');
        }
    } catch (\Exception $e) {
        session()->flash('led_error', 'Erro de conexão com o ESP32: ' . $e->getMessage());
    }
}

    //deletar alunos
    public function delete($id)
    {
        $sensor = Sensor::findOrFail($id);
        $sensor->delete();
        session()->flash('message', 'Sensor deletado com sucesso.');
    }

}
