<div>
<div class='form'>
                <div>
                    <label for="nik">NIK</label>
                    <input wire:model="nik" type="text" id="nik" name="nik">
                </div>
                <div>
                    <label for="nama">Nama</label>
                    <input wire:model="nama" type="text" name="nama">
                </div>
                <div>
                    <label for="jenis-kelamin">Jenis Kelamin</label>
                    <select wire:model="jenisKelamin" name="jenis-kelamin">
                        <option  value="laki-laki">Laki-Laki</option>
                        <option  value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input wire:model="tempat" type="text" name="tempat-lahir">
                </div>
                <div>
                    <label for="tgl-lahir">Tgl. Lahir</label>
                    <input wire:model="tanggal" type="date" name="tgl-lahir">
                </div>
                <div>
                    <label for="agama">Agama</label>
                    <input wire:model="agama" type="text" name="agama">
                </div>
                <div>
                    <label for="status">Status</label>
                    <select wire:model="status" name="status">
                        <option value="belum kawin">Belum Kawin</option>
                        <option value="kawin">Kawin</option>
                        <option value="cerai hidup">Cerai Hidup</option>
                        <option value="cerai mati">Cerai Mati</option>
                    </select>
                </div>
                <div>
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input wire:model="negara" type="text" name="kewarganegaraan">
                </div>
                <div>
                    <label for="pendidikan">Pendidikan</label>
                    <input wire:model="pendidikan" type="text" name="pendidikan">
                </div>
                <div>
                    <label for="pekerjaan">Pekerjaan</label>
                    <input wire:model="pekerjaan" type="text" name="pekerjaan">
                </div>
                <div>
                    <label for="nomor-kk">Nomor KK</label>
                    <input wire:model="noKk" type="text" name="nomor-kk">
                </div>
                <div>
                    <label for="rt">RT</label>
                    <input wire:model="rt" type="text" name="rt">
                </div>
                <div>
                    <label for="rw">RW</label>
                    <input wire:model="rw" type="text" name="rw">
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <textarea wire:model="alamat" name="alamat" id="alamat" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <label for="keperluan">Keperluan</label>
                    <input wire:model="keperluan" type="text" name="keperluan">
                </div>
                <div class="buttons">
                    <button class='back'>Kembali</button>
                    <button wire:click="createWarga"class='next'>Lanjutkan</button>
                </div>
            </div>
        
               
</div>
