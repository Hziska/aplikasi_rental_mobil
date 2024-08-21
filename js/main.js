// burger
const burger = document.querySelector('.burger')
const burger_menu = document.querySelector('.navigasi-menu')

burger.addEventListener('click',function(){
	burger.classList.toggle('toggle')
	burger_menu.classList.toggle('menu-hide')
})

// membuat img slider
const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.card-car');
let currentIndex = 0;

function updateSlider() {
	const slideWidth = slides[currentIndex].offsetWidth;
	slider.style.transform = `translateX(-${currentIndex * (slideWidth + 12)}px)`; // 12px is the margin-right of .me-3
}

function nextSlider() {
	currentIndex = (currentIndex + 1) % slides.length;
	updateSlider();
}

function prevSlider() {
	currentIndex = (currentIndex - 1 + slides.length) % slides.length;
	updateSlider();
}

slider.addEventListener('transitionend', () => {
	if (currentIndex === slides.length) {
		slider.style.transition = 'none';
		currentIndex = 0;
		updateSlider();
		setTimeout(() => {
			slider.style.transition = 'transform 0.5s ease-in-out';
		});
	} else if (currentIndex === -1) {
		slider.style.transition = 'none';
		currentIndex = slides.length - 1;
		updateSlider();
		setTimeout(() => {
			slider.style.transition = 'transform 0.5s ease-in-out';
		});
	}
});
// sliderimg(0)
