<?php
/**
*Template name: Главная страницы
*/
get_header();

?>

<section class="about-us">
    <div class="container">
        <h1 class="title"><?php the_field('zagolovok_o_nas') ?></h1>
        <div class="about-us__content">
            <div class="text">
                <?php the_field('opisanie_o_nas') ?>
            </div>
            <div class="video" data-video="https://youtu.be/<?php the_field('id_dlya_ssylki_na_video') ?>">
                <?php 
                $image = get_field('izobrazhenie');
                if( !empty( $image ) ): ?>
                <img class="lozad" data-src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php if( have_rows('partnery') ): ?>
<section class="serve">
    <div class="container">
        <div class="serve__desck">
            <h2 class="title"><?php the_field('zagolovok_obsluzhivanie') ?></h2>
            <div class="text">
                <?php the_field('opisanie_obsluzhivanie') ?>
            </div>
        </div>
        <div class="serve__map">
            <div class="map">
                <img class="lozad" data-src="<?php echo get_template_directory_uri() ?>/assets/img/World_Map_2-blue.png" alt="map">
            </div>
            <div class="partners">
                <?php while (have_rows('partnery')): the_row();  
                    $logoPartnera = get_sub_field('logo_partnera');
                ?>

                <div class="item">
                    <img class="lozad" data-src="<?php echo $logoPartnera['url']; ?>" alt="<?php echo $logoPartnera['alt']; ?>">
                </div>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if( have_rows('spisok_klientov') ): ?>
<section class="customers">
    <div class="container">
        <h2 class="title"><?php the_field('zagolovok_klienty') ?></h2>
        <p class="desk"><?php the_field('opisanie_klienty') ?></p>
        <div class="customers__list">

            <?php while (have_rows('spisok_klientov')): the_row();  
                    $logoCust = get_sub_field('ikonka_klienta');
                    $nameCust = get_sub_field('naimenovanie_klienta');
                ?>
            <div class="list__item">
                <div class="list__item--logo">
                    <img class="lozad" data-src="<?php echo $logoCust['url']; ?>" alt="<?php echo $logoCust['alt']; ?>">
                </div>
                <p class="list__item--name"><?php echo $nameCust; ?></p>
            </div>

            <?php endwhile; ?>


        </div>
    </div>
</section>
<?php endif; ?>


<?php if( have_rows('spisok_liderov') ): ?>
<section class="leadership">
    <div class="container">
        <h3 class="title">Leadership</h3>
        <div class="leadership__list">

            <?php while (have_rows('spisok_liderov')): the_row();  
            $ava = get_sub_field('izobrazhenie_lidera');
            $avaBAckg = get_sub_field('fonovoe_izobrazhenie');
            $name = get_sub_field('imya');
            $job = get_sub_field('dolzhnost');
        ?>

            <div class="leadership__list--item">
                <img class="full-ava lozad" data-src="<?php echo $avaBAckg['url']; ?>" alt="full-ava">
                <div class="ava">
                    <img class="lozad" data-src="<?php echo $ava['url']; ?>" alt="ava">
                </div>
                <div class="info">
                    <p class="name"><?php echo $name; ?></p>
                    <p class="job"><?php echo $job; ?></p>
                </div>
            </div>

            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if( have_rows('spisok_puteshestvij') ): ?>
<section class="travel">
    <div class="container">
        <div class="travel__desk">
            <h3 class="title"><?php the_field('zagolovok_puteshestveviya') ?></h3>
            <div class="text">
                <?php the_field('opisanie_puteshetsviya') ?>
            </div>
        </div>
        <div class="travel__info">
            <div class="travel__info--country">
                <div class="country__name">
                    Turnkey Products
                </div>
            </div>
            <div class="travel__info--list">

                <?php while (have_rows('spisok_puteshestvij')): the_row();  
                $imageTravel = get_sub_field('kartinka');
                $nameTravel = get_sub_field('nazvanie');
                $textTtravel = get_sub_field('opisanie');
            ?>

                <div class="list__item">
                    <div class="image">
                        <img class="lozad" data-src="<?php echo $imageTravel['url']; ?>" alt="<?php echo $imageTravel['alt']; ?>">
                    </div>
                    <div class="info">
                        <p class="info__title"><?php echo $nameTravel; ?></p>
                        <div class="info__desk"><?php echo $textTtravel; ?></div>
                        <a href="#" class="button-more">Learn More</a>
                    </div>
                </div>

                <?php endwhile; ?>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if( have_rows('spisok_otzyvov') ): ?>
