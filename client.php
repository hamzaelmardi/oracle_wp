<?php
    ob_start();
    session_start();
    include('index.php');
    function client_shortcode() {

        $wpcon = mysqli_connect("localhost","root","","wordpress");
        $user_data = checklogin($wpcon);

 // connection database oracle
    $dbstr ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =127.0.0.1)(PORT = 1521))
            (CONNECT_DATA =
            (SERVER = DEDICATED)
            (SERVICE_NAME = orcl)
            (INSTANCE_NAME = orcl)))";
    $conn = oci_connect('c##hamza','123',$dbstr);
    $stmt = oci_parse($conn, "select PARC,STATUT,GENRE,MARQUE from parc");
    $stmt1 = oci_parse($conn, "select CODE_ADMINISTRATION,MATRICULE,FICHE from vehicule");
    $stmt2 = oci_parse($conn, "select CONCAT(prenom,CONCAT( ' ',nom)),VILLE,ACTIVITE,AGREMENT from fournisseur");
    oci_execute($stmt);
    oci_execute($stmt1);
    oci_execute($stmt2);
    $nrows = oci_fetch_all($stmt, $results);
    $nrows1 = oci_fetch_all($stmt1, $results1);
    $nrows2 = oci_fetch_all($stmt2, $results2);
        if ($nrows > 0) { 
    $table1= '<html>
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <head>
    <style>
    table {
  width: 100%;
  border: 1px solid black;
}
     select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.button {
  border: none;
  color: white;
  padding: 6px 3px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
</style>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js"></script>
  <script src="//cdn.datatables.net/plug-ins/1.11.3/dataRender/datetime.js"></script>
  <h1>Espace Client</h1> 
   <select  id="source" >
   <option value="" selected disabled>select</option>
   <option value="parc">Consultation parc</option>
  <option value="vehicule">Fiche véhicule</option>
  <option value="fournisseur">liste fournisseur</option>  
  <option value="convention">Fiche de suivi des conventions vignettes</option>  
  <option value="livre">Situation des carnets livrés</option>  
  <option value="nonregle">Situation des carnets livrés non réglés</option>  
  <option value="consommation">Situation des consommations du Parc</option>  
</select >
<!-- script select -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
    var bindClickToToggle = function(element){
        element.click(function(){
            $(this).parents(".dropdown").find("dd ul").toggle();
        });
    };
    $("#source").change(function () {
        if ($("#source option:selected").text() == "Fiche véhicule"){
            $("#parc").hide();
            $("#fiche").show();
            $("#fournisseur").hide();
            $("#convention").hide();
            $("#livre").hide();
            $("#nonregle").hide();
            $("#consommation").hide();
        } else if ($("#source option:selected").text() == "Consultation parc"){
            $("#fiche").hide();
            $("#parc").show();
            $("#fournisseur").hide();
            $("#convention").hide();
            $("#livre").hide();
            $("#nonregle").hide();
            $("#consommation").hide();
        } else if ($("#source option:selected").text() == "liste fournisseur"){
            $("#fiche").hide();
            $("#parc").hide();
            $("#fournisseur").show();
            $("#convention").hide();
            $("#livre").hide();
            $("#nonregle").hide();
            $("#consommation").hide();
        } else if ($("#source option:selected").text() == "Fiche de suivi des conventions vignettes"){
            $("#fiche").hide();
            $("#parc").hide();
            $("#fournisseur").hide();
            $("#convention").show();
            $("#livre").hide();
            $("#nonregle").hide();
            $("#consommation").hide();
        } else if ($("#source option:selected").text() == "Situation des carnets livrés"){
            $("#fiche").hide();
            $("#parc").hide();
            $("#fournisseur").hide();
            $("#convention").hide();
            $("#livre").show();
            $("#nonregle").hide();
            $("#consommation").hide();
        }else if ($("#source option:selected").text() == "Situation des carnets livrés non réglés"){
            $("#fiche").hide();
            $("#parc").hide();
            $("#fournisseur").hide();
            $("#convention").hide();
            $("#livre").hide();
            $("#nonregle").show();
            $("#consommation").hide();
        }else if ($("#source option:selected").text() == "Situation des consommations du Parc"){
            $("#fiche").hide();
            $("#parc").hide();
            $("#fournisseur").hide();
            $("#convention").hide();
            $("#livre").hide();
            $("#nonregle").hide();
            $("#consommation").show();
        }});
});
</script>

  <div name="parc" id="parc" style="display:none">

  <!-- script datatables -->
