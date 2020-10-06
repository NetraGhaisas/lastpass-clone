<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/header_css_bundle.css" />
    <link rel="stylesheet" type="text/css" href="css/headercss.css" />
    <link rel="stylesheet" type="text/css" href="css/mod2css.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
  </head>
  <body>
     <!-- Top Navbar -->
 <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">LastPass...|</a>
 </nav>
    <section
      class="lp-mod compact bg-color dark-text"
      style="background-color: #f6f6f6"
    >
      <div class="container">
        <div class="inner-container">
          <div class="custom-html">
            <div class="generate-pw">
              <input type="text" readonly="" id="password" />
              <div id="meter">
                <div id="meter-color" style="width: 100%"></div>
              </div>
            </div>
            <a class="nbtn rbtn" id="generatepw">Generate</a>
          </div>
        </div>
      </div>
    </section>

    <section class="lp-mod compact custom" id="details">
      <div class="container">
        <div class="inner-container">
          <div class="shadow-box table-box">
            <div class="box-header"><h3>Details</h3></div>
            <div class="box-content">
              <div class="row">
                <div class="row-inner">
                  <h3>A Strong Password</h3>
                  <p>
                    A strong password is key for protecting your personal info
                    and assets online. Using a different password for every
                    website that is long and has multiple types of characters
                    (numbers, letters, and symbols) will help protect you from
                    someone hacking into your accounts.
                  </p>
                  <h3>How it Works</h3>
                  <p>
                    Password generation is done client-side, on your computer,
                    with Javascript. These passwords are never shared with us.
                  </p>
                  <h3>A Password Solution</h3>
                  <p>
                    Tired of remembering passwords? A password manager helps you
                    store your passwords in one secure place, where they are
                    encrypted and accessible only to you. A built-in password
                    generator also helps you create strong passwords when you
                    need them.
                  </p>
                </div>
                <div class="row-inner">
                  <form autocomplete="off" id="pwform" _lpchecked="1">
                    <h3>Password Length:</h3>
                    <input
                      type="text"
                      name="length"
                      id="length"
                      maxlength="3"
                    />
                    <h3>Password Formula:</h3>
                    <div id="pw-formula" class="line-box">
                      <label
                        ><input
                          type="radio"
                          name="pw-type"
                          checked=""
                          id="reqevery"
                        />All Characters</label
                      ><br /><label
                        ><input
                          type="radio"
                          name="pw-type"
                          id="pronounceable"
                        />Easy to Say</label
                      ><br /><label
                        ><input
                          type="radio"
                          name="pw-type"
                          id="ambig"
                        />Easy to Read</label
                      ><br /><label
                        ><input
                          type="checkbox"
                          checked=""
                          name="pw-char"
                          id="upper"
                        />A-Z</label
                      ><label
                        ><input
                          type="checkbox"
                          checked=""
                          name="pw-char"
                          id="lower"
                        />a-z</label
                      ><label
                        ><input
                          type="checkbox"
                          checked=""
                          name="pw-char"
                          id="digits"
                        />0-9</label
                      ><label
                        ><input
                          type="checkbox"
                          checked=""
                          name="pw-char"
                          id="special"
                        />!$%@#</label
                      ><br /><label
                        ><input
                          type="text"
                          style="width: 50px"
                          maxlength="3"
                          id="mindigits"
                        />Minimum Numeric Characters</label
                      ><br />
                      <!-- <label
                        ><input type="checkbox" id="ambig" />Avoid Ambiguous
                        Characters</label> -->
                    </div>
                    <h3
                      id="error-msg"
                      style="
                        color: rgb(211, 45, 39);
                        margin-top: 15px;
                        display: none;
                      "
                    >
                      Please do not let your minimum numeric characters exceed
                      your password length.<br />
                    </h3>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/passgen.js"></script>
    <script src="js/sjcl.js"></script>
  </body>
</html>
