<div>
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
                        <button class="btn-delete" wire:click="deleteQueue({{$queue->id}})">Hapus</button>
                        <button class="btn-cetak" wire:click="cetakSurat({{$queue->id}})">Cetak Surat</button>
                    </td>
                </tr>
                @endforeach
            </table>
</div>
