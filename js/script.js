// Seleciona os elementos do carrossel
var carousel = document.querySelector('.carousel');
var carouselInner = document.querySelector('.carousel-inner');
var carouselItems = document.querySelectorAll('.carousel-item');

// Define o número de itens visíveis no carrossel
var numVisibleItems = 4;

// Calcula a largura de cada item do carrossel
var itemWidth = carousel.clientWidth / numVisibleItems;

// Define a posição inicial do carrossel
var position = 0;

// Adiciona um ouvinte de eventos ao botão "Próximo"
var nextBtn = document.querySelector('.carousel-next');
nextBtn.addEventListener('click', function() {
    // Move o carrossel para a direita
    position -= itemWidth;
    carouselInner.style.transform = 'translateX(' + position + 'px)';
    
    // Verifica se o último item visível está à direita da janela
    var lastVisibleItem = carouselItems[numVisibleItems - 1];
    if (lastVisibleItem.offsetLeft + lastVisibleItem.offsetWidth <= carousel.clientWidth) {
        // Se o último item estiver visível, desabilita o botão "Próximo"
        nextBtn.disabled = true;
    }
    
    // Habilita o botão "Anterior"
    prevBtn.disabled = false;
});

// Adiciona um ouvinte de eventos ao botão "Anterior"
var prevBtn = document.querySelector('.carousel-prev');
prevBtn.addEventListener('click', function() {
    // Move o carrossel para a esquerda
    position += itemWidth;
    carouselInner.style.transform = 'translateX(' + position + 'px)';
    
    // Verifica se o primeiro item visível está à esquerda da janela
    var firstVisibleItem = carouselItems[0];
    if (firstVisibleItem.offsetLeft >= 0) {
        // Se o primeiro item estiver visível, desabilita o botão "Anterior"
        prevBtn.disabled = true;
    }
    
    // Habilita o botão "Próximo"
    nextBtn.disabled = false;
});