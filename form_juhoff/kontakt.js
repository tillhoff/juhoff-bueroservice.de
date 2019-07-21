function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' Muss eine E-Mail Adresse sein\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' mMuss eine Zahl enthalten\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' muss eine Zahl zwischen '+min+' und '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' muss ausgefuellt sein.\n'; }
    } if (errors) alert('Folgende Felder muessen noch bearbeitet werden:\n'+errors);
    document.MM_returnValue = (errors == '');
} }


 $(document).ready(function(){
	    $(".feld, textarea").addClass("idle");
            $(".feld, textarea").focus(function(){
                $(this).addClass("activeField").removeClass("idle");
	    }).blur(function(){
                $(this).removeClass("activeField").addClass("idle");
	    });
        });