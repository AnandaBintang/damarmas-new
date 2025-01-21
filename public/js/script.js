(function ($) {
    ("use strict");

    var searchPopup = function () {
        // open search box
        $(".secondary-nav").on("click", ".search-button", function (e) {
            $(".search-popup").toggleClass("is-visible");
        });

        $("#header-nav").on("click", ".btn-close-search", function (e) {
            $(".search-popup").toggleClass("is-visible");
        });

        $(".search-popup-trigger").on("click", function (b) {
            b.preventDefault();
            $(".search-popup").addClass("is-visible"),
                setTimeout(function () {
                    $(".search-popup").find("#search-popup").focus();
                }, 350);
        }),
            $(".search-popup").on("click", function (b) {
                ($(b.target).is(".search-popup-close") ||
                    $(b.target).is(".search-popup-close svg") ||
                    $(b.target).is(".search-popup-close path") ||
                    $(b.target).is(".search-popup")) &&
                    (b.preventDefault(), $(this).removeClass("is-visible"));
            }),
            $(document).keyup(function (b) {
                "27" === b.which &&
                    $(".search-popup").removeClass("is-visible");
            });
    };

    // Preloader
    var initPreloader = function () {
        $(document).ready(function ($) {
            var Body = $("body");
            Body.addClass("preloader-site");
        });
        $(window).load(function () {
            $(".preloader-wrapper").fadeOut();
            $("body").removeClass("preloader-site");
        });
    };

    // init jarallax parallax
    var initJarallax = function () {
        jarallax(document.querySelectorAll(".jarallax"));

        jarallax(document.querySelectorAll(".jarallax-img"), {
            keepImg: true,
        });
    };

    // Tab Section
    var initTabs = function () {
        const tabs = document.querySelectorAll("[data-tab-target]");
        const tabContents = document.querySelectorAll("[data-tab-content]");

        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                const target = document.querySelector(tab.dataset.tabTarget);
                tabContents.forEach((tabContent) => {
                    tabContent.classList.remove("active");
                });
                tabs.forEach((tab) => {
                    tab.classList.remove("active");
                });
                tab.classList.add("active");
                target.classList.add("active");
            });
        });
    };

    // document ready
    $(document).ready(function () {
        searchPopup();
        initPreloader();
        initTabs();
        initJarallax();

        jQuery(document).ready(function ($) {
            jQuery(".stellarnav").stellarNav({
                position: "right",
            });
        });

        $(".user-items .icon-search").click(function () {
            $(".search-box").toggleClass("active");
            $(".search-box .search-input").focus();
        });
        $(".close-button").click(function () {
            $(".search-box").toggleClass("active");
        });

        var swiper = new Swiper(".main-swiper", {
            speed: 500,
            loop: true,
            navigation: {
                nextEl: ".button-next",
                prevEl: ".button-prev",
            },
            pagination: {
                el: "#billboard .swiper-pagination",
                clickable: true,
            },
        });

        var swiper = new Swiper(".two-column-swiper", {
            speed: 500,
            loop: true,
            navigation: {
                nextEl: ".button-next",
                prevEl: ".button-prev",
            },
        });

        var swiper = new Swiper("#featured-products .product-swiper", {
            pagination: {
                el: "#featured-products .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                999: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1299: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
        });

        var swiper = new Swiper("#featured-products .product-swiper-two", {
            pagination: {
                el: "#featured-products .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                999: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1299: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
            },
        });

        var swiper = new Swiper("#flash-sales .product-swiper", {
            pagination: {
                el: "#flash-sales .product-swiper .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                999: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1299: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            },
        });

        var swiper = new Swiper(".testimonial-swiper", {
            loop: true,
            navigation: {
                nextEl: ".next-button",
                prevEl: ".prev-button",
            },
        });

        var thumb_slider = new Swiper(".thumb-swiper", {
            slidesPerView: 1,
        });
        var large_slider = new Swiper(".large-swiper", {
            spaceBetween: 10,
            effect: "fade",
            thumbs: {
                swiper: thumb_slider,
            },
        });

        // Initialize Isotope
        var $grid = $(".entry-container").isotope({
            itemSelector: ".entry-item",
            layoutMode: "masonry",
        });
        $grid.imagesLoaded().progress(function () {
            $grid.isotope("layout");
        });

        $(".gallery").colorbox({
            rel: "gallery",
        });

        $(".youtube").colorbox({
            iframe: true,
            innerWidth: 960,
            innerHeight: 585,
        });
    });

    const fab = document.querySelector(".whatsapp-fab");
    const heroSection =
        document.querySelector("#billboard") ||
        document.querySelector("#header");

    function checkScroll() {
        const heroHeight = heroSection.offsetHeight;
        if (window.scrollY > heroHeight) {
            fab.classList.add("show");
        } else {
            fab.classList.remove("show");
        }
    }

    // Add scroll event listener
    window.addEventListener("scroll", checkScroll);

    // Product SIngle
    document.addEventListener("DOMContentLoaded", function () {
        const mainImage = document.getElementById("mainImage");
        const thumbnails = document.querySelectorAll(".thumbnail");
        const zoomedView = document.getElementById("zoomedView");
        const zoomedImage = document.getElementById("zoomedImage");
        const closeZoom = document.getElementById("closeZoom");
        const loading = document.getElementById("loading");
        const zoomIn = document.getElementById("zoomIn");
        const zoomOut = document.getElementById("zoomOut");
        const resetZoom = document.getElementById("resetZoom");

        let currentZoom = 1;
        let isDragging = false;
        let startPos = { x: 0, y: 0 };
        let currentPos = { x: 0, y: 0 };

        // Handle image loading
        mainImage.onload = function () {
            loading.style.display = "none";
        };

        // Thumbnail click handling
        thumbnails.forEach((thumb) => {
            thumb.addEventListener("click", function () {
                loading.style.display = "block";
                mainImage.src = this.src;
                zoomedImage.src = this.src;
                thumbnails.forEach((t) => t.classList.remove("active"));
                this.classList.add("active");
            });
        });

        // Desktop hover zoom
        if (window.matchMedia("(hover: hover)").matches) {
            mainImage.addEventListener("mousemove", function (e) {
                const bounds = this.getBoundingClientRect();
                const x = e.clientX - bounds.left;
                const y = e.clientY - bounds.top;
                const xPercent = (x / bounds.width) * 100;
                const yPercent = (y / bounds.height) * 100;
                this.style.transformOrigin = `${xPercent}% ${yPercent}%`;
            });

            mainImage.addEventListener("mouseenter", function () {
                this.style.transform = "scale(1.5)";
            });

            mainImage.addEventListener("mouseleave", function () {
                this.style.transform = "scale(1)";
            });
        }

        // Full screen zoom view
        mainImage.addEventListener("click", function () {
            zoomedView.style.display = "block";
            zoomedImage.src = this.src;
            currentZoom = 1;
            updateZoom();
        });

        closeZoom.addEventListener("click", function () {
            zoomedView.style.display = "none";
        });

        // Zoom controls
        zoomIn.addEventListener("click", () => {
            currentZoom = Math.min(currentZoom + 0.5, 4);
            updateZoom();
        });

        zoomOut.addEventListener("click", () => {
            currentZoom = Math.max(currentZoom - 0.5, 1);
            updateZoom();
        });

        resetZoom.addEventListener("click", () => {
            currentZoom = 1;
            currentPos = { x: 0, y: 0 };
            updateZoom();
        });

        function updateZoom() {
            zoomedImage.style.transform = `translate(${currentPos.x}px, ${currentPos.y}px) scale(${currentZoom})`;
        }

        // Touch events for mobile
        zoomedImage.addEventListener("touchstart", handleTouchStart);
        zoomedImage.addEventListener("touchmove", handleTouchMove);
        zoomedImage.addEventListener("touchend", handleTouchEnd);

        function handleTouchStart(e) {
            if (e.touches.length === 1) {
                isDragging = true;
                startPos = {
                    x: e.touches[0].clientX - currentPos.x,
                    y: e.touches[0].clientY - currentPos.y,
                };
            }
        }

        function handleTouchMove(e) {
            if (!isDragging) return;
            e.preventDefault();
            currentPos = {
                x: e.touches[0].clientX - startPos.x,
                y: e.touches[0].clientY - startPos.y,
            };
            updateZoom();
        }

        function handleTouchEnd() {
            isDragging = false;
        }

        // Keyboard navigation
        document.addEventListener("keydown", function (e) {
            if (zoomedView.style.display === "block") {
                if (e.key === "Escape") {
                    zoomedView.style.display = "none";
                }
                if (e.key === "+") {
                    currentZoom = Math.min(currentZoom + 0.5, 4);
                    updateZoom();
                }
                if (e.key === "-") {
                    currentZoom = Math.max(currentZoom - 0.5, 1);
                    updateZoom();
                }
            }
        });

        document.querySelectorAll(".thumbnail").forEach((thumbnail) => {
            thumbnail.addEventListener("click", function () {
                document.getElementById("main-product-image").src = this.src;
            });
        });
    });
})(jQuery);
