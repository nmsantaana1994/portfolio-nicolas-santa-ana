<section id="cv" class="scroll-mt-24 bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10">
        <div class="overflow-hidden rounded-2xl bg-tinta-950 px-6 py-10 text-white sm:px-10 sm:py-12 lg:flex lg:items-center lg:justify-between lg:gap-12 lg:px-14">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-blue-300">Currículum vitae</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">Conocé mi recorrido profesional</h2>
                <p class="mt-4 text-lg leading-8 text-slate-300">Descargá la versión completa de mi CV para consultar experiencia, formación y tecnologías.</p>
            </div>

            <div class="mt-8 shrink-0 lg:mt-0">
                @if ($cvDisponible)
                    <a href="{{ asset($portafolio['cv']['archivo']) }}" download="{{ $portafolio['cv']['nombre_descarga'] }}" class="inline-flex min-h-12 w-full items-center justify-center rounded-lg bg-white px-6 py-3 text-sm font-semibold text-tinta-950 transition hover:bg-acento-50 sm:w-auto">
                        Descargar CV en PDF
                    </a>
                @else
                    <span class="inline-flex min-h-12 w-full cursor-not-allowed items-center justify-center rounded-lg border border-slate-600 bg-tinta-900 px-6 py-3 text-sm font-semibold text-slate-300 sm:w-auto" aria-disabled="true">
                        CV disponible próximamente
                    </span>
                    <p class="mt-3 max-w-xs text-xs leading-5 text-slate-400">Mientras tanto, podés contactarme por email o LinkedIn.</p>
                @endif
            </div>
        </div>
    </div>
</section>
