document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    
    menuToggle.addEventListener('click', function() {
        navLinks.classList.toggle('active');
        document.body.classList.toggle('menu-open');
    });
    
    // Close menu when clicking on a nav link
    const navItems = document.querySelectorAll('.nav-links a');
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            navLinks.classList.remove('active');
            document.body.classList.remove('menu-open');
        });
    });
    
    // Sticky Header
    const header = document.querySelector('header');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    // FAQ Accordion
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', function() {
            const isActive = item.classList.contains('active');
            
            // Close all FAQs
            faqItems.forEach(faq => {
                faq.classList.remove('active');
            });
            
            // If it wasn't active before, open it
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
    
    // Back to Top Button
    const backToTopButton = document.querySelector('.back-to-top');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.add('active');
        } else {
            backToTopButton.classList.remove('active');
        }
    });
    
    backToTopButton.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const headerHeight = document.querySelector('header').offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Form Validation and Submission
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form fields
            const name = document.getElementById('name');
            const phone = document.getElementById('phone');
            const company = document.getElementById('company');
            const industry = document.getElementById('industry');
            const revenue = document.getElementById('revenue');
            
            // Reset errors
            clearErrors();
            
            // Validate form
            let isValid = true;
            
            if (!name.value.trim()) {
                showError(name, 'nameError', 'Por favor, informe seu nome');
                isValid = false;
            }
            
            if (!phone.value.trim()) {
                showError(phone, 'phoneError', 'Por favor, informe seu telefone com DDD');
                isValid = false;
            } else if (!isValidPhone(phone.value)) {
                showError(phone, 'phoneError', 'Por favor, informe um telefone válido com DDD');
                isValid = false;
            }
            
            if (!company.value.trim()) {
                showError(company, 'companyError', 'Por favor, informe o nome da sua empresa');
                isValid = false;
            }
            
            if (!industry.value.trim()) {
                showError(industry, 'industryError', 'Por favor, informe o nicho da sua empresa');
                isValid = false;
            }
            
            if (!revenue.value.trim()) {
                showError(revenue, 'revenueError', 'Por favor, informe o faturamento mensal da sua empresa');
                isValid = false;
            }
            
            // If form is valid, redirect to WhatsApp
            if (isValid) {
                const nameValue = encodeURIComponent(name.value.trim());
                const phoneValue = encodeURIComponent(phone.value.trim());
                const companyValue = encodeURIComponent(company.value.trim());
                const industryValue = encodeURIComponent(industry.value.trim());
                const revenueValue = encodeURIComponent(revenue.value.trim());
                
                const message = `Olá! Vim do site e gostaria de entender como automações com IA podem ajudar o meu negócio.\n\nNome: ${nameValue}\nTelefone: ${phoneValue}\nEmpresa: ${companyValue}\nNicho: ${industryValue}\nFaturamento Mensal: ${revenueValue}`;
                
                const whatsappURL = `https://wa.me/5531995306257?text=${encodeURIComponent(message)}`;
                
                window.location.href = whatsappURL;
            }
        });
    }
    
    // Helper Functions for Form Validation
    function clearErrors() {
        const errorElements = document.querySelectorAll('.error-message');
        errorElements.forEach(error => {
            error.style.display = 'none';
            error.textContent = '';
        });
        
        const inputElements = document.querySelectorAll('input');
        inputElements.forEach(input => {
            input.classList.remove('error');
        });
    }
    
    function showError(inputElement, errorId, message) {
        const errorElement = document.getElementById(errorId);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }
        inputElement.classList.add('error');
        inputElement.focus();
    }
    
    function isValidPhone(phone) {
        // Basic validation for Brazilian phone numbers
        // Removes non-numeric characters and checks if the result has 10 or 11 digits
        const numericPhone = phone.replace(/\D/g, '');
        return numericPhone.length >= 10 && numericPhone.length <= 11;
    }
    
    // Mask for phone number input
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length > 11) {
                value = value.substring(0, 11);
            }
            
            if (value.length > 2) {
                value = '(' + value.substring(0, 2) + ') ' + value.substring(2);
            }
            
            if (value.length > 10) {
                value = value.substring(0, 10) + '-' + value.substring(10);
            }
            
            e.target.value = value;
        });
    }
    
    // Open first FAQ item by default
    if (faqItems.length > 0) {
        faqItems[0].classList.add('active');
    }
});
