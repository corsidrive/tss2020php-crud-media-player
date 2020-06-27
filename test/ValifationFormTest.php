<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>
<body class="nimbus-is-editor">
<pre class="container">    
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    echo "raw\n";
    $int = filter_input(INPUT_POST,'cars');
    var_dump($int);
    echo "isset\n";
    var_dump(isset($int));
    echo "empty\n";
    var_dump(empty($int));
    
    $value  =  empty($int) ? null: $int ;
    
    echo "\n-------------------------------------\n";

    var_dump($value);
    try {
        //code...
        $pdo = new PDO('mysql:mysql:host=localhost','root','fiacca');
        $pdo->query('DROP DATABASE if EXISTS dbtest;
                 CREATE DATABASE  dbtest;
                 USE dbtest;
                 CREATE TABLE `test` (
                     `valore` INT(11) NULL DEFAULT NULL
                     ENGINE=InnoDB
                 ;
                 ')
                 ->execute();
                 
                 $stm = $pdo->prepare('INSERT INTO test (valore) VALUES (:valore)');

                 $stm->bindValue(':valore',1);

                 $stm->execute();


                 $stm = $pdo->query('SELECT * FROM test');

                 var_dump($stm);

                 if($stm){

                    $stm->execute();

                    $res = $stm->fetchAll();

                    print_r($res);
        

                }

} catch (\Throwable $th) {
        var_dump($th);
    }
    

}

?>
</pre>
<form id="register" class="container" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
  
  <div class="form-group">
  <label for="cars">Choose a car:</label>
  <select class="form-control" name="cars" id="cars">

    <option value="">none</option>
    <option value="1">Volvo</option>
    <option value="2">Saab</option>
    <option value="3">Opel</option>
    <option value="4">Audi</option>
  </select>
  </div>
  <input type="submit" value="Submit">
</form>
   
   
   
</form> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

<div class="nsc-panel nsc-panel-compact nsc-hide">
    <div class="nsc-panel-move"></div>
    <div class="nsc-panel-tooltip">
        <div class="nsc-panel-tooltip-layout" layout="row" layout-align="start center">CTRL+V to toggle the panel</div>
    </div>

    <div class="nsc-panel-layout" flex="" layout="row" layout-align="start center">
        <div class="nsc-panel-groups" flex="" layout="row" layout-align="start start">

            <!-- group -->
            <div class="nsc-panel-group" flex="none" layout="row" layout-align="start start">
                <div class="nsc-panel-button separated active">
                    <div class="nsc-panel-select" flex="" layout="row">
                        <div class="nsc-panel-text nsc-noselect" flex="" layout="row" layout-align="center center">
                            <span class="nsc-icon nsc-icon-cursor-normal" data-i18n="videoPanelSimpleCursor" data-event="nimbus-editor-active-tools" data-event-param="cursorRing">&nbsp;</span>
                        </div>
                        <div class="nsc-panel-trigger">
                            <span class="nsc-icon nsc-icon-arrow">&nbsp;</span>
                        </div>
                    </div>
                    <div class="nsc-panel-dropdown to-top">
                        <ul flex="" layout="row" layout-align="start center">
                            <li class="nsc-panel-dropdown-icon" flex="" layout="row" layout-align="start center">
                                <span class="nsc-icon nsc-icon-cursor-shade" data-i18n="videoPanelFocusMouse" data-event="nimbus-editor-active-tools" data-event-param="cursorShadow">&nbsp;</span>
                            </li>
                            <li class="nsc-panel-dropdown-icon" flex="" layout="row" layout-align="start center">
                                <span class="nsc-icon nsc-icon-cursor-circle" data-i18n="videoPanelAnimatedCursor" data-event="nimbus-editor-active-tools" data-event-param="cursorRing">&nbsp;</span>
                            </li>
                            <!--<li class="nsc-panel-dropdown-icon " flex layout="row" layout-align="start center">-->
                            <!--<span class="nsc-icon nsc-icon-cursor-tail"></span>-->
                            <!--</li>-->
                            <!--<li class="nsc-panel-dropdown-icon " flex layout="row" layout-align="start center">-->
                            <!--<span class="nsc-icon nsc-icon-cursor-long"></span>-->
                            <!--</li>-->
                            <li class="nsc-panel-dropdown-icon" flex="" layout="row" layout-align="start center">
                                <span class="nsc-icon nsc-icon-cursor-normal" data-i18n="videoPanelSimpleCursor" data-event="nimbus-editor-active-tools" data-event-param="cursorDefault">&nbsp;</span>
                            </li>
                            <!--<li class="nsc-panel-dropdown-icon" flex layout="row" layout-align="start center">-->
                            <!--<span class="nsc-icon nsc-icon-cursor-none" data-event="nimbus-editor-active-tools" data-event-param="cursorNone"></span>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /group -->

            <!-- group -->
            <div class="nsc-panel-group" flex="none" layout="row" layout-align="start start">
                <button class="nsc-panel-button" type="button">
                    <span class="nsc-icon nsc-icon-pen" data-i18n="videoPanelPen" data-event="nimbus-editor-active-tools" data-event-param="pen">&nbsp;</span>
                </button>
                <button class="nsc-panel-button" type="button">
                    <span class="nsc-icon nsc-icon-arrow-line" data-i18n="videoPanelArrow" data-event="nimbus-editor-active-tools" data-event-param="arrow">&nbsp;</span>
                </button>
                <button class="nsc-panel-button" type="button">
                    <span class="nsc-icon nsc-icon-square" data-i18n="videoPanelSquare" data-event="nimbus-editor-active-tools" data-event-param="square">&nbsp;</span>
                </button>
                <div class="nsc-panel-button separated">
                    <div class="nsc-panel-select" flex="" layout="row">
                        <div class="nsc-panel-text nsc-noselect" flex="" layout="row" layout-align="center center">
                            <span class="nsc-icon nsc-icon-attention" data-i18n="videoPanelMark" data-event="nimbus-editor-active-tools" data-event-param="notifRed">&nbsp;</span>
                        </div>
                        <div class="nsc-panel-trigger">
                            <span class="nsc-icon nsc-icon-arrow">&nbsp;</span>
                        </div>
                    </div>
                    <div class="nsc-panel-dropdown to-top">
                        <ul flex="" layout="row" layout-align="start center">
                            <li class="nsc-panel-dropdown-icon" flex="" layout="row" layout-align="start center">
                                <span class="nsc-icon nsc-icon-attention" data-i18n="videoPanelMark" data-event="nimbus-editor-active-tools" data-event-param="notifRed">&nbsp;</span>
                            </li>
                            <li class="nsc-panel-dropdown-icon" flex="" layout="row" layout-align="start center">
                                <span class="nsc-icon nsc-icon-question" data-i18n="videoPanelQuestion" data-event="nimbus-editor-active-tools" data-event-param="notifBlue">&nbsp;</span>
                            </li>
                            <li class="nsc-panel-dropdown-icon" flex="" layout="row" layout-align="start center">
                                <span class="nsc-icon nsc-icon-done" data-i18n="videoPanelCheckmark" data-event="nimbus-editor-active-tools" data-event-param="notifGreen">&nbsp;</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="nsc-panel-button assembled">
                    <div class="nsc-panel-select" flex="" layout="row">
                        <div class="nsc-panel-text nsc-noselect" flex="" layout="row" layout-align="center center">
							<span class="nsc-icon nsc-icon-fill-none nsc-panel-icon-fill">
								<span class="nsc-panel-icon-fill-inner" id="nsc_panel_button_colors" style="background:#00FF00;" data-event="nimbus-editor-active-color" data-event-param="#00FF00">&nbsp;</span>
							</span>
                        </div>
                        <div class="nsc-panel-trigger">
                            <span class="nsc-icon nsc-icon-arrow">&nbsp;</span>
                        </div>
                    </div>
                    <div class="nsc-panel-dropdown">
                        <div class="nsc-panel-drop-area">
                            <div class="nsc-panel-colors">

                                <!-- picked -->
                                <div class="nsc-colors-picked">
                                    <div class="nsc-colors-picked-layout" flex="" layout="row" layout-align="start start" layout-wrap="">
                                        <div class="nsc-colors-picked-item">
                                            <button class="nsc-colors-picked-button" type="button" data-event="nimbus-editor-active-color" data-event-param="#000000">
                                                <span class="nsc-colors-picked-button-inner" style="background: #000000;">&nbsp;</span>
                                            </button>
                                        </div>
                                        <div class="nsc-colors-picked-item">
                                            <button class="nsc-colors-picked-button" type="button" data-event="nimbus-editor-active-color" data-event-param="#0000FF">
                                                <span class="nsc-colors-picked-button-inner" style="background: #0000FF;">&nbsp;</span>
                                            </button>
                                        </div>
                                        <div class="nsc-colors-picked-item">
                                            <button class="nsc-colors-picked-button" type="button" data-event="nimbus-editor-active-color" data-event-param="#FF00FF">
                                                <span class="nsc-colors-picked-button-inner" style="background: #FF00FF;">&nbsp;</span>
                                            </button>
                                        </div>
                                        <div class="nsc-colors-picked-item">
                                            <button class="nsc-colors-picked-button" type="button" data-event="nimbus-editor-active-color" data-event-param="#00FFFF">
                                                <span class="nsc-colors-picked-button-inner" style="background: #00FFFF;">&nbsp;</span>
                                            </button>
                                        </div>
                                        <div class="nsc-colors-picked-item">
                                            <button class="nsc-colors-picked-button" type="button" data-event="nimbus-editor-active-color" data-event-param="#00FF00">
                                                <span class="nsc-colors-picked-button-inner" style="background: #00FF00;">&nbsp;</span>
                                            </button>
                                        </div>
                                        <div class="nsc-colors-picked-item">
                                            <button class="nsc-colors-picked-button" type="button" data-event="nimbus-editor-active-color" data-event-param="#FFFF00">
                                                <span class="nsc-colors-picked-button-inner" style="background: #FFFF00;">&nbsp;</span>
                                            </button>
                                        </div>
                                        <div class="nsc-colors-picked-item">
                                            <button class="nsc-colors-picked-button" type="button" data-event="nimbus-editor-active-color" data-event-param="#FF0000">
                                                <span class="nsc-colors-picked-button-inner" style="background: #FF0000;">&nbsp;</span>
                                            </button>
                                        </div>
                                        <div class="nsc-colors-picked-item">
                                            <button class="nsc-colors-picked-button" type="button" data-event="nimbus-editor-active-color" data-event-param="#FFFFFF">
                                                <span class="nsc-colors-picked-button-inner" style="background: #FFFFFF;">&nbsp;</span>
                                            </button>
                                        </div>
                                        <!--<div class="nsc-colors-picked-item">-->
                                        <!--<button class="nsc-colors-picked-button custom" type="button"> -->
                                        <!--<i class="nsc-icon ic-color-custom"></i> -->
                                        <!--</button>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                <!-- /picked -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /group -->

            <!-- group -->
            <div class="nsc-panel-group" flex="none" layout="row" layout-align="start start">
                <button class="nsc-panel-button nsc-hide" type="button">
                    <span class="nsc-icon nsc-icon-eraser" data-i18n="videoPanelClear" data-event="nimbus-editor-active-tools" data-event-param="clear">&nbsp;</span>
                </button>
                <button class="nsc-panel-button" type="button">
                    <span class="nsc-icon nsc-icon-eraser-all" data-i18n="videoPanelClearAll" data-event="nimbus-editor-active-tools" data-event-param="clearAll">&nbsp;</span>
                </button>
                <button class="nsc-panel-button" type="button">
                    <span class="nsc-icon nsc-icon-webcam" data-i18n="videoPanelCamera" id="nimbus_web_camera_toggle">&nbsp;</span>
                </button>
            </div>
            <!-- /group -->
        </div>

        <div class="nsc-panel-actions" flex="none" layout="row" layout-align="start center">
            <button class="nsc-panel-button big" type="button" id="nsc_panel_button_play" style="display: none;">
                <span class="nsc-icon nsc-icon-play">&nbsp;</span>
            </button>
            <button class="nsc-panel-button big" type="button" id="nsc_panel_button_pause">
                <span class="nsc-icon nsc-icon-pause">&nbsp;</span>
            </button>
            <button class="nsc-panel-button big" type="button" id="nsc_panel_button_stop">
                <span class="nsc-icon nsc-icon-stop">&nbsp;</span>
            </button>
        </div>

        <!-- panel togglers -->
        <div class="nsc-panel-togglers" layout="row" layout-align="start center" flex="none">
            <button class="nsc-panel-toggle-button" type="button">
                <span class="nsc-icon nsc-icon-panel-close" data-i18n="videoPanelHideShowPanel">&nbsp;</span>
            </button>
        </div>
        <!-- /panel togglers -->

    </div>
</div>
<div class="nsc-video-editor nsc-hide events" style="width: 1688px; height: 1870px;"><canvas width="1688" height="1870" style="width: 1688px; height: 1870px; position: absolute; top: 0px; left: 0px; z-index: 0;"></canvas><canvas width="1688" height="1870" style="width: 1688px; height: 1870px; position: absolute; top: 0px; left: 0px; z-index: 1;"></canvas><canvas width="1688" height="1870" style="width: 1688px; height: 1870px; position: absolute; top: 0px; left: 0px; z-index: 2;"></canvas></div><div class="nsc-content-camera nsc-hide">
    <div class="nsc-content-camera-buttons" flex="none" layout="row" layout-align="start start">
        <button class="nsc-content-camera-button" type="button" id="nsc_video_camera_collapse" style="display: none">
            <span class="nsc-icon nsc-icon-panel-collapse"></span>
        </button>
        <button class="nsc-content-camera-button" type="button" id="nsc_video_camera_expand">
            <span class="nsc-icon nsc-icon-panel-expand"></span>
        </button>
        <button class="nsc-content-camera-button" type="button" id="nsc_video_camera_close">
            <span class="nsc-icon nsc-icon-panel-close"></span>
        </button>
    </div>
    <div class="nsc-content-camera-container">
        <div class="nsc-content-camera-shadow"></div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>