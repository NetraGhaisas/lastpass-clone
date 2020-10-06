function vaultEncrypt(key, vault) {
  var stringVault = JSON.stringify(vault);
  var params = {
    cipher: "aes",
    v: "1",
    iter: 10000,
    ks: 128,
    ts: 64,
    mode: "ccm",
    adata: "",
  };
  var encryptedVault = sjcl.encrypt(key, stringVault, params);
  return encryptedVault;
}

function vaultDecrypt(key, encryptedVault) {
  // console.log(encryptedVault);
  var parsedVault = JSON.parse(encryptedVault);
  // console.log(parsedVault);
  var messageWithParameters = JSON.stringify(parsedVault);
  // console.log(messageWithParameters);
  var decryptedMessage = sjcl.decrypt(key, messageWithParameters);
  return JSON.parse(decryptedMessage);
}
