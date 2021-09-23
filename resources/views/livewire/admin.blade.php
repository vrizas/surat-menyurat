<div>
            <header class='admin'>
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{asset('img/logo.svg')}}" alt="Logo Butuh Surat">
                    <div class='text'>
                        <h1>Butuh Surat</h1>
                        <p>Surat Menyurat Kelurahan Lowokwaru</p>
                    </div>
                </a>
            </header>
            <nav>
                <ul>
                    <li><button wire:click="showHome"><i class="bi bi-house-door-fill"></i>Home</button></li>
                    <li><button wire:click="showDataWarga"><i class="bi bi-journals"></i></i>Data Warga</button></li>
                    <li><button wire:click="showBukuRegister"><i class="bi bi-file-spreadsheet-fill"></i>Buku Register</button></li>
                    <li><button wire:click="showProfile"><i class="bi bi-person-fill"></i>Pengaturan Akun</button></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn-logout"><i class='bx bx-log-out'></i>Keluar</button>
                        </form>
                    </li>
                </ul>       
            </nav>
            <main>
                @if($buttonHome == 1)
                <article class="home">
                    <h2>Hai, {{$user->name}}</h2>
                    <h3>Konfirmasi Surat</h3>
                    <livewire:confirm-list />
                </article>
                @elseif($buttonDataWarga == 1)
                <article class="data-warga">
                    @if($user->jabatan == 'RT')
                    <h3>Data Warga RT {{$user->rt}} RW {{$user->rw}}</h3>
                    @elseif($user->jabatan == 'RW')
                    <h3>Data Warga RW {{$user->rw}}</h3>
                    @endif
                    <livewire:input-data-warga>
                    <livewire:data-warga />
                </article>
                @elseif($buttonBukuRegister == 1)
                <article class="buku-register">
                    <h3>Buku Register {{$user->jabatan}} (RT {{$user->rt}} RW {{$user->rw}})</h3>
                    <form method="POST" action="{{ url('/admin/download/buku-register') }}">
                        @csrf
                        <button class="btn-download">Download PDF</button>
                    </form>
                    <table>
                        <tr>
                            <th>No.</th>
                            <th>No. Register RW</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Keperluan</th>
                        </tr>
                        @foreach($reports as $report)
                        <tr>
                            <td>{{$report->no}}</td>
                            <td>{{$report->noRegister}}</td>
                            <td>{{$report->nama}}</td>
                            <td>{{$report->tanggal}}</td>
                            <td>{{$report->keperluan}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </article>
                @elseif($buttonProfile == 1)
                <article class="profile">
                    <h3>Profile</h3>
                    <livewire:account-setting />
                </article>
                @endif
            </main>
            
</div>
