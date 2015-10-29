/*------------------------------------------------------------------------
# MD Slider - March 18, 2013
# ------------------------------------------------------------------------
# Websites:  http://www.megadrupal.com -  Email: info@megadrupal.com
--------------------------------------------------------------------------*/

(function($) {
	$(function() {
		$("#edit-sls-ldbar").change(function() {
            var selected = $('input:radio:checked', $(this)).val();
            switch (selected) {
                case 'bar':
                    $('.form-item-sls-pie-position').hide();
                    $('.form-item-sls-bar-position').show();
                    $('.form-item-sls-bar-direction').show();
                    break;

                case 'none':
                    $('.form-item-sls-pie-position').hide();
                    $('.form-item-sls-bar-position').hide();
                    $('.form-item-sls-bar-direction').hide();
                    break;
            }
		}).trigger("change");
        $("#edit-sls-full-width").change(function() {
            if ($(this).is(":checked")) {
                $(".form-item-sls-width label").text("Effect zone width");
                $(".form-item-sls-create-bg-imgstyle").hide();
            }
            else {
                $(".form-item-sls-width label").text("Width");
                $(".form-item-sls-create-bg-imgstyle").show();
            }
        }).trigger("change");
        $("#md-slider-configure-form").submit(function() {
            if ($("#edit-sls-full-width").is(":checked")) {
                $("#edit-sls-create-bg-imgstyle").attr("checked", false);
            }
        });
        $('#edit-show-bullet').change(function() {
            if ($(this).is(":checked")) {
                $(".form-item-bullet-position").show();
            }
            else {
                $(".form-item-bullet-position").hide();
            }
            $('#edit-show-thumbnail').trigger("change");
        }).trigger("change");
        $('#edit-show-thumbnail').change(function() {
            if ($(this).is(":checked")) {
                if ($('#edit-show-bullet').is(":checked")) {
                    $(".form-item-thumbnail-position").hide();
                } else {
                    $(".form-item-thumbnail-position").show();
                }
                $(".form-item-sls-thumb-width").show();
                $(".form-item-sls-thumb-height").show();
            }
            else {
                if ($('#edit-show-bullet').is(":checked")) {
                    $(".form-item-thumbnail-position").hide();
                } else {
                    $(".form-item-thumbnail-position").show();
                }
                $(".form-item-thumbnail-position").hide();
                $(".form-item-sls-thumb-width").hide();
                $(".form-item-sls-thumb-height").hide();
            }
        }).trigger("change");

        fakeselect('#edit-thumbnail-position', 'tp', 4);
        fakeselect('#edit-border-style', 'bs', 10);
        fakeselect('#edit-dropshadow-style', 'ds', 6);

        function fakeselect($select, $block, $optionnumber){
            var $block_html = '<div class="'+$block+'wrap clearfix">';
            var $tmpval = 0;
            for ($i = 0; $i <= $optionnumber; $i++) {
                $tmpval = $($select + " option:eq("+$i+")").val();
                if ($tmpval) {
                    $block_html += '<div id="'+$block+$tmpval+'" class="slitem"></div>';
                }
            }
            $block_html += '</div>';

            $($select).parent().append($block_html);

            var $tmpselect = $($select + " option[selected]").val();
            $('#' + $block+$tmpselect).addClass('selected');

            $('.'+$block+'wrap .slitem').each(function() {
                $(this).click(function(){
                    $('.'+$block+'wrap .selected').removeClass('selected');
                    $(this).addClass('selected');
                    $($select + " option[selected]").removeAttr("selected");
                    tmpindex = $(this).attr('id').replace($block, "")
                    $($select + " option[value="+tmpindex+"]").attr("selected", "selected");
                });
            });
            $($select).hide();
        }
	});
})(jQuery);
