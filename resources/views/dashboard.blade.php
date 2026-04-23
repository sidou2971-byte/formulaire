<!DOCTYPE html>
<html lang="fr" class="antialiased" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-fr="Tableau de bord - Opérateur" data-ar="لوحة التحكم - متعامل">Tableau de bord - Opérateur</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        body.ar-font { font-family: 'Tajawal', 'Cairo', sans-serif; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen text-gray-800 font-sans selection:bg-indigo-500 selection:text-white">
    
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-purple-600 flex items-center justify-center text-white shadow-lg shadow-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <span class="font-bold text-xl text-gray-900 tracking-tight">MCEPE</span>
                            <span class="text-xs text-gray-500 block -mt-1 font-medium" data-fr="Espace Opérateur" data-ar="فضاء المتعامل">Espace Opérateur</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    
                    <!-- Language Toggle -->
                    <button id="langToggle" class="flex items-center gap-2 px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-md shadow-sm hover:bg-gray-100 transition-colors text-gray-800 font-medium text-sm">
                        <span class="font-bold">A</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m5 8 6 6"/>
                            <path d="m4 14 6-6 2-3"/>
                            <path d="M2 5h12"/>
                            <path d="M7 2h1"/>
                            <path d="m22 22-5-10-5 10"/>
                            <path d="M14 18h6"/>
                        </svg>
                        <span id="langText" class="ml-1" style="font-family: 'Cairo', sans-serif;">العربية</span>
                    </button>

                    <div class="hidden md:flex flex-col items-end mr-2" id="user-info">
                        <span class="text-sm font-semibold text-gray-900">{{ $operator['raison_sociale'] }}</span>
                        <span class="text-xs text-indigo-600 font-medium"><span data-fr="RC:" data-ar="س.ت:">RC:</span> <span dir="ltr">{{ $operator['rc'] }}</span></span>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-indigo-100 border-2 border-indigo-200 flex items-center justify-center text-indigo-700 font-bold overflow-hidden shadow-inner">
                        {{ substr($operator['raison_sociale'], 0, 1) }}
                    </div>
                    <a href="/" class="ml-2 p-2 text-gray-400 hover:text-red-500 transition-colors" title="Déconnexion" id="logout-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rtl:-scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 animate-fade-in">
        
        @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 p-4 rounded-xl shadow-sm flex items-start gap-3 animate-fade-in">
            <div class="mt-0.5">
                <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <h3 class="text-sm font-bold text-green-800" data-fr="Connexion réussie" data-ar="تم تسجيل الدخول بنجاح">Connexion réussie</h3>
                <p class="text-sm font-medium text-green-700 mt-1" data-fr="{{ session('success') }}" data-ar="{{ session('success_ar') ?? session('success') }}">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight" data-fr="Tableau de bord" data-ar="لوحة التحكم">Tableau de bord</h1>
            <p class="mt-2 text-gray-600" data-fr="Bienvenue sur votre espace opérateur. Consultez vos informations et gérez vos dossiers." data-ar="مرحبًا بك في فضاء المتعامل الخاص بك. يمكنك الاطلاع على معلوماتك وإدارة ملفاتك.">Bienvenue sur votre espace opérateur. Consultez vos informations et gérez vos dossiers.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
            <!-- Info Card 1 -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-xl shadow-gray-200/40 relative overflow-hidden group hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-300">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity ltr:right-0 rtl:left-0 rtl:right-auto">
                    <svg class="w-24 h-24 text-indigo-500 rtl:-scale-x-100" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                </div>
                <div class="flex items-center gap-4 mb-4 relative z-10">
                    <div class="p-3 rounded-xl bg-blue-50 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider" data-fr="Identifiant RC" data-ar="رقم السجل التجاري">Identifiant RC</h3>
                        <p class="text-xl font-bold text-gray-900" dir="ltr">{{ $operator['rc'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Info Card 2 -->
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-xl shadow-gray-200/40 relative overflow-hidden group hover:shadow-2xl hover:shadow-purple-100 transition-all duration-300 md:col-span-2">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity ltr:right-0 rtl:left-0 rtl:right-auto">
                    <svg class="w-24 h-24 text-purple-500" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/></svg>
                </div>
                <div class="flex items-center gap-4 mb-4 relative z-10">
                    <div class="p-3 rounded-xl bg-purple-50 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider" data-fr="Raison Sociale" data-ar="الاسم التجاري">Raison Sociale</h3>
                        <p class="text-xl font-bold text-gray-900">{{ $operator['raison_sociale'] }}</p>
                        <p class="text-sm font-bold text-indigo-600 mt-1"><span dir="ltr">{{ $operator['nombre_licences'] }}</span> <span data-fr="licence(s) associée(s)" data-ar="رخصة مرتبطة">licence(s) associée(s)</span></p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Licences Section -->
        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden mb-8">
            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-indigo-100 p-2 rounded-lg text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rtl:-scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg leading-6 font-bold text-gray-900" data-fr="Vos Licences d'Importation" data-ar="رخص الاستيراد الخاصة بك">
                        Vos Licences d'Importation
                    </h3>
                </div>
                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-sm font-bold bg-indigo-100 text-indigo-800">
                    <span dir="ltr">{{ $operator['nombre_licences'] }}</span>&nbsp;<span data-fr="active(s)" data-ar="نشطة">active(s)</span>
                </span>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($operator['licences'] as $licence)
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-indigo-300 hover:shadow-md transition-all duration-200 bg-gradient-to-b from-white to-gray-50 group cursor-default">
                        <div class="flex justify-between items-start mb-2">
                            <div class="p-2 bg-amber-50 rounded-lg text-amber-600 group-hover:bg-amber-100 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200" data-fr="En construction" data-ar="قيد الإنشاء">
                                En construction
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mt-3" data-fr="Numéro de licence" data-ar="رقم الرخصة">Numéro de licence</p>
                        <p class="text-lg font-bold text-gray-900" dir="ltr">{{ $licence }}</p>
                        <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center text-xs text-gray-500">
                            <span><span data-fr="Délivrée le" data-ar="صادرة في">Délivrée le</span>: <span dir="ltr">10 Jan 2025</span></span>
                            <a href="{{ route('formulaire', ['id' => $licence]) }}" class="inline-flex items-center gap-1 px-3 py-1.5 bg-indigo-50 text-indigo-700 font-bold rounded-lg group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-200">
                                <span data-fr="Remplir le formulaire" data-ar="ملء الاستمارة">Remplir le formulaire</span>
                                <svg class="w-3.5 h-3.5 rtl:-scale-x-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const langToggle = document.getElementById('langToggle');
            const langText = document.getElementById('langText');
            const htmlTag = document.documentElement;
            
            let currentLang = localStorage.getItem('lang') || 'fr';

            function applyLang(lang) {
                currentLang = lang;
                localStorage.setItem('lang', lang);

                if (lang === 'ar') {
                    htmlTag.setAttribute('lang', 'ar');
                    htmlTag.setAttribute('dir', 'rtl');
                    langText.textContent = 'Français';
                    langText.style.fontFamily = "'Inter', sans-serif";
                    document.body.classList.add('ar-font');
                    
                    document.querySelectorAll('[data-ar]').forEach(el => {
                        el.textContent = el.getAttribute('data-ar');
                    });
                    
                    if(document.getElementById('logout-btn')) document.getElementById('logout-btn').setAttribute('title', 'تسجيل الخروج');
                    
                    const userInfo = document.getElementById('user-info');
                    if (userInfo) {
                        userInfo.classList.remove('items-end', 'mr-2');
                        userInfo.classList.add('items-start', 'ml-2');
                    }
                } else {
                    htmlTag.setAttribute('lang', 'fr');
                    htmlTag.setAttribute('dir', 'ltr');
                    langText.textContent = 'العربية';
                    langText.style.fontFamily = "'Cairo', sans-serif";
                    document.body.classList.remove('ar-font');
                    
                    document.querySelectorAll('[data-fr]').forEach(el => {
                        el.textContent = el.getAttribute('data-fr');
                    });
                    
                    if(document.getElementById('logout-btn')) document.getElementById('logout-btn').setAttribute('title', 'Déconnexion');
                    
                    const userInfo = document.getElementById('user-info');
                    if (userInfo) {
                        userInfo.classList.remove('items-start', 'ml-2');
                        userInfo.classList.add('items-end', 'mr-2');
                    }
                }
            }

            // Init language
            applyLang(currentLang);

            langToggle.addEventListener('click', () => {
                applyLang(currentLang === 'fr' ? 'ar' : 'fr');
            });

            // Custom Form Validation
            document.addEventListener('invalid', function(e) {
                const msg = currentLang === 'ar' ? 'يرجى ملء هذا الحقل' : 'Veuillez remplir ce champ';
                e.target.setCustomValidity(msg);
            }, true);

            document.addEventListener('input', function(e) {
                if (e.target.hasAttribute('required') || e.target.tagName === 'SELECT') {
                    e.target.setCustomValidity('');
                }
            }, true);
            document.addEventListener('change', function(e) {
                if (e.target.hasAttribute('required') || e.target.tagName === 'SELECT') {
                    e.target.setCustomValidity('');
                }
            }, true);
        });
    </script>
</body>
</html>
