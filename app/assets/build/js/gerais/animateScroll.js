/* =================== ANIMATE SCROLL =================== */

// Inicializa as animações de scroll
function initAnimations() {
  document.addEventListener("DOMContentLoaded", () => {
    // Offset padrão (threshold)
    const thresholdDefault = 25;
    // Resgata os elementos com base no atributo "data-aos"
    const animatedElements = document.querySelectorAll("[data-aos]");
    animatedElements.forEach((element) => {
      // Obtém o delay do elemento (Se houver)
      const delay = parseInt(element.getAttribute("data-aos-delay")) || 0;
      // Obtém o offset (threshold) do elemento (Se houver)
      /* O valor deve ser entre 0 e 100 
      (0 será animado mais rápido e 
      100 só será animado após todo o elemento aparecer) */
      let threshold =
        element.getAttribute("data-aos-offset") !== null
          ? parseInt(element.getAttribute("data-aos-offset"))
          : thresholdDefault;
      if (threshold > 100) threshold = 100;
      if (threshold < 0) threshold = 0;
      threshold = threshold / 100;
      // Verifica se o elemento está dentro de um carrossel no mobile
      let isInsideCarousel = element.closest(".splide__slide") !== null;
      if (isInsideCarousel && isMedia("mobile")) {
        threshold = 0;
      }
      onElementVisible(
        element,
        () => {
          setTimeout(() => {
            const animationClass = element.getAttribute("data-aos");
            element.classList.add(animationClass, "animated");
          }, delay + 200);
        },
        true,
        threshold
      );
    });
  });
}
initAnimations();

// Executa uma ação (callback) quando um elemento estiver visível na tela
function onElementVisible(
  element,
  callback,
  observeOnce = true,
  threshold = 0.5
) {
  element = element instanceof jQuery ? element[0] : element;
  if (!element || typeof callback !== "function") return;
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          callback();
          if (observeOnce) observer.disconnect();
        }
      });
    },
    {
      threshold: threshold,
    }
  );
  observer.observe(element);
}

// Verifica se um elemento está completamente visível na tela no momento da chamada
function isElementVisible(element) {
  element = element instanceof jQuery ? element[0] : element;
  if (!element) return false;
  const rect = element.getBoundingClientRect();
  return rect.top >= 0 && rect.bottom <= window.innerHeight;
}
