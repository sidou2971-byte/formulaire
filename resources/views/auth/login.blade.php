<!DOCTYPE html>
<html lang="fr" class="antialiased" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de compte</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        body.ar-font { font-family: 'Tajawal', 'Cairo', sans-serif; }
        
        /* Select dropdown arrow customization */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        
        .rc-input {
            border: 1px solid #E5E7EB;
            border-radius: 6px;
            height: 38px;
            text-align: center;
            font-size: 14px;
            color: #374151;
            outline: none;
            transition: all 0.2s;
        }
        .rc-input:focus {
            border-color: #059669;
            box-shadow: 0 0 0 1px #059669;
        }
        .rc-input::placeholder {
            color: #9CA3AF;
        }
    </style>
</head>
<body class="bg-[#FAFAFA] min-h-screen flex flex-col items-center justify-center relative">
    
    <!-- Language Toggle -->
    <div class="absolute top-6 left-6">
        <button id="langToggle" class="flex items-center gap-2 px-3 py-1.5 bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 transition-colors text-gray-800 font-medium text-sm">
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
    </div>

    <div class="w-full max-w-[440px] px-4">
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-6">
                <!-- Fallback to external URL for logo if local doesn't exist, visually matching the provided image -->
                <img src="{{ asset('images/logo.png') }}" alt="Ministère du Commerce" class="h-28 object-contain" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Seal_of_Algeria.svg/200px-Seal_of_Algeria.svg.png'">
            </div>
            <h1 class="text-[#111827] text-[28px] font-bold mb-2 tracking-tight" data-fr="Vérification de compte" data-ar="التحقق من الحساب">Vérification de compte</h1>
            <p class="text-[#6B7280] text-[15px]" data-fr="Connectez-vous à votre compte professionnel pour le suivi des opérations d'importation" data-ar="قم بتسجيل الدخول إلى حسابك المهني لمتابعة عمليات الاستيراد">Connectez-vous à votre compte professionnel pour le suivi des opérations d'importation</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 p-8">
            <form action="{{ route('login.post') ?? '#' }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- RC Number -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-[#111827]" data-fr="Numéro RC" data-ar="رقم السجل التجاري">Numéro RC</label>
                    <div class="flex items-center justify-between gap-1.5" dir="ltr"> 
                        <input type="text" name="rc_part1" maxlength="2" class="rc-input w-[46px]" placeholder="00">
                        
                        <div class="relative">
                            <select name="rc_part2" class="rc-input pl-3 pr-6 border-[#059669] text-[#111827] font-medium" style="border-width: 1.5px; border-color: #059669;">
                                <option value="A">A</option>
                                <option value="B" selected>B</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-1.5 text-gray-500">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>

                        <input type="text" name="rc_part3" maxlength="7" class="rc-input flex-1 min-w-[80px]" placeholder="1234567">
                        
                        <span class="text-gray-400 font-medium px-0.5">-</span>
                        
                        <input type="text" name="rc_part4" maxlength="2" class="rc-input w-[46px]" placeholder="00">
                        
                        <span class="text-gray-400 font-medium px-0.5">/</span>
                        
                        <div class="relative">
                            <select name="rc_part5" class="rc-input pl-3 pr-6 text-gray-400 bg-white">
                                <option value="" disabled selected>00</option>
                                @for($i = 1; $i <= 58; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                @endfor
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-1.5 text-gray-400">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2 mt-5">
                    <label class="block text-sm font-semibold text-[#111827]" data-fr="Mot de passe" data-ar="كلمة المرور">Mot de passe</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" class="w-full h-10 pl-3 pr-10 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#059669] focus:border-transparent outline-none transition-all placeholder:text-gray-400 text-[14px]" placeholder="Entrez votre mot de passe" data-placeholder-fr="Entrez votre mot de passe" data-placeholder-ar="أدخل كلمة المرور">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600" id="togglePassword">
                            <!-- Eye icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between pt-1">
                    <div class="flex items-center">
                        <input id="remember" type="checkbox" class="h-4 w-4 text-[#059669] focus:ring-[#059669] border-gray-300 rounded cursor-pointer accent-[#059669]">
                        <label for="remember" class="ml-2 block text-[13px] text-[#111827] font-medium cursor-pointer" data-fr="Se souvenir de moi" data-ar="تذكرني">
                            Se souvenir de moi
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full flex justify-center items-center gap-2 h-11 mt-2 bg-[#059669] hover:bg-[#047857] text-white rounded-lg font-semibold transition-colors text-[15px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px] rtl:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                    <span data-fr="Se connecter" data-ar="تسجيل الدخول">Se connecter</span>
                </button>
            </form>

        </div>
    </div>

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
                    document.querySelectorAll('[data-placeholder-ar]').forEach(el => {
                        el.placeholder = el.getAttribute('data-placeholder-ar');
                    });
                    
                    const rememberLabel = document.querySelector('label[for="remember"]');
                    if(rememberLabel) {
                        rememberLabel.classList.remove('ml-2');
                        rememberLabel.classList.add('mr-2');
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
                    document.querySelectorAll('[data-placeholder-fr]').forEach(el => {
                        el.placeholder = el.getAttribute('data-placeholder-fr');
                    });
                    
                    const rememberLabel = document.querySelector('label[for="remember"]');
                    if(rememberLabel) {
                        rememberLabel.classList.remove('mr-2');
                        rememberLabel.classList.add('ml-2');
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

            // Password visibility toggle
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            
            togglePassword.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Toggle eye icon
                if (type === 'text') {
                    togglePassword.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>';
                } else {
                    togglePassword.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>';
                }
            });
        });
    </script>
</body>
</html>
