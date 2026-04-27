    document.addEventListener('DOMContentLoaded', () => {
    // Función para el carrusel (se mantiene para la sección de proyectos)
    const setupCarousel = (container) => {
        const track = container.querySelector('.carousel-track');
        if (!track) return; 
        
        const slides = Array.from(track.children); 
        const slideCount = slides.length;
        if (slideCount <= 1) return;

        let currentIndex = 0;
        let autoAdvanceInterval; 

        const getSlideWidth = () => container.offsetWidth; 

        const moveToSlide = (index) => {
            index = (index % slideCount + slideCount) % slideCount; 

            const slideWidth = getSlideWidth(); 
            if (slideWidth === 0) return; 

            const offset = index * slideWidth; 
            
            track.style.transform = `translateX(-${offset}px)`; 
            
            currentIndex = index;
            
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === index) {
                    slide.classList.add('active');
                }
            });
        };
        
        const nextSlide = () => {
            moveToSlide(currentIndex + 1);
        };
        
        const prevSlide = () => {
            moveToSlide(currentIndex - 1);
        };

        const initializeCarousel = () => {
            if (autoAdvanceInterval) clearInterval(autoAdvanceInterval);

            moveToSlide(0); 

            if (slideCount > 1) {
                autoAdvanceInterval = setInterval(nextSlide, 5000); 
            }
        };

        const wrapper = container.closest('.carousel-showcase-wrapper') || container.closest('.project-showcase');
        if (!wrapper) return;
        
        const prevButton = wrapper.querySelector('.arrow-button.prev');
        const nextButton = wrapper.querySelector('.arrow-button.next');

        if (prevButton && nextButton) {
            const handleManualMove = (moveFunction) => {
                if (autoAdvanceInterval) clearInterval(autoAdvanceInterval);
                moveFunction();
                if (slideCount > 1) {
                    autoAdvanceInterval = setInterval(nextSlide, 5000); 
                }
            };

            prevButton.addEventListener('click', () => handleManualMove(prevSlide));
            nextButton.addEventListener('click', () => handleManualMove(nextSlide));
        }
        
        setTimeout(initializeCarousel, 100);

        window.addEventListener('resize', () => {
            if (autoAdvanceInterval) clearInterval(autoAdvanceInterval);
            currentIndex = 0; 
            setTimeout(initializeCarousel, 50); 
        });
    };

    // --- Ejecución del Carrusel de Proyectos ---
    const projectShowcase = document.querySelector('.project-showcase');
    const showcaseContent = projectShowcase ? projectShowcase.querySelector('.showcase-content') : null;
    
    if (showcaseContent) {
        setupCarousel(showcaseContent);
    }

    // ==============================================
    // FUNCIONALIDAD: INTERACCIÓN DE TARJETAS DE EQUIPO (AJUSTADO PARA DISPLAY Y BOTÓN X)
    // ==============================================

    const memberDetailPanel = document.getElementById('memberDetailPanel');
    const detailPhoto = document.getElementById('detailPhoto');
    const detailName = document.getElementById('detailName');
    const detailRole = document.getElementById('detailRole');
    const detailBio = document.getElementById('detailBio');
    const teamMemberCards = document.querySelectorAll('.team-member-card');
    const closePanelBtn = document.getElementById('closePanelBtn'); // Nuevo: botón de cierre

    let activeMemberCard = null; 

    // Función para cerrar el panel
    const hidePanel = () => {
        if (activeMemberCard) {
            activeMemberCard.classList.remove('active');
            activeMemberCard = null;
        }
        // CLAVE: Ocultar el panel usando la clase 'active'
        memberDetailPanel.classList.remove('active'); 
    };
    
    // Función para abrir el panel
    const showPanel = (card) => {
        // Eliminar 'active' de la tarjeta previa y asignarla a la actual
        if (activeMemberCard) {
            activeMemberCard.classList.remove('active');
        }
        card.classList.add('active');
        activeMemberCard = card;

        // Obtener datos y actualizar el panel
        const photoSrc = card.querySelector('.member-photo').src;
        const name = card.querySelector('.member-name').textContent;
        const role = card.querySelector('.member-role').textContent;
        const fullBio = card.querySelector('.member-bio-full').textContent;

        detailPhoto.src = photoSrc;
        detailName.textContent = name;
        detailRole.textContent = role;
        detailBio.textContent = fullBio;

        // CLAVE: Mostrar el panel usando la clase 'active' (display: block)
        memberDetailPanel.classList.add('active'); 
    };

    // Event Listeners para Abrir Panel (Clic en tarjeta)
    teamMemberCards.forEach(card => {
        card.addEventListener('click', () => {
            showPanel(card);
        });
    });

    // Event Listener para Cerrar Panel (Clic en botón X)
    if (closePanelBtn) {
        closePanelBtn.addEventListener('click', hidePanel);
    }
    
    // Opcional: Si quieres que el panel esté inicialmente cerrado, no hagas nada aquí.
});

let tamañoActual = 2.2; // valor inicial
const minimo = 2.2;
const maximo = 4; // opcional, para no romper diseño

function aumentarTexto() {
    if (tamañoActual < maximo) {
        tamañoActual += 0.5;
        aplicarTamano();
    }
}

function disminuirTexto() {
    if (tamañoActual > minimo) {
        tamañoActual -= 0.5;
        aplicarTamano();
    }
}

function aplicarTamano() {
    document.querySelector(".body-c").style.fontSize = tamañoActual + "rem";
    localStorage.setItem("tamanoTexto", tamañoActual);
}

// Cargar valor guardado
window.onload = () => {
    const guardado = localStorage.getItem("tamanoTexto");
    if (guardado) {
        tamañoActual = parseFloat(guardado);
        aplicarTamano();
    }
};