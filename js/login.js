var checkEmptyFields = function () {
  var emailElement = document.getElementById("email");
  var passwordElement = document.getElementById("password");
  if (emailElement.value != "" && passwordElement.value != "") {
    return true;
  } else {
    window.alert("Some fields are empty!");
    return false;
  }
};

function pbkdf2Encrypt(pass, rounds, length) {
  // get salt of 32 bytes
  // var saltBits = sjcl.random.randomWords(8);

  var pbkdf2KeyArray = sjcl.misc.pbkdf2(pass, "", rounds, length);
  return pbkdf2KeyArray;
}


function clientEncryption(){
  var emailElement = document.getElementById("email");
    var passElement = document.getElementById("password");
    
    // var hiddenSalt = document.getElementById("salt");
    var hiddenHashedPassword = document.getElementById("hashedPassword");
    var pass = passElement.value;
    // var saltString = JSON.stringify(emailElement.value).substring(0,32);
    // get salt of 32 bytes
    // var saltBits = sjcl.random.randomWords(8);
    // pbkdf2 100100 rounds
    var length = 256;

    var pbkdf2KeyArray = pbkdf2Encrypt(pass, 100100, length);

    var encryptionKey = sjcl.codec.hex.fromBits(pbkdf2KeyArray);

    sessionStorage.setItem("email",emailElement.value);
    sessionStorage.setItem("key", encryptionKey);

    var authenticationKeyArray = pbkdf2Encrypt(pbkdf2KeyArray, 1, length);
    var authenticationKey = sjcl.codec.hex.fromBits(authenticationKeyArray);
    hiddenHashedPassword.value = authenticationKey;
    
    passElement.remove();
}

function beforeRegister(e) {
  // e.preventDefault();
  console.log("START");
  var valid = checkEmptyFields();
  if (valid) {
    clientEncryption();

    // encrypting empty vault at first
    var hiddenVault = document.getElementById("encryptedVault");
    var vault = {};
    var encryptionKey = sessionStorage.getItem("key");
    var encryptedVault = vaultEncrypt(encryptionKey, vault);
    console.log(encryptedVault);
    hiddenVault.value = encryptedVault;

    // decrypt test
    
    // var decryptedMessage = vaultDecrypt(encryptionKey,encryptedVault);
    // console.log("decrypted message", decryptedMessage);
    // console.log("parsed msg", JSON.parse(decryptedMessage));

    return true;
  } else {
    return false;
  }
}

function beforeLogin(e) {
  var valid = checkEmptyFields();
  if (valid) {
    clientEncryption();
    
  } else {
    return false;
  }
}
