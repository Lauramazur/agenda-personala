const darkBtn = document.querySelector('.icon-btn[aria-label="Dark mode"]');
const body = document.body;

if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark');
    if (darkBtn) darkBtn.innerHTML = `
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"/>
            <line x1="12" y1="1" x2="12" y2="3"/>
            <line x1="12" y1="21" x2="12" y2="23"/>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
            <line x1="1" y1="12" x2="3" y2="12"/>
            <line x1="21" y1="12" x2="23" y2="12"/>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
        </svg>`;
}

if (darkBtn) {
    darkBtn.addEventListener('click', () => {
        body.classList.toggle('dark');
        if (body.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
            darkBtn.innerHTML = `
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5"/>
                    <line x1="12" y1="1" x2="12" y2="3"/>
                    <line x1="12" y1="21" x2="12" y2="23"/>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                    <line x1="1" y1="12" x2="3" y2="12"/>
                    <line x1="21" y1="12" x2="23" y2="12"/>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                </svg>`;
        } else {
            localStorage.setItem('theme', 'light');
            darkBtn.innerHTML = `
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                </svg>`;
        }
    });
}

// ===== SCHIMBARE LIMBA =====
const translations = {
    ro: {
        acasa: 'Acasă',
        despre: 'Despre',
        contact: 'Contact',
        login: 'Login/Register',
        logout: 'Deconectare',
        hero_title: 'Organizează-ți timpul,',
        hero_subtitle: 'trăiește mai bine.',
        hero_desc: 'Planify îți permite să gestionezi evenimentele personale simplu, elegant și eficient.',
        btn_start: 'Începe gratuit',
        btn_more: 'Află mai mult',
        why: 'De ce Planify?',
        card1_title: 'Organizat',
        card1_desc: 'Toate evenimentele tale într-un singur loc.',
        card2_title: 'Securizat',
        card2_desc: 'Contul tău protejat prin autentificare sigură.',
        card3_title: 'Multilingv',
        card3_desc: 'Disponibil în română, engleză și rusă.',
        event1: 'Întâlnire echipa - 10:00',
        event2: 'Proiect DAW - 14:30',
        event3: 'Examen PHP - 09:00',
        despre_title: 'Despre Planify',
        despre_subtitle: 'O aplicație creată pentru oameni organizați',
        ce_este_title: 'Ce este Planify?',
        ce_este_desc: 'Planify este o aplicație web modernă destinată organizării evenimentelor personale. Fie că este vorba de întâlniri, termene limită sau activități personale, Planify îți oferă un spațiu centralizat și elegant pentru a le gestiona eficient.',
        benefit1: 'Interfață modernă și intuitivă',
        benefit2: 'Gestionare completă a evenimentelor',
        benefit3: 'Disponibil în 3 limbi',
        tech_title: 'Tehnologii folosite',
        footer: '© 2026 Planify. Toate drepturile rezervate.',
        contact_title: 'Contactează-ne',
contact_subtitle: 'Suntem aici să te ajutăm',
contact_info_title: 'Date de contact',
contact_location: 'Chișinău, Moldova',
contact_social: 'Urmărește-ne pe social media',
contact_name: 'Nume complet:',
contact_email: 'Email:',
contact_message: 'Mesaj:',
contact_send: 'Trimite mesajul',
register_title: 'Creează un cont nou 🎉',
register_subtitle: 'Completează datele de mai jos',
register_name: 'Nume complet',
register_email: 'Email',
register_password: 'Parolă',
register_confirm: 'Confirmă parola',
register_btn: 'Creează cont',
register_login_link: 'Ai deja cont?',
login_title: 'Bine ai revenit! 👋',
login_subtitle: 'Autentifică-te în contul tău',
login_email: 'Email',
login_password: 'Parolă',
login_btn: 'Autentifică-te',
login_register_link: 'Nu ai cont?',
login_register_btn: 'Înregistrează-te',
register_login_btn: 'Autentifică-te',
dash_title: 'Evenimentele tale 🗓️',
dash_subtitle: 'Gestionează și planifică activitățile tale',
dash_add_btn: '+ Adaugă eveniment',
dash_filter: 'Filtrează:',
dash_all: 'Toate',
dash_personal: 'Personal',
dash_munca: 'Muncă',
dash_scoala: 'Școală',
dash_no_events: 'Nu ai niciun eveniment.',
add_title: 'Adaugă eveniment nou 📅',
add_subtitle: 'Completează detaliile evenimentului tău',
add_event_title: 'Titlul evenimentului *',
add_date: 'Data *',
add_time: 'Ora *',
add_category: 'Categorie *',
add_select: 'Selectează categoria',
add_other: 'Altele',
add_description: 'Descriere',
add_save: 'Salvează evenimentul',
add_cancel: 'Anulează',
add_placeholder_title: 'ex: Întâlnire echipă',
add_placeholder_desc: 'Adaugă detalii despre eveniment...',
edit_title: 'Editează eveniment ✏️',
edit_subtitle: 'Modifică detaliile evenimentului tău',
edit_save: 'Salvează modificările',
profile_title: 'Profilul meu 👤',
profile_subtitle: 'Datele contului tău Planify',
profile_name: 'Nume complet',
profile_email: 'Email',
profile_date: 'Data înregistrării',
profile_events: 'Total evenimente',
profile_events_count: 'evenimente',
profile_btn: 'Vezi evenimentele mele',
contact_placeholder_name: 'Ion Popescu',
contact_placeholder_email: 'exemplu@email.com',
contact_placeholder_message: 'Scrie mesajul tău aici...',
    },
    en: {
        acasa: 'Home',
        despre: 'About',
        contact: 'Contact',
        login: 'Login/Register',
        logout: 'Log out',
        hero_title: 'Organize your time,',
        hero_subtitle: 'live better.',
        hero_desc: 'Planify allows you to manage your personal events simply, elegantly and efficiently.',
        btn_start: 'Get started',
        btn_more: 'Learn more',
        why: 'Why Planify?',
        card1_title: 'Organized',
        card1_desc: 'All your events in one place.',
        card2_title: 'Secure',
        card2_desc: 'Your account protected by secure authentication.',
        card3_title: 'Multilingual',
        card3_desc: 'Available in Romanian, English and Russian.',
        event1: 'Team meeting - 10:00',
        event2: 'DAW Project - 14:30',
        event3: 'PHP Exam - 09:00',
        despre_title: 'About Planify',
        despre_subtitle: 'An app created for organized people',
        ce_este_title: 'What is Planify?',
        ce_este_desc: 'Planify is a modern web application designed for organizing personal events. Whether it\'s meetings, deadlines or personal activities, Planify offers you a centralized and elegant space to manage them efficiently.',
        benefit1: 'Modern and intuitive interface',
        benefit2: 'Complete event management',
        benefit3: 'Available in 3 languages',
        tech_title: 'Technologies used',
        footer: '© 2026 Planify. All rights reserved.',
        contact_title: 'Contact us',
contact_subtitle: 'We are here to help you',
contact_info_title: 'Contact details',
contact_location: 'Chisinau, Moldova',
contact_social: 'Follow us on social media',
contact_name: 'Full name:',
contact_email: 'Email:',
contact_message: 'Message:',
contact_send: 'Send message',
register_title: 'Create a new account 🎉',
register_subtitle: 'Fill in the details below',
register_name: 'Full name',
register_email: 'Email',
register_password: 'Password',
register_confirm: 'Confirm password',
register_btn: 'Create account',
register_login_link: 'Already have an account?',
login_title: 'Welcome back! 👋',
login_subtitle: 'Log in to your account',
login_email: 'Email',
login_password: 'Password',
login_btn: 'Log in',
login_register_link: 'Don\'t have an account?',
login_register_btn: 'Register',
register_login_btn: 'Log in',
dash_title: 'Your events 🗓️',
dash_subtitle: 'Manage and plan your activities',
dash_add_btn: '+ Add event',
dash_filter: 'Filter:',
dash_all: 'All',
dash_personal: 'Personal',
dash_munca: 'Work',
dash_scoala: 'School',
dash_no_events: 'You have no events.',
add_title: 'Add new event 📅',
add_subtitle: 'Fill in the event details',
add_event_title: 'Event title *',
add_date: 'Date *',
add_time: 'Time *',
add_category: 'Category *',
add_select: 'Select category',
add_other: 'Others',
add_description: 'Description',
add_save: 'Save event',
add_cancel: 'Cancel',
add_placeholder_title: 'e.g.: Team meeting',
add_placeholder_desc: 'Add details about the event...',
edit_title: 'Edit event ✏️',
edit_subtitle: 'Modify your event details',
edit_save: 'Save changes',
profile_title: 'My profile 👤',
profile_subtitle: 'Your Planify account details',
profile_name: 'Full name',
profile_email: 'Email',
profile_date: 'Registration date',
profile_events: 'Total events',
profile_events_count: 'events',
profile_btn: 'View my events',
contact_placeholder_name: 'John Doe',
contact_placeholder_email: 'example@email.com',
contact_placeholder_message: 'Write your message here...',
    },
    ru: {
        acasa: 'Главная',
        despre: 'О нас',
        contact: 'Контакт',
        login: 'Войти/Регистрация',
        logout: 'Выйти',
        hero_title: 'Организуй своё время,',
        hero_subtitle: 'живи лучше.',
        hero_desc: 'Planify позволяет управлять личными событиями просто, элегантно и эффективно.',
        btn_start: 'Начать бесплатно',
        btn_more: 'Узнать больше',
        why: 'Почему Planify?',
        card1_title: 'Организованно',
        card1_desc: 'Все ваши события в одном месте.',
        card2_title: 'Безопасно',
        card2_desc: 'Ваш аккаунт защищён надёжной аутентификацией.',
        card3_title: 'Многоязычный',
        card3_desc: 'Доступно на румынском, английском и русском.',
        event1: 'Встреча команды - 10:00',
        event2: 'Проект DAW - 14:30',
        event3: 'Экзамен PHP - 09:00',
        despre_title: 'О Planify',
        despre_subtitle: 'Приложение для организованных людей',
        ce_este_title: 'Что такое Planify?',
        ce_este_desc: 'Planify — это современное веб-приложение для организации личных событий. Будь то встречи, дедлайны или личные дела, Planify предоставляет централизованное и элегантное пространство для их эффективного управления.',
        benefit1: 'Современный и интуитивный интерфейс',
        benefit2: 'Полное управление событиями',
        benefit3: 'Доступно на 3 языках',
        tech_title: 'Используемые технологии',
        footer: '© 2026 Planify. Все права защищены.',
        contact_title: 'Свяжитесь с нами',
contact_subtitle: 'Мы здесь, чтобы помочь вам',
contact_info_title: 'Контактные данные',
contact_location: 'Кишинёв, Молдова',
contact_social: 'Следите за нами в соцсетях',
contact_name: 'Полное имя:',
contact_email: 'Эл. почта:',
contact_message: 'Сообщение:',
contact_send: 'Отправить сообщение',
register_title: 'Создать новый аккаунт 🎉',
register_subtitle: 'Заполните данные ниже',
register_name: 'Полное имя',
register_email: 'Эл. почта',
register_password: 'Пароль',
register_confirm: 'Подтвердите пароль',
register_btn: 'Создать аккаунт',
register_login_link: 'Уже есть аккаунт?',
login_title: 'С возвращением! 👋',
login_subtitle: 'Войдите в свой аккаунт',
login_email: 'Эл. почта',
login_password: 'Пароль',
login_btn: 'Войти',
login_register_link: 'Нет аккаунта?',
login_register_btn: 'Зарегистрироваться',
register_login_btn: 'Войти',
dash_title: 'Ваши события 🗓️',
dash_subtitle: 'Управляйте и планируйте свои дела',
dash_add_btn: '+ Добавить событие',
dash_filter: 'Фильтр:',
dash_all: 'Все',
dash_personal: 'Личное',
dash_munca: 'Работа',
dash_scoala: 'Учёба',
dash_no_events: 'У вас нет событий.',
add_title: 'Добавить новое событие 📅',
add_subtitle: 'Заполните детали события',
add_event_title: 'Название события *',
add_date: 'Дата *',
add_time: 'Время *',
add_category: 'Категория *',
add_select: 'Выберите категорию',
add_other: 'Другое',
add_description: 'Описание',
add_save: 'Сохранить событие',
add_cancel: 'Отмена',
add_placeholder_title: 'напр.: Встреча команды',
add_placeholder_desc: 'Добавьте детали о событии...',
edit_title: 'Редактировать событие ✏️',
edit_subtitle: 'Измените детали события',
edit_save: 'Сохранить изменения',
profile_title: 'Мой профиль 👤',
profile_subtitle: 'Данные вашего аккаунта Planify',
profile_name: 'Полное имя',
profile_email: 'Эл. почта',
profile_date: 'Дата регистрации',
profile_events: 'Всего событий',
profile_events_count: 'событий',
profile_btn: 'Посмотреть мои события',
contact_placeholder_name: 'Иван Иванов',
contact_placeholder_email: 'пример@email.com',
contact_placeholder_message: 'Напишите ваше сообщение здесь...',
    }
};

