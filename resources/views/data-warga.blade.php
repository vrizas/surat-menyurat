<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Menyurat</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor-table/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor-table/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor-table/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor-table/perfect-scrollbar/perfect-scrollbar.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/tabel-warga.css') }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/data-warga.css') }}">
    @livewireStyles
</head>
<body>
    <header class='header'>
        <div class="logo">
            <img src="{{ asset('img/logo-malang.png') }}" alt="Logo Malang">
            <div class='text'>
                <h1>Surat Menyurat</h1>
                <p>Kelurahan Lowokwaru</p>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/admin/list-cetak') }}">Antrian Cetak</a></li>
                <li><a href="{{ url('/admin/data-warga') }}">Data Warga</a></li>
                <li><a href="{{ url('/admin/data-kelurahan') }}">Data Kelurahan</a></li>
                <li><a href="{{ url('/admin/buku-regster') }}">Buku Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <livewire:input-data-warga/>

        <article class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100 ver1">
                    <livewire:tabel-warga/>
                    </div>
                </div>
            </div>
        </article>

    </main>
	<script src="{{ asset('vendor-table/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor-table/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('vendor-table/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor-table/select2/select2.min.js') }}"></script>
	<script src="{{ asset('vendor-table/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});

        const scrollContainer = document.querySelector(".wrap-table100-nextcols");
        const scrollContainer2 = document.querySelector(".table100-firstcol");

        scrollContainer.addEventListener("wheel", (event) => {
            event.preventDefault();
            scrollContainer.scrollLeft -= event.wheelDelta;
            if(scrollContainer.scrollLeft > 0) {
                scrollContainer2.style.boxShadow = '5px 0 5px 1px rgba(0,0,0,0.1)';
            } else if(scrollContainer.scrollLeft == 0) {
                scrollContainer2.style.boxShadow = 'none';
            }
        });   

	</script>
	<script src="{{ asset('js/tabel-warga.js') }}"></script>
    @livewireScripts
</body>
</html>