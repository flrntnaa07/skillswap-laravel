/* ===========================================================
   SkillSwap - app.js
   Vanilla JavaScript for SkillSwap UI interactions.
   Alpine.js (loaded via Vite) handles the layout shell;
   this file adds feature-level behaviour.
   =========================================================== */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        /* ---------- Mobile sidebar (skillswap layout) ---------- */
        var sidebar = document.getElementById('ss-sidebar');
        var overlay = document.getElementById('ss-sidebar-overlay');
        var openBtn = document.getElementById('ss-menu-btn');
        var closeBtn = document.getElementById('ss-close-sidebar');

        function openSidebar() {
            if (!sidebar) return;
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            if (overlay) overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeSidebar() {
            if (!sidebar) return;
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            if (overlay) overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        if (openBtn) openBtn.addEventListener('click', openSidebar);
        if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);

        /* ---------- Home: search + category filter ---------- */
        var search = document.getElementById('ss-skill-search');
        var cards = Array.prototype.slice.call(
            document.querySelectorAll('[data-skill-card]')
        );
        var categoryBtns = Array.prototype.slice.call(
            document.querySelectorAll('[data-category]')
        );
        var currentCategory = 'all';

        function applyFilters() {
            var term = (search ? search.value : '').toLowerCase().trim();
            cards.forEach(function (card) {
                var name = (card.dataset.skillName || '').toLowerCase();
                var cat = (card.dataset.skillCategory || '').toLowerCase();
                var matchesTerm = !term || name.indexOf(term) > -1 || cat.indexOf(term) > -1;
                var matchesCat =
                    currentCategory === 'all' || cat === currentCategory;
                card.style.display = matchesTerm && matchesCat ? '' : 'none';
            });
        }

        if (search) {
            search.addEventListener('input', applyFilters);
        }

        categoryBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                currentCategory = btn.dataset.category;
                categoryBtns.forEach(function (b) {
                    b.classList.remove('ss-gradient-bg', 'text-white', 'shadow-lg');
                    b.classList.add('bg-cyan-400/10', 'text-cyan-100');
                });
                btn.classList.add('ss-gradient-bg', 'text-white', 'shadow-lg');
                btn.classList.remove('bg-cyan-400/10', 'text-cyan-100');
                applyFilters();
            });
        });

        /* ---------- Chat: switch conversation ---------- */
        var conversations = Array.prototype.slice.call(
            document.querySelectorAll('[data-chat-id]')
        );
        var chatWindows = Array.prototype.slice.call(
            document.querySelectorAll('[data-chat-window]')
        );
        var chatName = document.getElementById('ss-chat-name');
        var chatAvatar = document.getElementById('ss-chat-avatar');
        var chatStatus = document.getElementById('ss-chat-status');

        conversations.forEach(function (conv) {
            conv.addEventListener('click', function () {
                var id = conv.dataset.chatId;
                conversations.forEach(function (c) {
                    c.classList.remove('bg-cyan-400/10', 'border-cyan-300/30');
                });
                conv.classList.add('bg-cyan-400/10', 'border-cyan-300/30');

                chatWindows.forEach(function (w) {
                    w.classList.toggle('hidden', w.dataset.chatWindow !== id);
                });
                if (chatName) chatName.textContent = conv.dataset.name || '';
                if (chatAvatar) chatAvatar.textContent = conv.dataset.initial || '';
                if (chatStatus) chatStatus.textContent = conv.dataset.status || '';
            });
        });

        /* ---------- Chat: send a message ---------- */
        var form = document.getElementById('ss-chat-form');
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var input = document.getElementById('ss-chat-input');
                var box = document.getElementById('ss-chat-messages');
                if (!input || !box) return;
                var text = input.value.trim();
                if (!text) return;

                var wrap = document.createElement('div');
                wrap.className = 'flex justify-end mb-3 ss-animate-fade-up';
                wrap.innerHTML =
                    '<div class="max-w-[75%] rounded-2xl rounded-br-sm ss-gradient-bg px-4 py-2 text-white text-sm shadow">' +
                    escapeHtml(text) +
                    '</div>';
                box.appendChild(wrap);
                input.value = '';
                box.scrollTop = box.scrollHeight;

                /* Simulated reply */
                setTimeout(function () {
                    var reply = document.createElement('div');
                    reply.className = 'flex justify-start mb-3 ss-animate-fade-up';
                    reply.innerHTML =
                        '<div class="max-w-[75%] rounded-2xl rounded-bl-sm bg-cyan-400/10 border border-cyan-300/20 px-4 py-2 text-cyan-50 text-sm shadow-sm">' +
                        escapeHtml(autoReply(text)) +
                        '</div>';
                    box.appendChild(reply);
                    box.scrollTop = box.scrollHeight;
                }, 800);
            });
        }

        /* ---------- Profile: tab switching ---------- */
        var profileTabs = Array.prototype.slice.call(
            document.querySelectorAll('[data-profile-tab]')
        );
        var profilePanels = Array.prototype.slice.call(
            document.querySelectorAll('[data-profile-panel]')
        );

        profileTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var target = tab.dataset.profileTab;
                profileTabs.forEach(function (t) {
                    t.classList.remove('ss-gradient-bg', 'text-white', 'shadow');
                    t.classList.add('text-cyan-100', 'hover:text-white');
                });
                tab.classList.add('ss-gradient-bg', 'text-white', 'shadow');
                tab.classList.remove('text-cyan-100', 'hover:text-white');
                profilePanels.forEach(function (p) {
                    p.classList.toggle('hidden', p.dataset.profilePanel !== target);
                });
            });
        });

        /* ---------- Cinematic depth parallax (lightweight) ---------- */
        var layers = Array.prototype.slice.call(
            document.querySelectorAll('.ss-layer')
        );
        if (layers.length && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            var mx = 0, my = 0, tx = 0, ty = 0, raf = null;

            function render() {
                tx += (mx - tx) * 0.06;
                ty += (my - ty) * 0.06;
                layers.forEach(function (layer) {
                    var d = parseFloat(layer.dataset.depth || '0.03');
                    layer.style.transform =
                        'translate3d(' + (tx * d * 100).toFixed(2) + 'px,' +
                        (ty * d * 100).toFixed(2) + 'px,0)';
                });
                if (Math.abs(mx - tx) > 0.01 || Math.abs(my - ty) > 0.01) {
                    raf = requestAnimationFrame(render);
                } else {
                    raf = null;
                }
            }

            function onMove(e) {
                var x = (e.touches ? e.touches[0].clientX : e.clientX);
                var y = (e.touches ? e.touches[0].clientY : e.clientY);
                mx = (x / window.innerWidth) - 0.5;
                my = (y / window.innerHeight) - 0.5;
                if (!raf) raf = requestAnimationFrame(render);
            }

            window.addEventListener('mousemove', onMove, { passive: true });
            window.addEventListener('touchmove', onMove, { passive: true });
        }
    });

    function escapeHtml(str) {
        var div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    function autoReply(text) {
        var replies = [
            'Menarik! Aku tertarik untuk bertukar skill soal itu.',
            'Oke, kabari aku kalau sudah siap ya.',
            'Boleh, kami atur jadwalnya nanti.',
            'Mantap, skill kamu keren juga!',
            'Sip, aku catat dulu. Terima kasih!'
        ];
        return replies[Math.floor(Math.random() * replies.length)];
    }
})();
