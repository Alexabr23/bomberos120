/*------------------------------------------------------------------------
# MD Slider - March 18, 2013
# ------------------------------------------------------------------------
# Websites:  http://www.megadrupal.com -  Email: info@megadrupal.com
--------------------------------------------------------------------------*/

jQuery(function ($) {
    $.fn.mdvideobox = function (opt) {
        $(this).each(function() {
            function init() {
                if($("#md-overlay").length == 0) {
                    var  _overlay = $('<div id="md-overlay" class="md-overlay"></div>').hide().click(closeMe);
                    var _container = $('<div id="md-videocontainer" class="md-videocontainer"><div id="md-video-embed"></div><div class="md-description clearfix"><div class="md-caption"></div><a id="md-closebtn" class="md-closebtn" href="#"></a></div></div>');
                    _container.css({'width': options.initialWidth + 'px', 'height': options.initialHeight + 'px', 'display': 'none'});
                    $("#md-closebtn", _container).click(closeMe);
                    $("body").append(_overlay).append(_container);
                }
                overlay = $("#md-overlay");
                container = $("#md-videocontainer");
                videoembed = $("#md-video-embed", container);
                caption = $(".md-caption", container);
                element.click(activate);
            }

            function closeMe()
            {
                overlay.fadeTo("fast", 0, function(){$(this).css('display','none')});
                videoembed.html('');
                container.hide();
                return false;
            }

            function activate()
            {
                options.click.call();
                overlay.css({'height': $(window).height()+'px'});
                var top = ($(window).height() / 2) - (options.initialHeight / 2);
                var left = ($(window).width() / 2) - (options.initialWidth / 2);
                container.css({top: top, left: left}).show();
                videoembed.css({'background': '#fff url(css/loading.gif) no-repeat center', 'height': options.contentsHeight, 'width': options.contentsWidth});
                overlay.css('display','block').fadeTo("fast", options.defaultOverLayFade);
                caption.html(title);
                videoembed.fadeIn("slow",function() { insert(); });
                return false;
            }

            function insert()
            {
                videoembed.css('background','#fff');
                embed = '<iframe src="' + videoSrc + '" width="' + options.contentsWidth + '" height="' + options.contentsHeight + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
                videoembed.html(embed);
            }

            var options = $.extend({
                    initialWidth: 640,
                    initialHeight: 400,
                    contentsWidth: 640,
                    contentsHeight: 350,
                    defaultOverLayFade: 0.8,
                    click: function() {}
                }, opt);
            var overlay, container, caption, videoembed, embed;
            var element = $(this);
            var videoSrc = element.attr("href");
            var title = element.attr("title");
            //lets start it
            init();
        });
    }
});