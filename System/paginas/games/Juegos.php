<?php
session_start();
if ($_SESSION['acceso']!="1")
{
	header("Location:../../../1026/Nosesion.php?next=http://localhost/SublimeText/C/OperatingSystem/System/paginas/games/Juegos.php&hacia=Games");
	exit;
}


?>
<!DOCTYPE html>
<html class="fondoobscuro fondologin">
<head>
<meta charset="UTF-8"/>
<link href="../../../System32/css/personalizacion.css" rel="stylesheet"/><link href="../../../System32/css/imageres.css" rel="stylesheet"/>
<link rel="icon" type="image/ico" href="../../../Documents_and_settings/visible/games.ico" />
<script src="../../../System32/jquery/$definicion/js/jquery-1.9.1.min.js" type="text/javascript" language="javascript"></script>
    <title>TY-games.</title>
    <script type="text/javascript">
    	/*Minijuegos*/
  /*Nave*/

   // Global variables
      var shipX = 0; // X position of ship
      var shipY = 0; // Y position of ship
      var canvas; // canvas
      var ctx; // context
      var back = new Image(); // storage for new background piece
      var oldBack = new Image(); // storage for old background piece
      var ship = new Image(); // ship
      var shipX = 0; // current ship position X
      var shipY = 0; // current ship position Y
      var oldShipX = 0; // old ship position Y
      var oldShipY = 0; // old ship position Y
      // This function is called on page load.


      function canvasSpaceGame() {

        // Get the canvas element.
        canvas = document.getElementById("myCanvas");

        // Make sure you got it.
        if (canvas.getContext)

        // If you have it, create a canvas user interface element.
        {
          // Specify 2d canvas type.
          ctx = canvas.getContext("2d");

          // Paint it black.
          ctx.fillStyle = "black";
          ctx.rect(0, 0, 300, 300);
          ctx.fill();

          // Save the initial background.
          back = ctx.getImageData(0, 0, 30, 30);

          // Paint the starfield.
          stars();

          // Draw space ship.
          makeShip();
        }

        // Play the game until the until the game is over.
        gameLoop = setInterval(doGameLoop, 16);

        // Add keyboard listener.
        window.addEventListener('keydown', whatKey, true);

      }

      // Paint a random starfield.


      function stars() {

        // Draw 50 stars.
        for (i = 0; i <= 50; i++) {
          // Get random positions for stars.
          var x = Math.floor(Math.random() * 299);
          var y = Math.floor(Math.random() * 299);

          // Make the stars white
          ctx.fillStyle = "white";

          // Give the ship some room by painting black stars.
          if (x < 30 || y < 30) ctx.fillStyle = "black";

          // Draw an individual star.
          ctx.beginPath();
          ctx.arc(x, y, 3, 0, Math.PI * 2, true);
          ctx.closePath();
          ctx.fill();

          // Save black background.
          oldBack = ctx.getImageData(0, 0, 30, 30);
        }
      }

      function makeShip() {

        // Draw saucer bottom.
        ctx.beginPath();
        ctx.moveTo(28.4, 16.9);
        ctx.bezierCurveTo(28.4, 19.7, 22.9, 22.0, 16.0, 22.0);
        ctx.bezierCurveTo(9.1, 22.0, 3.6, 19.7, 3.6, 16.9);
        ctx.bezierCurveTo(3.6, 14.1, 9.1, 11.8, 16.0, 11.8);
        ctx.bezierCurveTo(22.9, 11.8, 28.4, 14.1, 28.4, 16.9);
        ctx.closePath();
        ctx.fillStyle = "rgb(222, 103, 0)";
        ctx.fill();

        // Draw saucer top.
        ctx.beginPath();
        ctx.moveTo(22.3, 12.0);
        ctx.bezierCurveTo(22.3, 13.3, 19.4, 14.3, 15.9, 14.3);
        ctx.bezierCurveTo(12.4, 14.3, 9.6, 13.3, 9.6, 12.0);
        ctx.bezierCurveTo(9.6, 10.8, 12.4, 9.7, 15.9, 9.7);
        ctx.bezierCurveTo(19.4, 9.7, 22.3, 10.8, 22.3, 12.0);
        ctx.closePath();
        ctx.fillStyle = "rgb(51, 190, 0)";
        ctx.fill();

        // Save ship data.
        ship = ctx.getImageData(0, 0, 30, 30);

        // Erase it for now.
        ctx.putImageData(oldBack, 0, 0);

      }

      function doGameLoop() {

        // Put old background down to erase shipe.
        ctx.putImageData(oldBack, oldShipX, oldShipY);

        // Put ship in new position.
        ctx.putImageData(ship, shipX, shipY);

      }

      // Get key press.


      function whatKey(evt) {

        // Flag to put variables back if we hit an edge of the board.
        var flag = 0;

        // Get where the ship was before key process.
        oldShipX = shipX;
        oldShipY = shipY;
        oldBack = back;

        switch (evt.keyCode) {

          // Left arrow.
        case 37:
          shipX = shipX - 30;
          if (shipX < 0) {
            // If at edge, reset ship position and set flag.
            shipX = 0;
            flag = 1;
          }
          break;

          // Right arrow.
        case 39:
          shipX = shipX + 30;
          if (shipX > 270) {
            // If at edge, reset ship position and set flag.
            shipX = 270;
            flag = 1;
          }
          break;

          // Down arrow
        case 40:
          shipY = shipY + 30;
          if (shipY > 270) {
            // If at edge, reset ship position and set flag.
            shipY = 270;
            flag = 1;
          }
          break;

          // Up arrow 
        case 38:
          shipY = shipY - 30;
          if (shipY < 0) {
            // If at edge, reset ship position and set flag.
            shipY = 0;
            flag = 1;
          }
          break;

        }

        // If flag is set, the ship did not move.
        // Put everything back the way it was.
        if (flag) {
          shipX = oldShipX;
          shipY = oldShipY;
          back = oldBack;
        } else {
          // Otherwise, get background where the ship will go
          // So you can redraw background when the ship
          // moves again.
          back = ctx.getImageData(shipX, shipY, 30, 30);
        }
      }
    	
    </script>
      <style type="text/css">
 
  html a {color:white;
    font-size:1.3em;}
 .displaynone{display: none;}
 .semuestra{display:inline;}


