<section id="home"
    class="px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden flex items-center min-h-screen bg-gradient-to-br from-blue-400 to-green-400">

    <div class="lg:w-3/4 xl:w-2/4 relative z-10 h-100 lg:mt-20">
        <div>
            <h1 class="text-white text-4xl md:text-5xl font-bold leading-tight">
                ZenithCare Hospital
            </h1>
            <p class="text-blue-100 text-xl 2xl:text-2xl leading-snug mt-4">
            Pusat kesehatan inovatif yang didedikasikan untuk memberikan perawatan unggul dan menyeluruh kepada setiap pasien
            </p>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-8 py-4 bg-teal-500 text-white rounded inline-block mt-8 font-semibold text-xl">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-8 py-4 bg-teal-500 text-white rounded inline-block mt-8 font-semibold text-xl">
                        Masuk
                    </a>
                @endauth
            @endif
        </div>
    </div>
</section>
