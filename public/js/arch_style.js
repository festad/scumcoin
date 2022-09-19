      function blue2red(x) {
          x.src = "/s_circle_red.png"
        document.getElementById("scumcoin_navbar")
          .style
          .borderBottomColor = "red"
        document.getElementById("register_button")
          .style
          .setProperty("background-color", "red")
        document.getElementById("register_button")
          .style
          .setProperty("border-color", "red", "important")
        document.getElementById("register_button")
          .style
              .setProperty("color", "white")
        document.getElementById("login_button")
          .style
          .setProperty("background-color", "red")
        document.getElementById("login_button")
          .style
          .setProperty("border-color", "red", "important")
        document.getElementById("login_button")
          .style
          .setProperty("color", "white")	  
        document.getElementById("navbar_toggler")
          .style
          .setProperty("background-color", "red")     
      }

      function red2blue(x) {
        x.src = "/s_circle_blue.png"
        document.getElementById("scumcoin_navbar")
          .style
          .borderBottomColor = "#08c"
        document.getElementById("register_button")
          .style
          .backgroundColor = "#333333"
        document.getElementById("register_button")
          .style
          .setProperty("border-color", "#08c", "important")   
        document.getElementById("register_button")
          .style
              .setProperty("color", "#08c")
        document.getElementById("login_button")
          .style
          .backgroundColor = "#333333"
        document.getElementById("login_button")
          .style
          .setProperty("border-color", "#08c", "important")   
        document.getElementById("login_button")
          .style
          .setProperty("color", "#08c") 	  
        document.getElementById("navbar_toggler")
          .style
          .setProperty("background-color", "#08c")                                        
      }

      // REGISTER BUTTON 

      function trans2bluelog() {
        document.getElementById("login_button")
          .style
          .setProperty("color", "white")
        document.getElementById("login_button")
          .style
          .setProperty("background-color", "#08c")	
      }

      function blue2translog() {
        document.getElementById("login_button")
          .style
          .setProperty("color", "#08c")
        document.getElementById("login_button")
          .style
          .setProperty("background-color", "#333333")	  
      }
      function trans2bluereg() {
        document.getElementById("register_button")
          .style
          .setProperty("color", "white")
        document.getElementById("register_button")
          .style
              .setProperty("background-color", "#08c")	
      }

      function blue2transreg() {
        document.getElementById("register_button")
          .style
          .setProperty("color", "#08c")
        document.getElementById("register_button")
          .style
              .setProperty("background-color", "#333333")
       }
       
