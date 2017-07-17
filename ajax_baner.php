<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/head.css">
	  <script language="javascript" src="js/jquery-1.4.js"></script>
	  <script language="javascript" src="js/headline.js"></script>
    <script type="text/javascript"> 
      $(document).ready(function(){
	  		// untuk permulaan, tampilkan content nomor 1 '#slideAwal'
	  		bukaContent($('#slideAwal'),'div1');			
	    });
	  </script>	

  </head>
    <body>

    <div id="divTrigger">
      <a href="javascript:;" onClick="bukaContent(this,'div1')" id="slideAwal" style="display:none;">1</a>
      <a href="javascript:;" onClick="bukaContent(this,'div2')" style="display:none;">2</a>
      <a href="javascript:;" onClick="bukaContent(this,'div3')" style="display:none;">3</a>
      <a href="javascript:;" onClick="bukaContent(this,'div4')" style="display:none;">4</a>
	  <a href="javascript:;" onClick="bukaContent(this,'div5')" style="display:none;">5</a>
    </div>

    <div id="divContent">
    <?php
    // Tampilkan 4 headline berita terkini 
    $sql = mysql_query("SELECT * FROM ajaxbaner ORDER BY id_berita asc");
   
    $no=1;
    while($r=mysql_fetch_array($sql)){
      echo "<div id='div$no'>
              <span class='title'>$r[judul]</span>
              <img src='pic/$r[gambar]' align='center' width='100%' height='300px'>$r[headline]
            </div>";
      $no++;    
    }     
    ?>
    </div>
  </body>
</html>


