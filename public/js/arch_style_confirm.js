      function blue2red(x) {
          x.src = "/s_circle_red.png"
        document.getElementById("scumcoin_navbar")
          .style
          .borderBottomColor = "red"
        document.getElementById("cancel_button")
          .style
          .setProperty("background-color", "red")
        document.getElementById("cancel_button")
          .style
          .setProperty("border-color", "red", "important")
        document.getElementById("cancel_button")
          .style
              .setProperty("color", "white")
        document.getElementById("confirm_button")
          .style
          .setProperty("background-color", "red")
        document.getElementById("confirm_button")
          .style
          .setProperty("border-color", "red", "important")
        document.getElementById("confirm_button")
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
        document.getElementById("cancel_button")
          .style
          .backgroundColor = "#333333"
        document.getElementById("cancel_button")
          .style
          .setProperty("border-color", "#08c", "important")   
        document.getElementById("cancel_button")
          .style
              .setProperty("color", "#08c")
        document.getElementById("confirm_button")
          .style
          .backgroundColor = "#333333"
        document.getElementById("confirm_button")
          .style
          .setProperty("border-color", "#08c", "important")   
        document.getElementById("confirm_button")
          .style
          .setProperty("color", "#08c") 	  
        document.getElementById("navbar_toggler")
          .style
          .setProperty("background-color", "#08c")                                        
      }

      // REGISTER BUTTON 

      function trans2blueconf() {
        document.getElementById("confirm_button")
          .style
          .setProperty("color", "white")
        document.getElementById("confirm_button")
          .style
          .setProperty("background-color", "#08c")	
      }

      function blue2transconf() {
        document.getElementById("confirm_button")
          .style
          .setProperty("color", "#08c")
        document.getElementById("confirm_button")
          .style
          .setProperty("background-color", "#333333")	  
      }
      function trans2bluecanc() {
        document.getElementById("cancel_button")
          .style
          .setProperty("color", "white")
        document.getElementById("cancel_button")
          .style
              .setProperty("background-color", "#08c")	
      }

      function blue2transcanc() {
        document.getElementById("cancel_button")
          .style
          .setProperty("color", "#08c")
        document.getElementById("cancel_button")
          .style
              .setProperty("background-color", "#333333")
       }
       
