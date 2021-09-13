<div>
            <table>
                <tr>
                    <th>No.</th>
                    <th>No. Register RW</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Keperluan</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($reports as $key => $report)
                <tr>
                    <td>{{$report->no}}</td>
                    <td>{{$report->noRegisterRw}}</td>
                    <td>{{$report->nama}}</td>
                    <td>{{$report->tanggal}}</td>
                    <td>{{$report->keperluan}}</td>
                    <td colspan="2">
                        <button class="btn-delete" wire:click="deleteReport({{$report->id}})" >Hapus</button>
                        <button class="btn-cetak">Cetak Surat</button>
                    </td>
                </tr>
                @endforeach
            </table>
</div>