<script >
$(document).ready(function() {
    $("#parc1 thead tr").clone(true).appendTo( "#parc1 thead" );
    $("#parc1 thead tr:eq(1) th").each( function (i) {
        var title = $(this).text();
 $(this).html( \'<input type="text" placeholder="Search" style="width: 100%; "/>\' );

        $( "input", this ).on( "keyup change", function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $("#parc1").DataTable( {
        "pageLength":5,
        orderCellsTop: true,
        fixedHeader: true,
    } );
} );
</script>

<body>

<div class="row justify-content-start">
<div class="col-10">

<table id="parc1" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Parc</th>
            <th>Statut</th>
            <th>Genre</th>
            <th>Marque</th>
        </tr>
    </thead>
    <tbody>';
for ($i = 0; $i < $nrows; $i++) { 
$table1 .= '<tr>';
 foreach ($results as $data) { 
$table1 .= "<td >  $data[$i] </td>";
 } 
 $table1 .= '</tr>';
}
$table1 .= '</tbody>
</table>
</div>
</div>
</div>
<!-- ---------------------------------------- -->
<div name="fiche" id="fiche" style="display:none">

  <!-- script datatables -->
<script >
$(document).ready(function() {
    $("#fichev thead tr").clone(true).appendTo( "#fichev thead" );
    $("#fichev thead tr:eq(1) th").each( function (i) {
        var title = $(this).text();
 $(this).html( \'<input type="text" placeholder="Search" style="width: 80%; "/>\' );

        $( "input", this ).on( "keyup change", function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $("#fichev").DataTable( {
        "pageLength":5,
        orderCellsTop: true,
        fixedHeader: true,
    } );
} );
</script>

<body>

<div class="row justify-content-start">
<div class="col-10">

<table id="fichev" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Code </th>
            <th>Matricule</th>
            <th>Fiche</th>
        </tr>
    </thead>
    <tbody>';
for ($i = 0; $i < $nrows1; $i++) { 
$table1 .= '<tr>';
 foreach ($results1 as $data) { 
$table1 .= "<td >  $data[$i] </td>";
 } 
 $table1 .= '</tr>';
}
$table1 .= '</tbody>
</table>
</div>
</div>
</div>
<!-- ---------------------------------------- -->
<div name="fournisseur" id="fournisseur" style="display:none">

  <!-- script datatables -->
<script >
$(document).ready(function() {
    $("#fournisseurs thead tr").clone(true).appendTo( "#fournisseurs thead" );
    $("#fournisseurs thead tr:eq(1) th").each( function (i) {
        var title = $(this).text();
 $(this).html( \'<input type="text" placeholder="Search" style="width: 100%; "/>\' );

        $( "input", this ).on( "keyup change", function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $("#fournisseurs").DataTable( {
        "pageLength":5,
        orderCellsTop: true,
        fixedHeader: true,
    } );
} );
</script>

<body>

<div class="row justify-content-start">
<div class="col-10">

<table id="fournisseurs" class="display" style="width:100%">
    <thead>
        <tr>
            <th>fournisseur</th>
            <th>type d’activité</th>
            <th>ville</th>
            <th>type d’agrément</th>
        </tr>
    </thead>
    <tbody>';
for ($i = 0; $i < $nrows2; $i++) { 
$table1 .= '<tr>';
 foreach ($results2 as $data) { 
$table1 .= "<td >  $data[$i] </td>";
 } 
 $table1 .= '</tr>';
}
$table1 .= '</tbody>
</table>
</div>
</div>
</div>
<!-- ---------------------------------------- -->
<div name="convention" id="convention" style="display:none">
Fiche de suivi des conventions vignettes
</div>
<!-- ---------------------------------------- -->
<div name="livre" id="livre" style="display:none">
livre
</div>
<!-- ---------------------------------------- -->
<div name="nonregle" id="nonregle" style="display:none">
nonregle
</div>
<!-- ---------------------------------------- -->
<div name="consommation" id="consommation" style="display:none">
consommation
</div>
<b> <center> Click here to<a href = "/wordpress/wp-content/plugins/test/logout" class="button"> logout.<a></center> </b>
</body>

'
; 

}
return $table1;
}

add_shortcode('clientshortcode','client_shortcode');