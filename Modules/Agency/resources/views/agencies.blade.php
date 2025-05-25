<x-agency::layouts.master>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <header class="grid grid-cols-2 items-center gap-2 py-10 pl-10 lg:grid-cols-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="/agencies" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Agencies</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </header>
        <div class="relative min-h-screen flex flex-col items-center justify-top selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">
                        @forelse ($agencies as $agency)

                        <div
                            class="flex justify-between items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                        >
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                <img loading="lazy" class="rounded-full w-10" src="/storage/agencies/{{ $agency->logo }}" alt="{{ $agency->name }}">
                            </div>

                            <div class="grow pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-black dark:text-white">{{ $agency->name }}</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    {{ $agency->description }}
                                </p>

                                <div class="flex items-center gap-2 mt-4">
                                    @foreach ($agency->categories as $category)
                                        <a
                                            href="/agencies?categories[]={{ $category->slug }}"
                                            class="px-4 py-2 font-semibold text-sm bg-[#FF2D20]/10 text-white/70 rounded-full shadow-sm"
                                        >
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <a
                                href="/agencies/{{ $agency->slug }}"
                                class="flex size-12 shrink-0 items-center justify-center rounded-full sm:size-16"
                            >
                                <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </a>
                        </div>

                        @empty
                            <p>No agencies</p>
                        @endforelse
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-agency::layouts.master>
