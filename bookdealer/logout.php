<?php
session_start();
session_destroy();



header( "refresh:7;url=home.php" );

include ( 'header.php' ) ;


?>

<section class="loaders"><span class="loader loader-quart"> </span> Logging Out...</section>



<style>


/* $Base */
body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  font-size: 40px;
  font-size: 2.5rem;
  color: #0563AB;
  text-align: center;
}

.loaders {
  height: 300px;
  line-height: 300px;
 
}


.loader {
  display: inline-block;
  position: relative;
  width: 50px;
  height: 50px;
  vertical-align: middle;
}

/*	$Loader Quadrant
	========================================================================== */
.loader-quart {
  border-radius: 50px;
  border: 6px solid rgba(0, 0, 0, 0.4);
}
.loader-quart:after {
  content: '';
  position: absolute;
  top: -6px;
  right: -6px;
  bottom: -6px;
  left: -6px;
  border-radius: 50px;
  border: 6px solid transparent;
  border-top-color: #0563AB;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}


@-webkit-keyframes grow {
  0% {
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
    opacity: 0;
  }
  50% {
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
    opacity: 1;
  }
  100% {
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
    opacity: 0;
  }
}
@keyframes grow {
  0% {
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
    opacity: 0;
  }
  50% {
    -webkit-transform: scaleY(1);
    transform: scaleY(1);
    opacity: 1;
  }
  100% {
    -webkit-transform: scaleY(0);
    transform: scaleY(0);
    opacity: 0;
  }
}
@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
    tranform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    tranform: rotate(360deg);
  }
}
@keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
    tranform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    tranform: rotate(360deg);
  }
}
@-webkit-keyframes spinreverse {
  0% {
    -webkit-transform: rotate(0deg);
    tranform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
    tranform: rotate(-360deg);
  }
}
@keyframes spinreverse {
  0% {
    -webkit-transform: rotate(0deg);
    tranform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
    tranform: rotate(-360deg);
  }
}




</style>



<?php




//echo'LOGGING OUT....';
//unset($_SESSION['first_name']) ;

//echo 'You have been logged out. <a href="login2.php">Go back</a>';

include ( 'footer.html' ) ;

?>