#audio{
	float: left;
	padding-top: 0px;
	padding-left: 0px;

	color: white;
	width: 15%;
	height: 100%;
	
	border: 5px solid black;
	-ms-display: none;
	position: absolute;
	top: 30px;
	bottom: 0;
	left: 0;
}
#video{
	float: right;
	padding-top: 0px;
	padding-right: 0px;
	color: white;
	width: 15%;
	height: 100%;
	border: 5px solid black;
	position: absolute;
	top: 31px;
	bottom: 0;
	right: 0;
}
.seesconde{display: none;}


#colornegro{color: black;}
#logo{
	position: absolute;
	top:0;
	right: 0;
	height: 30px;
	width: 100px;
	background-color: black;		
	
		
	   }
	   #logo img{
		height:28;
		width:20px; 
		float:center;  
		margin-top:1px;
		padding-top:1px;
	   }
	   header{
		position:absolute;
		height:30px;
		width:100%;
		top:0;
		left:0;
		right;:0;
	
		border-bottom:1px solid black;
		font-family:vivaldi;
		color:white;
		padding:0;
		margin:0;
		border-bottom:5px solid black;

		  
	  }
header h1,h2,h3,h4,h5,h6{
        margin:0;
        padding:0;
        
      }
#jueguito{
/*padding-top: 35px;*/
  /*position:absolute;*/
  /*top:30px;
right:15%;
left:15%;*/
 

}
      </style>
  <script type="text/javascript">
window.onload=function(){

  $(".iframePRINT").click(function(){
    var queImprimir =$(this).attr("data-iframe");
    var altura =$(this).attr("data-height");
    var saltos =$(this).attr("data-br");
$("#jueguito").html(saltos+'<iframe width="72%" height="'+altura+'" style="margin-left:25px;" src="'+queImprimir+'" frameborder="0" allowfullscreen></iframe>');

  });
}

 
  </script>
</head>

<body>
<header class="fondoclaro">

<div id="superior"><h3>Ty-Games</h3><div id="cierre"></div><div id="logo"><center><img src="../../../Documents_and_settings/visible/logo.ico" /></center></div></div>



</header>




<div id="audio" class="fondoclaro">
<center><p><strong>Juegos.</strong></p></center>


<div id="paescuchar">
<button class="iframePRINT" data-br="" data-height="600px" data-iframe="http://www.inmensia.com/files/solitaire1.0.html
">Solitario</button><br>
<button class="iframePRINT" data-br="" data-height="600px" data-iframe="http://www.inmensia.com/files/minesweeper1.0.html
">Busca Minas</button><br>
<button class="iframePRINT" data-br="<br>" data-height="600px" data-iframe="http://www.dhtmlgoodies.com/scripts/game_sudoku/game_sudoku.html
">Sudoku</button><br>
<button class="iframePRINT" data-br="" data-height="600px" data-iframe="http://www.inmensia.com/files/videopoker1.0.html
">Pocker</button><br>
<button class="iframePRINT" data-br="<br>" data-height="600px" data-iframe="http://www.markus-inger.de/test/game.php
">BeSlimed</button><br>

<br><br><hr>
<button onclick="$('#jueguito').html('<br><br><br><br><br><h2>Juegos Cerrados Exitosamente.</h2>');">Terminar Juegos</button>


</div>







</div>
<div id="video" class="fondoclaro">
<center><p><strong>Mini-Juegos TY.</strong></p></center>









<div id="loquehay">
<button class="iframePRINT" data-br="<br>" data-height="600px" data-iframe="games/Edu/Juego1/Juego1/Juego1.php">Juego de niveles Educativo</button><br>

<button onclick="$('#jueguito').html('<br><br><br><br><br><canvas id=\'myCanvas\' width=\'300\' height=\'300\' >');  canvasSpaceGame()" data-br="<br>" data-height="600px" data-iframe="games/Edu/Juego1/Juego1/Juego1.php">Nave espacial</button><br>



<br><br><hr>
<button onclick="$('#jueguito').html('<br><br><br><br><br><h2>Juegos Cerrados Exitosamente.</h2>');">Terminar Juegos</button>
</div>


</div>
<center id="jueguito">
<canvas id='myCanvas' width='300' height='300' >
    </canvas>
</body>

</html>

