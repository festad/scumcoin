      function blue2red(x) {
          x.src = "/s_circle_red.png"
        document.getElementById("scumcoin_navbar")
          .style
          .borderBottomColor = "red"
        document.getElementById("pay_button")
          .style
          .setProperty("background-color", "red")
        document.getElementById("pay_button")
          .style
          .setProperty("border-color", "red", "important")
        document.getElementById("pay_button")
          .style
          .setProperty("color", "white")   
      }

      function red2blue(x) {
        x.src = "/s_circle_blue.png"
        document.getElementById("scumcoin_navbar")
          .style
          .borderBottomColor = "#08c"
        document.getElementById("pay_button")
          .style
          .backgroundColor = "#333333"
        document.getElementById("pay_button")
          .style
          .setProperty("border-color", "#08c", "important")   
        document.getElementById("pay_button")
          .style
          .setProperty("color", "#08c")                                       
      }

      // REGISTER BUTTON 

      function trans2bluelog() {
        document.getElementById("pay_button")
          .style
          .setProperty("color", "white")
        document.getElementById("pay_button")
          .style
          .setProperty("background-color", "#08c")	
      }

      function blue2translog() {
        document.getElementById("pay_button")
          .style
          .setProperty("color", "#08c")
        document.getElementById("pay_button")
          .style
          .setProperty("background-color", "#333333")	  
      }
