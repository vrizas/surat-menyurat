<div>
    <button class='tambah-data' wire:click="showForm(1)">Tambah Data</button>
    @if($showForm == 1)
    <article class='input-data-warga'>
        <div class="form-container">
            <form class='form' autocomplete='off'>
                <h4 class='flashMessage'>{{$flashMessage}}</h4>
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
                        @foreach($r_t_s as $rt)
                        <option value="{{$rt->nomorRt}}">{{$rt->nomorRt}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="rw">RW</label>
                    <select wire:model="rw" id="rw" name="rw">
                        <option hidden>Pilih Salah Satu</option>
                        @foreach($r_w_s as $rw)
                        <option value="{{$rw->nomorRw}}">{{$rw->nomorRw}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <textarea wire:model="alamat" name="alamat" id="alamat" cols="30" rows="10"></textarea>
                </div> 
                <div class="buttons">
                    <button wire:click="showForm(0)" class='back' onclick="event.preventDefault()">Batal</button>
                    <button wire:click="showConfirm(1)" class='next' onclick="event.preventDefault()">Simpan</button>
                    @if($confirm == 1)
                    <div class="confirm">
                        <p>Apakah Anda yakin dengan data yang telah Anda masukkan?</p>
                        <div>
                            <button wire:click="showConfirm(0)" onclick="event.preventDefault()">Batal</button>
                            <button class='yes' wire:click="createData" onclick="event.preventDefault()">Simpan</button>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>            
    </article>        
    @endif              
</div>
