(function(psma){
  function psmb(){
    var e=psma("#pass1").val(),d=psma("#user_login").val(),c=psma("#pass2").val(),f;
    psma("#psm-pass-strength-result").removeClass("short bad good strong");
    if(!e){psma("#psm-pass-strength-result").html("&nbsp;");return}
    f=passwordStrength(e,d,c);
    switch(f){
      case 2:psma("#psm-pass-strength-result").addClass("bad").html("Weak");
      break;
      case 3:psma("#psm-pass-strength-result").addClass("good").html("Medium");
      break;
      case 4:psma("#psm-pass-strength-result").addClass("strong").html("Strong");
      break;
      case 5:psma("#psm-pass-strength-result").addClass("short").html("Mismatch");
      break;
      default:psma("#psm-pass-strength-result").addClass("short").html("Very weak")
    }
  }
  psma(document).ready(function(){
    psma("#pass1").val("").keyup(psmb);
    psma("#pass2").val("").keyup(psmb);
  })
})(jQuery);