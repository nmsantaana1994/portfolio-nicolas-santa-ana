<section id="contacto" class="scroll-mt-24 border-t border-slate-200 bg-superficie pt-14 pb-8 sm:pt-16">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[.8fr_1.2fr] lg:gap-20 lg:px-10">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-acento-700">Contacto</p>
            <h2 class="mt-3 text-3xl font-bold tracking-tight text-tinta-950 sm:text-4xl">Hablemos de tu próximo desafío</h2>
            <p class="mt-5 text-lg leading-8 text-tinta-600">Podemos conversar sobre una oportunidad Full Stack PHP/Laravel o un proyecto freelance: un sistema nuevo, una integración o la evolución de una aplicación existente.</p>
            <a href="{{ \App\Support\PortfolioLocale::route('servicios', [], false) }}" class="mt-4 inline-flex min-h-11 items-center rounded-md text-sm font-semibold text-acento-700 underline underline-offset-4 hover:text-tinta-950">Conocer mis servicios @include('portafolio.parciales.indicador-enlace')</a>
        </div>

        <address class="not-italic">
            <ul class="grid gap-4 sm:grid-cols-2">
                <li>
                    <a href="mailto:{{ $portafolio['contacto']['email'] }}" class="block h-full rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-acento-600">
                        <span class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">Email</span>
                        <span class="mt-2 block break-all font-semibold text-tinta-950">{{ $portafolio['contacto']['email'] }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ $portafolio['contacto']['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="block h-full rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-acento-600">
                        <span class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">LinkedIn</span>
                        <span class="mt-2 block font-semibold text-tinta-950">nicosantaana</span>
                    </a>
                </li>
                <li>
                    <a href="{{ $portafolio['contacto']['github'] }}" target="_blank" rel="noopener noreferrer" class="block h-full rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-acento-600">
                        <span class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">GitHub</span>
                        <span class="mt-2 block font-semibold text-tinta-950">nmsantaana1994</span>
                    </a>
                </li>
                <li class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                    <span class="text-xs font-bold uppercase tracking-[0.14em] text-tinta-400">Ubicación</span>
                    <span class="mt-2 block font-semibold text-tinta-950">{{ $portafolio['contacto']['ubicacion'] }}</span>
                </li>
            </ul>
        </address>
    </div>
</section>
