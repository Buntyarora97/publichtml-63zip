/**
 * Ayodhya Ram Mandir - Main JavaScript
 * Premium interactions and animations
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // AOS ANIMATION INITIALIZATION
    // ============================================
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });
    }
    
    // ============================================
    // STICKY HEADER
    // ============================================
    const header = document.getElementById('mainHeader');
    let lastScrollY = 0;
    
    function handleScroll() {
        const scrollY = window.scrollY;
        
        // Reading progress bar
        const progressBar = document.getElementById('readingProgress');
        if (progressBar) {
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = (scrollY / docHeight) * 100;
            progressBar.style.width = progress + '%';
        }
        
        // Header styling
        if (scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        // Back to top button
        const backToTop = document.getElementById('backToTop');
        if (backToTop) {
            if (scrollY > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        }
        
        lastScrollY = scrollY;
    }
    
    window.addEventListener('scroll', handleScroll, { passive: true });
    
    // ============================================
    // BACK TO TOP
    // ============================================
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
    
    // ============================================
    // PARTICLES (Diya Effect)
    // ============================================
    function initParticles() {
        const canvas = document.getElementById('particles-canvas');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        let particles = [];
        const particleCount = 30;
        
        function resize() {
            canvas.width = canvas.parentElement.offsetWidth;
            canvas.height = canvas.parentElement.offsetHeight;
        }
        
        resize();
        window.addEventListener('resize', resize);
        
        class Particle {
            constructor() {
                this.reset();
            }
            
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = canvas.height + Math.random() * 100;
                this.size = Math.random() * 4 + 2;
                this.speedY = Math.random() * 1 + 0.3;
                this.speedX = (Math.random() - 0.5) * 0.5;
                this.opacity = Math.random() * 0.6 + 0.2;
                this.fadeSpeed = Math.random() * 0.003 + 0.001;
                this.color = this.getColor();
            }
            
            getColor() {
                const colors = [
                    'rgba(255, 215, 0, ',    // Gold
                    'rgba(255, 170, 110, ',   // Sandy Brown
                    'rgba(255, 130, 55, ',    // Pumpkin
                    'rgba(245, 89, 0, ',      // Vermilion
                    'rgba(255, 243, 189, '    // Light yellow
                ];
                return colors[Math.floor(Math.random() * colors.length)];
            }
            
            update() {
                this.y -= this.speedY;
                this.x += this.speedX;
                this.opacity -= this.fadeSpeed;
                
                if (this.opacity <= 0 || this.y < -10) {
                    this.reset();
                }
            }
            
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = this.color + this.opacity + ')';
                ctx.fill();
                
                // Glow effect
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size * 2, 0, Math.PI * 2);
                ctx.fillStyle = this.color + (this.opacity * 0.3) + ')';
                ctx.fill();
            }
        }
        
        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }
        
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }
        
        animate();
    }
    
    initParticles();
    
    // ============================================
    // CHATBOT
    // ============================================
    const chatbotToggle = document.getElementById('chatbotToggle');
    const chatbotPanel = document.getElementById('chatbotPanel');
    const chatbotClose = document.getElementById('chatbotClose');
    const chatbotInput = document.getElementById('chatbotInput');
    const chatbotSend = document.getElementById('chatbotSend');
    const chatbotMessages = document.getElementById('chatbotMessages');
    
    if (chatbotToggle && chatbotPanel) {
        chatbotToggle.addEventListener('click', () => {
            chatbotPanel.classList.toggle('active');
        });
        
        chatbotClose.addEventListener('click', () => {
            chatbotPanel.classList.remove('active');
        });
        
        function sendChatMessage(message) {
            if (!message.trim()) return;
            
            // Add user message
            addMessage(message, 'user');
            chatbotInput.value = '';
            
            // Show typing indicator
            const typingId = addTypingIndicator();
            
            // Send to API
            fetch('/api/chatbot.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: message })
            })
            .then(r => r.json())
            .then(data => {
                removeTypingIndicator(typingId);
                addMessage(data.answer || data.reply || 'Sorry, I could not find an answer. Please try asking differently.', 'bot');
            })
            .catch(err => {
                removeTypingIndicator(typingId);
                addMessage('Jai Shri Ram! I am here to help. Please ask about Ayodhya Ram Mandir, travel guide, aarti timings, or Ramayan stories.', 'bot');
            });
        }
        
        function addMessage(text, sender) {
            const div = document.createElement('div');
            div.className = `message ${sender}-message`;
            div.innerHTML = `<div class="message-content"><p>${escapeHtml(text)}</p></div>`;
            chatbotMessages.appendChild(div);
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }
        
        function addTypingIndicator() {
            const id = 'typing-' + Date.now();
            const div = document.createElement('div');
            div.id = id;
            div.className = 'message bot-message';
            div.innerHTML = '<div class="message-content"><p><i class="fas fa-circle-notch fa-spin"></i> Typing...</p></div>';
            chatbotMessages.appendChild(div);
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            return id;
        }
        
        function removeTypingIndicator(id) {
            const el = document.getElementById(id);
            if (el) el.remove();
        }
        
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
        
        chatbotSend.addEventListener('click', () => sendChatMessage(chatbotInput.value));
        chatbotInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendChatMessage(chatbotInput.value);
        });
        
        // Quick buttons
        document.querySelectorAll('.quick-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                sendChatMessage(btn.dataset.question);
            });
        });
    }
    
    // ============================================
    // NEWSLETTER FORM
    // ============================================
    const newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    alert('Jai Shri Ram! You have subscribed successfully.');
                    this.reset();
                } else {
                    alert(data.message || 'Something went wrong. Please try again.');
                }
            })
            .catch(() => {
                alert('Thank you for subscribing! Jai Shri Ram!');
                this.reset();
            });
        });
    }
    
    // ============================================
    // LAZY LOADING IMAGES
    // ============================================
    if ('IntersectionObserver' in window) {
        const imgObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        img.classList.add('loaded');
                    }
                    imgObserver.unobserve(img);
                }
            });
        }, { rootMargin: '50px' });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imgObserver.observe(img);
        });
    }
    
    // ============================================
    // COUNTER ANIMATION
    // ============================================
    function animateCounter(el) {
        const target = parseInt(el.dataset.target);
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        function update() {
            current += step;
            if (current < target) {
                el.textContent = Math.floor(current).toLocaleString();
                requestAnimationFrame(update);
            } else {
                el.textContent = target.toLocaleString();
            }
        }
        
        update();
    }
    
    if ('IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        document.querySelectorAll('[data-target]').forEach(el => {
            counterObserver.observe(el);
        });
    }
    
    // ============================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    
    // ============================================
    // AUDIO PLAYER
    // ============================================
    let currentAudio = null;
    let currentBhajanItem = null;
    
    document.querySelectorAll('.bhajan-item').forEach(item => {
        item.addEventListener('click', function() {
            const audioUrl = this.dataset.audio;
            if (!audioUrl) return;
            
            if (currentAudio && currentBhajanItem === this) {
                if (currentAudio.paused) {
                    currentAudio.play();
                    this.classList.add('active');
                } else {
                    currentAudio.pause();
                    this.classList.remove('active');
                }
                return;
            }
            
            // Stop previous
            if (currentAudio) {
                currentAudio.pause();
                if (currentBhajanItem) currentBhajanItem.classList.remove('active');
            }
            
            // Play new
            currentAudio = new Audio(audioUrl);
            currentBhajanItem = this;
            this.classList.add('active');
            
            currentAudio.addEventListener('ended', () => {
                this.classList.remove('active');
                currentAudio = null;
                currentBhajanItem = null;
            });
            
            currentAudio.play().catch(() => {
                console.log('Audio playback requires user interaction first');
            });
        });
    });
    
    // ============================================
    // GALLERY LIGHTBOX
    // ============================================
    let lightbox = null;
    
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
            const imgSrc = this.querySelector('img').src;
            const title = this.querySelector('.gallery-overlay h5')?.textContent || '';
            
            if (!lightbox) {
                lightbox = document.createElement('div');
                lightbox.className = 'lightbox';
                lightbox.innerHTML = `
                    <div class="lightbox-overlay"></div>
                    <div class="lightbox-content">
                        <button class="lightbox-close"><i class="fas fa-times"></i></button>
                        <img src="" alt="">
                        <div class="lightbox-caption"></div>
                    </div>
                `;
                document.body.appendChild(lightbox);
                
                lightbox.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
                lightbox.querySelector('.lightbox-overlay').addEventListener('click', closeLightbox);
            }
            
            lightbox.querySelector('img').src = imgSrc;
            lightbox.querySelector('.lightbox-caption').textContent = title;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });
    
    function closeLightbox() {
        if (lightbox) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
    
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
    });
    
    // ============================================
    // TABLE OF CONTENTS HIGHLIGHT
    // ============================================
    const tocLinks = document.querySelectorAll('.toc-nav a');
    if (tocLinks.length > 0 && 'IntersectionObserver' in window) {
        const headingObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    tocLinks.forEach(link => link.classList.remove('active'));
                    const activeLink = document.querySelector(`.toc-nav a[href="#${entry.target.id}"]`);
                    if (activeLink) activeLink.classList.add('active');
                }
            });
        }, { rootMargin: '-100px 0px -70% 0px' });
        
        document.querySelectorAll('h2[id], h3[id]').forEach(heading => {
            headingObserver.observe(heading);
        });
    }
    
    // ============================================
    // MOBILE MENU
    // ============================================
    const navbarToggler = document.querySelector('.navbar-toggler');
    const mainNavbar = document.getElementById('mainNavbar');
    
    if (navbarToggler && mainNavbar) {
        mainNavbar.addEventListener('shown.bs.collapse', () => {
            document.body.style.overflow = 'hidden';
        });
        mainNavbar.addEventListener('hidden.bs.collapse', () => {
            document.body.style.overflow = '';
        });
    }
    
    // ============================================
    // RATING STARS INPUT
    // ============================================
    document.querySelectorAll('.rating-input').forEach(container => {
        const stars = container.querySelectorAll('.star-input');
        const input = container.querySelector('input[type="hidden"]');
        
        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                const rating = index + 1;
                if (input) input.value = rating;
                
                stars.forEach((s, i) => {
                    if (i < rating) {
                        s.classList.add('filled');
                        s.innerHTML = '&#9733;';
                    } else {
                        s.classList.remove('filled');
                        s.innerHTML = '&#9734;';
                    }
                });
            });
            
            star.addEventListener('mouseenter', () => {
                stars.forEach((s, i) => {
                    s.style.color = i <= index ? 'var(--color-gold)' : '';
                });
            });
        });
        
        container.addEventListener('mouseleave', () => {
            stars.forEach(s => {
                s.style.color = '';
            });
        });
    });
    
    console.log('%c Jai Shri Ram! ', 'background: linear-gradient(135deg, #F55900, #FF8237); color: #FFF; font-size: 24px; font-weight: bold; padding: 10px 20px; border-radius: 10px;');
    console.log('%c Welcome to Ayodhya Ram Mandir Portal ', 'color: #F55900; font-size: 14px;');
});

// ============================================
// LIGHTBOX STYLES (injected)
// ============================================
const lightboxStyles = document.createElement('style');
lightboxStyles.textContent = `
    .lightbox {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: 10000;
        display: none;
        align-items: center;
        justify-content: center;
    }
    .lightbox.active { display: flex; }
    .lightbox-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.9);
    }
    .lightbox-content {
        position: relative;
        z-index: 1;
        max-width: 90vw;
        max-height: 90vh;
    }
    .lightbox-content img {
        max-width: 100%;
        max-height: 85vh;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.5);
    }
    .lightbox-close {
        position: absolute;
        top: -40px;
        right: 0;
        background: none;
        border: none;
        color: #fff;
        font-size: 24px;
        cursor: pointer;
    }
    .lightbox-caption {
        color: #fff;
        text-align: center;
        padding: 15px;
        font-size: 16px;
    }
`;
document.head.appendChild(lightboxStyles);