<section class="reviews" id="reviews">
    <div class="container">
        <p class="title">What Our Clients Say</p>
        <div class="swiper reviews__slider">
            <div class="swiper-wrapper">

                <?php while (have_rows('spisok_otzyvov')): the_row();  
                $imageRev = get_sub_field('kartinka_otzyva');
                $nameRev = get_sub_field('imya');
                $jobRev = get_sub_field('dolzhnost');
                $textRev = get_sub_field('opisanie_otzyva');
            ?>

                <div class="swiper-slide">
                    <div class="review__info">
                        <img class="lozad photo" data-src="<?php echo $imageRev['url']; ?>" alt="<?php echo $imageRev['alt']; ?>">
                        <div class="review__info--desk">
                            <p class="name"><?php echo $nameRev; ?></p>
                            <p class="job"><?php echo $jobRev; ?></p>
                        </div>
                        <img data-src="<?php echo get_template_directory_uri() ?>/assets/img/tours.svg" class="tour-logo lozad" alt="tours">
                    </div>
                    <div class="review__text">
                        <?php echo $textRev; ?>
                    </div>
                </div>

                
                <?php endwhile; ?>

            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
<?php endif; ?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" referrerpolicy="no-referrer">
</script>

<!--Lazy load-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>


<!-- lazyload -->
<script async>
    !(function (t, e) {
        "object" == typeof exports && "undefined" != typeof module ?
            (module.exports = e()) :
            "function" == typeof define && define.amd ?
            define(e) :
            (t.lozad = e());
    })(this, function () {
        "use strict";
        var g =
            Object.assign ||
            function (t) {
                for (var e = 1; e < arguments.length; e++) {
                    var r = arguments[e];
                    for (var o in r)
                        Object.prototype.hasOwnProperty.call(r, o) && (t[o] = r[o]);
                }
                return t;
            },
            n = "undefined" != typeof document && document.documentMode,
            l = {
                rootMargin: "0px",
                threshold: 0,
                load: function (t) {
                    if ("picture" === t.nodeName.toLowerCase()) {
                        var e = document.createElement("img");
                        n &&
                            t.getAttribute("data-iesrc") &&
                            (e.src = t.getAttribute("data-iesrc")),
                            t.getAttribute("data-alt") &&
                            (e.alt = t.getAttribute("data-alt")),
                            t.appendChild(e);
                    }
                    if (
                        "video" === t.nodeName.toLowerCase() &&
                        !t.getAttribute("data-src") &&
                        t.children
                    ) {
                        for (
                            var r = t.children, o = void 0, a = 0; a <= r.length - 1; a++
                        )
                            (o = r[a].getAttribute("data-src")) && (r[a].src = o);
                        t.load();
                    }
                    t.getAttribute("data-src") &&
                        (t.src = t.getAttribute("data-src")),
                        t.getAttribute("data-srcset") &&
                        t.setAttribute("srcset", t.getAttribute("data-srcset")),
                        t.getAttribute("data-background-image") &&
                        (t.style.backgroundImage =
                            "url('" + t.getAttribute("data-background-image") + "')"),
                        t.getAttribute("data-toggle-class") &&
                        t.classList.toggle(t.getAttribute("data-toggle-class"));
                },
                loaded: function () {},
            };

        function f(t) {
            t.setAttribute("data-loaded", !0);
        }
        var b = function (t) {
            return "true" === t.getAttribute("data-loaded");
        };
        return function () {
            var r,
                o,
                a =
                0 < arguments.length && void 0 !== arguments[0] ?
                arguments[0] :
                ".lozad",
                t =
                1 < arguments.length && void 0 !== arguments[1] ?
                arguments[1] : {},
                e = g({}, l, t),
                n = e.root,
                i = e.rootMargin,
                d = e.threshold,
                c = e.load,
                u = e.loaded,
                s = void 0;
            return (
                window.IntersectionObserver &&
                (s = new IntersectionObserver(
                    ((r = c),
                        (o = u),
                        function (t, e) {
                            t.forEach(function (t) {
                                (0 < t.intersectionRatio || t.isIntersecting) &&
                                (e.unobserve(t.target),
                                    b(t.target) || (r(t.target), f(t.target), o(t.target)));
                            });
                        }), {
                        root: n,
                        rootMargin: i,
                        threshold: d,
                    }
                )), {
                    observe: function () {
                        for (
                            var t = (function (t) {
                                    var e =
                                        1 < arguments.length && void 0 !== arguments[1] ?
                                        arguments[1] :
                                        document;
                                    return t instanceof Element ? [t] :
                                        t instanceof NodeList ?
                                        t :
                                        e.querySelectorAll(t);
                                })(a, n),
                                e = 0; e < t.length; e++
                        )
                            b(t[e]) ||
                            (s ? s.observe(t[e]) : (c(t[e]), f(t[e]), u(t[e])));
                    },
                    triggerLoad: function (t) {
                        b(t) || (c(t), f(t), u(t));
                    },
                    observer: s,
                }
            );
        };
    });
</script>
<!-- end lazyload -->

<script>
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();
</script>

<?php
get_footer();
?>