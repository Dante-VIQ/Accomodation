<header class="absolute top-0 left-0 w-full z-50 py-6 md:py-8">
  <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
    <!-- Logo -->
    <div class="logo-font">
      <a href="/" class="text-3xl md:text-4xl font-semibold tracking-wide text-white drop-shadow-lg">
        Villaveh<span class="text-amber-200 text-2xl md:text-3xl"> Gameview</span>
      </a>
      <div class="text-[11px] tracking-[0.3em] text-amber-100/80 mt-1 hidden md:block">NAKURU · KENYA</div>
    </div>

    <!-- Desktop Navigation -->
    <nav class="hidden md:flex items-center space-x-10 text-white font-medium">
      <a href="/" class="hover:text-amber-200 transition-colors duration-300">Home</a>
      <a href="/reservation" class="hover:text-amber-200 transition-colors duration-300">Suites</a>
      <a href="/about" class="hover:text-amber-200 transition-colors duration-300">About</a>
      <a href="/services" class="hover:text-amber-200 transition-colors duration-300">Services</a>
      <a href="/blog" class="hover:text-amber-200 transition-colors duration-300">Blog</a>
      <a href="/contact" class="hover:text-amber-200 transition-colors duration-300">Contact</a>

      @role('master|engineer')
      <a href="/admin" class="hover:text-amber-200 transition-colors duration-300">Admin</a>
      @endrole

      <!-- Auth Buttons (Desktop) -->
      @guest
        <a href="{{ route('login') }}" class="inline-block px-5 py-2 border border-white/60 rounded-lg hover:bg-white/10 transition text-sm font-medium">Login</a>
        <a href="{{ route('register') }}" class="inline-block px-5 py-2 bg-amber-600 hover:bg-amber-700 text-white rounded-lg transition text-sm font-medium shadow-md">Register</a>
      @else
        <div class="relative group">
          <button class="flex items-center gap-2 hover:text-amber-200 transition">
            <i class="fas fa-user-circle text-xl"></i>
            <span>{{ Auth::user()->name }}</span>
            <i class="fas fa-chevron-down text-xs"></i>
          </button>
          <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-amber-50">Profile</a>
            <a href="/my-bookings" class="block px-4 py-2 text-gray-700 hover:bg-amber-50">My Bookings</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-amber-50">Logout</button>
            </form>
          </div>
        </div>
      @endguest
    </nav>

    <!-- Mobile Menu Button -->
    <div class="md:hidden">
      <button id="menuToggle" class="text-white text-2xl focus:outline-none">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="hidden md:hidden absolute top-full left-0 w-full bg-black/90 backdrop-blur-md py-6 px-6 flex flex-col space-y-5 text-white text-lg">
    <a href="/" class="hover:text-amber-300 transition">Home</a>
    <a href="/reservation" class="hover:text-amber-300 transition">Suites</a>
    <a href="/about" class="hover:text-amber-300 transition">About</a>
    <a href="/services" class="hover:text-amber-300 transition">Services</a>
    <a href="/blog" class="hover:text-amber-300 transition">Blog</a>
    <a href="/contact" class="hover:text-amber-300 transition">Contact</a>

    @role('master|engineer')
    <a href="/admin" class="hover:text-amber-300 transition">Admin</a>
    @endrole

    <!-- Auth Buttons (Mobile) -->
    @guest
      <a href="{{ route('login') }}" class="inline-block text-center px-5 py-2 border border-white/60 rounded-lg hover:bg-white/10 transition">Login</a>
      <a href="{{ route('register') }}" class="inline-block text-center px-5 py-2 bg-amber-600 hover:bg-amber-700 rounded-lg transition">Register</a>
    @else
      <div class="flex flex-col space-y-3 pt-2 border-t border-white/20">
        <div class="flex items-center gap-2 text-white">
          <i class="fas fa-user-circle text-xl"></i>
          <span>{{ Auth::user()->name }}</span>
        </div>
        <a href="{{ route('profile.edit') }}" class="hover:text-amber-300 transition">Profile</a>
        <a href="/my-bookings" class="hover:text-amber-300 transition">My Bookings</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full text-left hover:text-amber-300 transition">Logout</button>
        </form>
      </div>
    @endguest
  </div>
</header>