<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use App\Models\Report;
use App\Models\Queue;
use Carbon\Carbon;

class QueueList extends Component
{

    protected $listeners = [
        'showQueue' => '$refresh'
    ];

    public function render()
    {
        $queues = DB::table('queues')
                    ->join('members', 'queues.nik', '=', 'members.nik')
                    ->select('queues.id', 'members.nama', 'queues.keperluan')
                    ->get();

        return view('livewire.queue-list')->with('queues', $queues);
    }

    public function refreshComponent() {
        $this->emit('showQueue');
    }

    public function deleteQueue($id) {
        $queue = Queue::find($id);
        $queue->delete();
        $this->emit('showQueue');
    }

    public function cetakSurat($id) {
        $queue = Queue::find($id);

        Report::create([
            'no' => DB::table('reports')->count() + 1,
            'noRegisterRw' => DB::table('reports')->count() + 1,
            'nik' => $queue->nik,
            'tanggal' => Carbon::now()->isoFormat('DD-MM-Y'),
            'keperluan' => $queue->keperluan,
        ]);

        // $dataRegister = new SheetDB('ryjcf3y4rzhc0');
        // $dataRegister->create([
        //     'No.' => DB::table('reports')->count() + 1,
        //     'Nomor dan Tanggal' => DB::table('reports')->count() + 1 .', '.Carbon::now()->format('Y-m-d'),
        //     'Nama' => $this->nama,
        //     'RT/RW' =>$this->rt .' / '.$this->rw,
        //     'Keperluan' =>$this->keperluan,
        // ]);

        $queue->delete();  
        
        return redirect()->to('cetak-surat/'. $queue->nik);
    }
}
