<!DOCTYPE html>
<html ng-app="VideogameApp" ng-controller="VideogameCtrl">
<head>
  <?php include "_head.php"; ?>
  <title ng-bind="title"></title>
</head>
<body>

  <!-- navbar -->
  <!-- <script src="js/navbar.js"></script>
  <div id="navbar" class="w3-bar">
    <a href="#home" class="w3-hide-small w3-bar-item">ID</a>
    <a href="#home" class=" w3-bar-item">TITOLO</a>
    <a href="#home" class=" w3-bar-item">FRMT</a>
    <a href="#news" class="w3-hide-small w3-bar-item">SPC</a>
    <a href="#contact" class=" w3-bar-item">DV</a>
  </div> -->
  <!-- navbar -->

<div class="w3-top w3-container">
  <div class="w3-row">

    <div class="w3-bar w3-padding-16 w3-blue">
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a>
      <input id="myFilter" ng-model="input" class="w3-bar-item w3-input w3-round w3-animate-input" type="text"
        placeholder="Filtra per TITOLO, FRMT o DV" style="width:70px;max-width:70%;"/>
      <button class="w3-button w3-red w3-round-large" style="margin-left: 10px">ADD</button>
    </div>

  </div>

  <div id="repeater-header" class="w3-bar w3-red">
    <span class="x-id w3-hide-small w3-bar-item">ID</span>
    <div class="x-titolo w3-bar-item">TITOLO (mostrati: {{filtered.length}})</div>
    <span class="x-formato w3-bar-item">FRMT</span>
    <span class="x-speciale w3-hide-small w3-bar-item">SPC</span>
    <span class="x-dove w3-bar-item">DV</span>
  </div>

</div>

<br/><br/><br/><br/><br/>

<style>
  #repeater, #repeater-header {
    display: flex;
    width: 100%;
  }
  #repeater-header {
    font-weight: bold;

  }
  #repeater span, #repeater-header span {
    text-align: center;
    width: 50px;
  }
  #repeater .x-titolo, #repeater-header .x-titolo {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width:100%;
      width:100%;
  }
  #repeater .x-id, #repeater-header .x-id {
    text-align: right;
    min-width: 50px;
    padding-right: 5px;
  }
  #repeater .x-formato, #repeater-header .x-formato {
    width: 65px;
  }
  #repeater .x-dove, #repeater-header .x-dove {
    min-width: 50px;
  }
</style>

<div class="w3-container">
  <!-- ng-repeat -->
  <div id="repeater" class="w3-bar w3-border w3-hover-red w3-hover-sepia w3-card" onclick="document.getElementById('id01').style.display='block'"
      ng-repeat="x in vgJson | filter:input as filtered"
      ng-class-odd="'w3-light-gray'">
    <span class="x-id w3-hide-small w3-bar-item">{{x.ID}}</span>
    <div class="x-titolo w3-bar-item">{{x.TITOLO}}</div>
    <span class="x-formato w3-bar-item">{{x.FORMATO}}</span>
    <span class="x-speciale w3-hide-small w3-bar-item">{{x.SPECIALE}}</span>
    <span class="x-dove w3-bar-item">{{x.DOVE}}</span>
  </div>

  <br/>
  <div id="myFooter" class="w3-container w3-big">
    <p class="w3-small">Sbramm &copy; 2015-<?php echo date('Y')?></p>
  </div>

</div>
<!-- w3-container -->

<!-- modal -->
<div id="id01" class="w3-modal w3-animate-opacity">
  <div class="w3-modal-content">

    <header class="w3-container w3-teal">
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
      <h2>Modal Header</h2>
    </header>

    <div class="w3-container">
      <p>Some text..</p>
      <p>Some text..</p>
    </div>

    <footer class="w3-container w3-teal">
      <p>Modal Footer</p>
    </footer>

  </div>
</div>

</body>
</html>
