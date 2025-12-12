// Letter stripes (fixed order)
const letterStripes = [
  { type: "letter", letter: "M" },
  { type: "letter", letter: "A" },
  { type: "letter", letter: "R" },
  { type: "letter", letter: "B" },
];

// Normal stripes (to be shuffled)
const normalStripes = [
  { type: "normal" },
  { type: "normal" },
  { type: "normal" },
  { type: "normal" },
];

// Shuffle function (Fisher-Yates)
function shuffle(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
}

// Generate random duration between 1.2s and 2.2s
function randomDuration() {
  return (1.2 + Math.random() * 1.0).toFixed(2) + "s";
}

// Generate random delay between 0s and 1.2s
function randomDelay() {
  return (Math.random() * 1.2).toFixed(2) + "s";
}

// Gradient backgrounds for 8 stripes
const backgrounds = [
  "linear-gradient(90deg, #222, #888)",
  "linear-gradient(90deg, #888, #00E3E3)",
  "linear-gradient(90deg, #00E3E3, #888)",
  "linear-gradient(90deg, #888, #222)",
  "linear-gradient(90deg, #222, #000)",
  "linear-gradient(90deg, #000, #222)",
  "linear-gradient(90deg, #222, #888)",
  "linear-gradient(90deg, #888, #00E3E3)",
];

// Shuffle normal stripes and split for start/end
const shuffledNormals = shuffle([...normalStripes]);
const startNormals = shuffledNormals.slice(0, 2);
const endNormals = shuffledNormals.slice(2, 4);

// Final order: 2 normal, 4 letters, 2 normal
const finalStripes = [...startNormals, ...letterStripes, ...endNormals];

const container = document.querySelector(".stripe-container");
let stripes = [];

finalStripes.forEach((def, i) => {
  const div = document.createElement("div");
  div.classList.add("stripe");
  // 25% chance to go opposite direction
  if (Math.random() < 0.5) {
    div.classList.add("reverse");
  }
  if (def.type === "letter") {
    div.classList.add("letter");
    const span = document.createElement("span");
    span.textContent = def.letter;
    span.classList.add("letter-span");
    div.appendChild(span);
  }
  // Assign a random background from the list (cycled if needed)
  div.style.background = backgrounds[i % backgrounds.length];
  // Assign random animation duration and delay
  div.style.animationDuration = randomDuration();
  div.style.animationDelay = randomDelay();
  container.appendChild(div);
  stripes.push(div);
});

// Loader removal logic
let finished = 0;
stripes.forEach((stripe) => {
  stripe.addEventListener("animationend", () => {
    finished++;
    if (finished === stripes.length) {
      const loader = document.querySelector(".loader");
      loader.style.opacity = 0;
      setTimeout(() => {
        loader.style.display = "none";
        loader.remove();
      }, 500);
    }
  });
});
