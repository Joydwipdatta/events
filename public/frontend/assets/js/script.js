
// -----------  scroll to change header color  --------------------

window.onscroll = function () {
    var header = document.querySelector('header');
    if (window.scrollY > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
};



// -----------  Banner Slider  --------------------

let index = 0;

function showSlide() {
    const sliderWrapper = document.querySelector('.slider-wrapper');
    const banners = document.querySelectorAll('.banner');
    if (index >= banners.length) {
        index = 0;
    } else if (index < 0) {
        index = banners.length - 1;
    }
    sliderWrapper.style.transform = 'translateX(' + (-index * 100) + '%)';
}

function nextSlide() {
    index++;
    showSlide();
}

function prevSlide() {
    index--;
    showSlide();
}

// Auto-slide every 3 seconds
setInterval(nextSlide, 55000);




// -----------  Event Slider  --------------------
document.querySelectorAll('.slide-container').forEach((container, index) => {
    new Swiper(container.querySelector('.slide-content-event'), {
        slidesPerView: 3,
        spaceBetween: 32,
        loop: true,
        centerSlide: 'true',
        fade: 'true',
        grabCursor: 'true',
        autoplay: {
            delay: 10000,
            disableOnInteraction: false,
        },
        pagination: {
            el: container.querySelector(".swiper-pagination"),
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: container.querySelector(".swiper-button-next"),
            prevEl: container.querySelector(".swiper-button-prev"),
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            520: {
                slidesPerView: 2,
            },
            950: {
                slidesPerView: 3,
            },
        },
    });
});


// -----------  Event Tabs  --------------------

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "flex";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();



// -----------  Achievement Counters  --------------------

document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');

    if (counters.length === 0) return; // Exit if no counters found

    const options = {
        root: null, // relative to the viewport
        rootMargin: '0px',
        threshold: 0.5 // trigger when 50% of the section is visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = +counter.getAttribute('data-target');
                const speed = 200; // lower is faster

                const updateCount = () => {
                    const count = +counter.innerText;
                    const inc = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + inc);
                        setTimeout(updateCount, 10);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCount();
                observer.unobserve(entry.target); // stop observing once the counter has reached the target number
            }
        });
    }, options);

    counters.forEach(counter => {
        observer.observe(counter);
    });
});


// -------------- Get Current Year --------------------

document.addEventListener('DOMContentLoaded', (event) => {
    const yearSpans = document.querySelectorAll('.currentyear');
    const currentYear = new Date().getFullYear();
    yearSpans.forEach(span => {
        span.textContent = currentYear;
    });
});


// -------------- Scroll to slide up --------------------

document.addEventListener('DOMContentLoaded', () => {
    const slideTopRevelElements = document.querySelectorAll('.slideTopRevel');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    slideTopRevelElements.forEach(element => observer.observe(element));
});




