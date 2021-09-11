<div>
                    <section class="table-container">
                        <div class="table100-firstcol">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column1">Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($members as $member)
                                    <tr class="row100 body">
                                        <td class="cell100 column1">{{$member->nama}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="wrap-table100-nextcols js-pscroll">
                            <div class="table100-nextcols">
                                <table>
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column2">NIK</th>
                                            <th class="cell100 column3">Jenis Kelamin</th>
                                            <th class="cell100 column4">Tempat/ Tgl.Lahir</th>
                                            <th class="cell100 column5">Agama</th>
                                            <th class="cell100 column6">Status</th>
                                            <th class="cell100 column7">Kewarganegaraan</th>
                                            <th class="cell100 column8">Pendidikan</th>
                                            <th class="cell100 column9">Pekerjaan</th>
                                            <th class="cell100 column10">Nomor KK</th>
                                            <th class="cell100 column11">RT/RW</th>
                                            <th class="cell100 column12">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($members as $member)
                                        <tr class="row100 body">
                                            <td class="cell100 column2">{{$member->nik}}</td>
                                            <td class="cell100 column3">{{$member->jenisKelamin}}</td>
                                            <td class="cell100 column4">{{$member->ttl}}</td>
                                            <td class="cell100 column5">{{$member->agama}}</td>
                                            <td class="cell100 column6">{{$member->status}}</td>
                                            <td class="cell100 column7">{{$member->negara}}</td>
                                            <td class="cell100 column8">{{$member->pendidikan}}</td>
                                            <td class="cell100 column9">{{$member->pekerjaan}}</td>
                                            <td class="cell100 column10">{{$member->noKk}}</td>
                                            <td class="cell100 column11">{{$member->rt}} / {{$member->rw}}</td>
                                            <td class="cell100 column12">{{$member->alamat}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="btn-wrapper">
                            @foreach ($members as $member)
                            <div class="btn-action {{$member->nik}}">
                                <button>Edit</button>
                                <button>Hapus</button>
                            </div>
                            @endforeach
                        </div>
                    </section>
</div>
