<!doctype html>
<html>
    <head>
        <title>Social Communicator</title>
        <style>
            @media only screen and (max-width : 540px)
            {
                .chat-sidebar
                {
                    display: none !important;
                }

                .chat-popup
                {
                    display: none !important;
                }
            }

            body
            {
                background-color: #e9eaed;
            }

            .chat-sidebar
            {
                width: 200px;
                position: fixed;
                height: 100%;
                right: 0px;
                top: 0px;
                padding-top: 10px;
                padding-bottom: 10px;
                border: 1px solid rgba(29, 49, 91, .3);
            }

            .sidebar-name
            {
                padding-left: 10px;
                padding-right: 10px;
                margin-bottom: 4px;
                font-size: 12px;
            }

            .sidebar-name span
            {
                padding-left: 5px;
            }

            .sidebar-name a
            {
                display: block;
                height: 100%;
                text-decoration: none;
                color: inherit;
            }

            .sidebar-name:hover
            {
                background-color:#e1e2e5;
            }

            .sidebar-name img
            {
                width: 32px;
                height: 32px;
                vertical-align:middle;
            }

            .popup-box
            {
                display: none;
                position: fixed;
                bottom: 0px;
                right: 220px;
                height: 285px;
                background-color: rgb(237, 239, 244);
                width: 300px;
                border: 1px solid rgba(29, 49, 91, .3);
            }

            .popup-box .popup-head
            {
                background-color: #6d84b4;
                padding: 5px;
                color: white;
                font-weight: bold;
                font-size: 14px;
                clear: both;
            }

            .popup-box .popup-head .popup-head-left
            {
                float: left;
            }

            .popup-box .popup-head .popup-head-right
            {
                float: right;
                opacity: 0.5;
            }

            .popup-box .popup-head .popup-head-right a
            {
                text-decoration: none;
                color: inherit;
            }

            .popup-box .popup-messages
            {
                height: 100%;
                overflow-y: scroll;
                position: relative;
            
            }
            .popup-text
            {
                position: absolute;
                bottom: 0px;
                
            }
            
            .send {
                -webkit-appearance: none;
                width: 70px;
                height: 20px;
            }




        </style>
        
        <script language="javascript" type="text/javascript">
          function init()
          {
        	<?php
              session_start();
              ?>
              user = <?php echo($_SESSION['login_user']) ?>
          }
          function doConnect()
          {
            websocket = new WebSocket("ws://35.197.90.146:9000/");
            websocket.onopen = function(evt) { onOpen(evt) };
            websocket.onclose = function(evt) { onClose(evt) };
            websocket.onmessage = function(evt) { onMessage(evt) };
            websocket.onerror = function(evt) { onError(evt) };
          }
          function onOpen(evt)
          {
            writeToScreen("connected\n");
            websocket.send(user + ";" + id);
        	
          }
          function onClose(evt)
          {
            writeToScreen("disconnected\n");
        	
          }
          function onMessage(evt)
          {
            writeToScreen(evt.data.split(";",3)[0]+': '+evt.data.split(";",3)[2] +'\n');
          }
          function onError(evt)
          {
            writeToScreen('error: ' + evt.data + '\n');
        	websocket.close();
        	
          }
          function doSend(message)
          {
            writeToScreen("You: " + message + '\n');
            websocket.send(user + ";" + message);
            document.myform.inputtext.value = ""
          }
          function writeToScreen(message)
          {
            document.myform.outputtext.value += message;
        	document.myform.outputtext.scrollTop = document.myform.outputtext.scrollHeight;
          }
          window.addEventListener("load", init, false);
           function sendText(id) {
        		doSend(id + ";" + document.myform.inputtext.value );
           }
          function clearText() {
        		document.myform.outputtext.value = "";
           }
           function doDisconnect() {
        		websocket.close();
           }
        </script>


        <script>
            //this function can remove a array element.
            Array.remove = function(array, from, to) {
                var rest = array.slice((to || from) + 1 || array.length);
                array.length = from < 0 ? array.length + from : from;
                return array.push.apply(array, rest);
            };

            //this variable represents the total number of popups can be displayed according to the viewport width
            var total_popups = 0;

            //arrays of popups ids
            var popups = [];

            //this is used to close a popup
            function close_popup(id)
            {
                for(var iii = 0; iii < popups.length; iii++)
                {
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);

                        document.getElementById(id).style.display = "none";

                        calculate_popups();

                        return;
                    }
                }
            }

            //displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
            function display_popups()
            {
                var right = 220;

                var iii = 0;
                for(iii; iii < total_popups; iii++)
                {
                    if(popups[iii] != undefined)
                    {
                        var element = document.getElementById(popups[iii]);
                        element.style.right = right + "px";
                        right = right + 320;
                        element.style.display = "block";
                    }
                }

                for(var jjj = iii; jjj < popups.length; jjj++)
                {
                    var element = document.getElementById(popups[jjj]);
                    element.style.display = "none";
                }
            }

            //creates markup for a new popup. Adds the id to popups array.
            function register_popup(id, name)
            {

                for(var iii = 0; iii < popups.length; iii++)
                {
                    //already registered. Bring it to front.
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);

                        popups.unshift(id);

                        calculate_popups();


                        return;
                    }
                }

                var element = '<div class="popup-box chat-popup" id="'+ id +'">';
                element = element + '<div class="popup-head">';
                element = element + '<div class="popup-head-left">'+ name +'</div>';
                element = element + '<div class="popup-head-right"><a href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
                element = element + '<div style="clear: both"></div></div><div class="popup-messages">';
                element = element + '<form name="myform"><textarea readonly name="outputtext" rows="16" cols="47"></textarea></textarea><textarea name="inputtext" rows="2" cols="33"></textarea> <input class="send" type="button" name=sendButton id="send" value="Send" onClick="sendText(\''+ id +'\');"></form></div></div>';
                
                document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;

                popups.unshift(id);

                calculate_popups();

            }

            //calculate the total number of popups suitable and then populate the toatal_popups variable.
            function calculate_popups()
            {
                var width = window.innerWidth;
                if(width < 540)
                {
                    total_popups = 0;
                }
                else
                {
                    width = width - 200;
                    //320 is width of a single popup box
                    total_popups = parseInt(width/320);
                }

                display_popups();

            }

            //recalculate when window is loaded and also when window is resized.
            window.addEventListener("resize", calculate_popups);
            window.addEventListener("load", calculate_popups);

        </script>
    </head>
    <body>
        <div class="chat-sidebar">
            <div class="sidebar-name">
                <!-- Pass username and display name to register popup -->
                <a href="javascript:register_popup('911', '911 - Emergency');">
                    <img width="30" height="30" src="https://scontent-sjc2-1.xx.fbcdn.net/v/t1.0-9/1966860_10203635303187228_940938618_n.jpg?oh=93caaa2b1784b28ee0d2eda0404c1255&oe=5AA5DC11" />
                    <span>911 - Emergency</span>
                </a>
            </div>
        </div>
    </body>
</html>