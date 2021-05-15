function wteGetFormatedPrice(price,format,numberOfDecimals){return price=price||0,format=format||!0,numberOfDecimals=numberOfDecimals||wte.currency.number_of_decimals,"undefined"!=typeof WTE_CC_convData&&WTE_CC_convData.rate&&(price*=parseFloat(WTE_CC_convData.rate)),0==format?price:(price=(price=(price=parseFloat(price)).toFixed(numberOfDecimals)).replace(".00",""),price=addCommas(price))}function wteGetFormatedPriceWithCurrencyCode(price,code,format,numberOfDecimals){return(code=code||wte.currency.code)+" "+wteGetFormatedPrice(price,format,numberOfDecimals)}function wteGetFormatedPriceWithCurrencyCodeSymbol(price,code,symbol,format,numberOfDecimals){return code=code||wte.currency.code,symbol=symbol||wte.currency.symbol,'<span class="wpte-currency-code">'+("code"===wte_currency_vars.code_or_symbol?code:symbol)+'</span> <span class="wpte-price">'+wteGetFormatedPrice(price,format,numberOfDecimals)+"</span>"}function wteGetFormatedPriceWithCurrencySymbol(price,symbol,format,numberOfDecimals){return(symbol=symbol||wte.currency.symbol)+wteGetFormatedPrice(price,format,numberOfDecimals)}function calculateGrandTotal(){return parseFloat(window.wte.trip.travellersCost)+parseFloat(window.wte.trip.extraServicesCost)}jQuery(document).ready(function($){var currentTab=$(".wpte-bf-step.active"),currentTabContent=$(".wpte-bf-step-content.active"),isDateSelected=!1;function applyFixStratingDatePrice(date,cost){if(""==window.wte_fix_date.enabled)return cost;try{for(var costCount=wte_fix_date.cost.length,i=0;i<costCount;i++){if(wte_fix_date.use_multi_prices)return cost;var dateKey=date.split("-").map(function(d){return+d}).join("-"),tempCost=wte_fix_date.cost[i][dateKey];if(void 0!==tempCost)return tempCost}}catch(err){return cost}return cost}function populateHTML(){if($("body").hasClass("single-trip")){var travellersCost=function(){var numberFields=$('.wpte-bf-content-travellers .wpte-bf-number-field > input[type="text"]'),total=0;return $.each(numberFields,function(index,numberField){var cost=calculateSingleTravellerTypeCost(numberField);total+=cost}),total}();window.wte.trip.travellersCost=travellersCost;var grandTotal=calculateGrandTotal(),formattedGrandTotal=(wteGetFormatedPriceWithCurrencyCodeSymbol(travellersCost,wte.currency.code,wte.currency.symbol),wteGetFormatedPrice(grandTotal)),formattedGrandTotalWithCodeSymbol=wteGetFormatedPriceWithCurrencyCodeSymbol(grandTotal,wte.currency.code,wte.currency.symbol);wteGetFormatedPriceWithCurrencyCodeSymbol(wte.trip.price,wte.currency.code);window.wteCartFields["trip-cost"]=grandTotal,$(".wpte-bf-total-price > .wpte-price").html(formattedGrandTotal);var numberFields=$('.wpte-bf-content-travellers .wpte-bf-number-field > input[type="text"]'),html="";$.each(numberFields,function(index,numberField){var count=$(numberField).val(),cartField=$(numberField).data("cartField"),type=$(numberField).data("type"),costField=$(numberField).data("costField"),cost=calculateSingleTravellerTypeCost(numberField),formattedCost=wteGetFormatedPriceWithCurrencyCodeSymbol(cost,wte.currency.code,wte.currency.symbol),pricing_type=$(numberField).data("pricing-type")||"per-person";window.wteCartFields[cartField]=count,window.wteCartFields[costField]=cost,count>1&&("group"==type||"per-group"===pricing_type)&&(count=1),-1!==$.inArray(type,Object.keys(wte.pax_labels))&&(type=wte.pax_labels[type]);var capitalizeType=type.charAt(0).toUpperCase()+type.substring(1);count>1&&"traveler"==type?capitalizeType="Travelers":count>1&&"child"==type?capitalizeType="Children":count>1&&"Adult"==type||"adult"==type?capitalizeType="Adults":count>1&&("group"==type||"per-group"===pricing_type)&&(count=1);var price=cost/count;if(!isFinite(price)){""==(price=$(numberField).data("cost"))&&(price=0);try{price=applyFixStratingDatePrice(window.wteCartFields["trip-date"],price)}catch(err){}}var formattedPriceWithSymbol=wteGetFormatedPriceWithCurrencySymbol(price=(price=parseFloat(price)).toFixed(2),wte.currency.symbol),priceHtml=(wteGetFormatedPrice(price),wteGetFormatedPriceWithCurrencyCodeSymbol(price,wte.currency.code,wte.currency.symbol));jQuery(this).parents(".wpte-bf-traveler-block").find(".wpte-bf-price ins").html(priceHtml),0!=cost&&(html+=`\n                <tr>\n                    <td>${count} x ${capitalizeType} <span class="wpte-bf-info">(${formattedPriceWithSymbol}/${type})<span></span></td>\n                    <td>${formattedCost}</td>\n                </tr>\n            `)}),$(".wpte-bf-travellers-price-table tbody").html(html),$(".wte-bf-price-detail .wpte-bf-total").html(`\n            ${wte.totaltxt} <b>${formattedGrandTotalWithCodeSymbol}</b>\n        `)}}function calculateSingleTravellerTypeCost(numberField){var count=$(numberField).val(),price=$(numberField).data("cost");(isNaN(price)||""==price)&&(price=0);try{price=parseFloat(applyFixStratingDatePrice(window.wteCartFields["trip-date"],price))}catch(err){}var type=$(numberField).data("type"),pricing_type=$(numberField).data("pricing-type")||"per-person";if(("group"==type||"per-group"==pricing_type)&&count>0)cost=parseFloat(price);else var cost=parseInt(count)*parseFloat(price);try{cost=parseFloat(applyGroupDiscount(count,type,cost))}catch(err){}return cost}window.wteCartFields={action:"wte_add_trip_to_cart",nonce:$("#nonce").val(),"trip-id":wte.trip.id,travelers:1,"trip-cost":wte.trip.price},toastr.options.positionClass="toast-bottom-full-width",toastr.options.timeOut="10000",$(".wpte-bf-toggle-wrap .wpte-bf-toggle-title").on("click",function(event){event.preventDefault(),$(this).parents(".wpte-bf-toggle-wrap").toggleClass("active"),$(this).siblings(".wpte-bf-toggle-content").fadeToggle("slow",function(){$(this).is(":visible")?($(this).siblings(".wpte-bf-toggle-title").find(".wtebf-toggle-title").hide(),$(this).siblings(".wpte-bf-toggle-title").find(".wtebf-toggle-title-active").show()):($(this).siblings(".wpte-bf-toggle-title").find(".wtebf-toggle-title").show(),$(this).siblings(".wpte-bf-toggle-title").find(".wtebf-toggle-title-active").hide())})}),jQuery(".wpte-bf-content-travellers .wpte-bf-number-field").each(function(){var spinner=jQuery(this),input=spinner.find('input[type="text"]'),btnUp=spinner.find(".wpte-bf-plus"),btnDown=spinner.find(".wpte-bf-minus");input.attr("min"),input.attr("max");btnUp.on("click",function(event){event.preventDefault();var input=$(this).parent().find("input"),max=$(input).attr("max"),value=parseFloat(input.val());++value>=max&&(value=max),spinner.find("input").val(value),spinner.find("input").trigger("change");var type=$(this).parents(".wpte-bf-number-field").find('input[type="text"]').data("cartField");window.wteCartFields[type]=value,populateHTML()}),btnDown.on("click",function(event){event.preventDefault();var input=$(this).parent().find("input"),min=$(input).attr("min"),value=parseFloat(input.val());--value<=min&&(value=min),spinner.find("input").val(value),spinner.find("input").trigger("change");var type=$(this).parents(".wpte-bf-number-field").find('input[type="text"]').data("cartField");window.wteCartFields[type]=value,populateHTML()})});var availableDates=[];try{for(var availableDatesCount=wte_fix_date.cost.length,i=0;i<availableDatesCount;i++)availableDates.push(Object.keys(wte_fix_date.cost[i])[0])}catch(err){}function convertToUTC(date){return new Date(Date.UTC(date.getFullYear(),date.getMonth(),date.getDate(),0,0,0,0))}var allrruleDates={};function getDates(date){if(wte.booking_cutoff.enable&&parseInt(wte.booking_cutoff.cutoff)>0){var today=convertToUTC(new Date),cutoffTime=60*parseInt(wte.booking_cutoff.cutoff)*60*1e3;if(cutoffTime="days"===wte.booking_cutoff.unit?24*cutoffTime:cutoffTime,bookableDate=new Date(today.getTime()+cutoffTime),convertToUTC(date).getTime()<convertToUTC(bookableDate).getTime())return[]}if(!wte_fix_date.departureDates)return availableDates.map(function(ad){return convertToUTC(new Date(ad))});var departureDates=wte_fix_date.departureDates,indexes=departureDates.sdate?Object.keys(departureDates.sdate):[],rruleset=new rrule.RRuleSet;return indexes.forEach(function(i){var _rruleset=new rrule.RRuleSet,recurring=void 0!==departureDates&&void 0!==departureDates[i]?departureDates[i].recurring:null;if(recurring&&"true"==recurring.enable){var rule={},until=new Date(recurring.until);if(new Date(Date.UTC(date.getFullYear(),date.getMonth(),date.getDate(),0,0,0,0)).getTime()>new Date(Date.UTC(until.getFullYear(),until.getMonth(),until.getDate(),0,0,0,0)).getTime())return;rule.freq=rrule.RRule[recurring.type];var startDate=convertToUTC(new Date(departureDates.sdate[i]));rule.dtstart=startDate,recurring.months&&"MONTHLY"==recurring.type&&(rule.bymonth=Object.values(recurring.months).map(function(m){return+m}),rule.dtstart.setDate(startDate.getDate())),recurring.week_days&&"WEEKLY"==recurring.type&&(rule.byweekday=Object.values(recurring.week_days).map(function(wd){return rrule.RRule[wd]})),rule.count=+recurring.limit||10,rruleset.rrule(new rrule.RRule(rule)),_rruleset.rrule(new rrule.RRule(rule)),_rruleset.all().forEach(function(rs){if(!allrruleDates[rs.getTime()]){allrruleDates[rs.getTime()]=!0;var dateStr=rs.getFullYear()+"-"+(+rs.getMonth()+1)+"-"+rs.getDate();wte_fix_date.cost.push({[dateStr]:departureDates.cost[i]});var bookedSeats=wte_fix_date.bookedSeats[rs.getTime()]&&wte_fix_date.bookedSeats[rs.getTime()].booked||0,seatsLeft=+departureDates.seats_available[i]-+bookedSeats;wte_fix_date.seats_available.push({[dateStr]:seatsLeft}),wte_fix_date.fdd_ids.push({[dateStr]:rs.getTime()})}})}else{var rs=new Date(departureDates.sdate[i]);if(wte.booking_cutoff.enable&&parseInt(wte.booking_cutoff.cutoff)>0){var today=new Date;today=new Date(Date.UTC(today.getFullYear(),today.getMonth(),today.getDate(),0,0,0,0));var cutoffTime=60*parseInt(wte.booking_cutoff.cutoff)*60*1e3;cutoffTime="days"===wte.booking_cutoff.unit?24*cutoffTime:cutoffTime,bookableDate=new Date(today.getTime()+cutoffTime),convertToUTC(rs).getTime()>convertToUTC(bookableDate).getTime()&&rruleset.rdate(rs)}else convertToUTC(rs).getTime()>convertToUTC(convertToUTC(new Date)).getTime()&&rruleset.rdate(rs);if(allrruleDates[rs.getTime()])return;allrruleDates[rs.getTime()]=!0;var dateStr=rs.getFullYear()+"-"+(+rs.getMonth()+1)+"-"+rs.getDate();wte_fix_date.cost.push({[dateStr]:departureDates.cost[i]});var bookedSeats=wte_fix_date.bookedSeats[rs.getTime()]&&wte_fix_date.bookedSeats[rs.getTime()].booked||0,seatsLeft=+departureDates.seats_available[i]-+bookedSeats;wte_fix_date.seats_available.push({[dateStr]:seatsLeft}),wte_fix_date.fdd_ids.push({[dateStr]:rs.getTime()})}}),rruleset.all()}function checkAvailableDates(date){var dmy=$.datepicker.formatDate($.datepicker.ISO_8601,date),today=new Date;today=new Date(Date.UTC(today.getFullYear(),today.getMonth(),today.getDate(),0,0,0,0));var bookableDate=null;if(wte.booking_cutoff.enable&&parseInt(wte.booking_cutoff.cutoff)>0){var cutoffTime=60*parseInt(wte.booking_cutoff.cutoff)*60*1e3;cutoffTime="days"===wte.booking_cutoff.unit?24*cutoffTime:cutoffTime,bookableDate=new Date(today.getTime()+cutoffTime),bookableDate=new Date(Date.UTC(bookableDate.getFullYear(),bookableDate.getMonth(),bookableDate.getDate(),0,0,0,0))}else bookableDate=new Date(Date.UTC(today.getFullYear(),today.getMonth(),today.getDate(),0,0,0,0));if(!wte_fix_date||wte_fix_date.departureDates&&!wte_fix_date.departureDates.cost)return convertToUTC(date)>=bookableDate?[!0,"","Available"]:[!1,"","Unavailable"];var validDates=getDates(date).filter(function(vd){return convertToUTC(vd)>=bookableDate}).map(function(d){return d.getTime()});if(validDates.length<=0&&convertToUTC(date)>=bookableDate)return[!0,"","Available"];for(var fixDatesCount=wte_fix_date.seats_available.length,index=0;index<fixDatesCount;index++)if("0"==wte_fix_date.seats_available[index][dmy]||""==wte_fix_date.seats_available[index][dmy])return[!1,"","Unavailable"];return $recurredDate=validDates.find(function(d){return new Date(Date.UTC(date.getFullYear(),date.getMonth(),date.getDate(),0,0,0,0)).getTime()===d}),$recurredDate?[!0,"","Available"]:[!1,"","Unavailable"]}function changeTab(tab){if(!isDateSelected)return!1;currentTab=tab;var tabs=$(".wpte-bf-step"),index=$(tabs).index(tab);$(currentTabContent).fadeOut("slow",function(){$(currentTab).addClass("active"),$(currentTabContent).removeClass("active"),currentTabContent=$(".wpte-bf-step-content")[index],$(currentTabContent).css("display",""),$(currentTabContent).css("opacity",""),$(currentTabContent).addClass("active"),0===index?$(".wte-bf-price-detail").css("display","none"):$(".wte-bf-price-detail").css("display",""),index+1>=tabs.length?$('.wte-bf-price-detail .wpte-bf-btn-wrap input[type="button"]').val(wte.bookNow):$('.wte-bf-price-detail .wpte-bf-btn-wrap input[type="button"]').val(wte_strings.bookingContinue||"Continue")})}function getNextTab(tab){var tabs=$(".wpte-bf-step"),index=$(tabs).index(tab);return!(index+1>=tabs.length)&&tabs[index+1]}$(".wpte-bf-datepicker").datepicker({minDate:0,beforeShowDay:"undefined"!=typeof wte_fix_date&&wte_fix_date.departureDates&&"1"==wte_fix_date.enabled?checkAvailableDates:0==availableDates.length||"undefined"!=typeof wte_fix_date&&""==window.wte_fix_date.enabled?function(date){if(wte.booking_cutoff.enable&&parseInt(wte.booking_cutoff.cutoff)>0){var today=new Date,calendarDate=new Date(date.getTime()+864e5),cutoffTime=60*parseInt(wte.booking_cutoff.cutoff)*60*1e3;if(cutoffTime="days"===wte.booking_cutoff.unit?24*cutoffTime:cutoffTime,new Date(today.getTime()+cutoffTime).getTime()>calendarDate.getTime())return[!1,"","Unavailable"]}return[!0,"","Available"]}:checkAvailableDates,dateFormat:"yy-mm-dd",onSelect:function(dateText,inst){isDateSelected=!0;var nextTab=getNextTab();if(nextTab&&($(".wpte-bf-step").removeClass("active"),$(currentTab).removeClass("active"),changeTab(nextTab)),window.wteCartFields["trip-date"]!=dateText){window.wteCartFields["trip-date"]=dateText;try{if(""==window.wte_fix_date.enabled)return}catch(err){}try{for(var seatsAvailableLength=wte_fix_date.seats_available.length,i=0;i<seatsAvailableLength;i++){var seatsAvailable=wte_fix_date.seats_available[i][dateText];wte_fix_date.cost[i][dateText];if(void 0!==seatsAvailable){var numberFields=$(".wpte-bf-content-travellers").find('input[type="text"]');$.each(numberFields,function(index,numberField){var cartField=$(numberField).data("cartField"),defaultCount="travelers"==cartField||"pricing_options[adult][pax]"==cartField?1:0;$(numberField).val(defaultCount),$(numberField).attr("max",seatsAvailable),$(".wpte-bf-content-travellers").data("maxtravellers",seatsAvailable)})}}}catch(err){}populateHTML()}}}),$('.wpte-bf-btn-wrap > input[type="button"]').on("click",function(event){event.preventDefault();var nextTab=getNextTab(currentTab);if(nextTab){if("wpte-bf-step-travellers"==currentTab.dataset.stepName||"travellers"==currentTab.innerText.toLowerCase()){var total_pax=0;$(".wpte-bf-content-travellers").find("input").each(function(i,n){total_pax+=parseInt($(n).val(),10)});var MIN_PAX=parseInt($(".wpte-bf-content-travellers").data("mintravellers")),MAX_PAX=parseInt($(".wpte-bf-content-travellers").data("maxtravellers"));if(!(total_pax>=MIN_PAX&&total_pax<=MAX_PAX)){var finalstr=wte_strings.pax_validation.replace("%2$s",MIN_PAX).replace("%3$s",MAX_PAX).replace("%1$s",total_pax);return toastr.error(finalstr),!1}$(".wpte-bf-step").removeClass("active"),$(currentTab).removeClass("active"),changeTab(nextTab)}}else $.ajax({type:"POST",url:WTEAjaxData.ajaxurl,data:window.wteCartFields,success:function(data){var i;if(data.success)$("#price-loading").fadeOut(500),location.href=wp_travel_engine.CheckoutURL;else for(i=0;i<data.data.length;i++)toastr.error(data.data[i])}})}),$("#wpte-booking-form").on("click",".wpte-bf-step",function(event){if(event.preventDefault(),!isDateSelected)return!1;$(".wpte-bf-step").removeClass("active"),$(this).removeClass("active"),changeTab(this)}),populateHTML()});
jQuery(document).ready(function($){$(".disabled_______book-submit").on("click",function(event){event.preventDefault();var parent="#"+$(this).data("formid"),cart_fields={};$(parent+" input, "+parent+" select").each(function(index){if(filterby=$(this).attr("name"),filterby_val=$(this).val(),1==$(this).data("multiple")){if(void 0===cart_fields[filterby]&&(cart_fields[filterby]=[]),"checkbox"==$(this).attr("type")&&$(this).is(":checked")&&cart_fields[filterby].push(filterby_val),1==$(this).data("dependent")){var pare=$(this).data("parent");$("#"+pare).is(":checked")&&cart_fields[filterby].push(filterby_val)}}else cart_fields[filterby]=filterby_val}),cart_fields.action="wte_add_trip_to_cart",cart_fields.tid=cart_fields["trip-id"],$.ajax({type:"POST",url:wp_travel_engine.ajaxurl,data:cart_fields,beforeSend:function(){$("#price-loading").fadeIn(500)},success:function(data){$("#price-loading").fadeOut(500),location.href=wp_travel_engine.CheckoutURL}})})});
!function(){var allInfos=document.querySelectorAll(".wpte-checkout-payment-info"),paymentMethodsRadio=document.querySelectorAll("[name=wpte_checkout_paymnet_method]");paymentMethodsRadio&&paymentMethodsRadio.forEach(function(el){el.checked&&el.parentElement.classList.add("wpte-active-payment-method")&&el.parentElement.querySelector(".wpte-checkout-payment-info").removeAttribute("style"),el.addEventListener("change",function(e){allInfos&&allInfos.forEach(function(el){el.style.display="none",el.parentElement.classList.remove("wpte-active-payment-method")}),e.target.parentElement.classList.add("wpte-active-payment-method");var infoEl=e.target.parentElement.querySelector(".wpte-checkout-payment-info");infoEl&&infoEl.removeAttribute("style")})})}();
jQuery(document).ready(function($){$(".wp-travel-engine-datetime").datepicker({maxDate:0,changeMonth:!0,changeYear:!0,dateFormat:"yy-mm-dd",yearRange:"-100:+0"})});
jQuery(document).ready(function($){$(".trip-price").stick_in_parent()});
!function(window,document,$,undefined){function wte_rating_star_initializer_for_templates(){$(document).find(".trip-review-stars").length&&$(document).find(".trip-review-stars").each(function(){var rating_value=$(this).data("rating-value"),starSvgIcon=""!==(starSvgIcon=$(this).data("icon-type"))?starSvgIcon:"";$(this).rateYo({rating:rating_value,starSvg:starSvgIcon})})}jQuery(document).ready(function($){$("body").on("click",".btn-loadmore",function(e){e.preventDefault();var button=$(this),current_page=button.attr("data-current-page"),max_page=button.attr("data-max-page"),data={action:"wpte_ajax_load_more",query:button.attr("data-query-vars"),page:current_page,nonce:beloadmore.nonce};$.ajax({url:beloadmore.url,data:data,type:"POST",beforeSend:function(xhr){$("#loader").fadeIn(500)},success:function(response){button.before(response),current_page++,button.attr("data-current-page",current_page),current_page==max_page&&button.remove()},complete:function(){$("#loader").fadeOut(500),wte_rating_star_initializer_for_templates()}})}),$("body").on("click",".load-destination",function(e){e.preventDefault();var button=$(this),current_page=button.attr("data-current-page"),max_page=button.attr("data-max-page"),data={action:"wpte_ajax_load_more_destination",query:button.attr("data-query-vars"),page:current_page,nonce:beloadmore.nonce};$.ajax({url:beloadmore.url,data:data,type:"POST",beforeSend:function(xhr){$("#loader").fadeIn(500)},success:function(response){button.before(response),current_page++,button.attr("data-current-page",current_page),current_page==max_page&&button.remove()},complete:function(){$("#loader").fadeOut(500),wte_rating_star_initializer_for_templates()}})})})}(window,document,jQuery);
jQuery(document).ready(function($){$("form.wpte-lrf").parsley(),$("a#wpte-show-login-form").on("click",function(e){e.preventDefault(),$(".wpte-lrf-wrap.wpte-register").slideUp("slow"),$(".wpte-lrf-wrap.wpte-login").slideDown("slow")}),$("a#wpte-show-register-form").on("click",function(e){e.preventDefault(),$(".wpte-lrf-wrap.wpte-register").slideDown("slow"),$(".wpte-lrf-wrap.wpte-login").slideUp("slow")})}),jQuery(document).ready(function($){$(".wpte-dashboard .wpte-lrf-userprogile > a").on("click",function(e){e.stopPropagation(),$(this).parent(".wpte-lrf-userprogile").toggleClass("active"),$(this).siblings(".lrf-userprofile-popup").stop(!0,!1,!0).slideToggle()}),$(".wpte-dashboard .wpte-lrf-userprogile .lrf-userprofile-popup").on("click",function(e){e.stopPropagation()}),$("body, html").on("click",function(){$(".wpte-lrf-userprogile").removeClass("active"),$(".lrf-userprofile-popup").slideUp()}),$(".wpte-dashboard .wpte-lrf-sidebar .wpte-lrf-tab").on("click",function(){var lrfTabClass=$(this).attr("class").split(" ")[1];$(".wpte-lrf-tab").removeClass("active"),$(this).addClass("active"),$(".wpte-dashboard .wpte-lrf-content-area .wpte-lrf-tab-content").removeClass("active"),$("."+lrfTabClass+"-content").addClass("active")}),$(".lrf-toggle .lrf-toggle-box").on("click",function(){$(this).toggleClass("active"),$(this).parents(".lrf-toggle").siblings(".wpte-lrf-popup").stop(!0,!1,!0).slideToggle()}),$(window).on("keyup",function(e){"Escape"==e.key&&($(".wpte-lrf-userprogile").removeClass("active"),$(".lrf-userprofile-popup").slideUp(),$(this).removeClass("active"),$(".wpte-lrf-popup").slideUp())}),$(".wte-dbrd-tab").on("click",function(e){e.preventDefault();var tab_name=$(this).data("tab");$(".wpte-lrf-sidebar .wpte-lrf-tab").removeClass("active"),$(".wpte-lrf-sidebar .lrf-"+tab_name).addClass("active"),$(".wpte-lrf-main .wpte-lrf-tab-content").removeClass("active"),$(".wpte-lrf-main .lrf-"+tab_name).addClass("active")}),$(".wpte-magnific-popup").magnificPopup({type:"inline",midClick:!0})});
function addCommas(nStr){for(var x=(nStr+="").split("."),x1=x[0],x2=x.length>1?"."+x[1]:"",rgx=/(\d+)(\d{3})/;rgx.test(x1);)x1=x1.replace(rgx,"$1"+wte.currency.thousands_separator+"$2");return x1+x2}jQuery(document).ready(function($){wte.single_showtabs||($(".tab-inner-wrapper .tab-anchor-wrapper:first-child").addClass("nav-tab-active"),$(".nb-tab-trigger").on("click",function(){$(".nb-tab-trigger").removeClass("nav-tab-active"),$(".nb-tab-trigger").parent().parent().removeClass("nav-tab-active"),$(this).addClass("nav-tab-active"),$(this).parent().parent().addClass("nav-tab-active");var configuration=$(this).data("configuration");$(".nb-configurations").hide(),$(".nb-"+configuration+"-configurations").show()}),$(".tab_content").hide(),$(".tab_content:first").show(),$("ul.tabs li").on("click",function(){$(".tab_content").hide();var activeTab=$(this).attr("rel");$("#"+activeTab).fadeIn(),$("ul.tabs li").removeClass("active"),$(this).addClass("active"),$(".tab_drawer_heading").removeClass("d_active"),$(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active")}),$(".tab_drawer_heading").on("click",function(){$(".tab_content").hide();var d_activeTab=$(this).attr("rel");$("#"+d_activeTab).fadeIn(),$(".tab_drawer_heading").removeClass("d_active"),$(this).addClass("d_active"),$("ul.tabs li").removeClass("active"),$("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active")}),$("ul.tabs li").last().addClass("tab_last")),$(function(){var $radios=$(".payment-check");!1===$radios.is(":checked")&&$radios.is(":visible")&&($radios.filter("[value=paypal]").prop("checked",!0),$(".stripe-button").removeClass("active"),$(".stripe-button-el").hide(),$("#wp-travel-engine-order-form").attr("action",WP_OBJ.link.paypal_link))}),$("body").on("click",".paypal-form",function(e){var url=$(".stripe_checkout_app").attr("src");$(".stripe_checkout_app").attr("src",""),$(".stripe_checkout_app").attr("src",url),$("#wp-travel-engine-order-form").submit()}),$("body").on("click",".payment-check",function(e){$(this).is(":checked")&&("stripe"==$(this).attr("value")&&($("#wp-travel-engine-order-form").attr("action",WP_OBJ.link.form_link),$(".paypal-form").hide(),$(".stripe-form").fadeIn("slow"),$(".stripe-button").addClass("active"),$(".stripe-button-el").show()),"paypal"==$(this).attr("value")&&($("#wp-travel-engine-order-form").attr("action",WP_OBJ.link.paypal_link),$(".stripe-button").removeClass("active"),$(".stripe-button-el").hide(),$(".paypal-form").fadeIn("slow")))}),$("body").on("click",".check-availability",function(e){e.preventDefault(),$(".date-time-wrapper").fadeIn("slow")}),$("body").on("click",".check-availability",function(e){e.preventDefault(),$(".wp-travel-engine-price-datetime").focus()}),$("body").on("click",".wp-travel-engine-cart",function(e){e.preventDefault(),trip_id=$(this).attr("data-id"),nonce=$(this).attr("data-nonce"),jQuery.ajax({type:"post",dataType:"json",url:WTEAjaxData.ajaxurl,data:{action:"wp_add_trip_cart",trip_id:trip_id,nonce:nonce},success:function(response){"already"===response.type?($(".wp-cart-message-"+trip_id).css("color","orange"),$(".wp-cart-message-"+trip_id).html(response.message).fadeIn("slow").delay(3e3).fadeOut("slow")):"success"===response.type?($(".wp-cart-message-"+trip_id).css("color","green"),$(".wp-cart-message-"+trip_id).html(response.message).fadeIn("slow").delay(3e3).fadeOut("slow")):($(".wp-cart-message-"+trip_id).css("color","red"),$(".wp-cart-message-"+trip_id).html(response.message).fadeIn("slow").delay(3e3).fadeOut("slow")),$(".wte-update-cart-button-wrapper:visible").length<1&&$(".wte-update-cart-button-wrapper").css("display","block")}})}),$("#price-loading").fadeOut(2e3),$(".price-holder").fadeIn(2e3),$("body").on("change",".travelers-number",function(e){$val=$(this).val(),$new_val=$(this).parent().parent().siblings(".trip-price-holder").children(".cart-price-holder").text().replace(/,/g,""),$total=$val*$new_val,$total=addCommas($total),$(this).parent().parent().siblings(".cart-trip-total-price").children(".cart-trip-total-price-holder").text($total),$sum=0,$(".cart-trip-total-price-holder").each(function(index){$tcost=$(this).text().replace(/,/g,""),$sum=parseInt($sum)+parseInt($tcost)}),$sum=addCommas($sum),$(".total-trip-price").text($sum),$value=0,$val1=parseInt($("span.travelers-number").text()),$("input.travelers-number").each(function(index){""!==$(this).val()&&($value=parseInt($value)+parseInt($(this).val()))}),$travelers=parseInt($value)+parseInt($val1),$(".total-trip-travelers").text($travelers)}),$("#wp-travel-engine-cart-form").on("submit",function(e){e.preventDefault();var data2=$("#wp-travel-engine-cart-form").serialize(),nonce=$("#update_cart_action_nonce").val();jQuery.ajax({type:"post",url:WTEAjaxData.ajaxurl,data:{action:"wte_update_cart",nonce:nonce,data2:data2},success:function(){$(".wte-update-cart-msg").text(WPMSG_OBJ.ajax.success),$(".wte-update-cart-msg").css("color","green").fadeIn("slow").delay(3e3).fadeOut("slow")}})}),$("#wte_payment_options").on("change",function(e){var val=$("#wte_payment_options :selected").val();e.preventDefault(),""!=val&&$("#price-loader").fadeIn("slow").delay("3000").fadeOut("3000")}),$(".accordion-tabs-toggle").next().hasClass("show"),$(".accordion-tabs-toggle").next().removeClass("show"),$(".accordion-tabs-toggle").next().slideUp(350),$(document).on("click",".faq-row .accordion-tabs-toggle",function(){var $this=$(this);$this.siblings(".faq-content").toggleClass("show"),$this.toggleClass("active"),$this.siblings(".faq-content").slideToggle(350),$this.find(".dashicons.dashicons-arrow-down.custom-toggle-tabs").toggleClass("open")}),$(document).on("click",".expand-all-faq",function(e){e.preventDefault(),$(this).children("svg").hasClass("fa-toggle-off")&&$(this).children("svg").toggleClass("fa-toggle-on"),$(this).children("svg").hasClass("fa-toggle-on")&&$(this).children("svg").toggleClass("fa-toggle-off"),$(".faq-row .accordion-tabs-toggle").toggleClass("active"),$(".faq-row").children(".faq-content").toggleClass("show"),$(".faq-row").children(".faq-content").slideToggle(350),$(".faq-row").find(".dashicons.dashicons-arrow-down.custom-toggle-tabs").toggleClass("open")}),$('form[name="wte_enquiry_contact_form"]').on("submit",function(e){if(e.preventDefault(),$("#wte_enquiry_contact_form").parsley().isValid()){$("#enquiry_submit_button").prop("disabled",!0);var redirect=jQuery("#redirect-url").val(),EnquiryDetails=new FormData(this);$.ajax({dataType:"json",type:"post",processData:!1,contentType:!1,url:WTEAjaxData.ajaxurl,data:EnquiryDetails,success:function(response){"success"===response.type?jQuery(".success-msg").html(response.message).fadeIn("slow").delay("3000").fadeOut("3000",function(){window.location.href=redirect}):"error"===response.type?(jQuery("#enquiry_email").css("border","1px solid red"),jQuery(".failed-msg").html(response.message).fadeIn("slow").delay("3000").fadeOut("slow",function(){jQuery("#enquiry_email").css("border","1px solid #d1d1d1"),jQuery("#enquiry_submit_button").prop("disabled",!1)})):jQuery(".failed-msg").html(response.message).fadeIn("slow").delay("3000").fadeOut("slow",function(){$("#enquiry_submit_button").prop("disabled",!1)})}})}}),$("#wp-travel-engine-order-form").on("submit",function(e){if("Himalayan-Bank"!=$("#wte_payment_options :selected").val()){var form_obj=$(this),other_amt=form_obj.find("input[name=amount]").val();!isNaN(other_amt)&&other_amt.length>0&&(options_val=other_amt,$("<input>").attr({type:"hidden",id:"amount",name:"amount",value:options_val}).appendTo(form_obj))}}),$("#wte_payment_options").on("change",function(e){var val=$("#wte_payment_options :selected").val();if(e.preventDefault(),""==val||"Test Payment"==val)return $("#wte-checkout-payment-fields").html(""),$("#wp-travel-engine-order-form").attr("action",Url.normalurl),$(".wp-travel-engine-billing-details-wrapper").html(response.data),$(".stripe-button:visible").remove(),$(".stripe-button-el").remove(),$(".wp-travel-engine-submit").show(),void $(".wte-authorize-net-wrap").remove();"PayPal"==val&&jQuery.ajax({type:"post",url:WTEAjaxData.ajaxurl,data:{action:"wte_payment_gateway",val:val},success:function(response){"PayPal"==val&&($("#wp-travel-engine-order-form").attr("action",Url.paypalurl),$(".wp-travel-engine-billing-details-wrapper").html(response.data),$("#wte-checkout-payment-fields").html(response.data),$(".stripe-button:visible").remove(),$(".stripe-button-el").remove(),$(".wp-travel-engine-submit").show(),$(".wte-authorize-net-wrap").remove()),"Test Payment"==val&&($("#wp-travel-engine-order-form").attr("action",Url.normalurl),$(".wp-travel-engine-billing-details-wrapper").html(response.data),$(".stripe-button:visible").remove(),$(".stripe-button-el").remove(),$(".wp-travel-engine-submit").show(),$(".wte-authorize-net-wrap").remove())}})}),$("body").on("keyup","#cost_includes",function(e){$("#include-result").val($("#cost_includes").val()),$("#include-result").val("<li>"+$("#include-result").val().replace(/\n/g,"</li><li>")+"</li>")}),$("body").on("keyup","#cost_excludes",function(e){$("#exclude-result").val($("#cost_excludes").val()),$("#exclude-result").val("<li>"+$("#exclude-result").val().replace(/\n/g,"</li><li>")+"</li>")}),$("body").on("keyup",".itinerary-content",function(e){$(this).siblings(".itinerary-content-inner").val($(this).val()),$(this).siblings(".itinerary-content-inner").val("<p>"+$(this).val().replace(/\n/g,"</p><p>")+"</p>")}),$(document).on("click",".expand-all-itinerary",function(e){e.preventDefault(),$(this).children("i").toggleClass("fa-toggle-on"),$(".itinerary-row").children(".itinerary-content").toggleClass("show"),$(".itinerary-row").children(".itinerary-content").slideToggle(350),$(".itinerary-row").find(".dashicons.dashicons-arrow-down.custom-toggle-tabs").toggleClass("rotator")}),$(document).on("click",".less-no",function(e){$val=$(this).next("input").val(),0!=$val&&($val=parseInt($val)-1,$(this).next("input").val($val))}),$(document).on("click",".more-no",function(e){if($val=$(this).prev("input").val(),""==$val)return $val=1,void $(this).prev("input").val($val);$val=parseInt($val)+1,$(this).prev("input").val($val)}),$("#wp-travel-engine-new-checkout-form").parsley(),$("input[name=wp_travel_engine_payment_mode]").length>0&&$(document).on("change","input[name=wp_travel_engine_payment_mode]",function(){var payment_mode=$("input[name=wp_travel_engine_payment_mode]:checked").val(),partial_payment_table=$(".wpte-bf-book-summary .wpte-bf-extra-info-table"),amount="partial"==payment_mode?wte.payments.total_partial:wte.payments.total;amount=wteGetFormatedPriceWithCurrencyCodeSymbol(amount);"partial"==payment_mode?partial_payment_table.show():partial_payment_table.hide(),$(".wpte-bf-book-summary .wpte-bf-total-price .wpte-price").html(amount)}),$("#wte-send-enquiry-message").on("click",function(e){e.preventDefault(),document.getElementById("wte_enquiry_contact_form").scrollIntoView({behavior:"smooth",block:"center"})}),$("#wte_enquiry_contact_form").parsley(),$(".wte-ordering").on("change","select.orderby",function(){$(this).closest("form").submit()}),$(window).on("load",function(){$(window).width()<1025?$(".single-trip .wte_enquiry_contact_form-wrap").insertAfter(".single-trip .widget-area .wpte-bf-outer"):$(".single-trip .widget-area .wte_enquiry_contact_form-wrap").insertAfter(".single-trip .site-main")});var wteSelec2Selectors=document.querySelectorAll(".wpte-enhanced-select");wteSelec2Selectors&&wteSelec2Selectors.forEach(function(el){$(el).select2({closeOnSelect:!1,allowClear:!1})})}),function(){var toggleContainers=document.querySelectorAll(".wpte-bf-toggle-wrap");function hideTogggleContainer(element,cb){return function eventHandler(event){var contentEl=element.querySelector(".wpte-bf-toggle-content");element.className.indexOf("wpte-bf-active")>-1?function(element,cb){var opacity=1;!function decrease(){if((opacity-=.05)<=0)return element.style.removeProperty("opacity"),element.style.display="none",void cb();element.style.opacity=opacity,requestAnimationFrame(decrease)}()}(contentEl,function(){document.removeEventListener("click",eventHandler),element.classList.remove("wpte-bf-active"),cb()}):(element.className.indexOf("wpte-bf-active")<0?element.classList.add("wpte-bf-active"):element.classList.remove("wpte-bf-active"),cb())}}toggleContainers&&toggleContainers.forEach(function(tc){var toggler=tc.querySelector(".wpte-bf-toggle-title"),closeBtn=(tc.querySelector(".wpte-bf-toggle-content"),tc.querySelector(".wpte-bf-toggle-close"));closeBtn&&closeBtn.addEventListener("click",function(event){event.preventDefault(),hideTogggleContainer(tc)}),toggler&&toggler.addEventListener("click",function(event){document.addEventListener("click",hideTogggleContainer(tc,function(){var span=toggler.querySelector(".wtebf-toggle-title"),activeSpan=toggler.querySelector(".wtebf-toggle-title-active");activeSpan&&(activeSpan.style.display=tc.className.indexOf("wpte-bf-active")>-1?"block":"none"),span&&(span.style.display=tc.className.indexOf("wpte-bf-active")<0?"block":"none")}))})})}();
jQuery(document).ready(function($){function addCommas(nStr){for(var x=(nStr+="").split("."),x1=x[0],x2=x.length>1?"."+x[1]:"",rgx=/(\d+)(\d{3})/;rgx.test(x1);)x1=x1.replace(rgx,"$1"+wte.currency.thousands_separator+"$2");return x1+x2}$("body").on("change",".travelers-no",function(e){$("#price-loading").fadeIn(500),$val=$(this).val(),$new_val=$(".hidden-price").first().text().replace(/,/g,""),$total=$val*$new_val,$("#trip-cost").val($total),$total=addCommas($total),$(".total").text(addCommas($total)),$("#price-loading").fadeOut(500)})});
jQuery(document).ready(function($){var rtlenable=!1;"1"==rtl.enable&&(rtlenable=!0),$(".wpte-trip-feat-img-gallery").owlCarousel({nav:!0,navigationText:["&lsaquo;","&rsaquo;"],items:1,autoplay:!0,slideSpeed:300,paginationSpeed:400,center:!0,loop:!0,rtl:rtlenable,dots:!1})});