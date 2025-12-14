// Crée un tooltip pour tous les chemins des régions
function initTooltipRegion() {
  const tooltip = document.createElement("div");
  tooltip.className =
    "absolute z-50 hidden px-3 py-1 text-white bg-blue-600 rounded shadow-lg pointer-events-none text-sm";
  document.body.appendChild(tooltip);

  document.querySelectorAll("g.region path").forEach((path) => {
    path.addEventListener("mousemove", (e) => {
      tooltip.textContent = path.dataset.nom;

      const offsetX = 10;
      const offsetY = 10;
      tooltip.style.left = e.pageX + offsetX + "px";
      tooltip.style.top = e.pageY + offsetY + "px";

      tooltip.classList.remove("hidden");
    });

    path.addEventListener("mouseleave", () => {
      tooltip.classList.add("hidden");
    });
  });
}

initTooltipRegion();