function applyLanguage(lang) {
    const t = translations[lang];
    if (!t) return;

    document.querySelectorAll('[data-lang]').forEach(el => {
        const key = el.getAttribute('data-lang');
        if (t[key]) el.textContent = t[key];
    });
document.querySelectorAll('[data-placeholder]').forEach(el => {
    const key = el.getAttribute('data-placeholder');
    if (t[key]) el.placeholder = t[key];
});

    const heroTitle = document.querySelector('.hero-title');
    if (heroTitle) {
        heroTitle.innerHTML = `${t.hero_title}<br><span data-lang="hero_subtitle">${t.hero_subtitle}</span>`;
    }

    localStorage.setItem('lang', lang);

    const langSelector = document.querySelector('.lang-selector');
    if (langSelector) langSelector.innerHTML = `
        ${lang.toUpperCase()}
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
            <path d="M3 4.5L6 7.5L9 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`;
}

const langSelector = document.querySelector('.lang-selector');
if (langSelector) {
    langSelector.style.cursor = 'pointer';
    langSelector.addEventListener('click', () => {
        let dropdown = document.getElementById('lang-dropdown');
        if (dropdown) {
            dropdown.remove();
            return;
        }

        dropdown = document.createElement('div');
dropdown.id = 'lang-dropdown';

['RO', 'EN', 'RU'].forEach(lang => {
    const item = document.createElement('div');
    item.textContent = lang;
    item.className = 'lang-dropdown-item';
    item.addEventListener('click', () => {
        applyLanguage(lang.toLowerCase());
        dropdown.remove();
    });
    dropdown.appendChild(item);
});

        langSelector.appendChild(dropdown);
    });

    document.addEventListener('click', (e) => {
        if (!langSelector.contains(e.target)) {
            const dropdown = document.getElementById('lang-dropdown');
            if (dropdown) dropdown.remove();
        }
    });
}

const savedLang = localStorage.getItem('lang');
if (savedLang) applyLanguage(savedLang);