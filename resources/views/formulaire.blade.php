<!DOCTYPE html>
<html lang="fr" class="antialiased" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-fr="Formulaire de suivi - Opérateur" data-ar="استمارة المتابعة - متعامل">Formulaire de suivi - Opérateur</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        body.ar-font { font-family: 'Tajawal', 'Cairo', sans-serif; }
        [x-cloak] { display: none !important; }
        .form-input {
            width: 100%;
            padding: 0.625rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            color: #111827;
            outline: none;
            transition: all 0.2s;
        }
        .form-input:focus {
            border-color: #4f46e5;
            background-color: #ffffff;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
        }
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        .form-radio {
            color: #4f46e5;
            accent-color: #4f46e5;
            width: 1.25rem;
            height: 1.25rem;
        }
        .form-checkbox {
            color: #4f46e5;
            accent-color: #4f46e5;
            width: 1.25rem;
            height: 1.25rem;
            border-radius: 0.25rem;
        }
        .form-section {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen text-gray-800 font-sans">
    
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center text-gray-500 hover:text-indigo-600 transition-colors mr-4 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rtl:-scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span class="ml-2 font-medium group-hover:underline" data-fr="Retour" data-ar="رجوع">Retour</span>
                    </a>
                    <div class="h-8 w-px bg-gray-200 mx-2"></div>
                    <span class="font-bold text-gray-900 ml-2" data-fr="Formulaire de suivi" data-ar="استمارة المتابعة">Formulaire de suivi</span>
                    <span class="ml-2 px-2.5 py-0.5 rounded-md bg-indigo-100 text-indigo-800 font-mono text-sm border border-indigo-200" dir="ltr">{{ $licence_id }}</span>
                </div>
                <div class="flex items-center">
                    <button id="langToggle" class="flex items-center gap-2 px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-md shadow-sm hover:bg-gray-100 transition-colors text-gray-800 font-medium text-sm">
                        <span class="font-bold">A</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m5 8 6 6"/><path d="m4 14 6-6 2-3"/><path d="M2 5h12"/><path d="M7 2h1"/><path d="m22 22-5-10-5 10"/><path d="M14 18h6"/>
                        </svg>
                        <span id="langText" class="ml-1" style="font-family: 'Cairo', sans-serif;">العربية</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight" data-fr="Formulaire de suivi des opérations d'importation" data-ar="استمارة متابعة عمليات الاستيراد">Formulaire de suivi des opérations d'importation</h1>
            <p class="mt-2 text-gray-600" data-fr="Veuillez remplir les informations requises pour la licence sélectionnée." data-ar="يرجى ملء المعلومات المطلوبة للرخصة المحددة.">Veuillez remplir les informations requises pour la licence sélectionnée.</p>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data" x-data="formLogic()">
            @csrf
            
            <!-- Question 1: Tawtin (Always visible) -->
            <div class="form-section border-t-4 border-t-indigo-500">
                <label class="form-label text-lg" data-fr="La domiciliation bancaire pour la licence est-elle effectuée ? *" data-ar="هل تمت عملية التوطين البنكي للرخصة ؟ *">La domiciliation bancaire pour la licence est-elle effectuée ? *</label>
                <div class="flex items-center gap-6 mt-4 mb-6">
                    <label class="flex items-center gap-3 cursor-pointer p-4 border border-gray-200 rounded-xl hover:bg-indigo-50 transition-colors flex-1" :class="{'border-indigo-500 bg-indigo-50': tewtin === 'oui'}">
                        <input type="radio" name="tewtin_effectue" value="oui" x-model="tewtin" class="form-radio" required>
                        <span class="font-bold text-gray-800" data-fr="Oui" data-ar="نعم">Oui</span>
                    </label>
                    <label class="flex items-center gap-3 cursor-pointer p-4 border border-gray-200 rounded-xl hover:bg-red-50 transition-colors flex-1" :class="{'border-red-500 bg-red-50': tewtin === 'non'}">
                        <input type="radio" name="tewtin_effectue" value="non" x-model="tewtin" class="form-radio">
                        <span class="font-bold text-gray-800" data-fr="Non" data-ar="لا">Non</span>
                    </label>
                </div>

                <!-- Si Non -> Pièce jointe de non domiciliation -->
                <div x-show="tewtin === 'non'" x-cloak class="mt-4 p-6 bg-red-50 border border-red-200 rounded-xl animate-fade-in">
                    <h3 class="text-red-800 font-bold mb-4" data-fr="Justificatif de non-domiciliation" data-ar="مبرر عدم التوطين">Justificatif de non-domiciliation</h3>
                    <label class="form-label text-red-900" data-fr="Joindre l'attestation de non-domiciliation *" data-ar="إرفاق شهادة عدم التوطين *">Joindre l'attestation de non-domiciliation *</label>
                    <input type="file" name="doc_non_domiciliation" accept=".pdf" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-100 file:text-red-800 hover:file:bg-red-200 transition-colors" :required="tewtin === 'non'">
                    <p class="text-xs text-red-700/70 mt-1" data-fr="Importez 1 fichier PDF. 10 MB max." data-ar="قم بتحميل ملف PDF واحد. الحد الأقصى 10 ميغابايت.">Importez 1 fichier PDF. 10 MB max.</p>
                </div>
            </div>

            <!-- Rest of the form, hidden if tewtin == 'non' -->
            <div x-show="tewtin === 'oui'" x-cloak class="animate-fade-in">
                
                <!-- Section 1 Suite -->
                <div class="form-section">
                    <h2 class="text-xl font-bold text-gray-900 mb-6" data-fr="Informations de la Licence et Domiciliation" data-ar="معلومات الرخصة والتوطين">Informations de la Licence et Domiciliation</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                        <!-- Secteur/Licence -->
                        <div>
                            <label class="form-label" data-fr="L'autorisation accordée (Secteur) *" data-ar="الترخيص الممنوح *">L'autorisation accordée (Secteur) *</label>
                            <select name="secteur" class="form-input" :required="tewtin === 'oui'">
                                <option value="" disabled selected data-fr="Sélectionnez un secteur" data-ar="اختر القطاع">Sélectionnez un secteur</option>
                                <option value="materiel" data-fr="Matériel et Équipement" data-ar="المعدات والتجهيزات">Matériel et Équipement</option>
                                <option value="matiere_premiere" data-fr="Matières Premières" data-ar="المواد الأولية">Matières Premières</option>
                                <option value="revente" data-fr="Revente en l'état" data-ar="البيع على الحالة">Revente en l'état</option>
                            </select>
                        </div>
                        
                        <!-- Date de la licence -->
                        <div>
                            <label class="form-label" data-fr="Date de la licence *" data-ar="تاريخ الرخصة *">Date de la licence *</label>
                            <input type="date" name="date_licence" class="form-input" :required="tewtin === 'oui'">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-8 mb-6">
                        <!-- Processus Tawtin -->
                        <div>
                            <label class="form-label" data-fr="Opération de domiciliation de la licence *" data-ar="عملية توطين الرخصة *">Opération de domiciliation de la licence *</label>
                            <div class="flex items-center gap-6 mt-3 bg-gray-50 p-4 rounded-xl border border-gray-200">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="type_tewtin" value="totale" class="form-radio" :required="tewtin === 'oui'">
                                    <span class="font-medium text-gray-700" data-fr="Totale" data-ar="بصفة كلية">Totale</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="type_tewtin" value="partielle" class="form-radio">
                                    <span class="font-medium text-gray-700" data-fr="Partielle" data-ar="بصفة جزئية">Partielle</span>
                                </label>
                            </div>
                        </div>

                        <!-- Banque Checkboxes -->
                        <div>
                            <label class="form-label" data-fr="Agence(s) de la banque de domiciliation *" data-ar="وكالة بنك التوطين *">Agence(s) de la banque de domiciliation *</label>
                            <p class="text-xs text-gray-500 mb-3" data-fr="Vous pouvez sélectionner plusieurs banques." data-ar="يمكنك اختيار بنوك متعددة.">Vous pouvez sélectionner plusieurs banques.</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                    <input type="checkbox" name="banques[]" value="bna" class="form-checkbox mt-0.5">
                                    <span class="text-sm font-medium text-gray-800" data-fr="Banque Nationale d'Algérie (BNA)" data-ar="البنك الوطني الجزائري">Banque Nationale d'Algérie (BNA)</span>
                                </label>
                                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                    <input type="checkbox" name="banques[]" value="bea" class="form-checkbox mt-0.5">
                                    <span class="text-sm font-medium text-gray-800" data-fr="Banque Extérieure d'Algérie (BEA)" data-ar="بنك الجزائر الخارجي">Banque Extérieure d'Algérie (BEA)</span>
                                </label>
                                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                    <input type="checkbox" name="banques[]" value="cpa" class="form-checkbox mt-0.5">
                                    <span class="text-sm font-medium text-gray-800" data-fr="Crédit Populaire d'Algérie (CPA)" data-ar="القرض الشعبي الجزائري">Crédit Populaire d'Algérie (CPA)</span>
                                </label>
                                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors">
                                    <input type="checkbox" name="banques[]" value="badr" class="form-checkbox mt-0.5">
                                    <span class="text-sm font-medium text-gray-800" data-fr="Banque BADR" data-ar="بنك الفلاحة والتنمية الريفية">Banque BADR</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-8 mt-6">
                        <div>
                            <label class="form-label" data-fr="Montant global de la licence (USD) *" data-ar="المبلغ الإجمالي للرخصة (USD) *">Montant global de la licence (USD) *</label>
                            <div class="relative w-full md:w-1/2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none ltr:left-0 rtl:right-0 rtl:pr-3">
                                    <span class="text-gray-500 font-medium">$</span>
                                </div>
                                <input type="number" step="0.01" name="montant_global" class="form-input ltr:pl-8 rtl:pr-8" :required="tewtin === 'oui'">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: D10 et Marchandises Importées -->
                <div class="form-section border-t-4 border-t-blue-500">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900" data-fr="Déclarations Douanières (D10)" data-ar="التصاريح الجمركية (D10)">Déclarations Douanières (D10)</h2>
                        <button type="button" @click="addD10()" class="inline-flex items-center gap-1 text-sm font-bold text-blue-600 bg-blue-50 px-4 py-2 rounded-lg hover:bg-blue-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                            <span data-fr="Ajouter un D10" data-ar="إضافة D10">Ajouter un D10</span>
                        </button>
                    </div>
                    
                    <div x-show="d10s.length === 0" class="text-center py-6 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                        <p class="text-gray-500 font-medium" data-fr="Aucune déclaration D10 ajoutée." data-ar="لم يتم إضافة أي تصريح D10.">Aucune déclaration D10 ajoutée.</p>
                    </div>

                    <template x-for="(d10, index) in d10s" :key="d10.id">
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 mb-6 relative animate-fade-in shadow-sm">
                            <button type="button" @click="removeD10(index)" class="absolute top-4 right-4 rtl:left-4 rtl:right-auto text-gray-400 hover:text-red-500 bg-white rounded-full p-1 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            </button>
                            
                            <h3 class="font-bold text-gray-700 mb-4 border-b border-gray-200 pb-2"><span data-fr="D10 N°" data-ar="D10 رقم">D10 N°</span> <span x-text="index + 1"></span></h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <!-- File Upload D10 -->
                                <div>
                                    <label class="form-label" data-fr="Télécharger la déclaration douanière D10 *" data-ar="تحميل التصريح الجمركي D10 *">Télécharger la déclaration douanière D10 *</label>
                                    <input type="file" :name="'d10_file['+index+']'" accept=".pdf" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors" required>
                                    <p class="text-xs text-gray-500 mt-1" data-fr="Importez 1 fichier compatible : PDF. 10 MB max." data-ar="قم بتحميل ملف واحد متوافق: PDF. الحد الأقصى 10 ميغابايت.">Importez 1 fichier compatible : PDF. 10 MB max.</p>
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Valeur Accordée -->
                                    <div>
                                        <label class="form-label" data-fr="Valeur (USD) *" data-ar="القيمة الممنوحة (USD) *">Valeur (USD) *</label>
                                        <input type="number" step="0.01" :name="'d10_valeur['+index+']'" class="form-input" required>
                                    </div>
                                    <!-- Quantité -->
                                    <div>
                                        <label class="form-label" data-fr="Quantité *" data-ar="الكمية *">Quantité *</label>
                                        <input type="number" :name="'d10_quantite['+index+']'" class="form-input" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Pays d'origine -->
                                <div>
                                    <label class="form-label" data-fr="Pays d'origine *" data-ar="بلد المنشأ *">Pays d'origine *</label>
                                    <input type="text" :name="'d10_pays_origine['+index+']'" class="form-input" required>
                                </div>
                                <!-- Pays d'exportation -->
                                <div>
                                    <label class="form-label" data-fr="Pays d'exportation *" data-ar="بلد التصدير *">Pays d'exportation *</label>
                                    <input type="text" :name="'d10_pays_exportation['+index+']'" class="form-input" required>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Section 3: Marchandises sous douane (Avis d'arrivée) -->
                <div class="form-section border-t-4 border-t-amber-500">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900" data-fr="Marchandises sous douane (Avis d'arrivée)" data-ar="البضائع تحت الجمركة (إشعار بالوصول)">Marchandises sous douane (Avis d'arrivée)</h2>
                        <button type="button" @click="addAvis()" class="inline-flex items-center gap-1 text-sm font-bold text-amber-600 bg-amber-50 px-4 py-2 rounded-lg hover:bg-amber-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                            <span data-fr="Ajouter un avis" data-ar="إضافة إشعار">Ajouter un avis</span>
                        </button>
                    </div>

                    <div x-show="avis.length === 0" class="text-center py-6 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                        <p class="text-gray-500 font-medium" data-fr="Aucun avis d'arrivée ajouté." data-ar="لم يتم إضافة أي إشعار بالوصول.">Aucun avis d'arrivée ajouté.</p>
                    </div>

                    <template x-for="(avi, index) in avis" :key="avi.id">
                        <div class="bg-amber-50/30 border border-amber-200 rounded-xl p-6 mb-6 relative animate-fade-in shadow-sm">
                            <button type="button" @click="removeAvis(index)" class="absolute top-4 right-4 rtl:left-4 rtl:right-auto text-gray-400 hover:text-red-500 bg-white rounded-full p-1 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            </button>
                            
                            <h3 class="font-bold text-amber-800 mb-4 border-b border-amber-200 pb-2"><span data-fr="Avis d'arrivée N°" data-ar="إشعار بالوصول رقم">Avis d'arrivée N°</span> <span x-text="index + 1"></span></h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="form-label text-amber-900" data-fr="Valeur sous douane (USD) *" data-ar="قيمة تحت الجمركة (USD) *">Valeur sous douane (USD) *</label>
                                        <input type="number" step="0.01" :name="'valeur_sous_douane['+index+']'" class="form-input border-amber-200 focus:border-amber-500" required>
                                    </div>
                                    <div>
                                        <label class="form-label text-amber-900" data-fr="Quantité *" data-ar="الكمية *">Quantité *</label>
                                        <input type="number" :name="'quantite_sous_douane['+index+']'" class="form-input border-amber-200 focus:border-amber-500" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label text-amber-900" data-fr="Avis d'arrivée (Document) *" data-ar="تحميل وثيقة الاشعار بالوصول للبضائع تحت الجمركة (Avis d'arrivée) *">Avis d'arrivée (Document) *</label>
                                    <input type="file" :name="'doc_avis_arrivee['+index+']'" accept=".pdf" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200 transition-colors" required>
                                    <p class="text-xs text-amber-700/70 mt-1" data-fr="Importez 1 fichier PDF. 10 MB max." data-ar="قم بتحميل ملف PDF واحد. الحد الأقصى 10 ميغابايت.">Importez 1 fichier PDF. 10 MB max.</p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Section 4: Marchandises en mer (BL) -->
                <div class="form-section border-t-4 border-t-teal-500">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900" data-fr="Marchandises en mer (Connaissement/BL)" data-ar="البضائع في عرض البحر (بوليصة الشحن/BL)">Marchandises en mer (Connaissement/BL)</h2>
                        <button type="button" @click="addBl()" class="inline-flex items-center gap-1 text-sm font-bold text-teal-600 bg-teal-50 px-4 py-2 rounded-lg hover:bg-teal-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                            <span data-fr="Ajouter un BL" data-ar="إضافة بوليصة">Ajouter un BL</span>
                        </button>
                    </div>

                    <div x-show="bls.length === 0" class="text-center py-6 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                        <p class="text-gray-500 font-medium" data-fr="Aucun Connaissement/BL ajouté." data-ar="لم يتم إضافة أي بوليصة شحن/BL.">Aucun Connaissement/BL ajouté.</p>
                    </div>

                    <template x-for="(bl, index) in bls" :key="bl.id">
                        <div class="bg-teal-50/30 border border-teal-200 rounded-xl p-6 mb-6 relative animate-fade-in shadow-sm">
                            <button type="button" @click="removeBl(index)" class="absolute top-4 right-4 rtl:left-4 rtl:right-auto text-gray-400 hover:text-red-500 bg-white rounded-full p-1 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            </button>
                            
                            <h3 class="font-bold text-teal-800 mb-4 border-b border-teal-200 pb-2"><span data-fr="Connaissement/BL N°" data-ar="بوليصة الشحن/BL رقم">Connaissement/BL N°</span> <span x-text="index + 1"></span></h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="form-label text-teal-900" data-fr="Valeur en mer (USD) *" data-ar="قيمة في عرض البحر (USD) *">Valeur en mer (USD) *</label>
                                        <input type="number" step="0.01" :name="'valeur_en_mer['+index+']'" class="form-input border-teal-200 focus:border-teal-500" required>
                                    </div>
                                    <div>
                                        <label class="form-label text-teal-900" data-fr="Quantité *" data-ar="الكمية *">Quantité *</label>
                                        <input type="number" :name="'quantite_en_mer['+index+']'" class="form-input border-teal-200 focus:border-teal-500" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label text-teal-900" data-fr="Connaissement / BL (Document) *" data-ar="تحميل سند أو بوليصة الشحن للبضائع في عرض البحر (Connaissement/BL) *">Connaissement / BL (Document) *</label>
                                    <input type="file" :name="'doc_connaissement['+index+']'" accept=".pdf" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-teal-100 file:text-teal-800 hover:file:bg-teal-200 transition-colors" required>
                                    <p class="text-xs text-teal-700/70 mt-1" data-fr="Importez 1 fichier PDF. 10 MB max." data-ar="قم بتحميل ملف PDF واحد. الحد الأقصى 10 ميغابايت.">Importez 1 fichier PDF. 10 MB max.</p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Section 5: État de Stock -->
                <div class="form-section border-t-4 border-t-fuchsia-500">
                    <h2 class="text-xl font-bold text-gray-900 mb-6" data-fr="État du stock" data-ar="حالة المخزون">État du stock</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="form-label" data-fr="Détails de l'état du stock *" data-ar="تفاصيل حالة المخزون *">Détails de l'état du stock *</label>
                            <textarea name="details_stock" rows="4" class="form-input" :required="tewtin === 'oui'" placeholder="Décrivez l'état actuel de votre stock..." data-placeholder-fr="Décrivez l'état actuel de votre stock..." data-placeholder-ar="قم بوصف الحالة الحالية لمخزونك..."></textarea>
                        </div>
                        <div>
                            <label class="form-label" data-fr="Fichier d'état du stock (Optionnel)" data-ar="ملف حالة المخزون (اختياري)">Fichier d'état du stock (Optionnel)</label>
                            <input type="file" name="doc_stock" accept=".pdf,.xls,.xlsx" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-fuchsia-50 file:text-fuchsia-700 hover:file:bg-fuchsia-100 transition-colors">
                            <p class="text-xs text-gray-500 mt-2" data-fr="Importez un fichier PDF ou Excel." data-ar="قم بتحميل ملف PDF أو Excel.">Importez un fichier PDF ou Excel.</p>
                        </div>
                    </div>
                </div>

                <!-- Section 6: Remarques -->
                <div class="form-section">
                    <label class="form-label text-lg mb-4" data-fr="Remarques (Optionnel)" data-ar="ملاحظات (اختياري)">Remarques (Optionnel)</label>
                    <textarea name="remarques" rows="4" class="form-input" placeholder="Ajoutez des observations supplémentaires ici..." data-placeholder-fr="Ajoutez des observations supplémentaires ici..." data-placeholder-ar="أضف ملاحظات إضافية هنا..."></textarea>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end gap-4 mb-16 mt-6">
                <a href="{{ route('dashboard') }}" class="px-6 py-3 border border-gray-300 rounded-xl text-gray-700 font-bold hover:bg-gray-50 transition-colors bg-white" data-fr="Annuler" data-ar="إلغاء">Annuler</a>
                <button type="submit" class="px-8 py-3 bg-indigo-600 rounded-xl text-white font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 hover:shadow-xl transition-all transform hover:-translate-y-0.5" data-fr="Soumettre le formulaire" data-ar="إرسال الاستمارة">
                    Soumettre le formulaire
                </button>
            </div>

        </form>
    </main>

    <script>
        // Alpine Logic for show/hide and repeaters
        function formLogic() {
            return {
                tewtin: '',
                
                // Start empty (0)
                d10s: [],
                addD10() { this.d10s.push({ id: Date.now() }); },
                removeD10(index) { this.d10s.splice(index, 1); },
                
                avis: [],
                addAvis() { this.avis.push({ id: Date.now() }); },
                removeAvis(index) { this.avis.splice(index, 1); },
                
                bls: [],
                addBl() { this.bls.push({ id: Date.now() }); },
                removeBl(index) { this.bls.splice(index, 1); }
            }
        }

        // Language Toggle Logic
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
