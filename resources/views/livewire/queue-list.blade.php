<div wire:poll.visible>
            <button wire:click="refreshComponent" class="btn-refresh"><img src="{{asset('img/arrow-clockwise.svg')}}">Perbarui</button>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Keperluan</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($queues as $key => $queue)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$queue->nama}}</td>
                    <td>{{$queue->keperluan}}</td>
                    <td colspan="2">
                        <button class="btn-delete" wire:click="showConfirmDelete({{$queue->id}})">Hapus</button>
                        <button class="btn-cetak" wire:click="cetakSurat({{$queue->id}})">Cetak Surat</button>
                    </td>
                </tr>
                @if($confirmDelete == $queue->id)
                <div class="confirm confirm-delete">
                    <p>Apakah Anda yakin dengan menghapus data antrian?</p>
                    <div>
                        <button wire:click="showConfirmDelete(0)">Batal</button>
                        <button class='yes' wire:click="deleteQueue({{$queue->id}})">Hapus</button>
                    </div>
                </div>
                @endif    
                @endforeach   
            </table>
</div>
