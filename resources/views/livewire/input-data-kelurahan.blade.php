<div>
        <section class="card">
            <h2>Data RT</h2>
            <div class="rak">
                @foreach($r_t_s as $rt)
                <article class="item">
                    @if($updateFormRt != $rt->id)
                    <div class="data-container">
                        <h3>RT {{$rt->nomorRt}}</h3>
                        <img src="{{asset('')}}/{{$rt->tandaTangan}}" alt="Tanda Tangan">
                        <p>{{$rt->nik}}</p>
                        <p>{{$rt->nama}}</p>
                        <div class="rak-buttons">
                            <button wire:click="showUpdateFormRt({{$rt->id}})" class="edit-button">Edit</button>
                            <button wire:click="showConfirmDelete({{$rt->id}})" class="delete-button">Hapus Data</button>
                        </div>
                    </div>
                    @endif
                    @if($updateFormRt == $rt->id)
                    <form class="add-form">
                        <input type="number" wire:model="noRt" name="noRt" placeholder="masukkan no RT" required>
                        <div class="input-tanda-tangan">
                            <label>Tanda Tangan</label>
                            <input type="file" wire:model="tandaTanganRt" name="tandaTanganRt" required>
                        </div>
                        <input type="number" wire:model="nikRt" name="nikRt" placeholder="masukkan NIK RT" required>
                        <input type="text" wire:model="namaRt" name="namaRt" placeholder="masukkan nama RT" required>
                        <input type="submit" wire:click="updateDataRt({{$rt->id}})" onclick="event.preventDefault()" value="Tambah">
                    </form>
                    <button class="cancel-button cancel-add-button" wire:click="batalUpdateRt">Batal</button>
                    @endif
                </article>
                @if($tombolDeleteRt == $rt->id)
                <div class="confirm-delete">
                    <p>Apakah Anda yakin dengan data yang telah Anda masukkan?</p>
                    <div>
                        <button wire:click="showConfirmDelete(0)">Batal</button>
                        <button class='yes' wire:click="deleteDataRt({{$rt->id}})">Hapus</button>
                    </div>
                </div>
                @endif
                @endforeach
                
                <article class="item">
                    <div class="form-container">
                        @if($tombolTambahRt == 0)
                        <i class='bx bx-plus-circle' wire:click="showRtForm(1)"></i>
                        @endif
                        @if($tombolTambahRt == 1)
                        <form class="add-form">
                            <input type="number" wire:model="noRt" name="noRt" placeholder="masukkan no RT" required>
                            <div class="input-tanda-tangan">
                                <label>Tanda Tangan</label>
                                <input type="file" wire:model="tandaTanganRt" name="tandaTanganRt" required>
                            </div>
                            <input type="number" wire:model="nikRt" name="nikRt" placeholder="masukkan NIK RT" required>
                            <input type="text" wire:model="namaRt" name="namaRt" placeholder="masukkan nama RT" required>
                            <input type="submit" wire:click="createDataRt" onclick="event.preventDefault()" value="Tambah">
                        </form>
                        <button class="cancel-button cancel-add-button" wire:click="showRtForm(0)">Batal</button>
                        @endif
                    </div>
                </article>
            </div>    
        </section>
        <section class="card">
            <h2>Data RW</h2>
            <div class="rak">
                <article class="item">
                    <div class="form-container">
                        @if($tombolTambahRw == 0)
                        <i class='bx bx-plus-circle' wire:click="showRwForm(1)"></i>
                        @endif
                        @if($tombolTambahRw == 1)
                        <form class="add-form">
                            <input type="number" name="namaRw" placeholder="masukkan no RW" required>
                            <div class="input-tanda-tangan">
                                <label>Tanda Tangan</label>
                                <input type="file" name="tandaTanganRw" required>
                            </div>
                            <input type="number" name="nikRw" placeholder="masukkan NIK RW" required>
                            <input type="text" name="namaRw" placeholder="masukkan nama RW" required>
                            <input type="submit" onclick="event.preventDefault()" value="Tambah">
                        </form>
                        <button class="cancel-button cancel-add-button" wire:click="showRwForm(0)">Batal</button>
                        @endif
                    </div>
                </article>
            </div>    
        </section>
</div>
