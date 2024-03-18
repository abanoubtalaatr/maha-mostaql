<script>
    function changeLanguage() {
        var currentLang = '{{ app()->getLocale() }}';
        var otherLang = currentLang === 'en' ? 'ar' : 'en';
        var currentUrl = window.location.href;

        if (currentUrl.includes("ar")) {
            currentUrl = currentUrl.replace("ar", "en");
        } else if (currentUrl.includes("en")) {
            currentUrl = currentUrl.replace("en", "ar");
        }
        window.location.replace(currentUrl);
    }
</script>

<script src="{{asset('website/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/assets/js/jquery.js')}}"></script>
<script src="{{asset('website/assets/js/popper.min.js')}}"></script>
<script src="{{asset('website/assets/js/code.js')}}"></script>
<script src="{{asset('website/assets/js/slick.min.js')}}"></script>

<script>
    $(".responsive").slick({
        dots: false,
        rtl: true,
        infinite: true,
        arrows: true,
        prevArrow:
            '<img src="{{asset('website/assets/images/left.png')}}" alt="" class= "left-arrow">',
        nextArrow:
            '<img src="{{asset("website/assets/images/right.png")}}" alt="" class= "right-arrow">',
        speed: 200,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: false,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });
</script>

<script>
    (function ($) {
        "use strict";

        var fullHeight = function () {
            $(".js-fullheight").css("height", $(window).height());
            $(window).resize(function () {
                $(".js-fullheight").css("height", $(window).height());
            });
        };
        fullHeight();

        $("#sidebarCollapse").on("click", function () {
            $("#sidebar").toggleClass("active");
        });
    })(jQuery);
</script>

<script>
    var number = 1;
    do {
        function showPreview(event, number) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById(
                    "file-ip-" + number + "-preview"
                );
                preview.src = src;
                preview.style.display = "block";
            }
        }
        function myImgRemove(number) {
            document.getElementById("file-ip-" + number + "-preview").src =
                "https://i.ibb.co/ZVFsg37/default.png";
            document.getElementById("file-ip-" + number).value = null;
        }
        number++;
    } while (number < 5);
</script>
