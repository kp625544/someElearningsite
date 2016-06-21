/*
 * Need some explanations about this code ?
 * Take a look at our API tutorial:
 * http://developers.bistri.com/webrtc-sdk/javascript-library-tutorial
 * JS library reference:
 * http://developers.bistri.com/webrtc-sdk/js-library-reference
 */

onBistriConferenceReady = function () {
  
    var room = "myMeetingRoom";

    // at first we test if the browser is WebRTC enable
    if (!bc.isCompatible()) {
        alert("your browser is not WebRTC compatible !");
        return;
    }

    window.localStream;

    /*
     * this is the function called when the button "Join Conference" is pressed
     */
    window.joinRoom = function () {
        alert();

        // if the local stream (webcam) is ready 
        if (!window.localStream) {
            alert("local media is not ready");
            return;
        }

        // then when are ready to join the conference room called "myMeetingRoom" and set the room "capacity" to 3 participants
        bc.joinRoom(room,3);
    };

    /*
     * this is the function called when the button "Quit Conference" is pressed
     */
    window.quitRoom = function () {

        // We stop calls with all conference room members
        bc.endCalls(room);

        // then we quit the conference room
        bc.quitRoom(room);
    };

    /*
     * API is initialized with personal keys
     * To get your own keys, go to https://api.developers.bistri.com/login
     * debug is set to true to print some logs in the javascript console
     */
    bc.init({
        // don't forget to replace the following keys by your own
        appId: "500f03c8",
        appKey: "f3099079122e50669848cf39a7085fa9",
        debug: true
    });

    /*
     * we add a handler to manage "onConnected" event triggered by the signaling server
     * this event occurs when user is connected to the signaling server
     */
    bc.signaling.bind("onConnected", function () {
        
        // we are now connected to the signaling server, 
        // we can request access to the user webcam
        bc.startStream("320x240",function(stream){
            
            window.localStream = stream;
            
            var node = document.querySelector('.video-container');

            // we "insert" the local video stream into a container
            bc.attachStream(stream, node, {
                // video switch to fullscreen when user click on it
                fullscreen: true,
                // reverse video display
                mirror: true
            });
        });
    });

    /*
     * we add a handler to manage "onJoinedRoom" event triggered by the signaling server
     * this event occurs when user join the conference room
     */
    bc.signaling.bind("onJoinedRoom", function (result) {

        // we entered the conference room.
        // we request a call start with every single member already present in the room and we specify that we are sending them the localStream
        var roomMembers = result.members;
        for (var i = 0; i < roomMembers.length; i++) {
            bc.call(roomMembers[i].id,room,{stream:window.localStream});
        }

        // we hide "Join Conference" button
        document.querySelector(".join").style.display = "none";

        //  and show "Quit Conference" button
        document.querySelector(".quit").style.display = "inline";
    });

    /*
     * we add a handler to manage "onJoinRoomError" event triggered by the signaling server
     * this event occurs when user fails to join the conference room
     */
    bc.signaling.bind("onJoinRoomError", function (error) {

        // we can't handle more than 4 participants in a same room (for performance issue) 
       alert(error.text+" ("+error.code+")" );
    });

    /*
     * we add a handler to manage "onQuittedRoom" event triggered by the signaling server
     * this event occurs when user has quitted the conference room
     */
    bc.signaling.bind("onQuittedRoom", function (data) {

        // we hide "Quit Conference" button
        document.querySelector(".quit").style.display = "none";

        // and we show "Join Conference" button
        document.querySelector(".join").style.display = "inline";

    });

    /*
     * we add a handler to manage "onStreamAdded" event triggered by the stream manager
     * this event occurs when a local or remote video stream is received
     */
    bc.streams.bind("onStreamAdded", function (remoteStream, pid) {
        
         var node = document.querySelector('.video-container');

        // we "insert" the video stream into a container
        bc.attachStream(remoteStream, node, {
            // video switch to fullscreen when user click on it
            fullscreen: true
        });
    });

    /*
     * we add a handler to manage "onStreamClosed" event triggered by the stream manager
     * this event occurs when a local or remote stream is closed
     */
    bc.streams.bind("onStreamClosed", function (remoteStream, pid) {

        // we remove the video stream from the page
        bc.detachStream(remoteStream);
    });

    // we open a session on the signaling server
    bc.connect();

}