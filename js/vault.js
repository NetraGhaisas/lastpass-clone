// encrypts vault object
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

// decrypts and returns vault json in object format
function vaultDecrypt(key, encryptedVault) {
  var parsedVault = JSON.parse(encryptedVault);
  var messageWithParameters = JSON.stringify(parsedVault);
  var decryptedMessage = sjcl.decrypt(key, messageWithParameters);
  return JSON.parse(decryptedMessage);
}
