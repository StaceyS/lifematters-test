$j(document).ready(function () {
    // if there is no existing cookie, show popup
    if (!readCookie('hide')) {

        // Display popup if window is wider than 481px
        if ($j(window).width() > 481) {
            // On load, show popup
            $j('.overlay').fadeIn();
            $j('.popup').fadeIn();
            ga('send', 'event', 'Nav Lightbox', 'Load', this.href, {
                'nonInteraction': true
            });
        }
    }

    // Close popup on click
    $j(document).on('click', '#closepopup, .popup-link', function () {
        $j('.overlay').fadeOut();
        $j('.popup').fadeOut();
        // set cookie to hide popup for 2 days
        createCookie('hide', true, 2);
        ga('send', 'event', 'Nav Lightbox', 'Close', this.href, {
            'nonInteraction': true
        });
        return false;
    });

    $j(document).on('click', '.direct-link', function () {
        // set cookie to hide popup for 2 days
        createCookie('hide', true, 2);
        ga('send', 'event', 'Nav Lightbox', 'Click', this.href, {
            'nonInteraction': true,
            'hitCallback': window.location.href = this.href
        });
        return false;
    });

    // Logic for managing cookies
    function createCookie(name, value, days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires=" + date.toGMTString();
        } else var expires = "";
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var coo = ca[i];
            while (coo.charAt(0) == ' ') coo = coo.substring(1, coo.length);
            if (coo.indexOf(nameEQ) == 0) return coo.substring(nameEQ.length, coo.length);
        }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name, "", -1);
    }
    console.log(document.cookie);
});
