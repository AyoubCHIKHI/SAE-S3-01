<footer class="flex flex-col md:flex-row justify-between md:items-center w-full px-12 pt-20 pb-12 gap-8">
    <div>
        <p class="text-blue-500 font-bold text-4xl">EGEE</p>
        <p>Entente des Générations pour l’Emploi et L’entreprise</p>
        <p>Association reconnu d’utilité publique</p>

        <div class="flex gap-4 items-center mt-8">
            <a href="https://www.instagram.com/association_egee/" class="transform transition duration-300 hover:scale-125">
                <img src="/assets/img/instagram.svg" alt="logo-instagram">
            </a>
            <a href="https://fr.linkedin.com/company/egee-asso/" class="transform transition duration-300 hover:scale-125">
                <img src="/assets/img/linkedin.svg" alt="logo_linkedin">
            </a>
            <a href="https://www.facebook.com/egee.asso/" class="transform transition duration-300 hover:scale-125">
                <img src="/assets/img/facebook.svg" alt="logo_facebook">
            </a>
        </div>
    </div>

    <a href="/" class="hidden md:block">
        <img src="/assets/img/logo_egee_footer.png" alt="egee_logo"
            class="size-16 transform transition duration-300 hover:scale-105">
    </a>
    <div id="info_section_footer" class="grid grid-cols-2 md:grid-cols-3 gap-12 ">

        <div class="flex flex-col">
            <p class="font-bold text-xl mb-4 uppercase">Nos actions</p>
            <a href="/nos_missions" class="transition hover:text-blue-500">Education</a>
            <a href="/nos_missions" class="transition hover:text-blue-500">Emploi</a>
            <a href="/nos_missions" class="transition hover:text-blue-500">Entreprise</a>
        </div>

        <div class="flex flex-col">
            <p class="font-bold text-xl mb-4 uppercase">Notre missions</p>
            <a href="/nos_missions" class="transition hover:text-blue-500">Accompagner</a>
            <a href="/nos_missions" class="transition hover:text-blue-500">Conseiller</a>
            <a href="/nos_missions" class="transition hover:text-blue-500">Favoriser emploi</a>
        </div>

        <div class="flex flex-col">
            <p class="font-bold text-xl mb-4 uppercase">à propos</p>
            <a href="/mentions_legales" class="transition hover:text-blue-500">Mentions légales</a>
            <a href="/nous_contacter" class="transition hover:text-blue-500">Contactez nous</a>
            <a href="https://drive.google.com/file/d/1QO9TdzlWsWi8NJITOPsyEqNbs2jnA066/view" class="transition hover:text-blue-500">Nos engagements</a>
        </div>
    </div>
</footer>

<!-- Cookie Banner -->
<div id="cookie-banner" class="fixed bottom-4 right-4 max-w-sm bg-white border border-gray-200 shadow-2xl rounded-lg p-6 flex flex-col gap-4 transform transition-all duration-500 translate-y-full opacity-0 z-50" style="display: none;">
    <div class="flex justify-between items-start">
        <h3 class="font-bold text-lg text-gray-800">Utilisation des cookies</h3>
        <button onclick="dismissCookieBanner()" class="text-gray-400 hover:text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <p class="text-gray-600 text-sm">
        Ce site utilise des cookies pour assurer le bon fonctionnement et améliorer votre expérience. En continuant, vous acceptez notre <a href="/mentions_legales" class="text-blue-500 underline hover:text-blue-700">politique de confidentialité</a>.
    </p>
    <div class="flex justify-end">
        <button onclick="dismissCookieBanner()" class="bg-blue-600 text-white px-4 py-2 rounded text-sm font-semibold hover:bg-blue-700 transition">
            J'accepte
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (!localStorage.getItem('cookieDismissed')) {
            const banner = document.getElementById('cookie-banner');
            banner.style.display = 'flex';
            // Small delay to allow display:flex to apply before transition
            setTimeout(() => {
                banner.classList.remove('translate-y-full', 'opacity-0');
            }, 100);
        }
    });

    function dismissCookieBanner() {
        const banner = document.getElementById('cookie-banner');
        banner.classList.add('translate-y-full', 'opacity-0');
        setTimeout(() => {
            banner.style.display = 'none';
        }, 500); // Wait for transition
        localStorage.setItem('cookieDismissed', 'true');
    }
</script>