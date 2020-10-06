// const { encrypt, misc } = require("sjcl");

function updategen(t) {
  if (typeof t && t.id == "pronounceable") {
    $("#digits").prop("checked", false);
    $("#special").prop("checked", false);
  } else if (typeof t && (t.id == "digits" || t.id == "special")) {
    $("#reqevery").prop("checked", true);
    $("#pronounceable").prop("checked", false);
  }
}

function randomGenerate(passField,e){
  e.preventDefault();
  var pass = lpCreatePass();
  passField.value = pass;
  return false;
}

function get_random(min,max){
  var range = max-min;
  var randomWord = sjcl.random.randomWords(1);
  var normalizedWord = Math.abs(randomWord/Math.pow(2,32));
  return min + normalizedWord * range;
}

function lpCreatePass(
  length,
  upper,
  lower,
  digits,
  special,
  mindigits,
  ambig,
  reqevery,
  pronounceable
) {
  if (typeof length == "undefined") length = 8 + get_random(0,10);
  if (typeof upper == "undefined") upper = true;
  if (typeof lower == "undefined") lower = true;
  if (typeof digits == "undefined") digits = true;
  if (typeof special == "undefined") special = false;
  if (typeof mindigits == "undefined") mindigits = 0;
  if (typeof ambig == "undefined") ambig = false;
  if (typeof reqevery == "undefined") reqevery = true;

  var minlower = 0;
  var minupper = 0;
  var minspecial = 0;

  if (upper) minupper = 1;
  if (lower) minlower = 1;
  if (special) minspecial = 1;

  // if (pronounceable) {
  //   if (upper) return GPW.pronounceablecaps(length);
  //   else return GPW.pronounceable(length);
  // }

  var positions = new Array();
  if (lower && minlower > 0) {
    for (var i = 0; i < minlower; i++) {
      positions[positions.length] = "L";
    }
  }
  if (upper && minupper > 0) {
    for (var i = 0; i < minupper; i++) {
      positions[positions.length] = "U";
    }
  }
  if (digits && mindigits > 0) {
    for (var i = 0; i < mindigits; i++) {
      positions[positions.length] = "D";
    }
  }
  if (special && minspecial > 0) {
    for (var i = 0; i < minspecial; i++) {
      positions[positions.length] = "S";
    }
  }
  while (positions.length < length) {
    positions[positions.length] = "A";
  }
  positions.sort(function () {
    return get_random(0,1)*2 - 1;
  });

  var chars = "";
  var lowerchars = "abcdefghjkmnpqrstuvwxyz";
  if (!ambig) {
    lowerchars += "ilo";
  }
  if (lower) {
    chars += lowerchars;
  }
  var upperchars = "ABCDEFGHJKMNPQRSTUVWXYZ";
  if (!ambig) {
    upperchars += "ILO";
  }
  if (upper) {
    chars += upperchars;
  }
  var digitchars = "23456789";
  if (!ambig) {
    digitchars += "10";
  }
  if (digits) chars += digitchars;
  var specialchars = "!@#$%^&*";
  if (special) chars += specialchars;
  var pass = "";
  for (var x = 0; x < length; x++) {
    var usechars;
    switch (positions[x]) {
      case "L":
        usechars = lowerchars;
        break;
      case "U":
        usechars = upperchars;
        break;
      case "D":
        usechars = digitchars;
        break;
      case "S":
        usechars = specialchars;
        break;
      case "A":
        usechars = chars;
        break;
    }
    var i = get_random(0,usechars.length - 1);
    pass += usechars.charAt(i);
  }

  return pass;
}

function dogenerate() {
  var length = $("#length").val();
  var upper = $("#upper").is(":checked");
  var lower = $("#lower").is(":checked");
  var digits = $("#digits").is(":checked");
  var special = $("#special").is(":checked");
  var mindigits = $("#mindigits").val();
  var ambig = $("#ambig").is(":checked");
  var reqevery = $("#reqevery").is(":checked");
  var pronounceable = $("#pronounceable").is(":checked");

  var error_msg = "";
  if (length == "" || mindigits == "") {
    return;
  }

  if (
    !/^\d*(?:\.\d{1,2})?$/.exec(length) ||
    !/^\d*(?:\.\d{1,2})?$/.exec(mindigits)
  ) {
    error_msg +=
      "Please only use digits in our Password Length and Minimum Numeric Characters fields.";
  } else {
    length = parseInt(length, 10);
    mindigits = parseInt(mindigits, 10);

    if (length < 1 || length > 256) {
      error_msg +=
        "Please keep your password length to be between 1-256.<br/><br/>";
    }

    if (mindigits < 0) {
      error_msg +=
        "Please keep your minimum numeric characters to be at least 0.<br/><br/>";
    }

    if (mindigits > length) {
      error_msg +=
        "Please do not let your minimum numeric characters exceed your password length.<br/>";
    }
  }

  if (error_msg != "") {
    $("#error-msg").html(error_msg);
    $("#error-msg").css("display", "block");
  } else {
    $("#error-msg").css("display", "none");

    var newpw = lpCreatePass(
      length,
      upper,
      lower,
      digits,
      special,
      mindigits,
      ambig,
      reqevery,
      pronounceable
    );
    if (pronounceable && length < 3) {
      $("#password").val(newpw.substring(0, length));
    } else {
      $("#password").val(newpw);
    }

    var maxwidth = document.getElementById("meter").offsetWidth;

    // UpdatePasswordMeterPercent("", "password", "meter-color", maxwidth);

    var strength = document.getElementById("meter-color").offsetWidth;

    $("#meter-color").removeClass();
    if (strength > maxwidth * 0.6) {
    } else if (strength >= maxwidth * 0.3) {
      $("#meter-color").addClass("yellow");
    } else {
      $("#meter-color").addClass("red");
    }
  }
}


$(function () {
  $("#length").val(12);
  $("#upper").prop("checked", true);
  $("#lower").prop("checked", true);
  $("#digits").prop("checked", true);
  $("#special").prop("checked", true);
  $("#mindigits").val(5);
  $("#ambig").prop("checked", false);
  $("#reqevery").prop("checked", true);
  $("#pronounceable").prop("checked", false);
  dogenerate();

  $("#selectpw").click(function () {
    $("#password").select();
    $("#showtext").addClass("center").removeClass("hide");
    return false;
  });

  $("#generatepw").click(function () {
    dogenerate();
    return false;
  });

  $("#pwform")
    .change(function () {
      dogenerate();
      return false;
    })
    .keyup(function () {
      dogenerate();
      return false;
    });

  $("input:checkbox").change(function () {
    updategen(this);
    return false;
  });

  $("input:radio").change(function () {
    updategen(this);
    return false;
  });
});
