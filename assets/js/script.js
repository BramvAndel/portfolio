document.addEventListener("selectionchange", () => {
  const selection = window.getSelection();
  if (selection.rangeCount > 0) {
    const range = selection.getRangeAt(0);
    const parentElement = range.commonAncestorContainer.parentElement;

    if (parentElement) {
      const computedStyle = window.getComputedStyle(parentElement);
      // console.log("Selected text color:", computedStyle.color);

      if (computedStyle.color === "rgb(230, 230, 230)") {
        document.documentElement.style.setProperty(
          "--selection-background",
          "rgb(230, 230, 230)"
        );
        document.documentElement.style.setProperty(
          "--selection-color",
          "rgb(6, 6, 6)"
        );
      } else if (computedStyle.color === "rgb(6, 6, 6)") {
        document.documentElement.style.setProperty(
          "--selection-background",
          "rgb(6, 6, 6)"
        );
        document.documentElement.style.setProperty(
          "--selection-color",
          "rgb(230, 230, 230)"
        );
      }
    }
  }
});

// Apply the custom selection styles
const style = document.createElement("style");
style.innerHTML = `
  ::selection {
    background: var(--selection-background, highlight) !important;
    color: var(--selection-color, highlighttext) !important;
  }
  ::-moz-selection {
    background: var(--selection-background, highlight) !important;
    color: var(--selection-color, highlighttext) !important;
  }
`;
document.head.appendChild(style);
