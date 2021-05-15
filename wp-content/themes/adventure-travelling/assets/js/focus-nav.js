jQuery(document).ready(function () {
  window.adventure_travelling_currentfocus=null;
    adventure_travelling_checkfocusdElement();
  var adventure_travelling_body = document.querySelector('body');
  adventure_travelling_body.addEventListener('keyup', adventure_travelling_check_tab_press);
  var adventure_travelling_gotoHome = false;
  var adventure_travelling_gotoClose = false;
  window.adventure_travelling_responsiveMenu=false;
  function adventure_travelling_checkfocusdElement(){
    if(window.adventure_travelling_currentfocus=document.activeElement.className){
      window.adventure_travelling_currentfocus=document.activeElement.className;
    }
  }
  function adventure_travelling_check_tab_press(e) {
    "use strict";
    // pick passed event or global event object if passed one is empty
    e = e || event;
    var activeElement;

    if(window.innerWidth < 999){
    if (e.keyCode == 9) {
      if(window.adventure_travelling_responsiveMenu){
      if (!e.shiftKey) {
        if(adventure_travelling_gotoHome) {
          jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
        }
      }
      if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
        adventure_travelling_gotoHome = true;
      } else {
        adventure_travelling_gotoHome = false;
      }

    }else{

      if(window.adventure_travelling_currentfocus=="responsivetoggle"){
        jQuery( "" ).focus();
      }}}
    }
    if (e.shiftKey && e.keyCode == 9) {
    if(window.innerWidth < 999){
      if(window.adventure_travelling_currentfocus=="header-search"){
        jQuery(".responsivetoggle").focus();
      }else{
        if(window.adventure_travelling_responsiveMenu){
        if(adventure_travelling_gotoClose){
          jQuery("a.closebtn.mobile-menu").focus();
        }
        if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
          adventure_travelling_gotoClose = true;
        } else {
          adventure_travelling_gotoClose = false;
        }
      
      }else{

      if(window.adventure_travelling_responsiveMenu){
      }}}}
    }
    adventure_travelling_checkfocusdElement();
  }
});