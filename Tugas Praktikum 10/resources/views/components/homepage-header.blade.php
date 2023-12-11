<header class="absolute top-0 left-0 w-full z-50 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 pt-2">
    <div class="hidden md:flex justify-between items-center border-b text-sm py-3"
        style="border-color: rgba(255, 255, 255, 0.25)">

        <ul class="flex text-white">
            <li>
                <div class="flex items-center">
                    <ion-icon name="location-outline" class="w-6 h-6 fill-current text-white"></ion-icon>
                    <span class="ml-2">ZenithCare Hospital, Indonesia</span>
                </div>
            </li>
            <li class="ml-6">
                <div class="flex items-center">
                    <ion-icon name="mail-outline" class="w-6 h-6 fill-current text-white"></ion-icon>
                    <span class="ml-2">zenithcare@gmail.com</span>
                </div>
            </li>
        </ul>
    </div>

    <div class="flex flex-wrap items-center justify-between py-6">
        <a href="/" class="w-1/2 flex md:w-auto md:me-24">
            <span class="text-white font-bold self-center text-2xl whitespace-nowrap dark:text-black">ZenithCare</span>
        </a>

        <label for="menu-toggle" class="pointer-cursor md:hidden block">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                viewBox="0 0 20 20">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>

        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:block w-full md:w-auto" id="menu">
            <nav
                class="w-full bg-white md:bg-transparent rounded shadow-lg px-6 py-4 mt-4 text-center md:p-0 md:mt-0 md:shadow-none">
                <ul class="md:flex items-center">
                    <li>
                        <a class="py-2 inline-block md:text-white md:hidden lg:block font-semibold" href="#home">
                            Beranda
                        </a>
                    </li>
                    <li class="md:ml-4">
                        <a class="py-2 inline-block md:text-white md:px-2 font-semibold" href="#about">
                            Tentang Kami
                        </a>
                    </li>
                    <li class="md:ml-4">
                        <a class="py-2 inline-block md:text-white md:px-2 font-semibold" href="#contact">
                            Kontak
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
