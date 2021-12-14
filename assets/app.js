$(document).ready(function () {

    var parallax = $('.parallax');

    $(window).scroll(function () {
        let offset = $(window).scrollTop();
        $(parallax).css('background-position-y', offset * 0.7 + 'px');
    })

    // Code pour faire l'effet texte qui s'écrit pour la partie "Qualité" (code récupéré sur Internet)

    class TextScramble {
        constructor(el) {
            this.el = el;
            this.chars = '!<>-_\\/[]{}—=+*^?#________';
            this.update = this.update.bind(this);
        }
        setText(newText) {
            const oldText = this.el.innerText;
            const length = Math.max(oldText.length, newText.length);
            const promise = new Promise(resolve => this.resolve = resolve);
            this.queue = [];
            for (let i = 0; i < length; i++) {
                const from = oldText[i] || '';
                const to = newText[i] || '';
                const start = Math.floor(Math.random() * 40);
                const end = start + Math.floor(Math.random() * 40);
                this.queue.push({
                    from,
                    to,
                    start,
                    end
                });
            }
            cancelAnimationFrame(this.frameRequest);
            this.frame = 0;
            this.update();
            return promise;
        }
        update() {
            let output = '';
            let complete = 0;
            for (let i = 0, n = this.queue.length; i < n; i++) {
                let {
                    from,
                    to,
                    start,
                    end,
                    char
                } = this.queue[i];
                if (this.frame >= end) {
                    complete++;
                    output += to;
                } else if (this.frame >= start) {
                    if (!char || Math.random() < 0.28) {
                        char = this.randomChar();
                        this.queue[i].char = char;
                    }
                    output += `<span class="dud">${char}</span>`;
                } else {
                    output += from;
                }
            }
            this.el.innerHTML = output;
            if (complete === this.queue.length) {
                this.resolve();
            } else {
                this.frameRequest = requestAnimationFrame(this.update);
                this.frame++;
            }
        }
        randomChar() {
            return this.chars[Math.floor(Math.random() * this.chars.length)];
        }
    }

    const phrases = [
        'Déterminée',
        'Investie',
        'Calme',
        'Polyvalente',
        'Organisée',
        'Curieuse',
        'Motivée',
        'Rigoureuse',
        'Persévérante',
    ];

    const el = document.querySelector('.text');
    const fx = new TextScramble(el);

    let counter = 0;
    const next = () => {
        fx.setText(phrases[counter]).then(() => {
            setTimeout(next, 800);
        });
        counter = (counter + 1) % phrases.length;
    };

    next();

    // Code pour faire apparaître fiche études au moment du scroll

    $('.bloc1, .bloc2, .bloc3').css('visibility', 'hidden');

    // On commence par chercher à savoir si la date lié à la fiche et visible sur l'écran 

    // Principe de ce bout de code trouver sur internet, mais réadapter et compris
    $.fn.apparaitSurLaPage = function () {
        var hautElement = $(this).offset().top;
        var basElement = $(this).offset().top + $(this).outerHeight();
        var basPage = $(window).scrollTop() + $(window).height();
        var hautPage = $(window).scrollTop();
        return basElement > hautPage && hautElement < basPage;
    }

    // Je créer les événements qui se feront quand la date est visible
    function apparition(fiche) {
        $(fiche).addClass('apparition');
        $(fiche).css('visibility', 'visible');
    }

    function disparition(fiche) {
        $(fiche).removeClass('apparition');
        $(fiche).css('visibility', 'hidden');
    }

    // Je créer la fonction qui se fera au scroll pour chaque fiche

    $(window).on('resize scroll', function () {
        if ($('#date1').apparaitSurLaPage()) {
            var fiche = $('.bloc1');
            apparition(fiche);
        } else {
            var fiche = $('.bloc1');
            disparition(fiche);
        }

        if ($('#date2').apparaitSurLaPage()) {
            var fiche = $('.bloc2');
            apparition(fiche);
        } else {
            var fiche = $('.bloc2');
            disparition(fiche);
        }

        if ($('#date3').apparaitSurLaPage()) {
            var fiche = $('.bloc3');
            apparition(fiche);
        } else {
            var fiche = $('.bloc3');
            disparition(fiche);
        }
    });

    $('.texte_parcours').on('hover', function () {
        console.log('yoooo')
    })


    // Créer l'animation pour les barres de compétences
    $(window).on('resize scroll', function () {
        if ($('.outils').apparaitSurLaPage()) {
            $('.skillbar').each(function () {
                $(this).find('.skillbar-bar').animate({
                    width: $(this).attr('data-percent')
                }, 2000);
            });
        }

    });

})


