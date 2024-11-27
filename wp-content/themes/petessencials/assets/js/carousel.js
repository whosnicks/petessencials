document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelector(".slides")
  const slideWidth = document.querySelector(".slide").offsetWidth // Corrected width calculation
  const prevBtn = document.querySelector(".prev")
  const nextBtn = document.querySelector(".next")

  let currentIndex = 0

  // Handle next button
  nextBtn.addEventListener("click", () => {
    if (currentIndex < slides.children.length - 1) {
      currentIndex++
      slides.style.transform = `translateX(-${slideWidth * currentIndex}px)`
    }
  })

  // Handle prev button
  prevBtn.addEventListener("click", () => {
    if (currentIndex > 0) {
      currentIndex--
      slides.style.transform = `translateX(-${slideWidth * currentIndex}px)`
    }
  })
})
