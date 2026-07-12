{{-- ===========================================================
     SkillSwap - Ocean background (Deep Ocean Fantasy)
     Fixed, decorative, pointer-events:none. Safe to @include
     in any page. Organised in parallax depth layers:
       back  -> god-rays, caustics, far silhouettes
       mid   -> swimming fish, jellyfish, sea floor
       front -> glowing plankton, bubbles
     Animations live in public/css/style.css.
     =========================================================== --}}
<div class="ss-ocean" aria-hidden="true">
    <div class="ss-ocean-base"></div>

    <!-- ===== BACK layer: atmosphere, rays, far fish ===== -->
    <div class="ss-layer ss-layer-back" data-depth="0.015">
        <div class="ss-light-rays"></div>
        <div class="ss-caustics"></div>

        <div class="ss-fish-far ss-fish-far-1">
            <svg viewBox="0 0 64 32" fill="currentColor"><path d="M2 16C14 3 34 3 46 16 34 29 14 29 2 16Zm44 0 16-9v18Z"/></svg>
        </div>
        <div class="ss-fish-far ss-fish-far-2">
            <svg viewBox="0 0 64 32" fill="currentColor"><path d="M2 16C14 3 34 3 46 16 34 29 14 29 2 16Zm44 0 16-9v18Z"/></svg>
        </div>
    </div>

    <!-- ===== MID layer: creatures + sea floor ===== -->
    <div class="ss-layer ss-layer-mid" data-depth="0.04">
        <!-- Swimming fish (varied size / speed / direction) -->
        <div class="ss-fish ss-fish-1">
            <svg viewBox="0 0 70 36" fill="currentColor"><path d="M4 18C16 4 40 4 54 18 40 32 16 32 4 18Zm50 0 16-11v22Z"/><circle cx="20" cy="15" r="2.2" fill="#00111F"/></svg>
        </div>
        <div class="ss-fish ss-fish-2">
            <svg viewBox="0 0 70 36" fill="currentColor"><path d="M4 18C16 4 40 4 54 18 40 32 16 32 4 18Zm50 0 16-11v22Z"/><circle cx="20" cy="15" r="2.2" fill="#00111F"/></svg>
        </div>
        <div class="ss-fish ss-fish-3">
            <svg viewBox="0 0 70 36" fill="currentColor"><path d="M4 18C16 4 40 4 54 18 40 32 16 32 4 18Zm50 0 16-11v22Z"/><circle cx="20" cy="15" r="2.2" fill="#00111F"/></svg>
        </div>
        <div class="ss-fish ss-fish-4">
            <svg viewBox="0 0 70 36" fill="currentColor"><path d="M4 18C16 4 40 4 54 18 40 32 16 32 4 18Zm50 0 16-11v22Z"/><circle cx="20" cy="15" r="2.2" fill="#00111F"/></svg>
        </div>
        <div class="ss-fish ss-fish-5">
            <svg viewBox="0 0 70 36" fill="currentColor"><path d="M4 18C16 4 40 4 54 18 40 32 16 32 4 18Zm50 0 16-11v22Z"/><circle cx="20" cy="15" r="2.2" fill="#00111F"/></svg>
        </div>

        <!-- Cute tropical fish -->
        <div class="ss-fish-cute ss-fish-cute-1">
            <svg viewBox="0 0 90 56">
                <g class="ss-tail"><path d="M30 28 8 14 14 28 8 42Z" fill="#f59e0b"/></g>
                <path d="M28 28C40 8 78 8 84 28 78 48 40 48 28 28Z" fill="#fb923c"/>
                <path d="M30 28C44 18 70 18 80 28 70 38 44 38 30 28Z" fill="#fde68a" opacity="0.7"/>
                <path d="M52 10c6-8 18-8 18 0Z" fill="#f97316"/>
                <circle cx="74" cy="24" r="3.2" fill="#0b1220"/><circle cx="75" cy="23" r="1" fill="#fff"/>
            </svg>
        </div>
        <!-- Cute blue tang -->
        <div class="ss-fish-cute ss-fish-cute-3">
            <svg viewBox="0 0 90 56">
                <g class="ss-tail"><path d="M30 28 8 14 14 28 8 42Z" fill="#0ea5e9"/></g>
                <path d="M28 28C40 8 78 8 84 28 78 48 40 48 28 28Z" fill="#38bdf8"/>
                <path d="M40 16c16-2 34 4 40 12-8 2-24 2-36-2Z" fill="#0c4a6e" opacity="0.5"/>
                <circle cx="74" cy="24" r="3" fill="#0b1220"/><circle cx="75" cy="23" r="1" fill="#fff"/>
            </svg>
        </div>

        <!-- Jellyfish -->
        <div class="ss-jelly ss-jelly-1">
            <svg viewBox="0 0 44 60" fill="none">
                <path d="M5 22C5 8 39 8 39 22c0 5-3 8-8 9 0 0-2 14 1 26M19 31c0 0-2 16 1 27M25 31c0 0 2 15-1 27M31 31c0 0 3 13 0 25" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                <path d="M5 22C5 8 39 8 39 22 31 28 13 28 5 22Z" fill="currentColor" opacity="0.35"/>
            </svg>
        </div>
        <div class="ss-jelly ss-jelly-2">
            <svg viewBox="0 0 44 60" fill="none">
                <path d="M5 22C5 8 39 8 39 22c0 5-3 8-8 9 0 0-2 14 1 26M19 31c0 0-2 16 1 27M25 31c0 0 2 15-1 27M31 31c0 0 3 13 0 25" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                <path d="M5 22C5 8 39 8 39 22 31 28 13 28 5 22Z" fill="currentColor" opacity="0.35"/>
            </svg>
        </div>
        <div class="ss-jelly ss-jelly-3">
            <svg viewBox="0 0 44 60" fill="none">
                <path d="M5 22C5 8 39 8 39 22c0 5-3 8-8 9 0 0-2 14 1 26M19 31c0 0-2 16 1 27M25 31c0 0 2 15-1 27M31 31c0 0 3 13 0 25" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                <path d="M5 22C5 8 39 8 39 22 31 28 13 28 5 22Z" fill="currentColor" opacity="0.35"/>
            </svg>
        </div>

        <!-- Sea floor -->
        <div class="ss-floor">
            <div class="ss-seaweed ss-seaweed-1">
                <svg viewBox="0 0 40 120" fill="none" stroke="currentColor" stroke-width="6" stroke-linecap="round"><path d="M20 120C20 90 6 80 20 60 34 40 16 30 22 8"/></svg>
            </div>
            <div class="ss-coral ss-coral-1">
                <svg viewBox="0 0 90 80" fill="currentColor"><path d="M45 80c-6-18-4-30-14-40 4 10 2 18-4 24 8-14 4-28-6-38 10 8 16 4 20-8 4 12 10 16 20 8-10 10-14 24-6 38-6-6-12-14-4-24-10 10-8 22-14 40Z"/></svg>
            </div>
            <div class="ss-seaweed ss-seaweed-2">
                <svg viewBox="0 0 40 120" fill="none" stroke="currentColor" stroke-width="6" stroke-linecap="round"><path d="M20 120C20 92 34 82 20 62 6 42 24 32 18 10"/></svg>
            </div>
            <div class="ss-coral ss-coral-2">
                <svg viewBox="0 0 90 80" fill="currentColor"><path d="M45 80c-6-18-4-30-14-40 4 10 2 18-4 24 8-14 4-28-6-38 10 8 16 4 20-8 4 12 10 16 20 8-10 10-14 24-6 38-6-6-12-14-4-24-10 10-8 22-14 40Z"/></svg>
            </div>
            <div class="ss-starfish">
                <svg viewBox="0 0 60 60" fill="currentColor"><path d="M30 4l7 14 16 2-12 11 3 16-14-8-14 8 3-16-12-11 16-2Z"/></svg>
            </div>
        </div>
    </div>

    <!-- ===== FRONT layer: glowing plankton + bubbles ===== -->
    <div class="ss-layer ss-layer-front" data-depth="0.09">
        <!-- Cute puffer fish (close, clearer) -->
        <div class="ss-fish-cute ss-fish-cute-2">
            <svg viewBox="0 0 80 64">
                <g class="ss-tail"><path d="M26 32 8 22 12 32 8 42Z" fill="#eab308"/></g>
                <circle cx="44" cy="32" r="22" fill="#fde047"/>
                <g fill="#facc15">
                    <path d="M44 10l4 6-8 0Z"/><path d="M62 18l5 4-7 2Z"/><path d="M66 32l6 0-5 4Z"/>
                    <path d="M62 46l5-4-7-2Z"/><path d="M44 54l4-6-8 0Z"/><path d="M26 46l-5-4 7-2Z"/>
                    <path d="M22 32l-6 0 5-4Z"/><path d="M26 18l-5 4 7 2Z"/>
                </g>
                <circle cx="52" cy="28" r="4" fill="#0b1220"/><circle cx="53" cy="27" r="1.3" fill="#fff"/>
                <path d="M50 40q4 4 8 0" stroke="#0b1220" stroke-width="2" fill="none" stroke-linecap="round"/>
            </svg>
        </div>
        <!-- Tiny pink fish (close) -->
        <div class="ss-fish-cute ss-fish-cute-4">
            <svg viewBox="0 0 80 48">
                <g class="ss-tail"><path d="M28 24 10 12 15 24 10 36Z" fill="#f472b6"/></g>
                <path d="M26 24C36 8 68 8 74 24 68 40 36 40 26 24Z" fill="#f9a8d4"/>
                <circle cx="64" cy="21" r="2.6" fill="#0b1220"/><circle cx="65" cy="20" r="0.9" fill="#fff"/>
            </svg>
        </div>

        <!-- Glowing plankton -->
        <span class="ss-plankton" style="left:4%;  top:82%; width:4px;  height:4px;  animation-duration:17s; animation-delay:0s;"></span>
        <span class="ss-plankton" style="left:9%;  top:55%; width:3px;  height:3px;  animation-duration:21s; animation-delay:3s;"></span>
        <span class="ss-plankton" style="left:14%; top:90%; width:5px;  height:5px;  animation-duration:15s; animation-delay:1s;"></span>
        <span class="ss-plankton" style="left:19%; top:40%; width:3px;  height:3px;  animation-duration:23s; animation-delay:6s;"></span>
        <span class="ss-plankton" style="left:24%; top:73%; width:4px;  height:4px;  animation-duration:18s; animation-delay:2s;"></span>
        <span class="ss-plankton" style="left:29%; top:60%; width:2px;  height:2px;  animation-duration:25s; animation-delay:8s;"></span>
        <span class="ss-plankton" style="left:34%; top:88%; width:5px;  height:5px;  animation-duration:16s; animation-delay:4s;"></span>
        <span class="ss-plankton" style="left:39%; top:35%; width:3px;  height:3px;  animation-duration:22s; animation-delay:1.5s;"></span>
        <span class="ss-plankton" style="left:44%; top:78%; width:4px;  height:4px;  animation-duration:19s; animation-delay:5s;"></span>
        <span class="ss-plankton" style="left:49%; top:50%; width:3px;  height:3px;  animation-duration:24s; animation-delay:9s;"></span>
        <span class="ss-plankton" style="left:54%; top:92%; width:5px;  height:5px;  animation-duration:15s; animation-delay:2.5s;"></span>
        <span class="ss-plankton" style="left:59%; top:42%; width:2px;  height:2px;  animation-duration:26s; animation-delay:7s;"></span>
        <span class="ss-plankton" style="left:64%; top:70%; width:4px;  height:4px;  animation-duration:18s; animation-delay:0.5s;"></span>
        <span class="ss-plankton" style="left:69%; top:58%; width:3px;  height:3px;  animation-duration:21s; animation-delay:4.5s;"></span>
        <span class="ss-plankton" style="left:74%; top:86%; width:5px;  height:5px;  animation-duration:16s; animation-delay:3.5s;"></span>
        <span class="ss-plankton" style="left:79%; top:46%; width:3px;  height:3px;  animation-duration:23s; animation-delay:6.5s;"></span>
        <span class="ss-plankton" style="left:84%; top:75%; width:4px;  height:4px;  animation-duration:19s; animation-delay:1s;"></span>
        <span class="ss-plankton" style="left:88%; top:52%; width:2px;  height:2px;  animation-duration:25s; animation-delay:8.5s;"></span>
        <span class="ss-plankton" style="left:92%; top:90%; width:5px;  height:5px;  animation-duration:15s; animation-delay:2s;"></span>
        <span class="ss-plankton" style="left:96%; top:38%; width:3px;  height:3px;  animation-duration:22s; animation-delay:5.5s;"></span>
        <span class="ss-plankton" style="left:51%; top:66%; width:3px;  height:3px;  animation-duration:20s; animation-delay:10s;"></span>
        <span class="ss-plankton" style="left:33%; top:30%; width:4px;  height:4px;  animation-duration:24s; animation-delay:11s;"></span>
        <span class="ss-plankton" style="left:71%; top:33%; width:4px;  height:4px;  animation-duration:17s; animation-delay:12s;"></span>

        <!-- A few foreground bubbles -->
        <span class="ss-bubble" style="left:12%; width:8px;  height:8px;  animation-duration:11s; animation-delay:0s;"></span>
        <span class="ss-bubble" style="left:38%; width:5px;  height:5px;  animation-duration:9s;  animation-delay:2s;"></span>
        <span class="ss-bubble" style="left:67%; width:10px; height:10px; animation-duration:13s; animation-delay:1s;"></span>
        <span class="ss-bubble" style="left:86%; width:6px;  height:6px;  animation-duration:10s; animation-delay:3s;"></span>
        <span class="ss-bubble" style="left:54%; width:7px;  height:7px;  animation-duration:12s; animation-delay:5s;"></span>
    </div>

    <div class="ss-vignette"></div>
</div>
