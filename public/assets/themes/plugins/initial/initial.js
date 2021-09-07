(function ($) {

    var getInitial = function(fullName, maxCharCount) {
        var pieces = fullName.split(" ");
        var initials = "";

        for(var x = 0; x < pieces.length; x++) {
            initials += pieces [x].substring(0, maxCharCount);
        }

        return initials;
    };

    $.fn.initial = function (options) {

        // Defining Colors
        var colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"];
        var finalColor;

        return this.each(function () {

            var e = $(this);
            var settings = $.extend({
                // Default settings
                name: 'Name',
                color: null,
                seed: 0,
                charCount: 1,
                lastName: null,
                textColor: '#ffffff',
                height: 100,
                width: 100,
                fontSize: 60,
                fontWeight: 400,
                fontFamily: 'Roboto,HelveticaNeue-Light,Helvetica Neue Light,Helvetica Neue,Helvetica, Arial,Lucida Grande, sans-serif',
                radius: 0
            }, options);

            // overriding from data attributes
            settings = $.extend(settings, e.data());

            // making the text object
            var c;
            if(settings.lastName){
                c = getInitial(settings.name.substr(0, 1)).toUpperCase() + settings.lastName.substr(0, 1).toUpperCase();
            }else{
                c = getInitial(settings.name.substr(0, settings.charCount)).toUpperCase();
            }
            var cobj = $('<text text-anchor="middle"></text>').attr({
                'y': '50%',
                'x': '50%',
                'dy' : '0.35em',
                'pointer-events':'auto',
                'fill': settings.textColor,
                'font-family': settings.fontFamily
            }).html(c).css({
                'font-weight': settings.fontWeight,
                'font-size': settings.fontSize+'px',
            });

            var colorIndex ='';
            if(settings.color != null){
                if( Object.prototype.toString.call( settings.color ) === '[object Array]' ) {
                    colorIndex = Math.floor((c.charCodeAt(0) + settings.seed) % settings.color.length);
                    finalColor = settings.color[colorIndex];
                } else {
                    finalColor = settings.color;
                }
            }else{
                colorIndex = Math.floor((c.charCodeAt(0) + settings.seed) % colors.length);
                finalColor = colors[colorIndex];
            }

            var svg = $('<svg></svg>').attr({
                'xmlns': 'http://www.w3.org/2000/svg',
                'pointer-events':'none',
                'width': settings.width,
                'height': settings.height
            }).css({
                'background-color': finalColor,
                'width': settings.width+'px',
                'height': settings.height+'px',
                'border-radius': settings.radius+'px',
                '-moz-border-radius': settings.radius+'px'
            });

            svg.append(cobj);
            // svg.append(group);
            var svgHtml = window.btoa(unescape(encodeURIComponent($('<div>').append(svg.clone()).html())));

            e.attr("src", 'data:image/svg+xml;base64,' + svgHtml);

        });
    };

}(jQuery));
