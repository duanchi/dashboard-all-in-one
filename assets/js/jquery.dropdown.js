(function(b){var a={options:{"optionClass":"","dropdownClass":"","autoinit":false,"callback":false},init:function(c){if(c){c=b.extend(a.options,c)}else{c=a.options}function d(h){if(h.data("dropdownjs")||!h.is("select")){return}var j=h.attr("multiple");var i=b("<div></div>");i.addClass("dropdownjs").addClass(c.dropdownStyle);i.data("select",h);var k=b("<input type=text readonly>");if(b.material){k.data("mdproc",true)}i.append(k);var g=b("<ul></ul>");i.append(g);k.attr("placeholder",h.attr("placeholder"));h.find("option").each(function(){var m=b(this);var l=b("<li></li>");l.addClass(c.optionStyle);if(m.text()){l.text(m.text())}else{l.html("&nbsp;")}l.attr("value",m.val());if(m.attr("selected")){l.attr("selected",true)}g.append(l)});var e=i.find("li");if(!j){var f;if(g.find("[selected]").length){f=g.find("[selected]").last()}else{f=g.find("li").first()}a._select(i,f)}else{a._select(i,g.find("[selected]"))}k.addClass(h[0].className);h.hide().attr("data-dropdownjs",true);h.after(i);if(c.callback){c.callback(i)}e.on("click",function(l){a._select(i,b(this))});e.on("keydown",function(l){if(l.which===27){b(".dropdownjs > ul > li").each(function(){b(this).attr("tabindex",-1)});return k.removeClass("focus").blur()}if(l.which===32){a._select(i,b(this));return false}});e.on("focus",function(){if(h.is(":disabled")){return}k.addClass("focus")});k.on("click focus",function(n){n.stopPropagation();if(h.is(":disabled")){return}b(".dropdownjs > ul > li").each(function(){b(this).attr("tabindex",-1)});b(".dropdownjs > input").not(b(this)).removeClass("focus").blur();e.each(function(){b(this).attr("tabindex",0)});var m={top:b(this).offset().top-b(document).scrollTop(),left:b(this).offset().left-b(document).scrollLeft(),bottom:b(window).height()-(b(this).offset().top-b(document).scrollTop()),right:b(window).width()-(b(this).offset().left-b(document).scrollLeft())};var l=m.bottom;if(l<200&&m.top>m.bottom){l=m.top;g.attr("placement","top-left")}else{g.attr("placement","bottom-left")}b(this).next("ul").css("max-height",l-20);b(this).addClass("focus")});b(document).on("click",function(){b(".dropdownjs > ul > li").each(function(){b(this).attr("tabindex",-1)});k.removeClass("focus")})}if(c.autoinit){b(document).on("DOMNodeInserted",function(g){var f=b(g.target);if(f.is("select")&&f.is(c.autoinit)){d(f)}})}b(this).each(function(){d(b(this))})},select:function(d){var c=b(this).find('[value="'+d+'"]');a._select(b(this),c)},_select:function(h,c){var f=h.data("select"),j=h.find("input");var g=f.attr("multiple");var d=h.find("li");if(g){c.toggleClass("selected");var e=f.find('[value="'+c.attr("value")+'"]');if(e.attr("selected")){e.attr("selected",true)}else{e.attr("selected",false)}var i=[];d.each(function(){if(b(this).hasClass("selected")){i.push(b(this).text())}});j.val(i.join(", "))}if(!g){d.not(c).removeClass("selected");c.addClass("selected");f.val(c.attr("value"));j.val(c.text())}if(b.material){if(j.val().trim()){f.removeClass("empty")}else{f.addClass("empty")}}}};b.fn.dropdown=function(c){if(a[c]){return a[c].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof c==="object"|!c){return a.init.apply(this,arguments)}else{b.error("Method "+c+" does not exists on jQuery.dropdown")}}}})(jQuery);