<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
<script src="/js/jquery-1.11.0.min.js"></script>
<!--Custom-Theme-files-->
<!--theme-style-->

<script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar() {
        window.scrollTo(0, 1);
    } </script>
<!--start-menu-->
<script src="/js/simpleCart.min.js"></script>

<script type="text/javascript" src="/js/memenu.js"></script>
<script>$(document).ready(function () {
        $(".memenu").memenu();
    });</script>
<!--dropdown-->
<script src="/js/jquery.easydropdown.js"></script>
<script src="/js/responsiveslides.min.js"></script>

<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>