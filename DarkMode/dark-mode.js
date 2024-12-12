jQuery(document).ready(function($) {
    // Tjek, om dark mode allerede er aktiveret
    if (localStorage.getItem('darksand-dark-mode') === 'enabled') {
        $('body').addClass('dark-mode');
        changeColors();
    }

    // Håndter klik på knappen
    $('#darksand-toggle').click(function() {
        $('body').toggleClass('dark-mode');

        if ($('body').hasClass('dark-mode')) {
            localStorage.setItem('darksand-dark-mode', 'enabled');
            changeColors();
        } else {
            localStorage.setItem('darksand-dark-mode', 'disabled');
            resetColors();
        }
    });

    function changeColors() {
        $('*').each(function() {
            var currentColor = $(this).css('color');
            var currentBgColor = $(this).css('background-color');
    
            // Skift tekstfarve
            if (currentColor !== 'rgb(255, 255, 255)') {
                $(this).css('color', '#ffffff');
            }
    
            // Skift baggrundsfarve
            if (currentBgColor === 'rgb(252, 251, 247)') { 
                $(this).css('background-color', '#3a3a3a'); 
            } else if (currentBgColor === 'rgb(247, 244, 239)') { 
                $(this).css('background-color', '#2F2F2F'); 
            }
    
        });
    }

    // Funktion til at genskabe de oprindelige farver, når dark mode er deaktiveret
    function resetColors() {
        $('*').each(function() {
            var currentColor = $(this).css('color');
            var currentBgColor = $(this).css('background-color');

            if (currentColor === 'rgb(255, 255, 255)') {
                $(this).css('color', '#000000'); 
            }

            if (currentBgColor === 'rgb(58, 58, 58)') { 
                $(this).css('background-color', '#fcfbf7'); 
            } else if (currentBgColor === 'rgb(47, 47, 47)') { 
                $(this).css('background-color', '#f7f4ef'); 
            }
        });
    }
});
