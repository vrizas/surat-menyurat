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
                                    @foreach ($members as $key => $member)
                                        <tr class="row100 body">
                                            <td class="cell100 column2">{{$member->nik}}</td>
                                            <td class="cell100 column3">{{$member->jenisKelamin}}</td>
                                            <td class="cell100 column4">{{$ttl[$key]}}</td>
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
                            <div class="btn-action">
                                <button wire:click="showForm({{$member->id}})">Edit</button>
                                <button wire:click="showConfirmDelete({{$member->id}})">Hapus</button>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    
                    @foreach ($members as $member)
                    @if($showForm == $member->id)
                    <article class='input-data-warga'>
                        <div class="form-container">
                            <form class='form' autocomplete='off'>
                                <div>
                                    <label for="nik">NIK</label>
                                    <input wire:model="nik" type="number" id="nik" name="nik" autocomplete="off">
                                </div>
                                <div>
                                    <label for="nama">Nama</label>
                                    <input wire:model="nama" type="text" id='nama' name="nama" autocomplete="off">
                                </div>
                                <div>
                                    <label for="jenis-kelamin">Jenis Kelamin</label>
                                    <select wire:model="jenisKelamin" name="jenis-kelamin">
                                        <option hidden>Pilih Salah Satu</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="tempat-lahir">Tempat Lahir</label>
                                    <input wire:model="tempat" type="text" id="tempat-lahir" name="tempat-lahir" autocomplete="off">
                                </div>
                                <div>
                                    <label for="tgl-lahir">Tgl. Lahir</label>
                                    <input wire:model="tanggal" type="date" id="tgl-lahir" name="tgl-lahir" autocomplete="off">
                                </div>
                                <div>
                                    <label for="agama">Agama</label>
                                    <input wire:model="agama" type="text" id="agama" name="agama" autocomplete="off">
                                </div>
                                <div>
                                    <label for="status">Status</label>
                                    <select wire:model="status" id="status" name="status">
                                        <option hidden>Pilih Salah Satu</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                        <option value="Cerai Mati">Cerai Mati</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input wire:model="negara" type="text" id="kewarganegaraan" name="kewarganegaraan" autocomplete="off">
                                </div>
                                <div>
                                    <label for="pendidikan">Pendidikan</label>
                                    <input wire:model="pendidikan" type="text" id="pendidikan" name="pendidikan" autocomplete="off">
                                </div>
                                <div>
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input wire:model="pekerjaan" type="text" id="pekerjaan" name="pekerjaan" autocomplete="off">
                                </div>
                                <div>
                                    <label for="nomor-kk">Nomor KK</label>
                                    <input wire:model="noKk" type="number" id="nomor-kk" name="nomor-kk" autocomplete="off">
                                </div>
                                <div>
                                    <label for="rt">RT</label>
                                    <select wire:model="rt" id="rt" name="rt">
                                        <option hidden>Pilih Salah Satu</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="rw">RW</label>
                                    <select wire:model="rw" id="rw" name="rw">
                                        <option hidden>Pilih Salah Satu</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="alamat">Alamat</label>
                                    <textarea wire:model="alamat" name="alamat" id="alamat" cols="30" rows="10"></textarea>
                                </div> 
                            </form>
                            <div class="buttons">
                                <button wire:click="batalUpdateData" class='back'>Batal</button>
                                <button wire:click="updateData({{$member->id}})" class='next'>Simpan</button>
                            </div>  
                        </div>            
                    </article>        
                    @endif
                    @if($confirmDelete == $member->id)
                    <div class="confirm confirm-delete">
                        <p>Apakah Anda yakin dengan data yang telah Anda masukkan?</p>
                        <div>
                            <button wire:click="showConfirmDelete(0)">Batal</button>
                            <button class='yes' wire:click="deleteData({{$member->id}})">Hapus</button>
                        </div>
                    </div>
                    @endif
                    @endforeach
</div>
