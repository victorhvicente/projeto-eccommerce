document.addEventListener("DOMContentLoaded", () => {
  // Hero Carousel
  const carouselSlides = document.querySelectorAll(".carousel-slide");
  const indicators = document.querySelectorAll(".indicator");
  const prevButton = document.querySelector(".carousel-control.prev");
  const nextButton = document.querySelector(".carousel-control.next");
  let currentSlide = 0;
  let slideInterval;

  function showSlide(index) {
    // Remove active class from all slides and indicators
    carouselSlides.forEach((slide) => slide.classList.remove("active"));
    indicators.forEach((indicator) => indicator.classList.remove("active"));

    // Add active class to current slide and indicator
    carouselSlides[index].classList.add("active");
    indicators[index].classList.add("active");

    // Update current slide index
    currentSlide = index;
  }

  function nextSlide() {
    let next = currentSlide + 1;
    if (next >= carouselSlides.length) {
      next = 0;
    }
    showSlide(next);
  }

  function prevSlide() {
    let prev = currentSlide - 1;
    if (prev < 0) {
      prev = carouselSlides.length - 1;
    }
    showSlide(prev);
  }

  // Initialize carousel
  function startCarousel() {
    slideInterval = setInterval(nextSlide, 5000);
  }

  function stopCarousel() {
    clearInterval(slideInterval);
  }

  // Event listeners for controls
  prevButton.addEventListener("click", () => {
    prevSlide();
    stopCarousel();
    startCarousel();
  });

  nextButton.addEventListener("click", () => {
    nextSlide();
    stopCarousel();
    startCarousel();
  });

  // Event listeners for indicators
  indicators.forEach((indicator, index) => {
    indicator.addEventListener("click", () => {
      showSlide(index);
      stopCarousel();
      startCarousel();
    });
  });

  // Start carousel
  startCarousel();

  // Products Slider
  const productsTrack = document.querySelector(".products-track");
  const productCards = document.querySelectorAll(
    ".products-track .product-card"
  );
  const productsPrevButton = document.querySelector(".products-control.prev");
  const productsNextButton = document.querySelector(".products-control.next");
  let productsPosition = 0;
  const productCardWidth = 300; // Approximate width of a product card including gap
  const visibleProducts = Math.floor(
    productsTrack.clientWidth / productCardWidth
  );
  const maxPosition = productCards.length - visibleProducts;

  function updateProductsPosition() {
    productsTrack.style.transform = `translateX(${
      -productsPosition * productCardWidth
    }px)`;
  }

  productsPrevButton.addEventListener("click", () => {
    if (productsPosition > 0) {
      productsPosition--;
      updateProductsPosition();
    }
  });

  productsNextButton.addEventListener("click", () => {
    if (productsPosition < maxPosition) {
      productsPosition++;
      updateProductsPosition();
    }
  });

  // Testimonials Slider
  const testimonialsTrack = document.querySelector(".testimonials-track");
  const testimonials = document.querySelectorAll(".testimonial");
  const testimonialsPrevButton = document.querySelector(
    ".testimonials-control.prev"
  );
  const testimonialsNextButton = document.querySelector(
    ".testimonials-control.next"
  );
  let testimonialsPosition = 0;
  const testimonialWidth = testimonials[0].offsetWidth + 30; // Width + gap
  const visibleTestimonials = Math.floor(
    testimonialsTrack.clientWidth / testimonialWidth
  );
  const maxTestimonialsPosition = testimonials.length - visibleTestimonials;

  function updateTestimonialsPosition() {
    testimonialsTrack.style.transform = `translateX(${
      -testimonialsPosition * testimonialWidth
    }px)`;
  }

  testimonialsPrevButton.addEventListener("click", () => {
    if (testimonialsPosition > 0) {
      testimonialsPosition--;
      updateTestimonialsPosition();
    }
  });

  testimonialsNextButton.addEventListener("click", () => {
    if (testimonialsPosition < maxTestimonialsPosition) {
      testimonialsPosition++;
      updateTestimonialsPosition();
    }
  });

  // Add to Cart functionality
  const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
  const cartCount = document.querySelector(".cart-count");

  addToCartButtons.forEach((button) => {
    button.addEventListener("click", () => {
      // Atualiza o contador do carrinho
      const count = Number.parseInt(cartCount.textContent);
      cartCount.textContent = count + 1;

      // Exibe mensagem de sucesso
      showNotification("Produto adicionado ao carrinho!");
    });
  });

  // Quick View functionality
  const quickViewButtons = document.querySelectorAll(".quick-view");

  quickViewButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      e.preventDefault();
      // Aqui você implementaria a abertura do modal de visualização rápida
      showNotification("Visualização rápida do produto");
    });
  });

  // Wishlist functionality
  const wishlistButtons = document.querySelectorAll(".add-to-wishlist");

  wishlistButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      const icon = this.querySelector("i");

      if (icon.classList.contains("far")) {
        icon.classList.remove("far");
        icon.classList.add("fas");
        showNotification("Produto adicionado aos favoritos!");
      } else {
        icon.classList.remove("fas");
        icon.classList.add("far");
        showNotification("Produto removido dos favoritos!");
      }
    });
  });

  // Newsletter subscription
  const newsletterForms = document.querySelectorAll(".newsletter-form");

  newsletterForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      const input = this.querySelector("input");

      if (input.value.trim() !== "") {
        showNotification("Obrigado por se inscrever em nossa newsletter!");
        input.value = "";
      } else {
        showNotification("Por favor, insira um e-mail válido.", "error");
      }
    });
  });

  // Função para exibir notificações
  function showNotification(message, type = "success") {
    // Verifica se já existe uma notificação
    const existingNotification = document.querySelector(".notification");
    if (existingNotification) {
      existingNotification.remove();
    }

    // Cria a notificação
    const notification = document.createElement("div");
    notification.className = "notification";
    notification.textContent = message;

    // Estiliza a notificação
    notification.style.position = "fixed";
    notification.style.bottom = "20px";
    notification.style.right = "20px";
    notification.style.backgroundColor =
      type === "success" ? "#00e676" : "#e53935";
    notification.style.color = "white";
    notification.style.padding = "12px 20px";
    notification.style.borderRadius = "4px";
    notification.style.boxShadow = "0 2px 10px rgba(0, 0, 0, 0.1)";
    notification.style.zIndex = "1000";
    notification.style.opacity = "0";
    notification.style.transform = "translateY(20px)";
    notification.style.transition = "opacity 0.3s, transform 0.3s";
    notification.style.fontFamily = "Poppins, sans-serif";

    // Adiciona a notificação ao DOM
    document.body.appendChild(notification);

    // Anima a entrada da notificação
    setTimeout(() => {
      notification.style.opacity = "1";
      notification.style.transform = "translateY(0)";
    }, 10);

    // Remove a notificação após 3 segundos
    setTimeout(() => {
      notification.style.opacity = "0";
      notification.style.transform = "translateY(20px)";

      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 3000);
  }

  // Inicializa os sliders
  updateProductsPosition();
  updateTestimonialsPosition();

  // Receber o SELETOR ocultar detalhes do evento e apresentar o formulário editar evento
  const btnViewEditEvento = document.getElementById("btnViewEditEvento");

  // Somente acessa o IF quando existir o SELETOR "btnViewEditEvento"
  if (btnViewEditEvento) {
    // Aguardar o usuario clicar no botao editar
    btnViewEditEvento.addEventListener("click", () => {
      // Ocultar os detalhes do evento
      document.getElementById("visualizarEvento").style.display = "none";
      document.getElementById("visualizarModalLabel").style.display = "none";

      // Apresentar o formulário editar do evento
      document.getElementById("editarEvento").style.display = "block";
      document.getElementById("editarModalLabel").style.display = "block";
    });
  }
});
